<?php
namespace Model\trait;
use Model\trait\Clean;

class Mail{
    use Clean;
 
    public static function sendMailUser($mail, $password){
        $subject = "Votre inscription à été envoyer <br/> Bienvenue!";

        $message = "<html>
                    <head></head>
                    <body>
                    Bonjour! <br/><br/>
                    - Votre login est : ".Mail::write($mail)."<br/>
                    - Votre mot de passe est : ".Mail::write($password)."<br/>
                    </body>
                    ";

        $headers =  'MIME-Version: 1.20' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= 'From: m2iFormation@info.com' . "\r\n";
        $headers .= 'Reply-To: m2iFormation@info.com' . "\r\n";

        mail($mail, $subject, $message, $headers);
        return true;
    }
}


