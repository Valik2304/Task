<?php
//$perPage = 5;
//if(!isset($_GET['page']) || intval($_GET['page']) == 0 || intval($_GET['page']) == 1 || intval($_GET['page']) < 0) {
//    $pageNumber = 1;
////                    $leftLimit = 0;
////                    $rightLimit = $this->perPage; // 0-5
//} elseif (intval($_GET['page']) > $perPage || intval($_GET['page']) == $perPage) {
//    $pageNumber = $perPage; // 2
////                    $leftLimit = $this->perPage * ($pageNumber - 1); // 5 * (2-1) = 6
////                    $rightLimit = $count_responses_2; // 8
//} else {
//    $pageNumber = intval($_GET['page']);
////                    $leftLimit = $this->perPage * ($pageNumber-1); // 5* (2-1) = 6
////                    $rightLimit = $this->perPage; // 5 -> (6,7,8,9,10)
//}
//$mysql = new \mysqli('localhost','root','','test_task_php');
//
//$limit = 5 * ($pageNumber - 1);
//$db = $mysql->query("SELECT * FROM `responses` LIMIT $limit,$perPage");
////        $count_array = $db->fetch_array(MYSQLI_NUM);
//
//while($result[] = mysqli_fetch_array($db))
//    return $result;
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<link rel="stylesheet" href="css/new_style.css">--}}
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


    <title>{{$title}}</title>
    {{--<style>--}}
        {{--.card-deck{--}}
            {{--display: flex;--}}
            {{--width: 400px;--}}
            {{--height: 400;--}}
            {{--/*flex-direcrion:row;*/--}}
            {{--/*align-items:flex-start*/--}}
        {{--}--}}
    {{--</style>--}}

</head>
{{--<body background="nature-of-the-tropics-wallpaper-1366x768_1366x768.jpg">--}}
<header>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container mt-4">
        <div class="row">
            <div class="left-sidebar">
                <fieldset class="left-panel">
                    <legend> <h3 align="center">Залишіть свій відгук</h3><br></legend>

                    <div class="detail-col-description">

                        {{--<form>--}}
                        {{--<form class="was-validated" action="{{route('responses')}}" method="post" name="відгук" enctype="multipart/from-data">--}}
                        {{Form::open(['ur' =>route('responses'), 'class'=>'was-validated', 'method' =>'POST', 'enctype'=>'multipart/from-data','files'=>true])}}
                        <div class="mb-3">
                            <label for="nameid">Name</label>
                            <input type="text" class="form-control" name="name" id="nameid" placeholder="Ім'я..." required>
                            <div class="invalid-feedback">Будь ласка введіть ваше ім'я.</div>
                        </div>
                        <div class="mb-3">
                            <label for="emailid">Email</label>
                            <input type="text" class="form-control" name="email" id="emailid" placeholder="Email..." required>
                            <div class="invalid-feedback">Будь ласка введіть ваш email.</div>
                        </div>
                        <div class="mb-3">
                            <label for="textid">Повідомлення</label>
                            <textarea class="form-control is-invalid" id="textid" placeholder="Повідомлення..." name="text" required></textarea>
                            <div class="invalid-feedback">Будь ласка введіть повідомлення.</div>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileid" name="file_image" >
                            <label class="custom-file-label" name="file_image" for="fileid">Виберіть файл...</label>
                            <div class="invalid-feedback">Будь ласка виберіть файл.</div>
                            {{--<h6>Будь ласка виберіть файл.</h6>--}}
                        </div>

                        <h5>Оцініть відгук:</h5>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" required>
                            <label class="form-check-label" for="inlineRadio1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2" required>
                            <label class="form-check-label" for="inlineRadio2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3"  required>
                            <label class="form-check-label" for="inlineRadio3">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4" required>
                            <label class="form-check-label" for="inlineRadio3">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="5" required>
                            <label class="form-check-label" for="inlineRadio3">5</label>
                        </div>

                        <button type="submit" class="btn btn-success" name="надіслати" >Надіслати</button>
                        <br>
                        {{--<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />--}}

                        <div>
                            <p><h4>Зразок:</h4></p>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" disabled>
                                <label class="form-check-label" for="inlineRadio3" style="color: #880000"> - Погано</label>
                            </div>

                            <br>

                            <div  class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                                <label class="form-check-label" for="inlineRadio1"></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" disabled>
                                <label class="form-check-label" for="inlineRadio2" style="color: #880000"> - Помірно</label>
                            </div>

                            <br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" disabled>
                                <label class="form-check-label" for="inlineRadio3"></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                                <label class="form-check-label" for="inlineRadio1"></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" disabled>
                                <label class="form-check-label" for="inlineRadio2" style="color: #880000"> - Нормально</label>
                            </div>

                            <br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                                <label class="form-check-label" for="inlineRadio1"></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                                <label class="form-check-label" for="inlineRadio1"></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                                <label class="form-check-label" for="inlineRadio1"></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                                <label class="form-check-label" for="inlineRadio1" style="color: #880000"> - Добре</label>
                            </div>

                            <br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                                <label class="form-check-label" for="inlineRadio1"></label>
                            </div><div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                                <label class="form-check-label" for="inlineRadio1"></label>
                            </div><div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                                <label class="form-check-label" for="inlineRadio1"></label>
                            </div><div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                                <label class="form-check-label" for="inlineRadio1"></label>
                            </div><div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                                <label class="form-check-label" for="inlineRadio1" style="color: #880000"> - Відмінно </label>
                            </div>
                        </div>

                        {!! Form::close() !!}
                        {{--</form>--}}
                    </div>
                </fieldset> <hr>
            </div>
        </div>
    </div>
</header>
<hr style="color: #0b0c0f">

<body>
<div class="container mt-4">



    {{--<div class="row">--}}
        {{--<aside>--}}

        {{--</aside>--}}

       <section class="container">
           @if(isset($responses_2))

               {{--<fieldset>--}}
                   {{--<button type="button" class="btn btn-primary">--}}
                       {{--Уведомления--}}
                   {{--</button>--}}

                   {{--<ul>--}}
                       <p>{{$count_responses}}</p>
                       <p>{{$sum}}</p>
                       <p>{{$count}}</p>
                       <p>{{$res}}</p>
                       <p>{{$res_2}}</p>
                       {{--@foreach($responses_2 as $resppons)--}}


                           {{--<div class="card-deck" >--}}
                               {{--<div class="card">--}}
                                   {{--@if(!empty($resppons->image))--}}
                                       {{--<img src="{{ asset($resppons->image) }}" class="card-img-top" alt="...">--}}
                                   {{--@elseif(empty($resppons->image))--}}
                                       {{--{{$resppons->image}}--}}
                                   {{--@endif--}}

                                   {{--<div class="card-body">--}}
                                       {{--<h5 class="card-title">Відгук від <b>{{' '.$resppons->name}}</b></h5>--}}
                                       {{--<p class="card-text" align="justify"><font size="3" color="red" face="Arial">Т</font>екст повідомлення:<b>{{' '.$resppons->text}}</b></p>--}}
                                   {{--</div>--}}
                                   {{--<div class="card-footer">--}}
                                       {{--<small class="text-muted"><font size="3" color="red" face="Arial">Р</font>ейтинг відгуку:<b>{{' '.$resppons->rating}}</b></small>--}}
                                   {{--</div>--}}
                               {{--</div>--}}
                               {{--<div class="card">--}}
                                   {{--<img src="..." class="card-img-top" alt="...">--}}
                                   {{--<div class="card-body">--}}
                                       {{--<h5 class="card-title">Название карточки</h5>--}}
                                       {{--<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>--}}
                                   {{--</div>--}}
                                   {{--<div class="card-footer">--}}
                                       {{--<small class="text-muted">Last updated 3 mins ago</small>--}}
                                   {{--</div>--}}
                               {{--</div>--}}
                               {{--<div class="card">--}}
                                   {{--<img src="..." class="card-img-top" alt="...">--}}
                                   {{--<div class="card-body">--}}
                                       {{--<h5 class="card-title">Название карточки</h5>--}}
                                       {{--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>--}}
                                   {{--</div>--}}
                                   {{--<div class="card-footer">--}}
                                       {{--<small class="text-muted">Last updated 3 mins ago</small>--}}
                                   {{--</div>--}}
                               {{--</div>--}}
                           {{--</div><br>--}}

                        {{--@foreach($responses_2 as $resppons)--}}
                           {{--<details>--}}
                               {{--<summary>Відгук від <b>{{' '.$resppons->name}}</b></summary>--}}
                               {{--<p><font size="3" color="red" face="Arial" >А</font>втор:<b>{{' '.$resppons->name}}</b></p>--}}
                               {{--<p><font size="3" color="red" face="Arial">Р</font>ейтинг відгуку:<b>{{' '.$resppons->rating}}</b> </p>--}}
                               {{--<p align="justify"><font size="3" color="red" face="Arial">Т</font>екст повідомлення:<b>{{' '.$resppons->text}}</b></p>--}}

                               {{--@if(!empty($resppons->image))--}}
                                   {{--<img src="{{ asset($resppons->image) }}">--}}
                               {{--@elseif(empty($resppons->image))--}}
                                   {{--{{$resppons->image}}--}}
                               {{--@endif--}}

                               {{--<hr />--}}

                           {{--</details>--}}
                           {{--<hr>--}}


                       {{--@endforeach--}}
               <div class="row">
                   {{--<div class="col"> ? </div>--}}
                   <div class="col-6">
                       <legend> <h1  class="btn btn-success" align="center">Відгуки по рейтингу {{$res_2.': '}}<span class="badge badge-light">{{$count_responses}}</span></h1><br></legend>

                   @foreach($responses_2 as $resppons)
                           <details>
                               <summary>Відгук від <b>{{' '.$resppons->name}}</b></summary>
                               <p><font size="3" color="red" face="Arial" >А</font>втор:<b>{{' '.$resppons->name}}</b></p>
                               <p><font size="3" color="red" face="Arial">Р</font>ейтинг відгуку:<b>{{' '.$resppons->rating}}</b> </p>
                               <p align="justify"><font size="3" color="red" face="Arial">Т</font>екст повідомлення:<b>{{' '.$resppons->text}}</b></p>

                               @if(!empty($resppons->image))
                                   <img src="{{ asset($resppons->image) }}">
                               @elseif(empty($resppons->image))
                                   {{$resppons->image}}
                               @endif

                               {{--<hr />--}}

                           </details>
                           <hr>


                       @endforeach </div>

                   <div class="col-6">
                       <legend> <h1  class="btn btn-success" align="center">Всі Відгуки{{':'}} <span class="badge badge-light">{{$everything_responses_count}}</span></h1><br></legend>

                       {{--<div class="row">--}}
                           {{--<div class="col-md-12 text-center">--}}
                             {{----}}

                       {{--</div>--}}
                       {{--</div>--}}
                   @foreach($everything_responses as $resppons)
                           <details>
                               <summary>Відгук від <b>{{' '.$resppons->name}}</b></summary>
                               <p><font size="3" color="red" face="Arial" >А</font>втор:<b>{{' '.$resppons->name}}</b></p>
                               <p><font size="3" color="red" face="Arial">Р</font>ейтинг відгуку:<b>{{' '.$resppons->rating}}</b> </p>
                               <p align="justify"><font size="3" color="red" face="Arial">Т</font>екст повідомлення:<b>{{' '.$resppons->text}}</b></p>

                               @if(!empty($resppons->image))
                                   <img src="{{ asset($resppons->image) }}">
                               @elseif(empty($resppons->image))
                                   {{$resppons->image}}
                               @endif

                               {{--<hr />--}}

                           </details>
                           <hr>


                       @endforeach
                        {{$everything_responses->links()}}
                   </div>
                   {{--<div class="col"> ? </div>--}}
                   {{--<div class="col"> ? </div>--}}
               </div>

                   {{--</ul>--}}
               {{--</fieldset>--}}

           @endif
       </section>



    </div>
{{--</div>--}}

</body>

</html>
