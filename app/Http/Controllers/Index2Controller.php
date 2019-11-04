<?php

namespace App\Http\Controllers;

use App\New_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class Index2Controller extends Controller
{
    public function execute(Request $request){

        if ($request->isMethod('post')){

            if (Input::get('Авторизувати') == 2){
                $input = $request->except('_token');

//                $audit_users = new New_user();
//                $audit_users->Audit_Users($input);
                $validator = Validator::make($input,[
                    'name2' => 'required|max:255|min:3' , 'email2' => 'required|max:255|min:3' , 'pass2' => 'required|max:255|min:3'
                ]);

                $input_pass_2 = md5($input['pass2'] . 'dg7df5h5gu8hgue75y37');

                if ($validator->fails()){
                    return redirect()->route('home')->withInput()->withErrors($validator)->with('status', 'Помилка введення даних!');
                }

                $users = New_user::all();
                foreach ($users as $user)

                    if ($user['name'] == $input['name2'] and $user['email'] == $input['email2'] and $user['password'] == $input_pass_2):

                                return redirect('/responses')->with('status', 'Ви успішно авторизувались!');

                    elseif ($user['name'] != $input['name2'] or $user['email'] != $input['email2'] or $user['password'] != $input_pass_2):
                            return redirect()->route('home')->with('status', 'Такий користувач не знайдений! Спробуйте знову!');
                    endif;

            }else return redirect('/')->with('status','Невдала спроба авторизуватись. Спробуйте знову!');
        }

    }
}
