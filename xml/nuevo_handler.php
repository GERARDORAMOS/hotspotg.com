<?php
session_start();
$_SESSION["origen"] = $_SERVER['HTTP_REFERER'];

switch ($_POST["func"]) {
   
    case 1: //FUNCIÓN DE SERVICIO

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

$sql = "UPDATE  `hotspotg_hotspot`.`service` SET  `time_finish` =  NOW(),`kbs_downloaded` =  '".$_POST["descarga"]."', `kbd_uploaded` =  '".$_POST["subida"]."' , `connection_speed` =  '".$_POST["velocidad"]."' WHERE id_user = '".$_POST["usuario"]."' AND id_server = '".$_POST["usuario_taxista"]."' AND estado = '0'";
                $resultado = mysql_query($sql, $enlace);
                mysql_free_result($resultado);

$fechaInicial = $fila2[3];
$fechaFinal = $fila2[4];
$segundos = strtotime($fechaFinal) - strtotime($fechaInicial);
$segundos2 = $segundos % 60;

                echo '99;'.$fila2[0].';'.$fila2[1].';'.$fila2[2].';'.$segundos.';'.number_format($segundos/60,0);

            }else{

$sql = "INSERT INTO  `hotspotg_hotspot`.`service` (
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

}
    break;

    case 2: //FUNCIÓN DE LOGIN

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}
$sql = "UPDATE  `hotspotg_hotspot`.`service` SET  `time_finish` =  NOW(), `kbs_downloaded` =  '".$_POST["descarga"]."', `kbd_uploaded` =  '".$_POST["subida"]."' , `connection_speed` =  '".$_POST["velocidad"]."' WHERE id_user = '".$_POST["usuario"]."' AND id_server = '".$_POST["usuario_taxista"]."' AND estado = '0'";
                $resultado = mysql_query($sql, $enlace);
                mysql_free_result($resultado);

            $sql = "SELECT * FROM service WHERE id_user = '".$_POST["usuario"]."' AND id_server = '".$_POST["usuario_taxista"]."' AND estado = '0'";
            $resultado = mysql_query($sql, $enlace);
            $fila2 = mysql_fetch_array($resultado);
            if($fila2[0] != null)
            {          

$sql = "UPDATE  `hotspotg_hotspot`.`service` SET  `time_finish` =  NOW(),`gps_client_finish` =  '".$_POST["gps_usuario"]."',`kbs_downloaded` =  '".$_POST["descarga"]."', `kbd_uploaded` =  '".$_POST["subida"]."' , `connection_speed` =  '".$_POST["velocidad"]."', `estado` =  '".$_POST["estado"]."' WHERE id_user = '".$_POST["usuario"]."' AND id_server = '".$_POST["usuario_taxista"]."' AND estado = '0'";
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


              echo '99;'.$fila[0].';'.$fila[1].';'.$fila[2].';'.$fila[3].';'.$fila[4].';'.$fila[5].';'.$fila[6].';'.$fila[7].';'.$fila[8].';'.$fila[9].';'.$fila[10].';'.$fila[11].';'.$fila[12].';'.$fila[13];
              mysql_free_result($resultado);
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
 $sql = "SELECT usuario,documento_identidad,fecha_registro,cod_pais,celular,placa FROM user_taxi WHERE email = '".$_POST["email"]."' AND estado = '0'";
          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[1] != null)
          {

$sql = "UPDATE  `hotspotg_hotspot`.`user_taxi` SET  `estado` = '1', `id_vendedor` = '1' WHERE email = '".$_POST["email"]."' AND estado = '0'";
                $resultado = mysql_query($sql, $enlace);
                mysql_free_result($resultado);
              echo '99;Usuario inscrito correctamente.';


          }else{
              echo '3;El email '.$_POST["email"].' no registra en la base de datos...';
          }

    break;
    case 6: //FUNCIÓN  lOGIN TAXISTA

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}
 $sql = "SELECT * FROM user_taxi WHERE celular = '".$_POST["usuario"]."' AND password = '".$_POST["clave"]."';";
          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[0] != null)
          {


              echo '99;'.$fila[0].';'.$fila[1].';'.$fila[2].';'.$fila[3].';'.$fila[4].';'.$fila[5].';'.$fila[6].';'.$fila[7].';'.$fila[8].';'.$fila[9].';'.$fila[10].';'.$fila[11].';'.$fila[12].';'.$fila[13];
              mysql_free_result($resultado);
              mysql_close($enlace );
          }else{
              echo '3;Usuario o contraseña incorrectos';
          }

    break;
    case 7: //FUNCIÓN lOGIN USUARIO

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


    case 8: //FUNCIÓN DE REGISTRO TAXISTA

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
            echo '3;El correo electrónico ya se encuentra registrado';
            mysql_free_result($resultado);
          }else{
            $sql = "SELECT COUNT( * ) FROM user_taxi WHERE celular = '".$_POST["celular"]."'";
            $resultado = mysql_query($sql, $enlace);
            $fila2 = mysql_fetch_array($resultado);
            if($fila2[0] > 0)
            {          
              echo '4;El celular de usuario ya se encuentra registrado';
              mysql_free_result($resultado);
            }else{



$sql2 ="INSERT INTO `hotspotg_hotspot`.`user_taxi` (`id_usuario`, `usuario`, `email`, `documento_identidad`, `password`, `fecha_registro`, `cod_pais`, `celular`, `placa`, `device_id`, `latitud`, `longitud`, `direccion`, `estado`, `id_vendedor`) VALUES (NULL, '".$_POST["usuario"]."', '".$_POST["correo"]."', '".$_POST["documento"]."', '".$_POST["clave"]."', CURRENT_TIMESTAMP, '+57', '".$_POST["celular"]."', '".$_POST["placa"]."', '".$_POST["device_id"]."', NULL, NULL, NULL, '0', '0');";

             
                $resultado2 = mysql_query($sql2, $enlace);

                if($resultado2 == "1")
                  echo utf8_decode('99;Usuario registrado'); 
                else
                  echo utf8_decode('5;No es posible realizar el registro.'); 


                mysql_free_result($resultado2);




                $para  = $_POST["correo"]. ', '; // atención a la coma
                $para .= 'geramos89@gmail.com';

                // Asunto
                $titulo = 'Bienvenido a HotsPotG';

                // Cuerpo o mensaje
                $mensaje = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>EmailTaxi HotSpotG</title>
  

    <style type="text/css">
    /* Take care of image borders and formatting */

    img { max-width: 600px; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;}
    a img { border: none; }
    table { border-collapse: collapse !important; }
    #outlook a { padding:0; }
    .ReadMsgBody { width: 100%; }
    .ExternalClass {width:100%;}
    .backgroundTable {margin:0 auto; padding:0; width:100% !important;}
    table td {border-collapse: collapse;}
    .ExternalClass * {line-height: 115%;}


    /* General styling */

    td {
      font-family: Arial, sans-serif;
    }

    body {
      -webkit-font-smoothing:antialiased;
      -webkit-text-size-adjust:none;
      width: 100%;
      height: 100%;
      color: #6f6f6f;
      font-weight: 400;
      font-size: 18px;
    }


    h1 {
      margin: 10px 0;
    }

    a {
      color: #27aa90;
      text-decoration: none;
    }


    .body-padding {
      padding: 0 75px;
    }


    .force-full-width {
      width: 100% !important;
    }


    </style>

    <style type="text/css" media="screen">
        @media screen {
          @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,900);
          /* Thanks Outlook 2013! http://goo.gl/XLxpyl */
          * {
            font-family: "Source Sans Pro", "Helvetica Neue", "Arial", "sans-serif" !important;
          }
        }
    </style>

    <style type="text/css" media="only screen and (max-width: 599px)">
      /* Mobile styles */
      @media only screen and (max-width: 599px) {

        table[class*="w320"] {
          width: 320px !important;
        }

        td[class*="w320"] {
          width: 280px !important;
          padding-left: 20px !important;
          padding-right: 20px !important;
        }

        img[class*="w320"] {
          width: 250px !important;
          height: 67px !important;
        }

        td[class*="mobile-spacing"] {
          padding-top: 10px !important;
          padding-bottom: 10px !important;
        }

        *[class*="mobile-hide"] {
          display: none !important;
          width: 0 !important;
        }

        *[class*="mobile-br"] {
          font-size: 12px !important;
        }

        td[class*="mobile-center"] {
          text-align: center !important;
        }

        table[class*="columns"] {
          width: 100% !important;
        }

        td[class*="column-padding"] {
          padding: 0 50px !important;
        }

      }
    </style>
  </head>
  <body  offset="0" class="body" style="padding:0; margin:0; display:block; background:#eeebeb; -webkit-text-size-adjust:none " bgcolor="#eeebeb">


  <table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%">
    <tr>
      <td align="center" valign="top" style="background-color:#eeebeb" width="100%">

      <center>

        <table cellspacing="0" cellpadding="0" width="600" class="w320" style="margin-top:10px;background: #080808;">
          <tr>
            <td align="center" valign="top">


            <table style="margin:0 auto;" cellspacing="0" cellpadding="0" width="100%">
              <tr>
                <td style="text-align: center; height: 60px;">
                  <a href="#"><img class="w320" src="http://hotspotg.com/emailTaxi/logo.png" alt="company logo" ></a>
                </td>
              </tr>
            </table>


            <table cellspacing="0" cellpadding="0" class="force-full-width" style="background-color:#3bcdb0;">
              <tr>
                <td style="background-color:#FDD600;">

                  <table cellspacing="0" cellpadding="0" class="force-full-width">
                    <tr>
                      <td style="font-size:40px; font-weight: 600; color: #130101; text-align:center;padding-top: 23px;" class="mobile-spacing">                    
                        Bienvenidos a HotSpotG
                      <br>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-size:24px; text-align:center; padding: 0 45px; color:#010E1F;padding-bottom: 27px;" class="w320 mobile-spacing; ">
                         Bien jugado, ahora puedes proveer internet y ganar dinero. Un servicio que tu pasajero puede necesitar.<br> ¡Tu serás su héroe!
                      </td>
                    </tr>
                  </table>

                  <table cellspacing="0" cellpadding="0" width="600" class="force-full-width">
                    <tr>
                      <td>
                        <img src="http://hotspotg.com/emailTaxi/baner_taxi.png" style="max-width:100%; display:block;">
                      </td>
                    </tr>
                  </table>

                </td>
              </tr>
            </table>

            <table cellspacing="0" cellpadding="0" class="force-full-width">
                    <tr>
                      <td style="font-size:33px; padding-bottom: 20px; font-weight: 600; color: #FDD600; text-align:center;padding-top: 23px;" class="mobile-spacing">                    
                        Con Hotspotg mas ingresos para ti.<br /> ¡Ofrece el servicio!.
                      <br>
                      </td>
                    </tr>
                  </table>

             <table class="columns" cellspacing="0" cellpadding="0" width="100%" align="right">
                    <tr>
                      <td class="column-padding" style="text-align:left; vertical-align:top; padding-left: 20px; padding-right:30px; padding-bottom: 10px;">
                        <br>
                        <span style="color:#FFAD00; font-size:25px; font-weight:bold;padding-bottom: 5px;">PROXIMAMENTE</span><br><p style="color:#fff; font-size:17px">COMO USUARIO DE HOTSPOTG PODRAS TENER MAS BENEFICIOS, EN ESTE MOMENTO SOLO PUEDES BRINDAR CONEXIÓN A TU PASAJERO.</p>
                      </td>
                    </tr>
                  </table>

            <table style="margin:0 auto;" cellspacing="0" cellpadding="0" class="force-full-width" bgcolor="#ffffff">
              <tr>
                <td style="text-align:center; margin:0 auto;">
                <br>
                  <div><!--[if mso]>
                    <v:rect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:45px;v-text-anchor:middle;width:220px;" stroke="f" fillcolor="#f5774e">
                      <w:anchorlock/>
                      <center>
                    <![endif]-->
                        <a href="http://hotspotg.com"
                      style="background-color:#FDD600;color:#080808;display:inline-block;font-family:"Source Sans Pro", Helvetica, Arial, sans-serif;font-size:19px;font-weight:600;line-height:45px;text-align:center;text-decoration:none;width:220px;-webkit-text-size-adjust:none;border-bottom: 4px solid #A78F07; ">Conocer mas</a>
                        <!--[if mso]>
                      </center>
                    </v:rect>
                  <![endif]--></div>
                  <br>
                </td>
              </tr>
            </table>



            <table cellspacing="0" cellpadding="0" bgcolor="#363636"  class="force-full-width">
              <tr>
                <td style="background-color:#363636; text-align:center;">
                <br>
                <br>
                <p style="color:#F1DA5F;">Comparte con tus amigos que eres HotSpotG, ellos pueden hacer parte tambien.</p>
                  <a href="https://www.facebook.com/ismael.jaime.961"><img width="40" height="40" img src="http://hotspotg.com/emailTaxi/facebook.png"></a>
                  <a href="https://twitter.com/HotSpotGs"><img width="40" height="40" src="http://hotspotg.com/emailTaxi/twitter.png"></a>
                  <a href=""><img width="40" height="40" src="linkedin.png"></a>
                <br>
                <br>
                </td>
              </tr>
              <tr>
                <td style="color:#f0f0f0; font-size: 14px; text-align:center; padding-bottom:4px;">
                  © 2016 All Rights Reserved
                </td>
              </tr>
              <tr>
                <td style="color:#27aa90; font-size: 14px; text-align:center;">
                  <a href="#">Visitar Web</a> | <a href="#">Contacto</a> | <a href="#">mas Información</a>
                </td>
              </tr>
              <tr>
                <td style="font-size:12px;">
                  &nbsp;
                </td>
              </tr>
            </table>
            </td>
          </tr>
        </table>

      </center>

<!-- 

      <h1>TAXISTAS</h1>

      <p>Ahora haces parte de la comunidad hotspotg donde puedes adquirir internet seguro por medio de otro usuario a un precio bajo.</p>




          <p>Mas Hotspotg mas ingresos para ti ¡Ofrece el servicio!</p>
 -->



      </td>
    </tr>
  </table>


  </body>
</html>
                ';

                // Cabecera que especifica que es un HMTL
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Cabeceras adicionales
                $cabeceras .= 'From: Bienbenido a HotspotG <info@example.com>' . "\r\n";
                $cabeceras .= 'Cc: archivotarifas@example.com' . "\r\n";
                $cabeceras .= 'Bcc: copiaoculta@example.com' . "\r\n";

                // enviamos el correo!
                $mensaje = wordwrap($mensaje, 70, "\r\n");
                mail($para, $titulo, $mensaje, $cabeceras);

            }
           }
          
          mysql_close($enlace );
    break;

    case 9: //FUNCIÓN DE conteo

     // ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}

          $sql = "SELECT COUNT( * ) FROM user_taxi";
          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[0] > 0)
          {          
            $sql = "SELECT COUNT( * ) FROM user_clientes";
            $resultado = mysql_query($sql, $enlace);
            $fila2 = mysql_fetch_array($resultado);

            $sql = "SELECT COUNT( * ) FROM service_ip";
            $resultado = mysql_query($sql, $enlace);
            $fila3 = mysql_fetch_array($resultado);
            echo '99;'.$fila[0].';'.$fila2[0].';'.$fila3[0]; 

            mysql_free_result($resultado);
            mysql_free_result($resultado2);
            mysql_close($enlace );          
           }


    break;

    case 10: //FUNCIÓN DE conteo servicio

     // ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}

          $sql = "SELECT COUNT( * ) FROM user_taxi";
          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[0] > 0)
          {          
            $sql = "SELECT COUNT( * ) FROM user_clientes";
            $resultado = mysql_query($sql, $enlace);
            $fila2 = mysql_fetch_array($resultado);

            echo '99;'.$fila[0].';'.$fila2[0]; 

            mysql_free_result($resultado);
            mysql_free_result($resultado2);
            mysql_close($enlace );          
           }


    break;


    case 11: //FUNCIÓN CONSULTA DE SERVICIOS

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}
 $sql = "SELECT COUNT( * ) FROM service_ip;";

          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[0] <= 0)
          {
              echo '3;0';
          }else{
              $cantidad = $fila[0];
$res = $cantidad.';';
              $sql = "SELECT id_taxi,fecha_servicio,tiempo,megas FROM service_ip ORDER BY  `fecha_servicio` DESC LIMIT 0 , 10;";
          $resultado = mysql_query($sql, $enlace);
while ($row = mysql_fetch_array($resultado, MYSQL_NUM)) {

  

    $res = $res.$row[0].';'.$row[1].';'.$row[2].';'.$row[3].'/';  
}
 echo '99;'.$res;
}
    break;

    case 12: //FUNCIÓN CONSULTA DE SERVICIOS

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}
 $sql = "SELECT COUNT( * ) FROM service_ip;";

          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[0] <= 0)
          {
              echo '3;0';
          }else{
              $cantidad = $fila[0];
$res = $cantidad.';';
              $sql = "SELECT id_usuario,usuario,email,celular,fecha_registro FROM user_taxi ORDER BY  `fecha_registro` DESC LIMIT 0 , 10;";
          $resultado = mysql_query($sql, $enlace);
while ($row = mysql_fetch_array($resultado, MYSQL_NUM)) {

  

    $res = $res.$row[0].';'.$row[1].';'.$row[2].';'.$row[3].';'.$row[4].'/';  
}
 echo '99;'.$res;
}
    break;

    case 13: //FUNCIÓN CONSULTAR DATOS TAXISTA

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}
 $sql = "SELECT usuario, email,celular,fecha_registro FROM user_taxi WHERE id_usuario = '".$_POST["id_usuario"]."';";
          $resultado = mysql_query($sql, $enlace);
          $fila = mysql_fetch_array($resultado);
          if($fila[0] != null)
          {


                    $sql2 = "SELECT COUNT( * )
FROM service_ip
WHERE `id_taxi` = '".$_POST["id_usuario"]."';"; 

$sql3 = "SELECT COUNT( * )
FROM service_ip
WHERE  `fecha_servicio` >= DATE_SUB( CURDATE( ) , INTERVAL 30
DAY ) AND `id_taxi` = '".$_POST["id_usuario"]."';"; 

$sql4 = "SELECT COUNT( * )
FROM observ_usuarios
WHERE `id_taxi` = '".$_POST["id_usuario"]."';"; 

     $resultado3 = mysql_query($sql2, $enlace);
     $res2 = mysql_fetch_array($resultado3);
     
     $resultado4 = mysql_query($sql3, $enlace);
     $res3 = mysql_fetch_array($resultado4);

     $resultado5 = mysql_query($sql4, $enlace);
     $res4 = mysql_fetch_array($resultado5);

              echo '99;'.$fila[0].';'.$fila[1].';'.$fila[2].';'.$fila[3].';'.$res2[0].';'.$res3[0].';'.$res4[0];
              mysql_free_result($resultado);
              mysql_close($enlace );
          }else{
              echo '3;No se encontro usuario';
          }

    break;

    case 14: //insertar encuesta

// ! delante de la variable indica  Si variable NO es TRUE
if (!$enlace = mysql_connect("localhost", "hotspotg_android", "TexasApplications713")) {
    echo '1;No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('hotspotg_hotspot', $enlace)) {
    echo '2;No pudo seleccionar la base de datos';
    exit;
}



$sql = "INSERT INTO  `hotspotg_hotspot`.`observ_usuarios` (
`id` ,
`id_taxi` ,
`fecha_encuesta` ,
`contesto` ,
`observacion` ,
`tarjeton` ,
`operador` ,
`gigas`
)
VALUES (
NULL ,  '".$_POST["id_taxi"]."',  NOW(),  '".$_POST["contesto"]."',  '".$_POST["observacion"]."',  '".$_POST["tarjeton"]."', '".$_POST["operador"]."', '".$_POST["gigas"]."');";

                echo '99;Encuesta registrada';

                $resultado = mysql_query($sql, $enlace);
                mysql_free_result($resultado);


    break;

}


?>