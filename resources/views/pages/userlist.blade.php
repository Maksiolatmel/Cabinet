@extends('layouts.def_auth')

@section('content')

    <body class="login">

    <div class="login_wrapper" style="color:black; width: 800px;left:-10vw;">
        <!--<div class="animate form login_form" style="width: 800px; color:black; margin: 0 auto;">-->

            <section class="login_content" style="width: 40vw;">
                <h1>Користувачі</h1>
                @if (isset($Mess))
                    <div class="alert alert-success">{{ $Mess }}</div>
                @endif

                <a href="/profile">
                    <button class="btn btn-success" style="margin-bottom: 20px;" >Додати нового користувача</button>
                </a>
                <h5>Вибір користувача для редагування/видалення</h5></br>
        <table align="center" border="1" width="100%">
            <tr>
              <th>Ім'я користувача</th>
              <th>Email</th>
              <th>Дія</i></th>
              <th>Дія</i></th>
            </tr>

            @foreach ($users as $user)

                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><i class="fa fa-2x fa-edit" style="cursor:pointer;" title="Редагувати"
                        ><a href="route('pages.profile', ['id' => $user->id])" ></a></i></td>
                    <td><i class="fa fa-2x fa-trash red" style="cursor:pointer;" title="Видалити"
                    onclick="if(confirm('Ви дійсно бажаєте видалити користувача {{ $user->name }} з email {{ $user->email }} ?'))
                            window.location = '/delete_user?id={{ $user->id }}';">
                    </i></td>
                </tr>
            @endforeach

        </table>
            </section>
        </div>


    </body>
    <script>
        $('.alert').delay( 2000 ).fadeOut(1000);
    </script>
@endsection

<!--<li style="text-align: left;"><a href="route('user.show', ['id' => $user->id])" >
        {{'id = '.$user->id.', Name = '.$user->name}}
        </a>
    </li>-->


