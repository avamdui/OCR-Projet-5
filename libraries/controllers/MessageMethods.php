<?php
namespace Controllers;
require_once "./libraries/models/MessageData.php";
class MessageMethods extends MessageData 
{ // Methods of processing data captured by the form.html
    
    protected $modelName = "Contact";
    public $success = null;
    public $error = null;

    

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function setMessageData() 
    { // Writing data captured by the form into variables (model/class.MessageData.php)
        
        parent::setName(strip_tags(trim($_POST['name'])));
        parent::setEmail(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        parent::setMessage(strip_tags(trim($_POST['message'])));
        parent::setReceived();
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function checkFormFields() 
    { // Checking the obligatory form fields        
        $fields = [
            'Name' => $this->name,
            'E-mail' => $this->email,
            'Message' => $this->message,

        ];
        foreach($fields AS $key => $value) {
            if(empty($value)) {
                $this->error = "<div class=\"alert alert-danger\" role=\"alert\"> Veuillez completer le champ {$key}!</div>";
                return $this->error;
            }
        }
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) { // E-mail address validation
            $this->error = '<div class="alert alert-danger" role="alert">Veuillez saisir une adresse e-mail valide !</div>';
            return $this->error;
        }

    }    
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function sendMessage() 
    {
            
        $subject =  "Nouveau Message";
        $receiver = 'Vincent.gabrych@gmail.com';
        $content = '<html><head><title>Formulaire de Contact</title></head><body>';
        $content .= '<p>' .'Formulaire de contact' .'<p>';
        $content .= '<p>' .$this->message.'<p>';
        $content .= '-------------------' .'<br>';
        $content .= 'De: ' .$this->name. ' (' .$this->email.')';
        $content .= ' Recu le: ' .$this->received;        
        $content .= '</body></html>';
        $header = "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html; charset=UTF-8\r\n";
        $header .= 'From: Vincent.gabrych@gmail.com' . "\r\n" . 'Reply-To: Vincent.gabrych@gmail.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        mail($receiver,$subject, $content, $header);
        $this->success = '<div class="alert alert-success" role="alert"><h4>Votre message à été envoyé !!</h4></div>'; 
        return $this->success;
        
       
    }
 
}
