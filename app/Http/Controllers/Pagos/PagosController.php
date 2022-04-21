<?php 

namespace App\Http\Controllers\Pagos; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\DB;
use App\Models\Carrers; 
use App\Models\Semestre; 
use App\Models\Pagos; 
use App\Models\Courses; 
use Illuminate\Support\Facades\Auth;

class PagosController extends Controller 
{ 
    public function index()
    {   
        $this->authorize('show-carrers', User::class);
        $user_rol_auth = Auth::user()->roles()->first();

        $estancias = Pagos::paginate(10);
                
        return view('pagos.index', compact('estancias'));
    }

    public function show($id)
    { 
        $this->authorize('show-carrers', User::class);
        $estancias = Pagos::whereId($id)->first();
        return view('pagos.show', compact('estancias'));
    }

    public function create($id)
    {
        $this->authorize('create-carrers', User::class);
        $materias = $id;
        return view('pagos.create', compact('materias'));
    }

    public function store(Request $request)
    {
        
    }

    public function edit($id)
    { 
        
    }

    public function update(Request $request,$id)
    {
        
    }

    public function destroy($id)
    {
        
    }

}