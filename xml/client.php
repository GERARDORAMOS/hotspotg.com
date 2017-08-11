<?php  

$email="javierfelipevasquezroldan@gmail.com";
$password="123456";

echo verificarUsuario($email,$password);

function verificarUsuario($email,$password){

  $conexion=mysqli_connect('www.hotspotg.com','hotspotg','v6a68KhJq0','hotspotg_hotspot');
  if(mysqli_connect_errno()){
    return "Error en la Base de Datos HotSpotG";
  }else{    
    $stmt = $conexion->prepare("SELECT * FROM hotspotg_hotspot.user_clientes WHERE user_clientes.email=? AND user_clientes.password=? ");
    $stmt->bind_param('ss',$email ,$password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($fila=$result->fetch_assoc()){
      mysqli_close($conexion);
      return $fila['usuario'];
    }else{
      mysqli_close($conexion);
      return "No Hay Usuarios";
    }
   
 }

}

?>