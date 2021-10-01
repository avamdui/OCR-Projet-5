<?php
namespace Models;

class Contact extends Model
{
	public function send($name,$email,$message)
    {
      
        $subject =  "Nouveau Message";
	    $receiver = 'Vincent.gabrych@gmail.com';
        $content = '<html><head><title>Formulaire de Contact</title></head><body>';
        $content .= '<p>' .$message .'<p>';
        $content .= '-------------------' .'<br>';
        $content .= 'De: ' .$name .' (' .$email .')';
        $content .= '<p>' .'Formulaire de contact' .'<p>';
        $content .= '</body></html>';
        $header = "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html; charset=UTF-8\r\n";
        $header .= 'From: Vincent.gabrych@gmail.com' . "\r\n" . 'Reply-To: Vincent.gabrych@gmail.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        mail($receiver,$subject, $content, $header); // Fonction principale qui envoi l'email
	}
}