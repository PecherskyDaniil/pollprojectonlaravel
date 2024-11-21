<?php
namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\AppForm;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
header('Content-Type: text/html;charset=utf-8');
function is_valid($str)
{
    return preg_match('/[A-Za-zА-Яа-я\-]+/', $str);
}
class PollController extends Controller
{
    //
    public function getPoll():View{
        return view('poll',['goodstatus'=>"",'badstatus'=>'']);
    }
    public function getResults():View{
        $appforms=AppForm::join('clients', 'clients.id', '=', 'app_forms.client_id')
        ->get();
        return view('results',['appforms' => $appforms]);
    }
    public function deleteAppForm(Request $request){
        $afid=$request->input('delete');
        AppForm::destroy($afid);
        $appforms=AppForm::join('clients', 'clients.id', '=', 'app_forms.client_id')
        ->get();
        return view('results',['appforms' => $appforms]);
    }
    public function postPoll(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $favanim = $request->input('favoriteanimal');
        $favfood = $request->input('favoritefood');
        $secret=$request->input('secret');
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required','email'],
            'favoriteanimal' => ['required'],
            'favoritefood' => ['required'],
            'secret' => ['required'],
        ]);
        $client = Client::firstOrCreate(
            ['name' => $name,'email'=>$email],
        );
        $appform=new AppForm;
        $appform->client_id = $client->id;
        $appform->client_id = $client->id;
        $appform = AppForm::create([
            'client_id' => $client->id,
            'favorite_food' => $favfood,
            'favorite_animal' => $favanim,
            'secret' => $secret,
        ]);
        $appform->save();
        #$data=["name"=>$name,"email"=>$email,"favoriteanimal"=>$favanim,"favoritefood"=>$favfood,"secret"=>$secret];
        #$filename=md5($name.$email.$favanim.$favfood).".json";
        #Storage::disk('public')->put($filename, json_encode($data,JSON_UNESCAPED_UNICODE));
        return view('poll',['goodstatus'=>"Данные добавлены успешно!",'badstatus'=>'']);
    }
}
