<?php 

namespace App\Http\Controllers\Instructores; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\DB;
use App\Models\Instructores; 
use App\Models\Courses; 
use Illuminate\Support\Facades\Auth;

class InstructoresController extends Controller 
{ 
    public function index()
    {   
        $this->authorize('show-instructores', User::class);
        $user_rol_auth = Auth::user()->roles()->first();

        
        $instructores = Instructores::paginate(10);
        
        
        return view('instructores.index', compact('instructores'));
    }

    public function show($id)
    { 
        $this->authorize('show-instructores', User::class);
        $estancias = Instructores::whereId($id)->first();
        return view('instructores.show', compact('estancias'));
    }

    public function create()
    {
        $this->authorize('create-instructores', User::class);
        return view('instructores.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create-instructores', User::class);
        
        if ($request){
            
            if ($request->hasFile('fondo')){
                $fondo = $request->fondo->store('public/instructores');
            }

            $estancias = new Instructores();
            $estancias->name = $request->name;
            $estancias->imagen = $fondo;
            $estancias->semblaza = $request->summary_ckeditor;
            $estancias->user_id = 0;
            $estancias->save();

        }else{
            return "Valores no validos";
        }

        $this->flashMessage('check', 'Instructor agregado correctamente', 'success');
        return redirect()->route('instructores');
    }

    public function edit($id)
    { 
        $this->authorize('edit-instructores', User::class);
        $estancias = Instructores::whereId($id)->first();
        return view('instructores.edit', compact('estancias'));
    }

    public function update(Request $request,$id)
    {
        $this->authorize('edit-instructores', User::class);

    	$estancias = Instructores::whereId($id)->first();
        $estancias->name = $request->name;
        $estancias->semblaza = $request->summary_ckeditor;

        if ($request->hasFile('fondo')){
            $fondo = $request->fondo->store('public/instructores');
            $estancias->imagen = $fondo;
        } 

        $estancias->save();

        $this->flashMessage('check', 'Instructor actualizado correctamente', 'success');
        return redirect()->route('instructores');
    }

    public function destroy($id)
    {
        $this->authorize('destroy-instructores', User::class);
        $estancias = Instructores::find($id);

        if(!$estancias){
            $this->flashMessage('warning', 'No se encontro el Instructor!', 'danger');            
            return redirect()->route('user');
        }

        $estancias->delete();

        $this->flashMessage('check', 'Instructor eliminado exitosamente!', 'success');

        return redirect()->route('instructores');
    }

}