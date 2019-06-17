<html>
   <head>
      <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
      <link rel="stylesheet" href="assets/css/style.css" />

      <title>Login Page</title>

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
   </head>

   <body bgcolor = "#FFFFFF">
      <div align = "center">
         <div style = "background-color:#333333; color:#FFFFFF; padding:6px;" ><b>Login</b></div>
            <div style = "margin:30px; width: 30%;" class="page-header" align="left">
               <form method="post">
                  <label>Correo  :</label><br/><input type="text" name="email" class="form-control" value="alex@gmail.com" required/><br /><br />
                  <label>Contraseña  :</label><br/><input type="password" name="password" class="form-control" value="1234" required/><br/><br />
                  <input type="submit" value="Iniciar sesión" class="btn btn-info btn-block" /><br />
               </form>
               <hr>
         
      </div>
   </body>
</html>

<?php
   error_reporting(E_ALL | E_STRICT);
   ini_set('display_errors', "On");
$url = 'http://localhost/webserviceRestaurantes/empleados/login';

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $datos_post = json_encode(
      array(
         "correo_emp" => $_REQUEST['email'],
         "password_emp" => $_REQUEST['password']
         )
      );

   $opciones = array(
      'http' => array(
         'method'=>"POST",
         'max_redirects' => '0',
         'ignore_errors' => '1',
         'header'=>"Accept-language: es\r\n" .
                  "Cookie: val=unknown\r\n" .
                  "content-type: application/text\r\n ",
         'content' => $datos_post
         )
      );

   $contexto = stream_context_create($opciones);
   $fp = fopen($url, 'r',1, $contexto);
   $respuesta = stream_get_contents($fp);
   //$contenido = array();
   $contenido = json_decode($respuesta, true);

   if($contenido["empleado"]["claveApi"]){
      // variables de sesión
      session_id("nuevaSesion");
      session_start();
      $_SESSION['sesion_iniciada'] = true;
      $_SESSION['usuario'] = $contenido["empleado"]["correo_emp"];
      $_SESSION['claveApi'] = $contenido["empleado"]["claveApi"];

      fclose($fp);
      header('Location: index.php');
      echo "hola";
      exit();
   }else{
      header('Location: #');
   }
}

?>
