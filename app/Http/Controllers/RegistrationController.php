<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function onRegistration(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $city =$request->input('city');
        $username = $request->input('username');
        $passsword = $request->input('passsword');
        $gender = $request->input('gender');
        $countUsername  =Registration::where('username',$username)->count();
        if ($countUsername != 0)
        {
            echo "Username Already Exsists";
        }else
            {
              $result = Registration::insert([
                  'firstname'=>$firstname,
                  'lastname'=>$lastname,
                  'city'=>$city,
                  'username'=>$username,
                  'passsword'=>$passsword,
                  'gender'=>$gender]);
              if ($result == true)
              {
                  echo "Registration Completed";
              }else
                  {
                      echo "Registration Not  Completed";
                  }
            }

    }
}
