@extends('layouts.default')

@section('title', 'Пульт депутата')


@section('content')


    <div class="right_col" role="main">
        <h1 class="Page_Name">Пульт депутата</h1>
        <div class="container" style="vertical-align: center;">
            <p id="P_Mess" class="Mess"></p>
        <div class="row row-flex">
            <div class="col col-but">
            <button  id="B_Reg" type="button" class="btn btn-primary btn-pult">РЕЄСТРАЦІЯ</button>
            </div>
        </div>
            <br>
        <div class="row row-flex">
            <div class="col col-but">
                <button id="B_Yes" type="button" class="btn btn-success btn-pult">ЗА</button>
            </div>
            <div class="col col-but">
                <button id="B_Abs" type="button" class="btn btn-warning btn-pult">Утр</button>
            </div>
            <div class="col col-but">
                <button id="B_No" type="button" class="btn btn-danger btn-pult">Проти</button>
            </div>
        </div>
        </div>
    </div>




@endsection