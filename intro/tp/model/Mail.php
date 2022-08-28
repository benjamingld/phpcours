<?php
namespace Model;
use Model\trait\Clean;


class Mail{
    use Clean;

    public static function  sendMailUser($mail, $password){

        $boundary 	= md5( uniqid() . microtime() );
		
		$from      	= strip_tags("test@test.fr");
		$to      	= strip_tags($mail);
		$subject 	= strip_tags("Inscription site");
		
		
	// HTML version of message
		$body = "--$boundary". PHP_EOL . 
		   "Content-Type: text/html; charset=utf-8". PHP_EOL .
		   "Content-Transfer-Encoding: base64". PHP_EOL . PHP_EOL ;		   
		$message ='<!DOCTYPE html>
				<html>
					<head>
						<meta charset="UTF-8" />
						<meta name="viewport" content="width=device-width, initial-scale=1" />
						<title>MailHog email example</title>
					</head>
					<body>
                    Bonjour! <br><br>
                                 - Votre login est : '.Mail::write($mail).'<br>
                                 - Votre mot de passe est : '.Mail::write($password).'<br>
					</body>
				</html>';
		$body .= chunk_split( base64_encode( $message ) );
		$body .= "--$boundary";

	
		$headers = 'From: <'.$from.'>'.PHP_EOL;
		$headers.= 'Reply-To: <'.$from.'>'.PHP_EOL;
		$headers.= 'CC: '.$from.''.PHP_EOL;
		$headers.= 'MIME-Version: 1.0'.PHP_EOL;
		$headers.= 'Content-Type: multipart/alternative;boundary="'.$boundary.'"'.PHP_EOL;
		
		mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $body, $headers);
        return true;
    }


    
}