<?php 

namespace App\Http\Controllers\Estancias; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\DB;
use App\Models\Estancias; 
use App\Models\Courses; 
use Illuminate\Support\Facades\Auth;

class EstanciasController extends Controller 
{ 
    public function index()
    {   
        $this->authorize('show-estancia', User::class);
        $user_rol_auth = Auth::user()->roles()->first();

        
        $estancias = Estancias::paginate(10);
        
        
        return view('estancias.index', compact('estancias'));
    }

    public function show($id)
    { 
        $this->authorize('show-estancia', User::class);
        $estancias = Estancias::whereId($id)->first();
        return view('estancias.show', compact('estancias'));
    }

    public function create()
    {
        $this->authorize('create-estancia', User::class);
        return view('estancias.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create-estancia', User::class);
        
        if ($request){
            
            $estancias = new Estancias();
            $estancias->type_estancia = $request->type_estancia;
            $estancias->name = $request->name;
            $estancias->descripcion = $request->summary_ckeditor;
            $estancias->fecha_inicio = $request->inicio;
            $estancias->fecha_fin = $request->fin;
            $estancias->pais_destino = $request->pais;
            $estancias->universidad_destino = $request->universidad;
            
            if ($request->hasFile('destino')){
                $imagen_destino = $request->destino->store('public/images');
                $estancias->imagen_pais_destino = $imagen_destino;
            }

            if ($request->hasFile('unidestino')){
                $imagen_uni_destino = $request->unidestino->store('public/images');
                $estancias->imagen_universidad_destino = $imagen_uni_destino;
            }

            if ($request->hasFile('politicas')){
                $file_politicas_reglamento = $request->politicas->store('public/images');
                $estancias->archive_politias_reglas = $file_politicas_reglamento;
            }

            if ($request->hasFile('agenda')){
                $file_agenda = $request->agenda->store('public/images');
                $estancias->archive_agenda = $file_agenda;
            }

            if ($request->hasFile('fondo')){
                $imagen_fondo = $request->fondo->store('public/images');
                $estancias->imagen_portada = $imagen_fondo;
                $estancias->imagen_fondo = $imagen_fondo;
            }

            $estancias->save();
        }else{
            return "Valores no validos";
        }

        $this->flashMessage('check', 'Estancia agregado correctamente', 'success');
        return redirect()->route('estancias');
    }

    public function edit($id)
    { 
        $this->authorize('edit-estancia', User::class);
        $estancias = Estancias::whereId($id)->first();
        return view('estancias.edit', compact('estancias'));
    }

    public function update(Request $request,$id)
    {
        $this->authorize('edit-estancia', User::class);
            $estancias = Estancias::whereId($id)->first();
            $estancias->type_estancia = $request->type_estancia;
            $estancias->name = $request->name;
            $estancias->descripcion = $request->summary_ckeditor;
            $estancias->fecha_inicio = $request->inicio;
            $estancias->fecha_fin = $request->fin;
            $estancias->pais_destino = $request->pais;
            $estancias->universidad_destino = $request->universidad;
            
            if ($request->hasFile('destino')){
                $imagen_destino = $request->destino->store('public/images');
                $estancias->imagen_pais_destino = $imagen_destino;
            }

            if ($request->hasFile('unidestino')){
                $imagen_uni_destino = $request->unidestino->store('public/images');
                $estancias->imagen_universidad_destino = $imagen_uni_destino;
            }

            if ($request->hasFile('politicas')){
                $file_politicas_reglamento = $request->politicas->store('public/images');
                $estancias->archive_politias_reglas = $file_politicas_reglamento;
            }

            if ($request->hasFile('agenda')){
                $file_agenda = $request->agenda->store('public/images');
                $estancias->archive_agenda = $file_agenda;
            }

            if ($request->hasFile('fondo')){
                $imagen_fondo = $request->fondo->store('public/images');
                $estancias->imagen_portada = $imagen_fondo;
                $estancias->imagen_fondo = $imagen_fondo;
            }

            $estancias->save();

        $this->flashMessage('check', 'Estancia actualizado correctamente', 'success');
        return redirect()->route('estancias');
    }

    public function destroy($id)
    {
        $this->authorize('destroy-estancia', User::class);
        $estancias = Estancias::find($id);

        if(!$estancias){
            $this->flashMessage('warning', 'No se encontro la Estancia!', 'danger');            
            return redirect()->route('user');
        }

        $estancias->delete();

        $this->flashMessage('check', 'Estancia eliminado exitosamente!', 'success');

        return redirect()->route('estancias');
    }

}