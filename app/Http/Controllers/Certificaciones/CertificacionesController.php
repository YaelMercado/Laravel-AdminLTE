<?php 

namespace App\Http\Controllers\Certificaciones; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\DB;
use App\Models\Certificaciones; 
use App\Models\Semestre; 
use App\Models\Courses; 
use Illuminate\Support\Facades\Auth;

class CertificacionesController extends Controller 
{ 
    public function index()
    {   
        $this->authorize('show-certificaciones', User::class);
        $user_rol_auth = Auth::user()->roles()->first();

        $estancias = Certificaciones::paginate(10);
                
        return view('certificaciones.index', compact('estancias'));
    }

    public function show($id)
    { 
        $this->authorize('show-certificaciones', User::class);
        $estancias = Certificaciones::whereId($id)->first();
        return view('certificaciones.show', compact('estancias'));
    }

    public function create()
    {
        $this->authorize('create-certificaciones', User::class);
        return view('certificaciones.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create-certificaciones', User::class);
        
        if ($request){
            
            $estancias = new Certificaciones();
            $estancias->name = $request->name;
            $estancias->descripcion = $request->summary_ckeditor;
        
            $estancias->save();
        }else{
            return "Valores no validos";
        }

        $this->flashMessage('check', 'Certificacion agregada correctamente', 'success');
        return redirect()->route('certificaciones');
    }

    public function edit($id)
    { 
        $this->authorize('edit-certificaciones', User::class);
        $estancias = Certificaciones::whereId($id)->first();
        return view('certificaciones.edit', compact('estancias'));
    }

    public function update(Request $request,$id)
    {
        $this->authorize('edit-certificaciones', User::class);
            $estancias = Certificaciones::whereId($id)->first();
            
            $estancias->name = $request->name;
            $estancias->descripcion = $request->summary_ckeditor;

            $estancias->save();

        $this->flashMessage('check', 'Certificacion actualizada correctamente', 'success');
        return redirect()->route('certificaciones');
    }

    public function destroy($id)
    {
        $this->authorize('destroy-certificaciones', User::class);
        $estancias = Certificaciones::find($id);

        if(!$estancias){
            $this->flashMessage('warning', 'No se encontro la Estancia!', 'danger');            
            return redirect()->route('certificaciones');
        }

        $estancias->delete();

        $this->flashMessage('check', 'Certificacion eliminada exitosamente!', 'success');

        return redirect()->route('certificaciones');
    }

}