@extends('layouts.def_auth')

@section('content')

<script>
    $(document).ready(function() {
        console.log('SMS Confirmed!! Yes');
    });
</script>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form>
                    <h1>Підтверження СМС</h1>
                    <div>
                        <input type="email" class="form-control" placeholder="Ввеіть код з СМС" required="" />
                    </div>

                    <div>
                        <a class="btn btn-success submit" href="/">Підтвердити</a>

                    </div>
                </form>
            </section>
        </div>

    </div>
</div>

</body>
@endsection
