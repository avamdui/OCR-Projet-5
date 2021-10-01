<?php
namespace Controllers;

class Contact extends Controller {
    
    protected $modelName = "Contact";
    
    private $name;
    private $message;
    private $email;

    public final function getName(): string {return $this->name; }
    public final function getMessage(): string {return $this->message; }
    public final function getEmail(): string {return $this->email; }

    public final function setName(string $name) {
        if(mb_strlen($name) == 0)
            throw new Exception("Nom Obligatoire");
        $this->name = strtoupper($name);
    }

    public final function setMessage(string $message) {
        if(mb_strlen($message) == 0)
            throw new Exception("Message Obligatoire");
        $this->message = $message;
    }

    public final function setEmail(string $email) {
        if(mb_strlen($email) == 0)
            throw new Exception("email Obligatoire");
        if(! preg_match("/[a-zA-Z0-9]([_.+-]?[a-zA-Z0-9])+@[a-zA-Z0-9]([_.+-]?[a-zA-Z0-9])+\.[a-z]{2,30}/i", $email))
            throw new Exception("email [$email] invalide");
        $this->email = $email;
    }

    public function __construct() {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
        
        $this->setName($name);
        $this->setMessage($message);
        $this->setEmail($email);
 }

  public function sendMail() {
        
        $subject =  "Nouveau Message";
	    $receiver = 'Vincent.gabrych@gmail.com';
        $content = '<html><head><title>Formulaire de Contact</title></head><body>';
        $content .= '<p>' .$this->getMessage().'<p>';
        $content .= '-------------------' .'<br>';
        $content .= 'De: ' .$this->getName(). ' (' .$this->getEmail().')';
        $content .= '<p>' .'Formulaire de contact' .'<p>';
        $content .= '</body></html>';
        $header = "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html; charset=UTF-8\r\n";
        $header .= 'From: Vincent.gabrych@gmail.com' . "\r\n" . 'Reply-To: Vincent.gabrych@gmail.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

        //die("formulaire incorrect: name=".$this->getName().", message=".$this->getMessage().", email=".$this->getEmail());
        
        mail($receiver,$subject, $content, $header); // Fonction principale qui envoi l'email
        \Http::redirect('index.php');
	}
    
}
