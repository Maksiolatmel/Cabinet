<?php

//echo "<h1>Presents</h1>";

	$Sess_Dir = array();
	$Dep = [['Депутати', 'За', 'Утр', 'Проти','Н/Г'],];
	$Dep_Name = array();
	$Dep_Present = array();
	
	$CreateDep = true;

	$result = glob('../FTP/*.xml');
		array_multisort(array_map('filemtime', $result), SORT_NUMERIC, SORT_DESC, $result);
		//print_r($result);
		// Обход сессий
		foreach ( $result as $name ) {
 			if (file_exists($name)) {
				$xml = simplexml_load_file($name);
				$dir = "../FTP/".$xml->Dir;
				$Sess_Dir[] = $dir;
				$res_vopr = glob($dir.'/*.xml');
				// Обход вопросов cессии
				foreach ( $res_vopr as $vopr ) {
					if (file_exists($vopr)) {

						$Dep_xml = simplexml_load_file($vopr);
						// Обход поименного результата вопроса
						$i = 1;
						reset($Dep);
						foreach ( $Dep_xml->Poimen->Deputat as $deputat ) {
							$line = array();
							if($CreateDep){
                                $line[] = FIO($deputat->Name);
                                //$line[] = isPresent($deputat->Golos);
                                switch (CheckGolos($deputat->Golos)){
                                    case 1: {$line[]=1; $line[]=0; $line[]=0; $line[]=0;} break;
                                    case 2: {$line[]=0; $line[]=1; $line[]=0; $line[]=0;} break;
                                    case 3: {$line[]=0; $line[]=0; $line[]=1; $line[]=0;} break;
                                    case 4: {$line[]=0; $line[]=0; $line[]=0; $line[]=1;} break;
                                    default: {$line[]=0; $line[]=0; $line[]=0; $line[]=0;}
                                }
						$Dep[] = $line;
						}
						else
							{
                            //if(isPresent($deputat->Golos) == 1) $Dep[$i][1]++;
                            if(CheckGolos($deputat->Golos) < 5)  $Dep[$i][CheckGolos($deputat->Golos)]++;
							next($Dep);
							$i++;
							}
						}
						$CreateDep = false;
					}
				}
			}
		}
		echo json_encode($Dep, JSON_UNESCAPED_UNICODE);

    function isPresent($check){
        if($check == 'Відсутній') $ret = 0; else $ret = 1;

    }

    function CheckGolos($check){
        if($check == 'За') $ret = 1;
        else
        if($check == 'Утр.') $ret = 2;
        else
        if($check == 'Проти') $ret = 3;
        else
        if($check == 'Н/Г') $ret = 4;
        else $ret = 5;
        return $ret;
    }

    function FIO($Full){
        $AFIO = explode(' ',$Full);
        $name = $AFIO[0];
        $su = mb_substr($AFIO[1],0,1);
        $otch = mb_substr($AFIO[2],0,1);
        $ret = $name.' '.$su.'.'.$otch.'.';
        return $ret;
    }
?>