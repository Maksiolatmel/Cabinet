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
                    <form method="POST" action="register">
                        {{ csrf_field() }}
                        <h1>Профіль</h1>
                        <h5>Редагування облікового запису користувача</h5></br>
                        <div>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Ваше ім'я" required value=""/>
                            @if ($errors->has('name'))
                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Ваша Email адреса" required value=""/>
                            @if ($errors->has('email'))
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Пароль" required />
                            @if ($errors->has('password'))
                                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div>
                            <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Підтвердіть пароль" required />

                        </div>
                        <div>
                            <button class="btn btn-success submit">Зберігти новий профіль</button>
                        </div>

                        <div class="clearfix"></div>

                       <!-- <div class="separator">
                            <p class="change_link">Згадали пароль ?
                                <a href="#signin" class="to_register"> Авторізуватись </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                        </div>-->
                    </form>
                </section>
            </div>


        </div>
    </div>
    </body>
@endsection

