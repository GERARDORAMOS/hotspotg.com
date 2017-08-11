<?php
session_start();
$_SESSION["origen"] = $_SERVER['HTTP_REFERER'];

switch ($_POST["func"]) {

    case 1: //FUNCION DE LOGIN
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}

 $sql = "SELECT * FROM user_clientes WHERE celular = '".$_POST["celular"]."' AND password = '".$_POST["clave"]."'";
          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[1] != null)
          {
              echo '99;'.$fila[0].';'.$fila[1].';'.$fila[2].';'.$fila[3].';'.$fila[4].';'.$fila[5].';'.$fila[6].';'.$fila[7].';'.$fila[8].';'.$fila[9].';'.$fila[10].';'.$fila[11].';'.$fila[12].';'.$fila[13];

          }else{
              echo '3;Usuario o contrasena incorrectos';
          }
              mysql_free_result($resultado);
              mysql_close($enlace );

    break;

}