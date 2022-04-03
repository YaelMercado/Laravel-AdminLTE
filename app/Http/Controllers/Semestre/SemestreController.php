<?php 

namespace App\Http\Controllers\Semestre; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\DB;
use App\Models\Carrers; 
use App\Models\Semestre;
use App\Models\Materias; 
use App\Models\Courses; 
use Illuminate\Support\Facades\Auth;

class SemestreController extends Controller 
{ 
    public function index()
    {   
        $this->authorize('show-carrers', User::class);
        $user_rol_auth = Auth::user()->roles()->first();

        $estancias = Semestre::paginate(10);
                
        return view('semestre.index', compact('estancias'));
    }

    public function show($id)
    { 
        $this->authorize('show-carrers', User::class);
        $estancias = Semestre::whereId($id)->first();
        return view('semestre.show', compact('estancias'));
    }

    public function create($id)
    {
        $this->authorize('create-carrers', User::class);
        $carrers = $id;
        return view('semestre.create', compact('carrers'));
    }

    public function store(Request $request)
    {
        $this->authorize('create-carrers', User::class);
        
        if ($request){
            
            $estancias = new Semestre();
            $estancias->name = $request->name;
            $estancias->descripcion = $request->summary_ckeditor;
            $estancias->id_carrers = $request->carrers_id;
            $estancias->save();
        }else{
            return "Valores no validos";
        }

        $this->flashMessage('check', 'Semestre agregada correctamente', 'success');
        return redirect('/carrers/add_semestre/'.$request->carrers_id);
    }

    public function edit($id)
    { 
        $this->authorize('edit-carrers', User::class);
        $estancias = Semestre::whereId($id)->first();
        return view('semestre.edit', compact('estancias'));
    }

    public function update(Request $request,$id)
    {
        $this->authorize('edit-carrers', User::class);
            $estancias = Semestre::whereId($id)->first();
            
            $estancias->name = $request->name;
            $estancias->descripcion = $request->summary_ckeditor;

            $estancias->save();

        $this->flashMessage('check', 'Semestre actualizada correctamente', 'success');
        return redirect()->route('semestre');
    }

    public function destroy($id)
    {
        $this->authorize('destroy-carrers', User::class);
        $estancias = Semestre::find($id);

        if(!$estancias){
            $this->flashMessage('warning', 'No se encontro la Estancia!', 'danger');            
            return redirect()->route('user');
        }

        $estancias->delete();

        $this->flashMessage('check', 'Semestre eliminada exitosamente!', 'success');

        return redirect('/carrers/add_semestre/'.$estancias->id);;
    }

    public function add_materias($id){
        $this->authorize('edit-carrers', User::class);
        
        $estancias = Semestre::find($id);
        $materias = Materias::where('id_semestre', $estancias->id)->paginate(10);

        if(!$estancias){
            $this->flashMessage('warning', 'No se encontro la Estancia!', 'danger');            
            return redirect()->route('user');
        }

        return view('semestre.add_materias', compact('estancias', 'materias'));
    }

}