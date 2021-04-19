
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
    <div class="login_wrapper">

        <div class="animate form login_form">
            <section class="login_content">
                <form method="POST" action="/password/email">
                {!! csrf_field() !!}
                    <h1>Відновлення</h1>
                    <div>
                        <input type="email" name="email" class="form-control" placeholder="Ваша Email адреса" required="" />
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <span>На вашу адресу буде вислане посилання з тимчасовим паролем</span>
                    <div>
                        <br>
                        <button class="btn btn-success submit" >Відновити пароль</button>
                    </div>
                </form>
            </section>
        </div>

    </div>



</div>
</body>
@endsection
