<?php
session_start();
$_SESSION["origen"] = $_SERVER['HTTP_REFERER'];

switch ($_POST["func"]) {

    case 1: //FUNCIÓN CONSULTAR DATOS TAXISTA

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}
 $sql = "SELECT * FROM user_taxi WHERE celular = ".$_POST["celular"].";";
          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[0] != null)
          {


              echo '99;'.$fila[0].';'.$fila[1].';'.$fila[2].';'.$fila[3].';'.$fila[4].';'.$fila[5].';'.$fila[6].';'.$fila[7].';'.$fila[8].';'.$fila[9].';'.$fila[10].';'.$fila[11].';'.$fila[12].';'.$fila[13];
              mysql_free_result($resultado);
              mysql_close($enlace );
          }else{
              echo '3;Usuario o contraseña incorrectos'.$sql;
          }

    break;
    case 2: //FUNCIÓN VAlIDAR DATOS TAXISTA
 if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}
 $sql = "SELECT * FROM user_taxi WHERE email = '".$_POST["correo"]."' AND celular= '".$_POST["celular"]."'";
          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[0] != null)
          {
              echo '99;'.$fila[0].';'.$fila[1].';'.$fila[2].';'.$fila[3].';'.$fila[4].';'.$fila[5].';'.$fila[6].';'.$fila[7].';'.$fila[8].';'.$fila[9].';'.$fila[10].';'.$fila[11].';'.$fila[12].';'.$fila[13];
              mysql_free_result($resultado);
              mysql_close($enlace );
          }else{
              echo '3;Email o celular incorrectos';
          }     
    break;
case 3: //FUNCIÓN CAMBIAR CLAVE TAXISTA
 if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}

  $sql2 = "UPDATE  `user_taxi` SET  `password` =  '".$_POST["clave"]."' WHERE email = '".$_POST["correo"]."' AND celular= '".$_POST["celular"]."'";

                $resultado_u = mysql_query($sql2, $enlace);
                mysql_free_result($resultado_u);

 $sql = "SELECT * FROM user_taxi WHERE email = '".$_POST["correo"]."' AND celular= '".$_POST["celular"]."'";

          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[0] != null)
          {

              echo '99;'.$fila[0].';'.$fila[1].';'.$fila[2].';'.$fila[3].';'.$fila[4].';'.$fila[5].';'.$fila[6].';'.$fila[7].';'.$fila[8].';'.$fila[9].';'.$fila[10].';'.$fila[11].';'.$fila[12].';'.$fila[13];
              mysql_free_result($resultado);
              mysql_close($enlace );
          }else{
              echo '3;Celular o email incorrectos';
          }
    break;


}