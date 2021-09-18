
<!----><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Decoder olimpicos</title>
<body background="tokyo.jpg" id="back">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style type="text/css">

#titulo {
  text-align: left;
  color: black;
  background-color: white;
}

#back {
  background-image: url("tokyo.jpg");
  background-repeat: no-repeat;
  background-position: 653px 40px;
   background-size: 20%;
}
.blink {
        animation: blinker 0.6s linear infinite;
        color: red;
        font-size: 30px;
     
      }

text, user-select: {
   font-size: 10pt;
   line-height: 1.428;
}
body{
   background-color: orange; color: #1F266E;
}

range {
   font-size: 5pt;
   line-height: 1.428;

}

 label {  
   font-size: 14pt;  
   font-family : arial;  
}

SELECT {  
   font-size: 10pt;  
   font-family :arial  
}

body {width: 900px;}

/*
div {border-style: solid;}
div div {border-style: dashed; border-color: green; margin: 5px;}
div div div {border-style: dashed; border-color: red; margin: 5px;}
*/
body {width: 1000px; height:1400px; margin-left: 20px;}



 #menu1{position: -10px 30px;}/*{ position:relative;  margin-left: 100px;}*/
 #menu2{ position:relative; margin-right: 0px; top: 0px;}
 

#boton1 { position:relative; margin-left: 50px; top: 0px;}
li:nth-child(2) {position: relative; right: 0px;}
li:nth-child(3) {position: relative; right: 0px;}

#boton2 { position:relative; margin-left: 90px; top: -25px;}
li:nth-child(2) {position: relative; right: -30px;}
li:nth-child(3) {position: relative; right: 0px;}

#mensaje { position:relative; margin-left: 380px; top: -80px;}
li:nth-child(2) {position: relative; right: -30px;}
li:nth-child(3) {position: relative; right: 0px;}



</style>

<!--<meta name="viewport" content="width=50px, initial-scale=0.2" />
[if lt IE 9]><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->

</head>
<!--
DATOS A COPIAR
"http://sa.mp3.icecast.magma.edge-access.net:7200/sc_rad1"
"http://sa.mp3.icecast.magma.edge-access.net:7200/sc_rad37"
"http://sa.mp3.icecast.magma.edge-access.net:7200/sc_rad38"
"http://sa.mp3.icecast.magma.edge-access.net:7200/sc_rad39"

<div class="row g-3">
  <div class="col-sm-7">

-->

<body style="font-family:  Arial" text=font-size: 5px>


<h1 id='titulo'>IRD 13<h1>



<h4>Seleccione el Nº de programa</h4>



<br>




<form class="row gx-4 gy-4 align-items-center" method="post" id="menu1">
<!-- 

  <div class="col-sm-2">
   
<input type="text" name ="elemento" id="elemento"> -->
 <div class="col-sm-2">
  
    <select name="elemento" method="post" >
  <option value="3e9">Seleccione un programa</option>    
  <option value="3e9">Programa 1</option>
  <option value="7d1">Programa 2</option>
  <option value="bb9">Programa 3</option>
  
</select>
  </div>
<br><br>

  <div class="col-auto" id= "boton1">
 
    <button type="submit" name="aplicar" value="aplicar" class="btn btn-primary" >Aplicar</button>
  </div>
</form>



<br><br>
  
  
  
  
<form method="post" id= "menu2" >

<br>
   


<div class="col-auto" id="boton2">
<input type="submit" name="DETENER" value="DETENER" class="btn btn-primary" id="boton2" >

</div>

</form>


<!--<button onclick="window.location.href='/emision.php'">Continue</button>
<a href="emision.php" class="button">emision</a>-->




<?php
$pid = exec('pidof ffmpeg');

//FUENTE DE RECEPCION DEL STREAMIN:
//  $fuente = "/home/ff5/novelsat5.trp";
   $fuente = "udp://192.168.0.200:5000";

//echo "php Funca!!!";
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$r1(0)="";
$r2="";
$r3="";
$r4="";

$D = "0" ;
$l1="";
$l2="";
$l3="";
$l4="";
*/
$D =  "0";
$e = "";
$e = $_POST['elemento'] ?? "";

$r2=($_POST["radio2"]) ?? "";
$r3=($_POST["radio3"]) ?? "";
$r4=($_POST["radio4"]) ?? "";


$l1=($_POST["nivel1"]) ?? "";
$l2=($_POST["nivel2"]) ?? "";
$l3=($_POST["nivel3"]) ?? "";
$l4=($_POST["nivel4"]) ?? "";


$D=($_POST["DETENER"]) ?? "0";


//$comando  ='ls /home/rn';
//$comando2 = 'ffprobe -hide_banner -i /home/rn/transport8.ts';
//$comando ='ping 192.168.0.1';
//$comando = 'ifconfig';
//$comando = 'ffmpeg &';
//$comando= 'ffmpeg -i /home/rn/'.$e.' -f decklink  -vf "format=uyvy422" -r 30000/1001 -s 1920x1080   "DeckLink SDI 4K" > /dev/null 2>&1 &';
//$comando = 'ffmpeg -i /home/rn/transport1.ts -map 0:p:'.$e.' -f decklink  -vf "format=uyvy422" -r 30000/1001 -s 1920x1080   "DeckLink SDI 4K" > /dev/null 2>&1 &';
//$comando = 'ffmpeg -i /home/ff3/novelsat4.trp -map 0:p:'.$e.' -map -0:a:0?  -map -0:a:2? -map -0:a:3? -map -0:a:4? -map -0:a:5? -map -0:a:6? -map -0:a:7? -map -0:a:8? -map -0:a:9? -map -0:a:10? -map -0:a:12? -map -0:a:13? -map -0:a:14? -map -0:a:16? -map -0:a:17? -map -0:a:18? -map -0:a:19? -map -0:a:20?  -dn -ignore_unknown -f decklink  -vf "format=uyvy422" -r 30000/1001 -s 1920x1080   "DeckLink SDI 4K" > /dev/null 2>&1 &';
//$comando = 'ffmpeg -i /home/ff3/novelsat4.trp -map '.$var.' -map 1   -dn -ignore_unknown -f decklink  -vf "format=uyvy422" -r 30000/1001 -s 1920x1080   "DeckLink SDI 4K" > /dev/null 2>&1 &';
  //-----------------------------------------


/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
ESCRITURA Y LECTURA EN ARCHIVO
$file = fopen("estado.txt", "w");

fwrite($file, $orden . PHP_EOL);

//fwrite($file, "nada" . PHP_EOL);

fclose($file);
//---------------------------------------------------------------------------
//LECTURA
$file = fopen("estado.txt", "r");

while(!feof($file)) {

echo fgets($file). "<br />";

}

fclose($file);

echo  '<br>';
echo  '<br>';
echo  '<br>';
*/ //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//----------------------------------------------------------------------

if (empty($pid)){
//echo 'reconozco en el servicio NO esta en ejecucion';

}

//echo $e;

//--------------------------------------------------------------------------

//$matar = exec('pkill ffmpeg');
//sleep(5);
//passthru('ffprobe -i transport8.ts');
//echo exec('nfsdajklhd');

//$sigue =  exec($comando);
//echo  '<br>';
//passthru ($comando);

//$salida = shell_exec('ls /home/rn');
//$salida = shell_exec('ffprobe -hide_banner -i udp://192.168.0.200:5000 2>&1 &');
  
  
$salida = shell_exec('ffprobe   -i '.$fuente.' 2>&1 | grep "  Program"');
$salidb = shell_exec('ffprobe   -i '.$fuente.'  2>&1 | grep Stream');
$salidc = shell_exec('ffprobe   -i '.$fuente.'  2>&1 | grep service_name');
  
  //$salidd = shell_exec('ffprobe   -i /home/ff3/novelsat4.trp  > probe.txt ');
  
$file = fopen("probe.txt", "r");

while(!feof($file)) {

$valores =  fgets($file). "<br />";
echo $valores;
}

  switch ($e) {
   
      case "3e9":
        $vid = "1";
        $aud = "-map -0:i:0x44e? -map -0:i:0x44f? -map -0:i:0x450? -map -0:i:0x451? -map -0:i:0x452?";
        break;
     
      case "7d1":
        $vid = "2";
        $aud = "-map -0:i:0x836? -map -0:i:0x837? -map -0:i:0x838? -map -0:i:0x839? -map -0:i:0x83a?";
        break;
     
      case "bb9":
        $vid = "3";
        $aud = "-map -0:i:0xc1e? -map -0:i:0xc1f? -map -0:i:0xc20? -map -0:i:0xc21? -map -0:i:0xc22?";
        break;
     
  }


   $salid  = "<h5>Programa en emisión: </h5> " .$vid. "<h5>Orden de los Programas </h5> \n" .  $salida . "<br />".  "<h5>Nombres de los Programas </h5> \n" . $salidc . "<br />". "<h5>Composición de los Programas </h5> \n" . $salidb;
  //echo gettype($salid);
  //echo $salid;

//$salida = shell_exec($comando);
//echo "<pre>$salida</pre>";
//echo gettype ($salida);
//header("location= /emision.php/");
/*echo 'retorno seguir: ';
echo '<br>';
*/
//ESCRIBO
$file = fopen("probe.txt", "w");

fwrite($file, $salid . PHP_EOL);

fclose($file);

//LEO
echo  '<br>';
echo  '<br>';
$file = fopen("probe.txt", "r");

while(!feof($file)) {

$valores =  fgets($file). "<br />";
//echo $valores;
//AGREGADO?????????????????????????????????????????????????
  //$find = $e;
  
  //echo gettype ($var);
 /* echo $var;
  echo gettype($var);
  echo $va;
  echo gettype($va);
  echo $valores;
  echo gettype($valores);
   */
         //  echo $valores;
           
 //   echo $valores;         
           //FIN DE AGREGADO_________________________________________________________
}
/*  
fclose($file);
  
  switch ($e) {
   
      case "3e9":
        $vid = "1";
        $aud = "-map -0:i:0x44e? -map -0:i:0x44f? -map -0:i:0x450? -map -0:i:0x451? -map -0:i:0x452?";
        break;
      
      case "7d1":
        $vid = "2";
        $aud = "-map -0:i:0x836? -map -0:i:0x837? -map -0:i:0x838? -map -0:i:0x839? -map -0:i:0x83a?";
        break;
      
      case "bb9":
        $vid = "3";
        $aud = "-map -0:i:0xc1e? -map -0:i:0xc1f? -map -0:i:0xc20? -map -0:i:0xc21? -map -0:i:0xc22?";
        break;
      
  }*/
  echo $e;
  echo $a;
  /* EXTRACCION DE PID POR STREAM INDEX
  $vid = stream($e, $salid);
  $aud = stream($a, $salid);
  
  function stream ($e, $salid){

  $pos = strpos ($salid, $e);
  //echo $pos;
  echo '<br>';
  $ind = (int)$pos - 5;
  $var = substr ($salid, $ind, 2);
  
  if (!substr_compare($var, ":", 0, 1))   {
    $var = substr ($var, 1, 1);
  }

  return $var;
    }
    
    FIN DE EXTRACCION DE PID POR STREAM INDEX  */
    echo "el valor de video es: " . $vid;
    echo "el valor de audio es: " . $aud;
  /* 
  $va = substr($var, 0, 2);
  $v = strlen($va);
  */
  
echo  '<br>';
//  exec('sudo pkill ffmpeg');
//  sleep (2);
$comando = 'ffmpeg -i '.$fuente.' -map 0:p:'.$vid.' '.$aud.'   -dn -ignore_unknown -f decklink  -vf "format=uyvy422" -r 30000/1001 -s 1920x1080   "DeckLink SDI 4K" > /dev/null 2>&1 &';
$ejecuto = shell_exec($comando);
  echo $comando;

/*

foreach ($salida as $next){
echo $next;
}
echo '<br>';

echo 'retorno variable: ';
echo '<br>';

foreach ($variable as $next){
echo $next;
}*/
/*
if (!empty($pid)){
echo '<p class="blink">EMITIENDO</p>';
}
else{
echo 'No está emitiendo';
}
*/
//--------------------------------------------------------------------------------------------------------
/* echo "<meta http-equiv='refresh' content='0; url=emision.php'>";
echo '<br>';

}
}*/
$uno = "DETENER";

if( $D == $uno){
//echo $D . " por lo tanto lo mato \n" ;
exec('sudo pkill ffmpeg');
$D = "0";
//echo $D . " luego de resetearlo";
}
$pid = exec('pidof ffmpeg');
//echo $D . gettype($D);
 
  
  
  
  $pid = exec('pidof ffmpeg');
if (empty($pid)){
//$pid = "Sin procesos en ejecución";
}
//echo "el proceso en ejecución es: \n" ;
echo "<br>";
//echo $pid;
  


?>

<!--<input name="textfield" type="text" value="<?php echo $pid ?>"-->


</body>
</html>

