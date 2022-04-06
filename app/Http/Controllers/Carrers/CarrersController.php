<?php 

namespace App\Http\Controllers\Carrers; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\DB;
use App\Models\Carrers; 
use App\Models\Semestre; 
use App\Models\Courses; 
use Illuminate\Support\Facades\Auth;

class CarrersController extends Controller 
{ 
    public function index()
    {   
        $this->authorize('show-carrers', User::class);
        $user_rol_auth = Auth::user()->roles()->first();

        $estancias = Carrers::paginate(10);
                
        return view('carrers.index', compact('estancias'));
    }

    public function show($id)
    { 
        $this->authorize('show-carrers', User::class);
        $estancias = Carrers::whereId($id)->first();
        return view('carrers.show', compact('estancias'));
    }

    public function create()
    {
        $this->authorize('create-carrers', User::class);
        return view('carrers.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create-carrers', User::class);
        
        if ($request){
            
            $estancias = new Carrers();
            $estancias->name = $request->name;
            $estancias->descripcion = $request->summary_ckeditor;
        
            $estancias->save();
        }else{
            return "Valores no validos";
        }

        $this->flashMessage('check', 'Carrera agregada correctamente', 'success');
        return redirect()->route('carrers');
    }

    public function edit($id)
    { 
        $this->authorize('edit-carrers', User::class);
        $estancias = Carrers::whereId($id)->first();
        return view('carrers.edit', compact('estancias'));
    }

    public function update(Request $request,$id)
    {
        $this->authorize('edit-carrers', User::class);
            $estancias = Carrers::whereId($id)->first();
            
            $estancias->name = $request->name;
            $estancias->descripcion = $request->summary_ckeditor;

            $estancias->save();

        $this->flashMessage('check', 'Carrera actualizada correctamente', 'success');
        return redirect()->route('carrers');
    }

    public function destroy($id)
    {
        $this->authorize('destroy-carrers', User::class);
        $estancias = Carrers::find($id);

        if(!$estancias){
            $this->flashMessage('warning', 'No se encontro la Estancia!', 'danger');            
            return redirect()->route('user');
        }

        $estancias->delete();

        $this->flashMessage('check', 'Carrera eliminada exitosamente!', 'success');

        return redirect()->route('carrers');
    }

    public function add_semestre($id){
        $this->authorize('edit-carrers', User::class);
        $estancias = Carrers::find($id);
        $semestres = Semestre::where('id_carrers', $estancias->id)->paginate(10);

        if(!$estancias){
            $this->flashMessage('warning', 'No se encontro la Estancia!', 'danger');            
            return redirect()->route('user');
        }

        return view('carrers.add_semestre', compact('estancias', 'semestres'));
    }

}