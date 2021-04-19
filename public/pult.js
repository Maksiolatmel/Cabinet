var TimClear = 1500;
function ClearMess(){
    $("#P_Mess").text('');
}

$(document).ready( function() {
    $(document).on("click",'#B_Yes', function() {
        $("#P_Mess").css('color','green');
        $("#P_Mess").text('ЗА');
        setTimeout(ClearMess, TimClear);
    });

    $(document).on("click",'#B_Abs', function() {
        $("#P_Mess").css('color','brown');
        $("#P_Mess").text('УТРИМАВСЯ');
        setTimeout(ClearMess, TimClear);
    });

    $(document).on("click",'#B_No', function() {
        $("#P_Mess").css('color','red');
        $("#P_Mess").text('ПРОТИ');
        setTimeout(ClearMess, TimClear);
    });

    $(document).on("click",'#B_Reg', function() {
        $("#P_Mess").css('color','blue');
        $("#P_Mess").text('РЕЄСТРАЦІЯ');
        setTimeout(ClearMess, TimClear);
    });
});
