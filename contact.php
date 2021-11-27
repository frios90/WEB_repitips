

<?php
if ( $_POST['phone'] == md5('rapitips')) {
    ini_set( "SMTP", "mail.rapitips.cl" );
    $from = "contacto@rapitips.com";
    $array_to = [
                   "francisco.rios.castillo2@gmail.com", "frios@rapitips.cl"
                ];
    $to = implode(',', $array_to);
    $subject = "Contacto";

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $descrip = $_POST['message'];

    $message = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>[SUBJECT]</title>
                <style type="text/css">
                    body {
                        padding: 50px 100px 150px 150px;                   
                    
                    }   
                    .title {
                        font-size: 25px!important;
                        font-weight: 800;
                        padding: 10px 10px 30px!important;
                        color: #333;        
                        text-align: center;            
                    }
                    .center{
                        text-align: center;     
                    }
                    .p-right{
                        text-align: right;     
                    }
                    .p-left{
                        text-align: left;     
                    }
                    .span-label {
                        color: rgb(129, 129, 129);
                        font-size: 20px!important;
                        font-weight: 300;
                    }

                    .footer {
                        background-color:#333!important; 
                        color: #f5a623!important; 
                        padding: 10px 25px 10px  !important;
                    }
                    .head {
                        font-size: 20px!important;
                        background-color:#333!important; 
                        color: #f5a623!important; 
                        padding: 3px 25px 3px 25px!important;   
                    }
                </style>
            </head>
            <body paddingwidth="0" paddingheight="0"   style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">
                <div class="head p-left"> Contacto desde RapiTips</div>
                <div class="title">Nuevo mensaje</div>
                <p>Tienes un nuevo mensaje de:</p>
                <div class="p-left"> Enviado por : <br><span class="span-label">'.$name.'</span></div>
                <div class="p-left"> Contactar a: <br><span class="span-label">'.$email.'</span></div>
                <div class="p-left"> Mensaje : <br><span class="span-label">'.$descrip.'</span></div>
                <div class="footer p-right"> Correo enviado <a href="https://www.proyectofejhu.cl/"><i>Proyecto Fejhu</i></a></div>
            </body>     
    </html>
    ';    
    $encoding = "utf-8"; 
    $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $header .= "From: ".$from." <".$from."> \r\n";
    $header .= "MIME-Version: 1.0 \r\n";
    $header .= "Content-Transfer-Encoding: 8bit \r\n";
    $header .= "Date: ".date("r (T)")." \r\n";
    mail($to,$subject,$message, $header);
    return "The email message was sent.";
}
