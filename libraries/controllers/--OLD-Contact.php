<?php
namespace Controllers;

class Contact extends Controller
{
         protected $modelName = "Contact";
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
    

    public function sendMail()
    {
       
        /**
         * 1. On vérifie que les données ont bien été envoyées en POST
         * D'abord, on récupère les informations à partir du POST
         * Ensuite, on vérifie qu'elles ne sont pas nulles
         */
        // On commence par l'author
        $name = $_POST['name'];
        // $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);


        // Ensuite le mail
        $email = $_POST['email'];
        // $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        // Enfin le message
        $message = $_POST['message'];
        // $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

        // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
     
        if (!$name || !$email || !$message) {
            die("Votre formulaire a été mal rempli !");
        }else{$this->model->send($name,$email,$message); }

        // 4. Redirection vers l index  :
        \Http::redirect('index.php');
    }

}
