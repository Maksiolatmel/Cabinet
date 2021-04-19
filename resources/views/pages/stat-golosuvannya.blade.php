@extends('layouts.default')

@section('title', 'Статистика голосувань')


@section('content')

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <div class="right_col" role="main">
        <h1 class="Page_Name">Білоцерківська міська рада</h1>
        <h2 class="Page_Name">Статистика голосувань</h2>
        <div id="chart_div"></div>
    </div>
    <script >

        function GetArr(){
            var ansv = $.ajax({type: "POST", url: "pages_ftp/getgolos.php", async: false,
                datatype:"json",
                contenType: "application/json"}).responseText;
            console.log(ansv);
            return JSON.parse(ansv);
        }

        function drawBasic() {
            var App = GetArr();


            var Arr =  [
                ['Депутати', 'За', 'Утр', 'Проти','Н/Г'],
                ['Баланюк О.І.', 21,11,31,2],
                ['Бражнікова Т.О.', 17,7,27,5],
                ['Булгакова Г.В.', 16,6,26,3],
                ['Виговський В.П.', 20,2,30,8],
                ['Войтович Т.О.', 15,5,25,4],
                ['Дрьомін Ю.Б.', 11,1,21,6],
                ['Жадан С.М.', 19,9,29,9],
                ['Клавдієнко О.І.', 17,7,27,3],
                ['Колодзян Ю.Д.', 12,2,32,1],
                ['Корнійчук Д.В.', 15,5,35,5],
                ['Костюченко В.П.', 10,5,25,4],
                ['Кравченко М.М.', 10,5,35,7],
                ['Круковець В.В.', 16,6,26,3],
                ['Кулініч Л.М.', 12,2,32,6],
                ['Кучмій О.В.', 11,8,28,7],
                ['Лісогор В.Ю.', 15,5,35,3],
                ['Лісогор О.Я.', 18,8,28,1],
            ];


            var data = google.visualization.arrayToDataTable(App);

            var options = {
                title: 'Статистика голосувань депутатами',
                //subtitle: 'По всім питанням всфх сесій',
                colors:['lime','yellow','red','grey'],
                height: App.length*100,
                chartArea: {width: '75%'},
                hAxis: {
                    title: 'Як голосував (Кількість)',
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