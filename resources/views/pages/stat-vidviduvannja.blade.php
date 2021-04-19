@extends('layouts.default')

@section('title', 'Статистика відвідувань')


@section('content')

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <div class="right_col" role="main">
        <h1 class="Page_Name">Білоцерківська міська рада</h1>
        <h2 class="Page_Name">Статистика відвідування</h2>

        <div id="chart_div"></div>
    </div>

    <script >

        function GetArr(){
            var ansv = $.ajax({type: "POST", url: "/pages_ftp/getpresents.php", async: false,
                datatype:"json",
                contenType: "application/json"}).responseText;
            console.log(ansv);
            return JSON.parse(ansv);
        }


        function drawBasic() {

            var App = GetArr();

            var Arr =  [
                  ['Депутати', 'Присутній',],
                  ['Баланюк О.І.', 21],
                  ['Бражнікова Т.О.', 17],
                  ['Булгакова Г.В.', 16],
                  ['Виговський В.П.', 20],
                  ['Войтович Т.О.', 15],
                  ['Дрьомін Ю.Б.', 11],
                  ['Жадан С.М.', 19],
                  ['Клавдієнко О.І.', 17],
                  ['Колодзян Ю.Д.', 12],
                  ['Корнійчук Д.В.', 15],
                  ['Костюченко В.П.', 10],
                  ['Кравченко М.М.', 10],
                  ['Круковець В.В.', 16],
                  ['Кулініч Л.М.', 12],
                  ['Кучмій О.В.', 11],
                  ['Лісогор В.Ю.', 15],
                  ['Лісогор О.Я.', 18],
                ];


            var data = google.visualization.arrayToDataTable( App );

            var options = {
                title: 'Присутність депутатів на голосуваннях',
                //width:800,
                height: App.length*40,
                chartArea: {width: '75%'},
                hAxis: {
                    title: 'Був присутнім на голосуваннях (разів)',
                    minValue: 0
                },
                vAxis: {
                    title: 'Депутати'
                },
                animation:{
                    duration: 1000,
                    easing: 'out',
                    "startup": true,
                },
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }

        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);
    </script>

@endsection