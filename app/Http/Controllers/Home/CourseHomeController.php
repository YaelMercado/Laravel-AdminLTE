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

    public function view_home_course($id){
        $user = Auth::user();
        $user_rol_auth = Auth::user()->roles()->first();
        $empresa_id = $user->company_id;
        $courses = Courses::join('view_course_by_company', function($join) use ($empresa_id)
        {
            $join->on('empresa_id', '=', DB::RAW('(select '.$empresa_id.')'));
            $join->on('universidad_id','=', 'courses.id');
        })->where('courses.id', $id)->select('courses.*', 'empresa_id', 'universidad_id', 'view_course_by_company.id as id_view')->get();

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
}