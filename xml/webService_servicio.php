<?php
session_start();
$_SESSION["origen"] = $_SERVER['HTTP_REFERER'];

switch ($_POST["func"]) {

    case 1: //FUNCIÓN CONTADOR DE SERVICIOS

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}
 $sql = "SELECT COUNT( * ) FROM service_ip WHERE id_taxi =  '".$_POST["id_user_taxi"]."';";

          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[0] <= 0)
          {
              echo '3;0';
          }else{
              $cantidad = $fila[0];
$res = $cantidad.';';
              $sql = "SELECT id,fecha_servicio,tiempo,megas FROM service_ip WHERE id_taxi =  '".$_POST["id_user_taxi"]."' ORDER BY  `fecha_servicio` DESC LIMIT 0 , 5;";
          $resultado = mysql_query($sql, $enlace);
while ($row = mysql_fetch_array($resultado, MYSQL_NUM)) {
    $res = $res.$row[0].';'.$row[1].';'.$row[2].';'.$row[3].'/';  
}
 echo '99;'.$res;
}
    break;
    case 2: //FUNCIÓN INSERTAR SERVICIOS IP

$servername = "localhost";
$username = "hotspotg_android";
$password = "TexasApplications713";
$dbname = "hotspotg_hotspot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "66;Connection failed: " . $conn->connect_error;
} 

$sql = "INSERT INTO  `hotspotg_hotspot`.`service_ip` (
`id` ,
`id_taxi` ,
`ip_user` ,
`fecha_servicio` ,
`tiempo` ,
`megas` ,
`bd_inicio` ,
`estado` 
)
VALUES ( NULL ,  '".$_POST["id_taxi"]."',  '".$_POST["ip_usuario"]."',  NOW(),  '0', '0', '".$_POST["inicio"]."', '0');";

if ($conn->query($sql) === TRUE) {
    echo "99;Servicio registrado";
} else {
    echo "66;Error: " . $sql . "/" . $conn->error;
}

$conn->close();

break;
case 3: //FUNCIÓN ACTUALIZAR SERVICIOS IP

$servername = "localhost";
$username = "hotspotg_android";
$password = "TexasApplications713";
$dbname = "hotspotg_hotspot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "66;Connection failed: " . $conn->connect_error;
} 

  $sql = "UPDATE  `service_ip` SET  `tiempo` =  '".$_POST["tiempo"]."',`megas` =  '".$_POST["megas"]."',`bd_fin` =  '".$_POST["fin"]."',`estado` =  '".$_POST["estado"]."' WHERE id_taxi = '".$_POST["id_taxi"]."' AND estado= '0'";


if ($conn->query($sql) === TRUE) {
    echo "99;Servicio actualizado";
} else {
    echo "66;Error: " . $sql . "/" . $conn->error;
}

$conn->close();

break;
}