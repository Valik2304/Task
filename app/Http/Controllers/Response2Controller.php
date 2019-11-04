<?php

namespace App\Http\Controllers;

use App\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
//use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;

class ResponseController extends Controller
{
    private $perPage = 5;
    public function execute(Request $request){


        if ($request->isMethod('post')){

            $input = $request->except('_token');
            $validator = Validator::make($input,[
                'name' => 'required|max:255|min:3',
                'email' => 'required|max:255|min:3',
                'text' => 'required|max:255|min:3',
                //'file_image' => 'required',
            ]);
            if ($validator->fails()){
                return redirect()->route('responses')->withErrors($validator)->withInput()->with('status', 'Помилка введення даних!');
            }

            $path = public_path().'/images';
            $file = $request->file('file_image');
            if (!empty($file)){
                $file_name = $file->getClientOriginalName();
                $img =  Image::make($file)
                    ->resize(150,150);//100x100
                $img->save($path.'/'.$file_name);
                $upload = 'images/'.$file_name;
            }elseif (empty($file))
                $upload = '';

//            $f  = $this->ddddd($input);//розділити код у функцїї.

            if (!File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }


            $responses = Response::create([
//                'new_users_id' => 'ok',//щось придумати з кодом щоб додавати id користувача в поле "new_users_id" що вже заєсрований/авторизовуний.
                'name' => $input['name'],
                'email' => $input['email'],
                'text' => $input['text'],
                'rating' => $input['inlineRadioOptions'],
                'image' => $upload//$input['file_image'],
                //'created_at' => $date

            ]);

            if ($responses->save()){
                return redirect()->route('responses')->with('status', 'Відгук залишено!');
            }

        }



        if (view()->exists('responses')){

            $count = DB::table('responses')->count('rating');
            $sum = DB::table('responses')->sum('rating');
            $res = $sum / $count;
            $res_2 = (round($res));//dd($res_2);
            if ($res_2 > 5){
                $res_2 = 5;
            }

            if ($res_2){
                $responses_2 = DB::table('responses')
                    ->orderBy('id', 'desc')
                    ->where('rating','=', $res_2)
                    ->get();
                $count_responses = $responses_2->count();

//pagination

                $everything_responses = DB::table('responses')
                    ->orderBy('id', 'desc')
                    ->get();//вибірка всіх записів

                $count_responses_2 = $everything_responses->count();//к-сть всіх записів

                $perPage = $this->perPage;//к-сть записів на сторінці - 5

                $count_pages = round($count_responses_2/$perPage);//к-сть потрібних сторінок

//                $makeProductPager = $this->makeProductPager($count_responses_2, $perPage);

                $pagination = $this->draw_Pager($count_responses_2, $perPage);

                $mysql = new \mysqli('localhost','root','','test_task_php');

                if(!isset($_GET['page']) || intval($_GET['page']) == 0 || intval($_GET['page']) == 1 || intval($_GET['page']) < 0) {
                    $page = 1;
                } elseif (intval($_GET['page']) > $count_responses_2) {
                    $page = $count_pages;
                } else {
                    $page = intval($_GET['page']);
                }
                $art = ($page * $perPage) - $perPage;
                $db = $mysql->query("SELECT * FROM `responses` LIMIT $art,$perPage",$mysql);
                $mysql->close();




                $data = [

                    'title' => 'Відгуки!',
                    'responses_2' => $responses_2,
                    'count' => $count,
                    'sum' => $sum,
                    'res' => $res,
                    'res_2' => $res_2,
                    'count_responses' => $count_responses,
                    'count_responses_2' => $count_responses_2,
                    'everything_responses' => $everything_responses,
                    'pagination' => $pagination,
                    'pages' => $count_pages,
                    'db' => $db
//                    'makeProductPager' => $makeProductPager,
//                    'getLimitProducts' => $getLimitProducts
                ];

                return view('responses', $data);
            }else echo "<h3>Error</h3>";
        }
    }

    private function draw_Pager($count_responses_2, $perPage)
    {
        $pages = round($count_responses_2/$perPage);//к-сть потрібних сторінок
        if(!isset($_GET['page']) || intval($_GET['page']) == 0 ) {
            $page = 1;
        } elseif (intval($_GET['page']) > $count_responses_2) {
            $page = $pages;
        } else {
            $page = intval($_GET['page']);
        }

        $pager =  "<nav aria-label='Page navigation'>";
        $pager .= "<ul class='pagination'>";
        $pager .= "<li><a href='/responses?page=1' aria-label='Previous'><span aria-hidden='true'>&laquo;</span> Початок</a></li>";
        for($i=2; $i<=$pages-1; $i++) {
            $pager .= "<li><a href='/responses?page=". $i."'>" . $i ."</a></li>";
        }
        $pager .= "<li><a href='/responses?page=". $pages ."' aria-label='Next'> Кінець <span aria-hidden='true'>&raquo;</span></a></li>";
        $pager .= "</ul>";

        return $pager;
//        dd($pages);

    }

//    private function makeProductPager($count_responses_2, $perPage) {
//
//        if(!isset($_GET['page']) || intval($_GET['page']) == 0 || intval($_GET['page']) == 1 || intval($_GET['page']) < 0) {
//            $pageNumber = 1;
//            $leftLimit = 0;
//            $rightLimit = $this->perPage; // 0-5
//        } elseif (intval($_GET['page']) > $perPage || intval($_GET['page']) == $perPage) {
//            $pageNumber = $perPage; // 2
//            $leftLimit = $this->perPage * ($pageNumber - 1); // 5 * (2-1) = 6
//            $rightLimit = $count_responses_2; // 8
//        } else {
//            $pageNumber = intval($_GET['page']);
//            $leftLimit = $this->perPage * ($pageNumber-1); // 5* (2-1) = 6
//            $rightLimit = $this->perPage; // 5 -> (6,7,8,9,10)
//        }
//
////        $this->pageData['productsOnPage'] = $this->model->getLimitProducts($leftLimit, $rightLimit);
//        $getLimitProducts = new Response();
//        $getLimitProducts->getLimitProducts($leftLimit, $rightLimit,$perPage);
//        $data = [
//            'getLimitProducts' => $getLimitProducts
//        ];
////        dd($data);
//        return $data;
//
//    }
}
