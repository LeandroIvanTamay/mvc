
<head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<?php

    require './assets/PHPMailer/src/Exception.php';
    require './assets/PHPMailer/src/PHPMailer.php';
    require './assets/PHPMailer/src/SMTP.php';

    

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->SMTPDebug = 2;

    try {
        $correo_remitente = $_POST['txtRemitente'];
        $password_remitente = $_POST['txtPassword'];
        $nombre_visible = $_POST['txtNombreVisible'];
        $correo_destinatario = $_POST['txtMail'];
        $asunto = $_POST['txtAsunto'];
        $cuerpo = $_POST['txtMensaje'];
        $html  = "<html>";
        $html .= "<head>";

        $mail->isSMTP();
        $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = $correo_remitente;   //username
        $mail->Password = $password_remitente;   //password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;                    //smtp port

        $mail->setFrom($correo_remitente,$nombre_visible);//, 'Freddy Chuc');
        $mail->addAddress($correo_destinatario);//, 'albert');

        //$mail->addAttachment(__DIR__ . '/attachment1.png');
        //$mail->addAttachment(__DIR__ . '/attachment2.png');

        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body    = $cuerpo;

        $mail->send();
        echo '<div class="alert alert-success" role="alert">Mensaje enviado correctamente</div>';
        echo "<a href='login.php' class=\"btn btn-info\">Regresar al login</a></br></br>";
        echo "<a href='correo.html' class=\"btn btn-info\">Redactar nuevo</a>";
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">No se pudo enviar el correo. Verifique y vuelva a intentarlo</div>';
        echo '<a href="login.php" class="btn btn-info">Regresar al login</a></br></br>';
        echo '<a href="correo.html" class="btn btn-info">Volver a redactar</a>';
    }

// Fuente:
/* https://artisansweb.net/send-email-using-gmail-smtp-server-php-script/*/
?>
