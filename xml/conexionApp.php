<?php
session_start();
$_SESSION["origen"] = $_SERVER['HTTP_REFERER'];

switch ($_POST["func"]) {
   
    case 1: //FUNCIÓN DE LOGIN

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}
 $sql = "SELECT * FROM user_taxi WHERE email = '".$_POST["usuario"]."' AND password = '".$_POST["clave"]."'";
          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[1] != null)
          {
              echo '99;'.$fila[0].';'.$fila[1].';'.$fila[2].';'.$fila[3].';'.$fila[4].';'.$fila[5].';'.$fila[6].';'.$fila[7].';'.$fila[8].';'.$fila[9].';'.$fila[10].';'.$fila[11].';'.$fila[12].';'.$fila[13];
              mysql_free_result($resultado);
              mysql_close($enlace );
          }else{
              echo utf8_decode('3;Usuario o contraseña incorrectos');
          }
    break;

    case 2: //FUNCIÓN DE REGISTRO

     // ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}
          $sql = "SELECT COUNT( * ) FROM user_taxi WHERE email = '".$_POST["correo"]."'";
          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[0] > 0)
          {          
            echo utf8_decode('3;El correo electronico ya se encuentra registrado'.$sql);
            mysql_free_result($resultado);
          }else{
            $sql = "SELECT COUNT( * ) FROM user_taxi WHERE documento_identidad = '".$_POST["documento"]."'";
            $resultado = mysql_query($sql, $enlace);
            $fila2 = mysql_fetch_array($resultado);
            if($fila2[0] > 0)
            {          
              echo utf8_decode('4;El número de documento ya se encuentra registrado');
              mysql_free_result($resultado);
            }else{
               $sql = "INSERT INTO  `hotspotg_hotspot`.`user_taxi` (
                            `id_usuario` ,
                            `usuario` ,
                            `email` ,
                            `documento_identidad` ,
                            `password` ,
                            `fecha_registro` ,
                            `cod_pais` ,
                            `celular` ,
                            `device_id`,
                            `latitud` ,
                            `longitud` ,
                            `direccion` ,
                            `estado`
                            )
                            VALUES (
                            NULL ,  '".$_POST["usuario"]."',  '".$_POST["correo"]."',  '".$_POST["documento"]."',  '".$_POST["clave"]."',  NOW(),  '".$_POST["cod_pais"]."',  '".$_POST["celular"]."',  '".$_POST["device_id"]."',  '".$_POST["latitud"]."',  '".$_POST["longitud"]."',  '".$_POST["direccion"]."',  '1'
                            );";
                $resultado = mysql_query($sql, $enlace);
                echo utf8_decode('99;Usuario registrado'); 
                mysql_free_result($resultado);

            }
           }
          
          mysql_close($enlace );
    break;

    case 3: //FUNCIÓN DE SUSCRIPCION lOGIN

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}
 $sql = "SELECT * FROM vendedor WHERE email = '".$_POST["usuario"]."' AND password = '".$_POST["clave"]."'";
          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[1] != null)
          {

echo 'Hola mundo';
              /*echo '99;'.$fila[0].';'.$fila[1].';'.$fila[2].';'.$fila[3].';'.$fila[4].';'.$fila[5].';'.$fila[6].';'.$fila[7].';'.$fila[8].';'.$fila[9].';'.$fila[10].';'.$fila[11].';'.$fila[12].';'.$fila[13];
              mysql_free_result($resultado);*/
              mysql_close($enlace );
          }else{
              echo '3;Usuario o contraseña incorrectos';
          }

    break;
    case 4: //FUNCIÓN DE CONSULTA usuario taxista

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}
 $sql = "SELECT usuario,documento_identidad,fecha_registro,cod_pais,celular,placa FROM user_taxi WHERE email = '".$_POST["email"]."' AND estado = '0'";
          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[1] != null)
          {
              echo '99;'.$fila[0].';'.$fila[1].';'.$fila[2].';'.$fila[3].';'.$fila[4].';'.$fila[5];
              mysql_free_result($resultado);
              mysql_close($enlace );
          }else{
              echo '3;El email '.$_POST["email"].' no registra en la base de datos.';
          }

    break;
    case 5: //FUNCIÓN DE suscribir usuario taxista

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}
 $sql = "SELECT COUNT( * ) FROM user_taxi 
          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[1] != null)
          {

$sql = "UPDATE  `hotspotg_hotspot`.`user_taxi` SET  `estado` = '1', `id_vendedor` = '1' WHERE email = '".$_POST["email"]."' AND estado = '0'";
                $resultado = mysql_query($sql, $enlace);
                mysql_free_result($resultado);
              echo '99;Usuario inscrito correctamente.';


          }else{
              echo '3;El email '.$_POST["email"].' no registra en la base de datos.';
          }

    break;
}