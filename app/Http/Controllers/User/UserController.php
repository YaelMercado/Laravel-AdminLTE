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
}