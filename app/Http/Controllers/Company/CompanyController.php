<?php 

namespace App\Http\Controllers\Company; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\DB;
use App\Models\Company; 
use App\Models\Pais; 
use App\Models\Courses; 
use App\Models\View_course_by_company; 
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller 
{ 
    public function index()
    {   
        $this->authorize('show-company', User::class);
        $user_rol_auth = Auth::user()->roles()->first();

        if ($user_rol_auth->id > 2){
            $company = Company::where('id',Auth::user()->company_id)->paginate(10);
        }else{
            $company = Company::paginate(10);
        }
        
        return view('company.index', compact('company'));
    }

    public function show($id)
    { 
        $this->authorize('show-company', User::class);
        $company = Company::whereId($id)->first();
        return view('company.show', compact('company'));
    }

    public function create()
    {
        $this->authorize('create-company', User::class);

        $paises = Pais::All();
        
        return view('company.create', compact('paises'));
    }

    public function store(Request $request)
    {
        $this->authorize('create-company', User::class);
        if ($request){
            $company = new Company();
            $company->name = $request->name;
            $company->no_alumnos = $request->alumnos;
            $company->no_profesores = $request->profesores;
            $company->pais = $request->pais;
            $company->zona_horaria = $request->zona;

            $company->address = $request->address;
            $company->phone = $request->phone;
            $company->url_site = $request->url_site;
            $company->id_fiscal = $request->fiscal;
            $company->text_id = $request->text_id;
            $company->name_contact = $request->name_contac;
            $company->puesto = $request->puesto;
            $company->email = $request->email_admin;
            $company->phone_contact = $request->phone_contact;
            $company->save();
        }else{
            return "Valores no validos";
        }

        $this->flashMessage('check', 'Empresa agregado correctamente', 'success');
        return redirect()->route('company');
    }

    public function edit($id)
    { 
        $this->authorize('edit-company', User::class);
        $company = Company::whereId($id)->first();
        $paises = Pais::All();
        return view('company.edit', compact('company', 'paises'));
    }

    public function update(Request $request,$id)
    {
        $this->authorize('edit-company', User::class);
    	$company = Company::whereId($id)->first();
        $company->name = $request->name;
        $company->no_alumnos = $request->alumnos;
        $company->no_profesores = $request->profesores;
        $company->pais = $request->pais;
        $company->zona_horaria = $request->zona;

        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->url_site = $request->url_site;
        $company->id_fiscal = $request->fiscal;
        $company->text_id = $request->text_id;
        $company->name_contact = $request->name_contac;
        $company->puesto = $request->puesto;
        $company->email = $request->email_admin;
        $company->phone_contact = $request->phone_contact;

        $company->save();

        $this->flashMessage('check', 'Empresa actualizado correctamente', 'success');
        return redirect()->route('company');
    }

    public function destroy($id)
    {
        $this->authorize('destroy-company', User::class);
        $company = Company::find($id);

        if(!$company){
            $this->flashMessage('warning', 'No se encontro la empresa!', 'danger');            
            return redirect()->route('user');
        }

        $company->delete();

        $this->flashMessage('check', 'Empresa eliminado exitosamente!', 'success');

        return redirect()->route('company');
    }

    public function view_home_course_assing($id_empresa){
        $this->authorize('create-company', User::class);
        $empresa_id = $id_empresa;
        $courses = Courses::leftJoin('view_course_by_company', function($join) use ($empresa_id)
        {
            $join->on('empresa_id', '=', DB::RAW('(select '.$empresa_id.')'));
            $join->on('universidad_id','=', 'courses.id');
        })->select('courses.*', 'empresa_id', 'universidad_id', 'view_course_by_company.id as id_view')->get();
        //dd($courses);
        return view('company.inscription_company', compact('courses', 'empresa_id'));
    }

    public function view_home_course_assing_store(Request $request){
        $this->authorize('create-company', User::class);
        $empresa = $request->empresa_id;
        $course_id = $request->id_course;
        $course = Courses::whereId($course_id)->first();
        $universidad = Company::whereId($empresa)->first();

        if($course && $universidad){
            $View_company_plan = new View_course_by_company();
            $View_company_plan->empresa_id = $universidad->id;
            $View_company_plan->universidad_id = $course->id;
            $View_company_plan->save();
            $this->flashMessage('check', 'Curso inscrito en el plan de la universidad', 'success');
        }else{
            $this->flashMessage('warning', 'Error al inscribir el curso en la universidad', 'danger');   
        }

        return redirect()->back();;
    }

    public function view_home_course_assing_destroy($id)
    {
        $this->authorize('create-company', User::class);
        $plan_course_company = View_course_by_company::find($id);
        $course = Courses::where('id', $plan_course_company->universidad_id)->first();
        $empresa = Company::whereId($plan_course_company->empresa_id)->first();

        if(!$plan_course_company){
            $this->flashMessage('warning', 'No se encontro el elemento desactivado!', 'danger');            
            return redirect()->back();
        }

        $plan_course_company->delete();
        $this->flashMessage('check', 'El curso '.$course->nombre.' se desactivo de la universidad '.$empresa->name, 'success');

        return redirect()->back();
    }

}