<?php 

namespace App\Http\Controllers\Home; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;  
use App\Models\Courses; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseHomeController extends Controller 
{ 
    public function index()
    { 
        $courses = Courses::paginate(5);
        return view('HomeCourses.index', compact('courses'));
    }

    public function show($id)
    { 
    	
    }

    public function create()
    {
        
    }

    public function store(StoreUserRequest $request)
    {
        
    }

    public function edit($id)
    { 
    	
    }

    public function update(UpdateUserRequest $request,$id)
    {
    	
    }

    public function updatePassword(UpdatePasswordUserRequest $request,$id)
    {
    	
    }

    public function editPassword($id)
    { 
    	
    }

    public function destroy($id)
    {
        
    }

    public function view_home_course_prev($id){
        $user = Auth::user();
        $user_rol_auth = Auth::user()->roles()->first();
        $empresa_id = $user->company_id;
        $courses = Courses::join('view_course_by_company', function($join) use ($empresa_id)
        {
            $join->on('empresa_id', '=', DB::RAW('(select '.$empresa_id.')'));
            $join->on('universidad_id','=', 'courses.id');
        })->where('courses.id', $id)->select('courses.*', 'empresa_id', 'universidad_id', 'view_course_by_company.id as id_view')->first();
        
        switch ($id) {
            case '1':
                return view('courses.view_course_into_internalizacion_prev', compact('courses', 'empresa_id'));
                break;
            case '2':
                return view('courses.view_course_into_empleabilidad_prev', compact('courses', 'empresa_id'));
                break;
            case '3':
                return view('courses.view_course_into_certificaciones_prev', compact('courses', 'empresa_id'));
                break;
            case '4':
                return view('courses.view_course_into_capacitaciones_prev', compact('courses', 'empresa_id'));
                break;
            default:
                return view('courses.view_course_into', compact('courses', 'empresa_id'));
                break;
        }
        
    }

    public function view_home_course($id){
        $user = Auth::user();
        $user_rol_auth = Auth::user()->roles()->first();
        $empresa_id = $user->company_id;
        $courses = Courses::join('view_course_by_company', function($join) use ($empresa_id)
        {
            $join->on('empresa_id', '=', DB::RAW('(select '.$empresa_id.')'));
            $join->on('universidad_id','=', 'courses.id');
        })->where('courses.id', $id)->select('courses.*', 'empresa_id', 'universidad_id', 'view_course_by_company.id as id_view')->first();
        
        switch ($id) {
            case '1':
                return view('courses.view_course_into_internalizacion', compact('courses', 'empresa_id'));
                break;
            case '2':
                return view('courses.view_course_into_empleabilidad', compact('courses', 'empresa_id'));
                break;
            case '3':
                return view('courses.view_course_into_certificaciones', compact('courses', 'empresa_id'));
                break;
            case '4':
                return view('courses.view_course_into_capacitaciones', compact('courses', 'empresa_id'));
                break;
            default:
                return view('courses.view_course_into', compact('courses', 'empresa_id'));
                break;
        }
        
    }

    public function view_home_course_inter($id){
        $user = Auth::user();
        $user_rol_auth = Auth::user()->roles()->first();
        $empresa_id = $user->company_id;
        $courses = Courses::join('view_course_by_company', function($join) use ($empresa_id)
        {
            $join->on('empresa_id', '=', DB::RAW('(select '.$empresa_id.')'));
            $join->on('universidad_id','=', 'courses.id');
        })->where('courses.id', $id)->select('courses.*', 'empresa_id', 'universidad_id', 'view_course_by_company.id as id_view')->first();

        switch ($_GET['estancia']) {
            case '1':
                return view('courses.estancia_corta', compact('courses', 'empresa_id','id'));
                break;
            case '2':
                return view('courses.estancia_verano', compact('courses', 'empresa_id', 'id'));
                break;
            case '3':
                return view('courses.estancia_semestral', compact('courses', 'empresa_id', 'id'));
                break;
            default:
                return view('courses.view_course_into', compact('courses', 'empresa_id', 'id'));
                break;
        }
        
    }

    public function view_home_course_info($id){
        $user = Auth::user();
        $user_rol_auth = Auth::user()->roles()->first();
        $empresa_id = $user->company_id;
        $courses = Courses::join('view_course_by_company', function($join) use ($empresa_id)
        {
            $join->on('empresa_id', '=', DB::RAW('(select '.$empresa_id.')'));
            $join->on('universidad_id','=', 'courses.id');
        })->where('courses.id', $id)->select('courses.*', 'empresa_id', 'universidad_id', 'view_course_by_company.id as id_view')->first();
        
        switch ($id) {
            case '1':
                return view('courses.view_course_into_internalizacion_info', compact('courses', 'empresa_id'));
                break;
            case '2':
                return view('courses.view_course_into_empleabilidad_info', compact('courses', 'empresa_id'));
                break;
            case '3':
                return view('courses.view_course_into_certificaciones_info', compact('courses', 'empresa_id'));
                break;
            case '4':
                return view('courses.view_course_into_capacitaciones_info', compact('courses', 'empresa_id'));
                break;
            default:
                return view('courses.view_course_into', compact('courses', 'empresa_id'));
                break;
        }
        
    }

    public function view_home_course_view($id){
        $user = Auth::user();
        $user_rol_auth = Auth::user()->roles()->first();
        $empresa_id = $user->company_id;
        $courses = Courses::join('view_course_by_company', function($join) use ($empresa_id)
        {
            $join->on('empresa_id', '=', DB::RAW('(select '.$empresa_id.')'));
            $join->on('universidad_id','=', 'courses.id');
        })->where('courses.id', $id)->select('courses.*', 'empresa_id', 'universidad_id', 'view_course_by_company.id as id_view')->first();
        
        switch ($id) {
            case '1':
                return view('courses.view_course_into_internalizacion_view', compact('courses', 'empresa_id'));
                break;
            case '2':
                return view('courses.view_course_into_empleabilidad_view', compact('courses', 'empresa_id'));
                break;
            case '3':
                return view('courses.view_course_into_certificaciones_view', compact('courses', 'empresa_id'));
                break;
            case '4':
                return view('courses.view_course_into_capacitaciones_view', compact('courses', 'empresa_id'));
                break;
            default:
                return view('courses.view_course_into', compact('courses', 'empresa_id'));
                break;
        }
        
    }
}