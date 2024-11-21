<?php

namespace App\Http\Controllers;
use App\Models\AppForm;
use App\Models\Client;
use Illuminate\Http\Request;

class DBcontroller extends Controller
{
    public function getAppFormsJson(){
        $appforms=AppForm::all();
        return $appforms->toJson();
    }
    public function getClientsJson(){
        $clients=Client::all();
        return $clients->toJson();
    }
}
