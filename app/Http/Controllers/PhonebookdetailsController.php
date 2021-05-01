<?php

namespace App\Http\Controllers;

use App\Models\Phonebook_details;
use Illuminate\Http\Request;
use \Firebase\JWT\JWT;

class PhonebookdetailsController extends Controller
{
    public function onInsert(Request $request)
    {
        $token = $request->input('access_token');
        $key =env('TOKEN_KEY');
        $decoded = JWT::decode($token, $key, array('HS256'));
        $decoded_array = (array) $decoded;


        $user = $decoded_array['user'];
        $phone_number_one = $request->input('phone_number_one');
        $phone_number_two = $request->input('phone_number_two');
        $name = $request->input('name');
        $email = $request->input('email');
        $address = $request->input('address');

        $result = Phonebook_details::insert([
            'username'=>$user,
           'phone_number_one'=>$phone_number_one,
            'phone_number_two'=>$phone_number_two,
            'name'=>$name,
            'email'=>$email,
            'address'=>$address
        ]);
        if ($result==true)
        {
            return "Data Inserted";
        }else
            {
                return "Data Not Inserted";
            }
    }
    public function onSelect(Request $request){
        $token = $request->input('access_token');
        $key =env('TOKEN_KEY');
        $decoded = JWT::decode($token, $key, array('HS256'));
        $decoded_array = (array) $decoded;
        $user = $decoded_array['user'];

        $result = Phonebook_details::where('username',$user)->get();

        return $result;
    }
    public function onDelete(Request $request){
        $email = $request->input('email');
        $token = $request->input('access_token');
        $key =env('TOKEN_KEY');
        $decoded = JWT::decode($token, $key, array('HS256'));
        $decoded_array = (array) $decoded;
        $user = $decoded_array['user'];

        $result = Phonebook_details::where(['username'=>$user,'email'=>$email])->delete();
        if ($result==true){
            return "Delete Done";
        }else
            {
                return "Fail !, Try Again";
            }
    }
    public function onUpdate(Request $request)
    {
        $id=$request->input('id');
        $phone_number_one = $request->input('phone_number_one');
        $phone_number_two = $request->input('phone_number_two');
        $name = $request->input('name');
        $email = $request->input('email');
        $address = $request->input('address');
        $token = $request->input('access_token');
        $key =env('TOKEN_KEY');
        $decoded = JWT::decode($token, $key, array('HS256'));
        $decoded_array = (array) $decoded;
        $user = $decoded_array['user'];

        $result =  Phonebook_details::where('id',$id)->update(['phone_number_one'=>$phone_number_one,'phone_number_two'=>$phone_number_two,'name'=>$name]);
        if ($result==true){
            return "
             Update Done";
        }else
        {
            return "Fail !, Try Again";
        }
    }
}
