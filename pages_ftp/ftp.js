
	$(document).ready( function() {
		
		// загрузка странички с сессиями
		$("#Vote").load('/pages_ftp/sessions.php');
		// загрузка странички с вопросами
		$(document).on("click",".sess", function() {
			var dir = $(this).find('.dir').text();
			$("#Vote").load('/pages_ftp/vopr.php?dir='+dir);
		});
		// Возврат на сессии
		$(document).on("click",'#BackToSession', function() {
			$("#Vote").load('/pages_ftp/sessions.php');
		});
		// Возврат на вопросы
		$(document).on("click",'#BackToVopr', function() {
			var path = $('#Self').html();
			$("#Vote").load(path);
		});
		// Оиновление странички
		$(document).on("click",'#Redraw', function() {
			var path = $("#Self").html();
			$("#Vote").load(path);
		});
		// загрузка странички с поименным голосованием
		$(document).on("click",'.voposy', function() {
			var vopr = $(this).find('.vopr_file').text();
			var dir = $("#Dir").text();
			$("#Vote").load('/pages_ftp/poimen.php?dir='+dir+'&file='+vopr);
		});

		// загрузка странички с поименным голосованием все
		$(document).on("click",'#GoToAll', function() {
			var vopr = $(this).find('.vopr_file').text();
			var dir = $("#Dir").text();
			$("#Vote").load('/pages_ftp/poimenall.php?dir='+dir);
		});

		// Печать выделенного блока
		$(document).on("click",'#Druk', function() {
			$('#DrukArea').css('width','70%');
			$('#DrukArea').css('margin','0 auto');
			$('#DrukArea').printThis();
			$('#DrukArea').css('width','');
			$('#DrukArea').css('margin','');
		});
		
	});

