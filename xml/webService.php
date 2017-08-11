<?php
function doAuthenticate(){    
if(isset($_SERVER['PHP_AUTH_USER']) and isset($_SERVER['PHP_AUTH_PW']) )
          {  

           if($_SERVER['PHP_AUTH_USER']=="hotspotg" and $_SERVER['PHP_AUTH_PW']=="v6a68KhJq0" )
                return true;
           else
               return  false;                   

           }
}

require 'lib/nusoap.php';
$server=new nusoap_server();
$server->configureWSDL("HotSpotG");

function crearUsuario($usuario,$email){

    $conexion=mysqli_connect('www.hotspotg.com','hotspotg','v6a68KhJq0','hotspotg_hotspot');
    if(mysqli_connect_errno()){
      return "Error conectando a la base de datos";
    }else{
      $password=generaPass();
        $stmt = $conexion->prepare("INSERT INTO hotspotg_hotspot.user_clientes (usuario, email, password) VALUES ( ?, ? , ? );");
          $stmt->bind_param('sss',$usuario,$email,$password);
          if($stmt->execute()){
            $asunto="Bienvenido a HotSpotG";
                  $headers = "MIME-Version: 1.0" . "\r\n";
                  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                  $mensaje="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
                              <html xmlns='http://www.w3.org/1999/xhtml'>
                                <head>
                                 <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                                 <meta name='viewport' content='width=device-width, initial-scale=1' />
                                  <title>Email HotSpotG</title>
                                

                                  <style type='text/css'>
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

                                  <style type='text/css' media='screen'>
                                      @media screen {
                                        @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,900);
                                        /* Thanks Outlook 2013! http://goo.gl/XLxpyl */
                                        * {
                                          font-family: 'Source Sans Pro', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
                                        }
                                      }
                                  </style>

                                  <style type='text/css' media='only screen and (max-width: 599px)'>
                                    /* Mobile styles */
                                    @media only screen and (max-width: 599px) {

                                      table[class*='w320'] {
                                        width: 320px !important;
                                      }

                                      td[class*='w320'] {
                                        width: 280px !important;
                                        padding-left: 20px !important;
                                        padding-right: 20px !important;
                                      }

                                      img[class*='w320'] {
                                        width: 250px !important;
                                        height: 67px !important;
                                      }

                                      td[class*='mobile-spacing'] {
                                        padding-top: 10px !important;
                                        padding-bottom: 10px !important;
                                      }

                                      *[class*='mobile-hide'] {
                                        display: none !important;
                                        width: 0 !important;
                                      }

                                      *[class*='mobile-br'] {
                                        font-size: 12px !important;
                                      }

                                      td[class*='mobile-center'] {
                                        text-align: center !important;
                                      }

                                      table[class*='columns'] {
                                        width: 100% !important;
                                      }

                                      td[class*='column-padding'] {
                                        padding: 0 50px !important;
                                      }

                                    }
                                  </style>
                                </head>
                                <body  offset='0' class='body' style='padding:0; margin:0; display:block; background:#eeebeb; -webkit-text-size-adjust:none ' bgcolor='#eeebeb'>
                                <table align='center' cellpadding='0' cellspacing='0' width='100%' height='100%'>
                                  <tr>
                                    <td align='center' valign='top' style='background-color:#eeebeb' width='100%'>

                                    <center>

                                      <table cellspacing='0' cellpadding='0' width='600' class='w320' style='margin-top:10px;background: #080808;'>
                                        <tr>
                                          <td align='center' valign='top'>


                                          <table style='margin:0 auto;' cellspacing='0' cellpadding='0' width='100%'>
                                            <tr>
                                              <td style='text-align: center; height: 60px;'>
                                                <a href='#'><img class='w320' src='http://hotspotg.com/img/logo.png' alt='company logo' ></a>
                                              </td>
                                            </tr>
                                          </table>


                                          <table cellspacing='0' cellpadding='0' class='force-full-width' style='background-color:#3bcdb0;'>
                                            <tr>
                                              <td style='background-color:#64BCB9;'>

                                                <table cellspacing='0' cellpadding='0' class='force-full-width'>
                                                  <tr>
                                                    <td style='font-size:40px; font-weight: 600; color: #130101; text-align:center;' class='mobile-spacing'>
                                                    <div class='mobile-br'>&nbsp;</div>
                                                      Bienvenido $usuario a HotSpotG
                                                    <br>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td style='font-size:24px; text-align:center; padding: 0 75px; color:#010E1F;' class='w320 mobile-spacing; '>
                                                       Tu password es $password
                                                    </td>
                                                  </tr>
                                                </table>

                                                <table cellspacing='0' cellpadding='0' width='600' class='force-full-width'>
                                                  <tr>
                                                    <td>
                                                      <img src='http://hotspotg.com/email/baner.png' style='max-width:100%; display:block;'>
                                                    </td>
                                                  </tr>
                                                </table>

                                              </td>
                                            </tr>
                                          </table>

                                          <table cellspacing='0' cellpadding='0' class='force-full-width' bgcolor='#ffffff' >
                                            <tr>
                                              <td style='background-color:#ffffff;'>
                                                <br>
                                                <table class='columns' cellspacing='0' cellpadding='0' width='100%' align='left' style='margin-bottom:30px;'>
                                                  <tr>

                                                  <!-- ############# STEP ONE ############### -->
                                                  <!-- To change number images to step one:
                                                      - Replace image below with this url: https://www.filepicker.io/api/file/acgdn9j9T16oHaZ8znhv
                                                      - Then replace step two with this url: https://www.filepicker.io/api/file/iqmbVoMtT7ukbPUoo9zH
                                                      - Finally replace step three with this url: https://www.filepicker.io/api/file/ni2yEbRCRJKzRm3cYGnn

                                                      Finished!
                                                   -->
                                                    <td style='padding-left: 10px; padding-top: 10px;'>
                                                      <img src='http://hotspotg.com/email/icono1.png' alt='step one' width='50' height='50'>
                                                    </td>


                                                    <td style='color:#0D252D; text-align:left; padding-top: 10px;'>
                                                      Ahora haces parte de la comunidad hotspotg donde puedes adquirir internet seguro por medio de otro usuario a un precio bajo.
                                                    </td>
                                                  </tr>
                                                  <tr>

                                                  <!-- ############# STEP TWO ############### -->
                                                  <!-- To change number images to step two:
                                                      - Replace image below with this url: https://www.filepicker.io/api/file/23h1I8Ts2PNLx755Dsfg
                                                      - Then replace step one with this url: https://www.filepicker.io/api/file/zNDJy10QemuMhAcirOwQ
                                                      - Finally replace step three with this url: https://www.filepicker.io/api/file/ni2yEbRCRJKzRm3cYGnn

                                                      Finished!
                                                   -->
                                                    <td style='padding-left: 10px; padding-top: 10px; padding-right: 10px;'>
                                                      <img src='http://hotspotg.com/email/icono2.png' alt='step two' width='50' height='50'>
                                                    </td>
                                                    <td style='color:#0D252D; text-align:left; padding-top: 10px;'>
                                                      Podrás usar el servicio de internet de algunos conductores en las ciudades de Bogota, Medellin, Barranquilla y Cali. <!-- Las otras ciudades creemos  los trayectos  son muy cortos. -->
                                                    </td>
                                                  </tr>
                                                  <tr>                    
                                                    <td style='padding-left: 10px; padding-top: 10px;'>
                                                      <img src='http://hotspotg.com/email/icono3.png' alt='step three' width='50' height='50'>
                                                    </td>
                                                    <td  style='color:#0D252D; text-align:left; padding-top: 10px;'>
                                                      El usuario que recibe la conexión tendrá la opción de hacerlo en intervalos de 15 minutos y/o 40 megas por un costo de 2.000$.


                                                      <!-- En intervalos de 15 Min o 40 Megas lo que se consuma primero.  El usuario servidor,  $2.000 pesos. -->
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                           <table class='columns' cellspacing='0' cellpadding='0' width='100%' align='right'>
                                                  <tr>
                                                    <td class='column-padding' style='text-align:left; vertical-align:top; padding-left: 20px; padding-right:30px; padding-bottom: 10px;'>
                                                      <br>
                                                      <span style='color:#3bcdb0; font-size:25px; font-weight:bold;padding-bottom: 5px;'>PROXIMAMENTE</span><br><p style='color:#fff; font-size:17px'>COMO USUARIO DE HOTSPOTG PODRAS VENDER Y COMPRAR CONEXION DE OTRO USUARIO, EN ESTE MOMENTO SOLO PUEDES ADQUIRIR CONEXIÓN.</p>
                                                    </td>
                                                  </tr>
                                                </table>

                                          <table style='margin:0 auto;' cellspacing='0' cellpadding='0' class='force-full-width' bgcolor='#ffffff'>
                                            <tr>
                                              <td style='text-align:center; margin:0 auto;'>
                                              <br>
                                                <div><!--[if mso]>
                                                  <v:rect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='http://' style='height:45px;v-text-anchor:middle;width:220px;' stroke='f' fillcolor='#f5774e'>
                                                    <w:anchorlock/>
                                                    <center>
                                                  <![endif]-->
                                                      <a href='http://hotspotg.com'
                                                    style='background-color:#1782E4;color:#ffffff;display:inline-block;font-family:'Source Sans Pro', Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:45px;text-align:center;text-decoration:none;width:220px;-webkit-text-size-adjust:none;'>Conocer mas</a>
                                                      <!--[if mso]>
                                                    </center>
                                                  </v:rect>
                                                <![endif]--></div>
                                                <br>
                                              </td>
                                            </tr>
                                          </table>



                                          <table cellspacing='0' cellpadding='0' bgcolor='#363636'  class='force-full-width'>
                                            <tr>
                                              <td style='background-color:#363636; text-align:center;'>
                                              <br>
                                              <br>
                                              <p style='color:#9EFFEE;'>Comparte con tus amigos que eres HotSpotG, ellos pueden hacer parte tambien.</p>
                                                <a href='https://www.facebook.com/ismael.jaime.961'><img width='40' height='40' img src='http://hotspotg.com/email/facebook.png'></a>
                                                <a href='https://twitter.com/HotSpotGs'><img width='40' height='40' src='http://hotspotg.com/email/twitter.png'></a>
                                                <a href=''><img width='40' height='40' src='http://hotspotg.com/email/linkedin.png'></a>
                                              <br>
                                              <br>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style='color:#f0f0f0; font-size: 14px; text-align:center; padding-bottom:4px;'>
                                                © 2016 All Rights Reserved
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style='color:#27aa90; font-size: 14px; text-align:center;'>
                                                <a href='#'>Visitar Web</a> | <a href='#'>Contacto</a> | <a href='#'>mas Información</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style='font-size:12px;'>
                                                &nbsp;
                                              </td>
                                            </tr>
                                          </table>
                                          </td>
                                        </tr>
                                      </table>
                                    </center>
                                    </td>
                                  </tr>
                                </table>
                                </body>
                              </html>";
                  mail($email,$asunto,$mensaje,$headers);
            return true;
           }else{
            return false;
           }
       }  
     mysqli_close($conexion);
  }
function verificarUsuario($email,$password){
if(doAuthenticate()){
  $conexion=mysqli_connect('www.hotspotg.com','hotspotg','v6a68KhJq0','hotspotg_hotspot');
  if(mysqli_connect_errno()){
    return "Error en la Base de Datos HotSpotG";
  }else{    
    $stmt = $conexion->prepare("SELECT usuario FROM hotspotg_hotspot.user_clientes WHERE user_clientes.email=? AND user_clientes.password=? ");
    $stmt->bind_param('ss',$email ,$password);
    $stmt->execute();
    $stmt-> bind_result($usuario);
      
      if( $stmt-> fetch() ) {
        return $usuario;
      }else {
        return "No Hay Usuarios";
      }

      $stmt-> close(); 
      $conexion-> close();
   
 }
}
}
function verificarTaxi($username,$password){
if(doAuthenticate()){
  $conexion=mysqli_connect('www.hotspotg.com','hotspotg','v6a68KhJq0','hotspotg_hotspot');
  if(mysqli_connect_errno()){
    return "Error en la Base de Datos HotSpotG";
  }else{    
    $stmt = $conexion->prepare("SELECT estado FROM hotspotg_hotspot.user_taxi WHERE user_taxi.usuario=? AND user_taxi.password=? ");
    $stmt->bind_param('ss',$username ,$password);
    $stmt->execute();
    $stmt-> bind_result($estado);

   
      if( $stmt-> fetch() ) {
        return $estado;
      }else {
        return "No Hay Usuarios";
      }

      $stmt-> close(); 
      $conexion-> close();
   
 }
}
}

function recordarPassword($email){
  if(doAuthenticate()){
    $conexion=mysqli_connect('www.hotspotg.com','hotspotg','v6a68KhJq0','hotspotg_hotspot');
    if(mysqli_connect_errno()){
      return "Error en la Base de Datos HotSpotG";
    }else{    
      $stmt = $conexion->prepare("SELECT * FROM hotspotg_hotspot.user_clientes WHERE user_clientes.email=?;");
   
      $stmt->bind_param('s',$email);
      $stmt->execute();
      $result = $stmt->get_result();

      if($fila=$result->fetch_assoc()){
        $usuario=$fila['usuario'];
        $password=$fila['password'];
                    $asunto="Contraseña de HotSpotG";
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $mensaje="<html><body><h1>Hola $usuario</h1></br><h2>Tu Contraseña es: $password</h2></body></html>";
                    mail($email,$asunto,$mensaje,$headers);
        return "$usuario";
      }else{
        return "no hay usuarios";
      }
     mysqli_close($conexion);
   }
  }
}
function recordarPasswordTaxi($email){
  if(doAuthenticate()){
    $conexion=mysqli_connect('www.hotspotg.com','hotspotg','v6a68KhJq0','hotspotg_hotspot');
    if(mysqli_connect_errno()){
      return "Error en la Base de Datos HotSpotG";
    }else{    
      $stmt = $conexion->prepare("SELECT * FROM hotspotg_hotspot.user_taxi WHERE user_taxi.email=?;");
   
      $stmt->bind_param('s',$email);
      $stmt->execute();
      $result = $stmt->get_result();

      if($fila=$result->fetch_assoc()){
        $usuario=$fila['usuario'];
        $password=$fila['password'];
                    $asunto="Contraseña de HotSpotG";
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $mensaje="<html><body><h1>Hola $usuario</h1></br><h2>Tu Contraseña es: $password</h2></body></html>";
                    mail($email,$asunto,$mensaje,$headers);
        return "$usuario";
      }else{
        return "no hay usuarios";
      }
     mysqli_close($conexion);
   }
  }
}

function crearUsuarioTaxi($usuario,$email,$password,$documento_identidad){
if(doAuthenticate()){
  if(!Existe($usuario)){
  $estadoInicial=1;
  $conexion=mysqli_connect('www.hotspotg.com','hotspotg','v6a68KhJq0','hotspotg_hotspot');
  if(mysqli_connect_errno()){
    return "Error conectando a la base de datos";
  }else{
      $stmt = $conexion->prepare("INSERT INTO hotspotg_hotspot.user_taxi (usuario, email, documento_identidad, password,estado,celular) VALUES (?, ?, ?, ?, ?, ?);");
        $stmt->bind_param('ssssss',$usuario,$email,$documento_identidad,$password,$estadoInicial,$usuario);
        if($stmt->execute()){
          $asunto="Bienvenido a HotSpotG";
                $remitente="HotSpotG";
                $mensaje="Hola $usuario, tu usuario de HotSpotG ha sido creado";
                $mensaje=wordwrap($mensaje,70);
                mail($email,$asunto,$mensaje,$remitente);
          return "Usuario de taxi Creado";
         }else{
          return "No se creo el Usuario de Taxi";
         }
     }  
   mysqli_close($conexion);
 }else{
  return "ya existe";
 }
}
}
function Existe($username){
if(doAuthenticate()){
  $conexion=mysqli_connect('www.hotspotg.com','hotspotg','v6a68KhJq0','hotspotg_hotspot');
  if(mysqli_connect_errno()){
    return "Error en la Base de Datos HotSpotG";
  }else{    
    $stmt = $conexion->prepare("SELECT count(*) FROM hotspotg_hotspot.user_taxi WHERE user_taxi.usuario=?");
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $stmt-> bind_result($count);

   
      if( $stmt-> fetch() ) {
        if($count!=0){
          return true;
        }else{
           return false;
        }
        
      }
      $stmt-> close(); 
      $conexion-> close();
   
 }
}
}

function iniciarServicio($usuario,$usuario_taxista,$gps_taxi,$gps_taxi_final,$gps_usuario,$gps_usuario_final,$descarga,$subida,$velocidad,$estado){
  if(doAuthenticate()){
     $conexion=mysqli_connect('www.hotspotg.com','hotspotg','v6a68KhJq0','hotspotg_hotspot');
    if(mysqli_connect_errno()){
      return "Error en la Base de Datos HotSpotG";
    }else{
       $sql = "INSERT INTO  hotspotg_hotspot.service (id_user ,id_server,time_start ,time_finish ,gps_server_start ,gps_server_finish , gps_client_start ,gps_client_finish ,kbs_downloaded ,kbd_uploaded ,connection_speed ,estado)VALUES ('$usuario','$usuario_taxista',NOW(),NOW(),'$gps_taxi','$gps_taxi_final','$gps_usuario','$gps_usuario_final','$descarga','$subida','$velocidad','$estado');";
          if($result=mysqli_query($conexion,$sql)){
            $id= $conexion->insert_id;
             mysqli_close($conexion);

            return "$id";
           }else{
             mysqli_close($conexion);
            return "No se guardo el estado inicial";
           }
    }
   
  }
}

function actualizarServicio($usuario,$usuario_taxista,$gps_taxi,$gps_taxi_final,$gps_usuario,$gps_usuario_final,$descarga,$subida,$velocidad,$estado,$idactualizacion){
  if(doAuthenticate()){
     $conexion=mysqli_connect('www.hotspotg.com','hotspotg','v6a68KhJq0','hotspotg_hotspot');
    if(mysqli_connect_errno()){
      return "Error en la Base de Datos HotSpotG";
    }else{
       $sql = "UPDATE  hotspotg_hotspot.service SET  time_finish = NOW() ,kbs_downloaded = '$descarga', kbd_uploaded = '$subida', connection_speed = '$velocidad' WHERE id = '$idactualizacion' ;";
          if($result=mysqli_query($conexion,$sql)){
             mysqli_close($conexion);
              return "Actualizacion Guardada";
           }else{
             mysqli_close($conexion);
            return "No se guardo la Actualizacion";
           }
    }
   
  }
}

function TerminarServicioTaxi($username){
  if(doAuthenticate()){
     $conexion=mysqli_connect('www.hotspotg.com','hotspotg','v6a68KhJq0','hotspotg_hotspot');
    if(mysqli_connect_errno()){
      return "Error en la Base de Datos HotSpotG";
    }else{
       $sql = "UPDATE  hotspotg_hotspot.service SET  estado = 1 WHERE id_server= '$username' AND estado=0;";
          if($result=mysqli_query($conexion,$sql)){
             mysqli_close($conexion);
              return "Actualizacion Guardada";
           }else{
             mysqli_close($conexion);
            return "No se guardo la Actualizacion";
           }
    }
   
  }
}

function TerminarConexion($idconection){
  if(doAuthenticate()){
     $conexion=mysqli_connect('www.hotspotg.com','hotspotg','v6a68KhJq0','hotspotg_hotspot');
    if(mysqli_connect_errno()){
      return "Error en la Base de Datos HotSpotG";
    }else{
       $sql = "UPDATE  hotspotg_hotspot.service SET  estado = 1 WHERE id= '$idconection';";
          if($result=mysqli_query($conexion,$sql)){
             mysqli_close($conexion);
              return "Actualizacion Guardada";
           }else{
             mysqli_close($conexion);
            return "No se guardo la Actualizacion";
           }
    }
   
  }
}

function getTiempo($idactualizacion){
  if(doAuthenticate()){
    $objeto=array();
     $conexion=mysqli_connect('www.hotspotg.com','hotspotg','v6a68KhJq0','hotspotg_hotspot');
    if(mysqli_connect_errno()){
      return "Error en la Base de Datos HotSpotG";
    }else{
      $sql = "SELECT * FROM hotspotg_hotspot.service WHERE id= '$idactualizacion';";
          $result=mysqli_query($conexion,$sql);
            if($fila = mysqli_fetch_array($result)){
              $fechaInicial = $fila[3];
              $fechaFinal = $fila[4];
              $segundos = strtotime($fechaFinal) - strtotime($fechaInicial);
              $segundos2 = $segundos % 60;
              $objeto[]= "$fila[0]";
              $objeto[]= "$fila[1]";
              $objeto[]= "$fila[2]";
              $objeto[]= "$segundos";
              $objeto[]= number_format($segundos/60,0);
              return $objeto;
            }else{
              return "No Hay";
            }
    }
   
  }
}
function getConectadosTaxi($username){
  if(doAuthenticate()){
    $objeto=array();
     $conexion=mysqli_connect('www.hotspotg.com','hotspotg','v6a68KhJq0','hotspotg_hotspot');
    if(mysqli_connect_errno()){
      return "Error en la Base de Datos HotSpotG";
    }else{
      $sql = "SELECT * FROM hotspotg_hotspot.service WHERE id_server= '$username' AND estado=0;";
          $result=mysqli_query($conexion,$sql);
            while($fila = mysqli_fetch_array($result)){
              $fechaInicial = $fila[3];
              $fechaFinal = $fila[4];
              $segundos = strtotime($fechaFinal) - strtotime($fechaInicial);
              $segundos2 = $segundos % 60;
              $objeto[]= "$fila[0]";
              $objeto[]= "$fila[1]";
              $objeto[]= "$fila[9]";
              $objeto[]= number_format($segundos/60,0);
            }
            mysqli_close($conexion);
    }
   return $objeto;
  }
}

function generaPass(){
    //Se define una cadena de caractares. Te recomiendo que uses esta.
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena=strlen($cadena);
     
    //Se define la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
    $longitudPass=5;
     
    //Creamos la contraseña
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);
     
        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}


$server->wsdl->addComplexType(
  'ArrayOfString',
  'complexType',
  'array',
  'sequence',
  '',
  array(
    'itemName' => array(
      'name' => 'itemName', 
      'type' => 'xsd:string',
      'minOccurs' => '0', 
      'maxOccurs' => 'unbounded'
    )
  )
);

 
$server->wsdl->addComplexType(
        'multi',
        'complexType',
        'array',
        '',
        'SOAP-ENC:Array',
        array(),
        array(
          array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'xsd:string[]')
          ),
        'xsd:string');

$server->register('getTiempo',
array('usuario' => 'xsd:string','usuario_taxista' => 'xsd:string'), // input parameters
array('return' => 'tns:multi')); 

$server->register('getConectadosTaxi',
array('usuario' => 'xsd:string','usuario_taxista' => 'xsd:string'), // input parameters
array('return' => 'tns:multi')); 
 

$server->register("crearUsuario",
array("usuario"=>'xsd:string',
  "email"=>'xsd:string'),
array("return"=>'xsd:string'));


$server->register("verificarUsuario",
array("username"=>'xsd:string'),
array("return"=>'xsd:string'));

$server->register("verificarTaxi",
array("username"=>'xsd:string'),
array("return"=>'xsd:string'));

$server->register("recordarPassword",
array("email"=>'xsd:string'),
array("return"=>'xsd:string'));

$server->register("recordarPasswordTaxi",
array("email"=>'xsd:string'),
array("return"=>'xsd:string'));

$server->register("iniciarServicio",
array("email"=>'xsd:string'),
array("return"=>'xsd:string'));

$server->register("actualizarServicio",
array("email"=>'xsd:string'),
array("return"=>'xsd:string'));

$server->register("TerminarServicioTaxi",
array("email"=>'xsd:string'),
array("return"=>'xsd:string'));

$server->register("TerminarConexion",
array("idconection"=>'xsd:string'),
array("return"=>'xsd:string'));



$server->register("crearUsuarioTaxi",
array("usuario"=>'xsd:string',
  "email"=>'xsd:string',
  "documento_identidad"=>'xsd:string',
  "password"=>'xsd:string',
  "cod_pais"=>'xsd:string',
  "celular"=>'xsd:string'),
array("return"=>'xsd:string'));

$HTTP_RAW_POST_DATA=isset($HTTP_RAW_POST_DATA)?$HTTP_RAW_POST_DATA:'';
$server->service($HTTP_RAW_POST_DATA);


?>