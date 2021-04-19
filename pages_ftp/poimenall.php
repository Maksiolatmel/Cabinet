<div class="container" >
  <div class="row">
    <div class="col-4 col-but">
      <button id="BackToSession" type="button" class="btn btn-primary">Повернутися до Сесій</button>
    </div>
    <div class="col-4 col-but">
      <button id="BackToVopr" type="button" class="btn btn-primary">До питань сесії</button>
    </div>
 	<div class="col-4 col-but">
      <button id="Druk" type="button" class="btn btn-warning">Друкувати все</button>
    </div>	
  </div>
</div>
<br>

<?php
require "function.php";	
	$session = '../FTP'.$_GET['dir'].'/Session.xml';
	if (file_exists($session)) {
				$xml_sess = simplexml_load_file($session);
			}
?>
<div id="DrukArea">
<table class="session">
  	<tr>
  		<td width="40%">Версія ПЗ "SVM_20"</td>
  		<td width="20%">
  			<!--<div class ="TDLogo">
  			<img id="Org" src="Logo.png">
  			</div>-->
  		</td>
  		<td><?php echo $xml_sess->Name; ?></td>
  	</tr>
</table>  
<br><br>
<p id="Self" style="display: none;"><?php echo '/pages_ftp/vopr.php?dir='.$_GET['dir']; ?></p>

<?php
$result = glob('../FTP'.$_GET['dir'].'/*.xml');
		array_multisort(array_map('filemtime', $result), SORT_NUMERIC, SORT_ASC, $result);

		foreach ( $result as $name ) {
			if($name != $session){
 
			DrawPoimen($name);
			echo "<p style='overflow:hidden;page-break-before:always;'></p>";
			}
		}
?>
</div>