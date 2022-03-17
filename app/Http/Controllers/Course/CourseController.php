<?php 

namespace App\Http\Controllers\Course; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;  
use App\Models\Courses; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller 
{ 
    public function index()
    { 
        $user = Auth::user();
        $user_rol_auth = Auth::user()->roles()->first();
        //dd($user);
        $courses = Courses::paginate(10);
        
        if ($user_rol_auth->id >= 4){
            $empresa_id = $user->company_id;
            $courses = Courses::join('view_course_by_company', function($join) use ($empresa_id)
            {
                $join->on('empresa_id', '=', DB::RAW('(select '.$empresa_id.')'));
                $join->on('universidad_id','=', 'courses.id');
            })->select('courses.*', 'empresa_id', 'universidad_id', 'view_course_by_company.id as id_view')->get();
            return view('courses.view_course', compact('courses','empresa_id'));
        }else{
            return view('courses.index', compact('courses'));
        }
        
        
    }

    public function show($id)
    { 
        $course = Courses::whereId($id)->first();
        return view('courses.show', compact('course'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        if ($request){
            $course = new Courses();
            $course->nombre = $request->name;
            $course->codigo = $request->desc;
            $course->tipo_course = 1;
            $course->save();
        }else{
            return "Valores no validos";
        }

        $this->flashMessage('check', 'Curso agregado correctamente', 'success');
        return redirect()->route('course');
    }

    public function edit($id)
    { 
        $course = Courses::whereId($id)->first();
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request,$id)
    {
    	$course = Courses::whereId($id)->first();
        $course->nombre = $request->name;
        $course->codigo = $request->desc;
        $course->save();

        $this->flashMessage('check', 'Curso actualizado correctamente', 'success');
        return redirect()->route('course');
    }

    public function destroy($id)
    {
        $course = Courses::find($id);

        if(!$course){
            $this->flashMessage('warning', 'No se encontro el curso!', 'danger');            
            return redirect()->route('user');
        }

        $course->delete();

        $this->flashMessage('check', 'Curso eliminado exitosamente!', 'success');

        return redirect()->route('course');
    }
}