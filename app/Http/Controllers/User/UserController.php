<?php 

namespace App\Http\Controllers\User; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UpdatePasswordUserRequest;
use App\Models\User; 
use App\Models\Role; 
use App\Models\Company;
use Maatwebsite\Excel\Facades\Excel; 

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Maatwebsite\Excel\Concerns\{ WithHeadingRow};
use Illuminate\Support\Facades\DB;

class UserController extends Controller 
{ 
    public function index()
    { 
        $this->authorize('show-user', User::class);
        $user_rol_auth = Auth::user()->roles()->first();
        //dd($user_rol_auth->id);
        if ($user_rol_auth->id > 2){
            $users = User::where('company_id',Auth::user()->company_id)->paginate(15);
        }else{
            $users = User::paginate(15);
        }
        

        return view('users.index', compact('users'));
    }

    public function show($id)
    { 
    	$this->authorize('show-user', User::class);

    	$user = User::find($id);

    	if(!$user){
        	$this->flashMessage('warning', 'User not found!', 'danger');            
            return redirect()->route('user');
        }  

        $roles = Role::all();
        $empresas = Company::where('id', $user->company_id)->first();

		    $roles_ids = Role::rolesUser($user);      	               

        return view('users.show',compact('user', 'roles', 'roles_ids', 'empresas'));
    }

    public function create()
    {
        $this->authorize('create-user', User::class);

        $user_rol_auth = Auth::user()->roles()->first();
        //dd($user_rol_auth->id);
        if ($user_rol_auth->id > 2){
            $roles = Role::where('id','>',2)->get();
            $empresas = Company::where('id', Auth::user()->company_id)->get();
        }else{
            $roles = Role::all();
            $empresas = Company::all();
        }
        

        return view('users.create',compact('roles','empresas'));
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('create-user', User::class);

        $request->merge(['password' => bcrypt($request->get('password'))]);

        $user = User::create($request->all());

        $roles = $request->input('roles') ? $request->input('roles') : [];

        $user->roles()->sync($roles);

        $this->flashMessage('check', 'User successfully added!', 'success');

        return redirect()->route('user.create');
    }

    public function edit($id)
    { 
    	$this->authorize('edit-user', User::class);

    	$user = User::find($id);

    	if(!$user){
        	$this->flashMessage('warning', 'User not found!', 'danger');            
            return redirect()->route('user');
        }  

        $user_rol_auth = Auth::user()->roles()->first();
        //dd($user_rol_auth->id);
        if ($user_rol_auth->id > 2){
            $roles = Role::where('id','>',2)->get();
            $empresas = Company::where('id', Auth::user()->company_id)->get();
        }else{
            $roles = Role::all();
            $empresas = Company::all();
        }

		    $roles_ids = Role::rolesUser($user);       	               

        return view('users.edit',compact('user', 'roles', 'roles_ids', 'empresas'));
    }

    public function update(UpdateUserRequest $request,$id)
    {
    	$this->authorize('edit-user', User::class);

    	$user = User::find($id);

        if(!$user){
        	$this->flashMessage('warning', 'User not found!', 'danger');            
            return redirect()->route('user');
        }

        $user->update($request->all());

        $roles = $request->input('roles') ? $request->input('roles') : [];

        $user->roles()->sync($roles);

        $this->flashMessage('check', 'User updated successfully!', 'success');

        return redirect()->route('user');
    }

    public function updatePassword(UpdatePasswordUserRequest $request,$id)
    {
    	$this->authorize('edit-user', User::class);

    	$user = User::find($id);

        if(!$user){
        	$this->flashMessage('warning', 'User not found!', 'danger');            
            return redirect()->route('user');
        }

        $request->merge(['password' => bcrypt($request->get('password'))]);

        $user->update($request->all());

        $this->flashMessage('check', 'User password updated successfully!', 'success');

        return redirect()->route('user');
    }

    public function editPassword($id)
    { 
    	$this->authorize('edit-user', User::class);

    	$user = User::find($id);

    	if(!$user){
        	$this->flashMessage('warning', 'User not found!', 'danger');            
            return redirect()->route('user');
        }              	               

        return view('users.edit_password',compact('user'));
    }

    public function destroy($id)
    {
        $this->authorize('destroy-user', User::class);

        $user = User::find($id);

        if(!$user){
            $this->flashMessage('warning', 'User not found!', 'danger');            
            return redirect()->route('user');
        }

        $user->delete();

        $this->flashMessage('check', 'User successfully deleted!', 'success');

        return redirect()->route('user');
    }

    public function import()
    {
        $this->authorize('create-user', User::class);
        $user_rol_auth = Auth::user()->roles()->first();
        if ($user_rol_auth->id > 2){
          $roles = Role::where('id','>',2)->get();
          $empresas = Company::where('id', Auth::user()->company_id)->get();
        }else{
          $roles = Role::all();
          $empresas = Company::all();
        }
        return view('users.import', compact('empresas'));
    }

    public function store_import(Request $request) 
    {
      if ($request->hasFile('file_import')){
        $files_import = $request->file_import->store('public/files_import');
      }

      $universidad = $request->company_id;
      
      $documento = IOFactory::load(public_path()."/".str_replace('public', 'storage',$files_import));
      
      $errors = array(); 
      $columns = array();
      $last_id = array();
      
      $hojaActual = $documento->getSheet(0);
      
      if ($hojaActual->getCellByColumnAndRow(1, 1) != 'Nombre') {
        array_push($columns, "Columna 'Nombre Completo' no existe. Indice: <strong>A</strong>");
      }
      if ($hojaActual->getCellByColumnAndRow(2, 1) != 'Correo') {
        array_push($columns, "Columna 'Correo' no existe. Índice: <strong>B</strong>");
      }
      if ($hojaActual->getCellByColumnAndRow(3, 1) != 'Contrasena') {
        array_push($columns, "Columna 'Rol' no existe. Índice: <strong>C</strong>");
      }
      if ($hojaActual->getCellByColumnAndRow(4, 1) != 'Perfil') {
        array_push($columns, "Columna 'Perfil' no existe. Índice: <strong>D</strong>");
      }

      if (count($columns) == 0) { 
        $numeroMayorDeFila = $hojaActual->getHighestRow();
        $letraMayorDeColumna = $hojaActual->getHighestColumn();
        $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
    
        for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
          $bandera = 0;

          $nombre = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
          $correo = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
          $contraseña = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
          $perfil = $hojaActual->getCellByColumnAndRow(4, $indiceFila);

          if ($nombre == null || $nombre == '' || $nombre == ' ') {
            array_push($errors, "Valor Requerido Índice: <strong>RFC</strong> - Posición: A"."$indiceFila");
            $bandera = 1;
          }
          if ($correo == null || $correo == '' || $correo == ' ') {
            array_push($errors, "Valor Requerido Índice: <strong>Nombre Completo</strong> - Posición: B"."$indiceFila");
            $bandera = 1;
          }
          if ($contraseña == null || $contraseña == '' || $contraseña == ' ') {
              array_push($errors, "Valor Requerido Índice: <strong>Rol</strong> - Posición: C"."$indiceFila");
              $bandera = 1;
          }
          if ($perfil == null || $perfil == '' || $perfil == ' ') {
              array_push($errors, "Valor Requerido Índice: <strong>Correo</strong> - Posición: D"."$indiceFila");
              $bandera = 1;
          }

          if (User::where('email', $correo)->get()->count() >= 1) {
            array_push($errors, "Posición: <strong>D"."$indiceFila"."</strong>  -  Correo duplicado: <strong>"."$correo"."</strong>");
            $bandera = 1;
          }

          if ($bandera != 0) {
            continue;
          } else {
              //dd($rol_id);

              $user = new User;
              $user->name = $nombre;
              $user->email = $correo;
              $user->active = 1;
              $user->company_id = $universidad;
              $user->password = bcrypt($contraseña);
              $user->save();   

              $user->roles()->sync($perfil);
          }

        }

      }else {
      DB::rollback();
      return response()->json(array('columns' =>$columns));
      }

      if(count($errors) > 0) {
        DB::rollback();
        return response()->json(array('errors' =>$errors));
      }

      if(isset($user)) {
        if($user->save()) {
          return response()->json(['success'=>'Usuarios Importados Correctamente']);
        }
      }
   
    }

    function correos($correo) {
      $mail_unique = User::where('email', $correo)->whereNull('deleted_at')->get()->count();
      return $mail_unique;
    }

    static function user_registrados($id_company, $role_id){
      $users_num = $user_rol_auth = Auth::user()->roles()->where('id_company', $id_company)->where('rol_id', $role_id)->first()->count();
      return $users_num;
    }
}