<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Інтернет-магазин</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/jqueryAjax.js"></script>

</head><!--/head-->

<body background="anypics.ru-11573_1366x768.jpg">

<header id="header"><!--header-->

    {{--<div class="header-middle"><!--header-middle-->--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
               {{----}}
                {{--<div class="col-sm-8">--}}
                    {{--<div class="shop-menu pull-right">--}}
                        {{--<ul class="nav navbar-nav">--}}
                            {{--<li><a href="http://project3/basketadd"><i class="fa fa-shopping-cart"></i> Корзина</a></li>--}}
                            {{--<li><a href="http://project3/account"><i class="fa fa-user"></i>Мій акаунт</a></li>--}}
                            {{--<li><a href="http://project3/login"><i class="fa fa-lock"></i> Вхід</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div><!--/header-middle--><br/>--}}



    <!--/header-bottom-->


</header><!--/header-->

<section>
    <div class="container">
        <div class="row">


            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Залишіть свій відгук</h2>
                    <div class="panel-group category-products">

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

                    </div>
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Всі товари</h2>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">

                                    @if(isset($responses_2))

                                        <fieldset><legend> <h3  class="btn btn-success" align="center">Відгуки <span class="badge badge-light">{{$count_responses}}</span></h3><br></legend>
                                            {{--<button type="button" class="btn btn-primary">--}}
                                            {{--Уведомления--}}
                                            {{--</button>--}}
                                            <ul>
                                                <p>{{$count_responses}}</p>
                                                <p>{{$sum}}</p>
                                                <p>{{$count}}</p>
                                                <p>{{$res}}</p>
                                                @foreach($responses_2 as $resppons)


                                                    <details>
                                                        <summary>Відгук від <b>{{' '.$resppons->name}}</b></summary>
                                                        {{--<p><font size="3" color="red" face="Arial" >А</font>втор:<b>{{' '.$resppons->name}}</b></p>--}}
                                                        <p><font size="3" color="red" face="Arial">Р</font>ейтинг відгуку:<b>{{' '.$resppons->rating}}</b> </p>
                                                        <p align="justify"><font size="3" color="red" face="Arial">Т</font>екст повідомлення:<b>{{' '.$resppons->text}}</b></p>

                                                        @if(!empty($resppons->image))
                                                            <img src="{{ asset($resppons->image) }}">
                                                        @elseif(empty($resppons->image))
                                                            {{$resppons->image}}
                                                        @endif
                                                        {{--{{$resppons->image}}--}}
                                                        <hr />

                                                    </details>
                                                    {{--<hr>--}}


                                                @endforeach

                                            </ul>
                                        </fieldset>



                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!--features_items-->

            </div>





        </div>
    </div>
</section>



<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>