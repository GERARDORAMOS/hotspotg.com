<?php
session_start();
$_SESSION["origen"] = $_SERVER['HTTP_REFERER'];

switch ($_POST["func"]) {
   
    case 1: //FUNCIÓN DE LOGIN

// ! delante de la variable indica  Si variable NO es TRUE
     // ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}
 $sql = "SELECT * FROM user_clientes WHERE email = '".$_POST["email"]."' AND password = '".$_POST["clave"]."'";
          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[1] != null)
          {


              echo '99;'.$fila[0].';'.$fila[1].';'.$fila[2].';'.$fila[3].';'.$fila[4].';'.$fila[5].';'.$fila[6].';'.$fila[7].';'.$fila[8].';'.$fila[9].';'.$fila[10].';'.$fila[11].';'.$fila[12].';'.$fila[13];
              mysql_free_result($resultado);
              mysql_close($enlace );
          }else{
              echo '3;Usuario o contraseña incorrectos';
          }
          
          break;
            case 2: //FUNCIÓN DE CANCELAR SERVICIO

     // ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}
$sql = "UPDATE  `service` SET  `time_finish` =  NOW(), `kbs_downloaded` =  '".$_POST["descarga"]."', `kbd_uploaded` =  '".$_POST["subida"]."' , `connection_speed` =  '".$_POST["velocidad"]."' WHERE id_user = '".$_POST["usuario"]."' AND id_server = '".$_POST["usuario_taxista"]."' AND estado = '0'";
                $resultado = mysql_query($sql, $enlace);
                mysql_free_result($resultado);

            $sql = "SELECT * FROM service WHERE id_user = '".$_POST["usuario"]."' AND id_server = '".$_POST["usuario_taxista"]."' AND estado = '0'";
            $resultado = mysql_query($sql, $enlace);
            $fila2 = mysql_fetch_array($resultado);
            if($fila2[0] != null)
            {          

$sql = "UPDATE  `service` SET  `time_finish` =  NOW(),`gps_client_finish` =  '".$_POST["gps_usuario"]."',`kbs_downloaded` =  '".$_POST["descarga"]."', `kbd_uploaded` =  '".$_POST["subida"]."' , `connection_speed` =  '".$_POST["velocidad"]."', `estado` =  '".$_POST["estado"]."' WHERE id_user = '".$_POST["usuario"]."' AND id_server = '".$_POST["usuario_taxista"]."' AND estado = '0'";
                $resultado = mysql_query($sql, $enlace);
                mysql_free_result($resultado);

$fechaInicial = $fila2[3];
$fechaFinal = $fila2[4];
$segundos = strtotime($fechaFinal) - strtotime($fechaInicial);
$segundos2 = $segundos % 60;

                echo '77;'.$fila2[0].';'.$fila2[1].';'.$fila2[2].';'.$segundos.';'.number_format($segundos/60,0).':'.$segundos2;

            }else{
                echo '66; no se econtro red';

            }

break;
    case 3: //FUNCIÓN DE SERVICIO

     // ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}

            $sql = "SELECT * FROM service WHERE id_user = '".$_POST["usuario"]."' AND id_server = '".$_POST["usuario_taxista"]."' AND estado = '0'";
            $resultado = mysql_query($sql, $enlace);
            $fila2 = mysql_fetch_array($resultado);
            if($fila2[0] > null)
            {          

$sql = "UPDATE  `service` SET  `time_finish` =  NOW(),`kbs_downloaded` =  '".$_POST["descarga"]."', `kbd_uploaded` =  '".$_POST["subida"]."' , `connection_speed` =  '".$_POST["velocidad"]."' WHERE id_user = '".$_POST["usuario"]."' AND id_server = '".$_POST["usuario_taxista"]."' AND estado = '0'";
                $resultado = mysql_query($sql, $enlace);
                mysql_free_result($resultado);

$fechaInicial = $fila2[3];
$fechaFinal = $fila2[4];
$segundos = strtotime($fechaFinal) - strtotime($fechaInicial);
$segundos2 = $segundos % 60;

                echo '99;'.$fila2[0].';'.$fila2[1].';'.$fila2[2].';'.$segundos.';'.number_format($segundos/60,0);

            }else{

                                echo 'No se realizo el inico del servicio';

            }
    break;
        case 4: //INICIO DE SERVICIO

     // ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}

$sql = "INSERT INTO  `service` (
`id` ,
`id_user` ,
`id_server` ,
`time_start` ,
`time_finish` ,
`gps_server_start` ,
`gps_server_finish` ,
`gps_client_start` ,
`gps_client_finish` ,
`kbs_downloaded` ,
`kbd_uploaded` ,
`connection_speed` ,
`estado`
)
VALUES (
NULL ,  '".$_POST["usuario"]."',  '".$_POST["usuario_taxista"]."',  NOW(),  NOW(),  '".$_POST["gps_taxi"]."', '".$_POST["gps_taxi_final"]."' , '".$_POST["gps_usuario"]."' , '".$_POST["gps_usuario_final"]."' , '".$_POST["descarga"]."' , '".$_POST["subida"]."' , '".$_POST["velocidad"]."' ,  '".$_POST["estado"]."'
);";
                echo '55;Servicio registrado';

                $resultado = mysql_query($sql, $enlace);
                mysql_free_result($resultado);


    break;
        case 5: //CONSULTA DE SERVICIO

     // ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}

    $sql = "SELECT COUNT( * ) FROM service WHERE id_server = '".$_POST["usuario_taxista"]."' AND estado = '0'";
    $resultado = mysql_query($sql, $enlace);
    $fila = mysql_fetch_array($resultado);
    if($fila[0] == 0 || $fila[0] == null)
      {          
          $sql = "SELECT COUNT( * ) FROM service WHERE id_server = '".$_POST["usuario_taxista"]."' AND estado = '1' ";
          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);

          if($fila[0] == 0 || $fila[0] == null)
          {          
            echo '3;No hay usuarios en linea';

          }else if($fila[0] > 0 ){
                 $sql = "UPDATE  `service` SET `estado` =  '2' WHERE id_server = '".$_POST["usuario_taxista"]."' AND estado = '1'";
                $resultado = mysql_query($sql, $enlace);
$sql = "SELECT * FROM service WHERE id_server = '".$_POST["usuario_taxista"]."' AND estado = '2' ORDER BY  `id` DESC LIMIT 0 , 1";
            $resultado = mysql_query($sql, $enlace);
            $fila2 = mysql_fetch_array($resultado);
            if($fila2[0] != null)
            {          

$fechaInicial = $fila2[3];
$fechaFinal = $fila2[4];
$segundos = strtotime($fechaFinal) - strtotime($fechaInicial);
$segundos2 = $segundos % 60;
if(number_format($segundos/60,0) >= 15 || $fila2[9] >= 15)
$tarifa = '2000';
else
$tarifa = '1000';

                echo '4;'.$fila2[0].';'.$fila2[1].';'.$fila2[2].';'.$fila2[9].';'.number_format($segundos/60,0).':'.$segundos2.';'.$tarifa;

            }else{
                echo '5; no se encontro redes desconectadas';

            }

          }



      }else if($fila[0] > 0 ){

               if($fila[0] == 1)
                 $sql = "UPDATE  `service` SET  `time_finish` =  NOW() WHERE id_server = '".$_POST["usuario_taxista"]."' AND estado = '0'";
               else{
                 $sql = "UPDATE  `service` SET  `time_finish` =  NOW(), `estado` =  '1' WHERE id_server = '".$_POST["usuario_taxista"]."' AND estado = '0' ORDER BY  `service`.`estado` ASC 
LIMIT 1";
}
                $resultado = mysql_query($sql, $enlace);

$sql = "SELECT * FROM service WHERE id_server = '".$_POST["usuario_taxista"]."' AND estado = '0'";
            $resultado = mysql_query($sql, $enlace);
            $fila2 = mysql_fetch_array($resultado);
            if($fila2[0] != null)
            {          

$fechaInicial = $fila2[3];
$fechaFinal = $fila2[4];
$segundos = strtotime($fechaFinal) - strtotime($fechaInicial);
$segundos2 = $segundos % 60;
if(number_format($segundos/60,0) >= 15 || $fila2[9] >= 15)
$tarifa = '2000';
else
$tarifa = '1000';
                echo '6;'.$fila2[0].';'.$fila2[1].';'.$fila2[2].';'.$fila2[9].';'.number_format($segundos/60,0).':'.$segundos2.';'.$tarifa;;

            }else{
                echo '7; no se encontro red en linea';

            }



                       
      }

                mysql_free_result($resultado);



    break;
}