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
        return view('poll',["name"=>"","email"=>"",'favoriteanimal'=>'','favoritefood'=>'','nameerror'=>'','emailerror'=>'','favanimerror'=>'','favfooderror'=>'','goodstatus'=>"",'badstatus'=>'']);
    }
    public function getResults():View{
        return view('results');
    }
    public function postPoll(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $favanim = $request->input('favoriteanimal');
        $favfood = $request->input('favoritefood');
        $nameerror='';
        $emailerror='';
        $favanimerror='';
        $favfooderror='';
        $errors=0;
        if (!is_valid($name)){
            $nameerror='Name should have only letters!';
            $errors+=1;
        }
        if (strlen($name)==0){
            $nameerror='Name is empty!';
            $name="";
            $errors+=1;
        }
        if (strlen($email)==0){
            $emailerror='Email is empty!';
            $email="";
            $errors+=1;
        }
        if (!is_valid($favanim)){
            $favanimerror='Favorite animal should have only letters!';
            $errors+=1;
        }
        if (strlen($favanim)==0){
            $favanimerror='Favorite animal is empty!';
            $favanim="";
            $errors+=1;
        }
        if (!is_valid($favfood)){
            $favfooderror='Favorite food should have only letters!';
            $errors+=1;
        }
        if (strlen($favfood)==0){
            $favfooderror='Favorite food is empty!';
            $favfood="";
            $errors+=1;
        }
        if ($errors>0){
            return view('poll',["name"=>$name,"email"=>$email,'favoriteanimal'=>$favanim,'favoritefood'=>$favfood,'nameerror'=>$nameerror,'emailerror'=>$emailerror,'favanimerror'=>$favanimerror,'favfooderror'=>$favfooderror,'goodstatus'=>"",'badstatus'=>'Ошибка!']);
        }
        $data=["name"=>$name,"email"=>$email,"favoriteanimal"=>$favanim,"favoritefood"=>$favfood];
        $filename=md5($name.$email.$favanim.$favfood).".json";
        Storage::disk('public')->put($filename, json_encode($data,JSON_UNESCAPED_UNICODE));
        return view('poll',["name"=>"","email"=>"",'favoriteanimal'=>'','favoritefood'=>'','nameerror'=>'','emailerror'=>'','favanimerror'=>'','favfooderror'=>'','goodstatus'=>"Данные добавлены успешно!",'badstatus'=>'']);
    }
}
