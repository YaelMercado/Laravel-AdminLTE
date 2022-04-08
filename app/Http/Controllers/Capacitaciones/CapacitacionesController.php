<?php 

namespace App\Http\Controllers\Capacitaciones; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\DB;
use App\Models\Capacitaciones; 
use App\Models\Instructores; 
use App\Models\Semestre; 
use App\Models\Courses; 
use Illuminate\Support\Facades\Auth;

class CapacitacionesController extends Controller 
{ 
    public function index()
    {   
        $this->authorize('show-capacitaciones', User::class);
        $user_rol_auth = Auth::user()->roles()->first();

        $estancias = Capacitaciones::paginate(10);
                
        return view('capacitaciones.index', compact('estancias'));
    }

    public function show($id)
    { 
        $this->authorize('show-capacitaciones', User::class);
        $estancias = Capacitaciones::whereId($id)->first();
        $instructores = Instructores::All();
        return view('capacitaciones.show', compact('estancias', 'instructores'));
    }

    public function create()
    {
        $this->authorize('create-capacitaciones', User::class);
        $instructores = Instructores::All();
        return view('capacitaciones.create', compact('instructores'));
    }

    public function store(Request $request)
    {
        $this->authorize('create-capacitaciones', User::class);
        
        if ($request){
            
            $estancias = new Capacitaciones();
            $estancias->name = $request->name;
            $estancias->descripcion = $request->summary_ckeditor;
            $estancias->fecha_inicio = $request->fecha_inicio;
            $estancias->fecha_fin = $request->fecha_fin;
            $estancias->active = 1;
            $estancias->type = 1;
            $estancias->id_instructor = $request->instructor_id;
            $estancias->save();
        }else{
            return "Valores no validos";
        }

        $this->flashMessage('check', 'Certificacion agregada correctamente', 'success');
        return redirect()->route('capacitaciones');
    }

    public function edit($id)
    { 
        $this->authorize('edit-capacitaciones', User::class);
        $estancias = Capacitaciones::whereId($id)->first();
        $instructores = Instructores::All();
        return view('capacitaciones.edit', compact('estancias', 'instructores'));
    }

    public function update(Request $request,$id)
    {
        $this->authorize('edit-capacitaciones', User::class);
        $estancias = Capacitaciones::whereId($id)->first();
        $estancias->name = $request->name;
        $estancias->descripcion = $request->summary_ckeditor;
        $estancias->fecha_inicio = $request->fecha_inicio;
        $estancias->fecha_fin = $request->fecha_fin;
        $estancias->active = 1;
        $estancias->type = 1;
        $estancias->id_instructor = $request->instructor_id;
        $estancias->save();

        $this->flashMessage('check', 'Certificacion actualizada correctamente', 'success');
        return redirect()->route('capacitaciones');
    }

    public function destroy($id)
    {
        $this->authorize('destroy-capacitaciones', User::class);
        $estancias = Capacitaciones::find($id);

        if(!$estancias){
            $this->flashMessage('warning', 'No se encontro la Estancia!', 'danger');            
            return redirect()->route('capacitaciones');
        }

        $estancias->delete();

        $this->flashMessage('check', 'Certificacion eliminada exitosamente!', 'success');

        return redirect()->route('capacitaciones');
    }

}