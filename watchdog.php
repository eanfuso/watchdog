<?php
        while (true){

        $pid = exec('pidof ffmpeg');
        $filerr = fopen("/var/www/html/err.txt", "r");
        $total = 0;
	$date = getdate();
        while(!feof($filerr)) {
        $errores =  fgets($filerr). "<br />";
        //$busca = "Error while decoding stream";
        //$busca = "Invalid data found when processing input";
        //$busca = "There are not enough buffered video frames";
        //$busca ="h264";
        $busca = "There are not enough buffered video frames. Video may misbehave!";
        $total = $total + substr_count($errores, $busca );
        }

        $filexe = fopen("/var/www/html/comando.txt", "r");
        $comando =  fgets($filexe). "<br />";
	//echo $comando;

        //Iniciar el servicio luego de una interrupción prolongada, excepto que la última orden ubiese sido "DETENER"
        if (empty($pid) &&  $comando != ":"){
        exec($comando, $errors);
	//echo "se inicio comando";
        echo "cantidad de errores: " . $total  . "\n"  ;
	                               
	}
        //Reinicio del proceso en caso de multiples fallas
        if ($total >= 1){
			echo "Reinicio de emisión. Fecha y hora:  " . date(DATE_RFC2822) . "\n";	
  		  exec('sudo pkill ffmpeg');
			sleep (1);
		exec('sudo pkill ffmpeg');
		  sleep (1);
                exec('sudo pkill ffmpeg');	




		//AGREGADO
/*			$pid2 = exec("pidof ffmpeg");
			while(!empty($pid2)){
			exec ("sudo pkill ffmpeg");
		sleep (1);
			}
  */                     
//FIN AGREGADO
                   sleep (1);
                   exec($comando, $errors);



        }
        //Borrado de contenido de archivo en caso de tamaño excesivo
        if (filesize("/var/www/html/err.txt") > 50000){
         $borrar = fopen("err.txt", "w");
                        fwrite($borrar, "." . PHP_EOL);
                        fclose($borrar);




        }




        }


        ?>
