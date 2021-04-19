@extends('layouts.def_auth')

@section('content')

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="login_wrapper" style="color:black;">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="POST" action="/login">
                    {!! csrf_field() !!}
                    <h1>Авторізація</h1>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" name="email" type="email" class="form-control" placeholder="Ваша Email адреса" required="" />
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Пароль" required="" />
                        @if ($errors->has('password'))
                            <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div>
                        <button class="btn btn-success submit" >Увійти</button></br>
                        <a class="reset_pass" href="/fogot_pass">Забули пароль?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Уперше на сайті?
                            <a href="#signup" class="to_register"> Зареєструватися </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                     </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form>
                    <h1>Реєстрація</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Ваше ім'я" required="" />
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="Ваша Email адреса" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Пароль" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Підтвердіть пароль" required="" />
                    </div>
                    <div>
                        <a class="btn btn-success submit" href="/">Зареєструватися</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Згадали пароль ?
                            <a href="#signin" class="to_register"> Авторізуватись </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <!--<div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>-->
                    </div>
                </form>
            </section>
        </div>


    </div>
</div>
</body>
@endsection

