<?php

# /app/Http/Controllers/Zoom/MeetingController.php

namespace App\Http\Controllers\Zoom;

use App\Http\Controllers\Controller;
use App\Traits\ZoomJWT;
use App\Models\Unidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MeetingController extends Controller
{
    use ZoomJWT;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function list(Request $request)
    {
        $path = 'users/me/meetings';
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        $data['meetings'] = array_map(function (&$m) {
            $m['start_at'] = $this->toUnixTimeStamp($m['start_time'], $m['timezone']);
            return $m;
        }, $data['meetings']);

        return [
            'success' => $response->ok(),
            'data' => $data,
        ];
    }

    public function create(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'agenda' => 'string|nullable',
            'email' => 'string|nullable'
        ]);
        
        if ($validator->fails()) {
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }
        $data = $validator->validated();
        $email = "";
        $path = 'users/me/meetings';
        $response = $this->zoomPost($path, [
            'topic' => $data['topic'],
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $this->toZoomTimeFormat($data['start_time']),
            'duration' => 60,
            'agenda' => $data['agenda'],
            'settings' => [
                'host_video' => true,
                'participant_video' => true,
                'waiting_room' => false,
                'in_meeting' => false,
                'join_before_host' => true,
                'audio' => 'voip',
                'auto_recording' => 'none',
                'enforce_login' => true,
                'alternative_hosts' => ''.$email,
                'meeting_authentication' => false
            ]
        ]);

        $data = json_decode($response->body(), true);
        //dd(($data));
        if ($request){
            
            $estancias = new Unidades();
            $estancias->codigo = $request->codigo;
            $estancias->name = $request->topic;
            $estancias->descripcion = $request->summary_ckeditor;
            $estancias->agenda = $request->agenda;
            $estancias->fecha_zoom = $request->start_time;
            $estancias->url_zoom = $data['join_url'];
            $estancias->id_zoom = $data['id'];
            $estancias->type = $request->type;
            $estancias->id_cert_cap = $request->id_cerf_cap;
            $estancias->order = 1;
        
            $estancias->save();
        }else{
            return "Valores no validos";
        }
        
        return redirect('meetings/table/'.$estancias->type."/".$estancias->id_cert_cap);
        return [
            'success' => $response->status() === 201,
            'data' => json_decode($response->body(), true),
        ];
    }

    public function view_zoom_meeting(){
        $meeting_id = "85693414865";
        $base64 = base64_encode("Tintelligence@hotmail.com");
        return view('zoom.view_meeting', compact('meeting_id', 'base64'));
    }

    public function create_view_zoom(int $type, int $id){
        return view('zoom.create', compact('type', 'id'));
    }

    public function table_unidades_zoom(int $type, int $id){
        //$this->authorize('show-carrers', User::class);
        //$user_rol_auth = Auth::user()->roles()->first();

        if ($type == 1){
            $estancias = Unidades::where('id_cert_cap', $id)->where('type', '1')->paginate(10);
            $var_cap = "capacitaciones";
        }else if ($type == 2){
            $estancias = Unidades::where('id_cert_cap', $id)->where('type', '2')->paginate(10);
            $var_cap = "certificaciones";
        }

        return view('zoom.table_unidades_zoom', compact('estancias', 'var_cap', 'type', 'id'));
    }

    public function get(Request $request, string $id)
    {
        $path = 'meetings/' . $id;
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        if ($response->ok()) {
            $data['start_at'] = $this->toUnixTimeStamp($data['start_time'], $data['timezone']);
        }

        return [
            'success' => $response->ok(),
            'data' => $data,
        ];
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'agenda' => 'string|nullable',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }
        $data = $validator->validated();

        $path = 'meetings/' . $id;
        $response = $this->zoomPatch($path, [
            'topic' => $data['topic'],
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => (new \DateTime($data['start_time']))->format('Y-m-d\TH:i:s'),
            'duration' => 30,
            'agenda' => $data['agenda'],
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ]
        ]);

        return [
            'success' => $response->status() === 204,
            'data' => json_decode($response->body(), true),
        ];
    }

    public function delete(Request $request, string $id)
    {
        $unidades = Unidades::where('id_zoom', $id)->first();
        //dd($unidades);
        if ($unidades){
            $path = 'meetings/' . $id;
            $response = $this->zoomDelete($path);
            $unidades->delete();
            $this->flashMessage('check', 'Unidad eliminada exitosamente!', 'success');
            return redirect()->back();
        }
        
        /*return [
            'success' => $response->status() === 204,
            'data' => json_decode($response->body(), true),
        ];*/
    }
}
