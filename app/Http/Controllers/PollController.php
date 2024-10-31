<?php
namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
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
        return view('results');
    }
    public function postPoll(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $favanim = $request->input('favoriteanimal');
        $favfood = $request->input('favoritefood');
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required','email'],
            'favoriteanimal' => ['required'],
            'favoritefood' => ['required'],
        ]);
        $data=["name"=>$name,"email"=>$email,"favoriteanimal"=>$favanim,"favoritefood"=>$favfood];
        $filename=md5($name.$email.$favanim.$favfood).".json";
        Storage::disk('public')->put($filename, json_encode($data,JSON_UNESCAPED_UNICODE));
        return view('poll',['goodstatus'=>"Данные добавлены успешно!",'badstatus'=>'']);
    }
}
