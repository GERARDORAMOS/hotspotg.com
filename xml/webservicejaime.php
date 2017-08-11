<?php
session_start();
$_SESSION["origen"] = $_SERVER['HTTP_REFERER'];

switch ($_POST["func"]) {

  case 1: //Total Usuarios Taxistas

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
  echo '1;No pudo conectarse a mysql';
  exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
  echo '2;No pudo seleccionar la base de datos';
  exit;
}

$sql = "SELECT COUNT( * ) FROM user_taxi;";

$resultado = mysql_query($sql, $enlace);
        $fila = mysql_fetch_array($resultado);
        if($fila[0] <= 0)
        {
            echo '66;0';
        }else{
            $cantidad = $fila[0];
            echo '99;'.$cantidad;

        }

break;

case 2: //Total Usuarios Taxistas por mes

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
  echo '1;No pudo conectarse a mysql';
  exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
  echo '2;No pudo seleccionar la base de datos';
  exit;
}


$sql = "SELECT COUNT( * )
FROM user_taxi
WHERE  `fecha_registro` >= DATE_SUB( CURDATE( ) , INTERVAL 1 MONTH );";

$resultado = mysql_query($sql, $enlace);
        $fila = mysql_fetch_array($resultado);
        if($fila[0] <= 0)
        {
            echo '66;0';
        }else{
            $cantidad = $fila[0];

            echo '99;'.$cantidad;


$sql = "SELECT COUNT( * ) FROM service_ipi;";

        }

break;

case 3: //Total Usuarios Taxistas por dia

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
  echo '1;No pudo conectarse a mysql';
  exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
  echo '2;No pudo seleccionar la base de datos';
  exit;
}


$sql = "SELECT COUNT( * )
FROM user_taxi
WHERE  `fecha_registro` >= DATE_SUB( CURDATE( ) , INTERVAL 0 DAY );";

$resultado = mysql_query($sql, $enlace);
        $fila = mysql_fetch_array($resultado);
        if($fila[0] <= 0)
        {
            echo '66;0';
        }else{
            $cantidad = $fila[0];
            echo '99;'.$cantidad;

        }

break;

case 4: //TODOS LOS CASOS CON UN BOTON

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
  echo '1;No pudo conectarse a mysql';
  exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
  echo '2;No pudo seleccionar la base de datos';
  exit;
}


$sql = "SELECT COUNT( * ) FROM user_taxi;";

$resultado = mysql_query($sql, $enlace);
       $fila = mysql_fetch_array($resultado);
       if($fila[0] <= 0)
       {
           echo '66;0';
       }else{
           $cantidad = $fila[0];
           $sql = "SELECT COUNT( * )
           FROM user_taxi
           WHERE  `fecha_registro` >= DATE_SUB( CURDATE( ) , INTERVAL 1 MONTH );";

            $resultado = mysql_query($sql, $enlace);
            $fila = mysql_fetch_array($resultado);
       if($fila[0] <= 0)
       {
              echo '66;0';
       }else{

            $cantidad2 = $fila[0];

           $sql2 = "SELECT COUNT( * )
FROM user_taxi
WHERE  `fecha_registro` >= DATE_SUB( CURDATE( ) , INTERVAL 0
DAY );";

           $resultado = mysql_query($sql2, $enlace);
           $fila2 = mysql_fetch_array($resultado);
       if($fila2[0] < 0)
       {
             echo '66;ji';
       }else{
           $cantida3 = $fila2[0];

 $sql = "SELECT COUNT( * ) FROM service_ip;";

$resultado = mysql_query($sql, $enlace);
     $fila4 = mysql_fetch_array($resultado);
     if($fila4[0] <= 0)
     {
         echo '66;ljlo';
     }else{
         $cantidad4 = $fila4[0];
         //echo '96;'.$cantidad.';'.$cantidad2.';'.$cantida3.';'.$cantidad4;
         
           $sql = "SELECT COUNT( * )
           FROM service_ip
           WHERE  `fecha_servicio` >= DATE_SUB( CURDATE( ) , INTERVAL 1 MONTH );";

     $resultado = mysql_query($sql, $enlace);
     $fila5 = mysql_fetch_array($resultado);
     if($fila5[0] <= 0)
     {
         echo '66;7878';
     }else{
         $cantidad5 = $fila5[0];
         
                    
    $sql1 = "SELECT COUNT( * )
FROM service_ip
WHERE  `fecha_servicio` >= DATE_SUB( CURDATE( ) , INTERVAL 0
DAY );";
                    $sql2 = "SELECT COUNT( * )
FROM service_ip
WHERE  `fecha_servicio` >= DATE_SUB( CURDATE( ) , INTERVAL 1
DAY );";
                    $sql3 = "SELECT COUNT( * )
FROM service_ip
WHERE  `fecha_servicio` >= DATE_SUB( CURDATE( ) , INTERVAL 2
DAY );";
                    $sql4 = "SELECT COUNT( * )
FROM service_ip
WHERE  `fecha_servicio` >= DATE_SUB( CURDATE( ) , INTERVAL 3
DAY );";                   
                    $sql5 = "SELECT COUNT( * )
FROM service_ip
WHERE  `fecha_servicio` >= DATE_SUB( CURDATE( ) , INTERVAL 4
DAY );"; 
                    $sql6 = "SELECT COUNT( * )
FROM service_ip
WHERE  `fecha_servicio` >= DATE_SUB( CURDATE( ) , INTERVAL 5
DAY );"; 

                    $sql7 = "SELECT COUNT( * )
FROM service_ip
WHERE  `fecha_servicio` >= DATE_SUB( CURDATE( ) , INTERVAL 6
DAY );"; 

                    $sql8 = "SELECT COUNT( * )
FROM service_ip
WHERE  `fecha_servicio` >= DATE_SUB( CURDATE( ) , INTERVAL 7
DAY );"; 
     
     $resultado = mysql_query($sql1, $enlace);
     $hoy = mysql_fetch_array($resultado);
     
     $resultado = mysql_query($sql2, $enlace);
     $ultdos_dias = mysql_fetch_array($resultado);
     
     $resultado = mysql_query($sql3, $enlace);
     $ulttres_dias = mysql_fetch_array($resultado);
     
     $resultado = mysql_query($sql4, $enlace);
     $ultcuatro_dias = mysql_fetch_array($resultado);
     
     $resultado = mysql_query($sql5, $enlace);
     $ultcinco_dias = mysql_fetch_array($resultado);  
     
          $resultado = mysql_query($sql6, $enlace);
     $ultseis_dias = mysql_fetch_array($resultado);
     
     $resultado = mysql_query($sql7, $enlace);
     $ultsiete_dias = mysql_fetch_array($resultado);
     
     $resultado = mysql_query($sql8, $enlace);
     $ultocho_dias = mysql_fetch_array($resultado);  
             
     $ayer = $ultdos_dias[0]-$hoy[0];
     $antier = $ulttres_dias[0]-$ultdos_dias[0];
     $antesdeayer = $ultcuatro_dias[0]-$ulttres_dias[0];
     $cuardodia = $ultcinco_dias[0]-$ultcuatro_dias[0];    
     $quintodia = $ultseis_dias[0]-$ultcinco_dias[0];
     $seisdias = $ultsiete_dias[0]- $ultseis_dias[0];
     $ochodias = $ultocho_dias[0]-$ultsiete_dias[0];
     
         echo '96;'.$cantidad.';'.$cantidad2.';'.$cantida3.';'.$cantidad4.';'.$cantidad5.';'.$hoy[0].';'.$ayer.';'.$antier.';'.$antesdeayer.';'.$cuardodia.';'.$quintodia .';'.$seisdias.';'.$ochodias;

         

     }

       }
       }
       }

break;


}
}
