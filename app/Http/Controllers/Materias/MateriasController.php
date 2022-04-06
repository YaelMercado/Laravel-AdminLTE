<?php 

namespace App\Http\Controllers\Materias; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\DB;
use App\Models\Carrers; 
use App\Models\Semestre; 
use App\Models\Materias; 
use App\Models\Courses; 
use Illuminate\Support\Facades\Auth;

class MateriasController extends Controller 
{ 
    public function index()
    {   
        $this->authorize('show-carrers', User::class);
        $user_rol_auth = Auth::user()->roles()->first();

        $estancias = Materias::paginate(10);
                
        return view('materias.index', compact('estancias'));
    }

    public function show($id)
    { 
        $this->authorize('show-carrers', User::class);
        $estancias = Materias::whereId($id)->first();
        return view('materias.show', compact('estancias'));
    }

    public function create($id)
    {
        $this->authorize('create-carrers', User::class);
        $materias = $id;
        return view('materias.create', compact('materias'));
    }

    public function store(Request $request)
    {
        $this->authorize('create-carrers', User::class);
        
        if ($request){
            
            $estancias = new Materias();
            $estancias->name = $request->name;
            $estancias->descripcion = $request->summary_ckeditor;
            $estancias->id_semestre = $request->carrers_id;

            $estancias->save();
        }else{
            return "Valores no validos";
        }

        $this->flashMessage('check', 'Materia agregada correctamente', 'success');
        return redirect('/semestre/add_materias/'.$request->carrers_id);
    }

    public function edit($id)
    { 
        $this->authorize('edit-carrers', User::class);
        $estancias = Materias::whereId($id)->first();
        return view('materias.edit', compact('estancias'));
    }

    public function update(Request $request,$id)
    {
        $this->authorize('edit-carrers', User::class);
            $estancias = Materias::whereId($id)->first();
            
            $estancias->name = $request->name;
            $estancias->descripcion = $request->summary_ckeditor;

            $estancias->save();

        $this->flashMessage('check', 'Materia actualizada correctamente', 'success');
        return redirect()->route('materias');
    }

    public function destroy($id)
    {
        $this->authorize('destroy-carrers', User::class);
        
        $estancias = Materias::find($id);

        if(!$estancias){
            $this->flashMessage('warning', 'No se encontro la Estancia!', 'danger');            
            return redirect()->route('user');
        }

        $estancias->delete();

        $this->flashMessage('check', 'Materia eliminada exitosamente!', 'success');

        return redirect('/semestre/add_materias/'.$estancias->id_semestre);
    }

}