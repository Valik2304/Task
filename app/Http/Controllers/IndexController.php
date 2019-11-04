<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\New_user;
use Symfony\Component\DomCrawler\Form;

class IndexController extends Controller
{
    public function execute(Request $request){

//        if (Input::get('зареєструвати') == 1){
//            dd('okey');
//        }else dd('error');


        if ($request->isMethod('post')){

            if (Input::get('зареєструвати') == 1){
                $input = $request->except('_token');

                $new = new New_user();
                $new->AddUser($input);
                $validator = Validator::make($input,[
                    'name' => 'required|max:255|min:3', 'email' => 'required|max:255|min:3', 'pass' => 'required|max:255|min:3',
                ]);

                if ($validator->fails()){
                    return redirect()->route('home')->withInput()->withErrors($validator)->with('status', 'Помилка введення даних!');
                }

                $input_pass = md5($input['pass'] . 'dg7df5h5gu8hgue75y37');
                $new_user = New_user::create([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => $input_pass
                ]);
                if (!$new_user->save()){
                    return redirect()->route('home')->with('status', 'Помилка! Спробуйте знову.');
                }else return redirect('/responses')->with('status', 'Ви успішно зареєструвались!');

            }else
                return redirect('/')->with('status', 'Невдала спроба зареєструватись. Спробуйте знову!');
        }


        if (view()->exists('index')):
            $data = [
                'title' => 'Реєстрація/Аворизація'
            ];
            return view('index', $data);
        endif;

    }



}
