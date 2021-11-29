<?php

class MessageModel 
{
    
    public $msg_id = null;
    public $name = null;
    public $email = null;
    public $message = null;
    public $received = null;
    public $stat = null;
        
    public function getMsgId() {
        return $this->msg_id;
    }
    public function getName() {
        return $this->name;
    }
    public function getEmail() {
        return $this->email;
    }
        public function getMessage() {
        return $this->message;
    }
    public function getReceived() {
        return $this->received;
    }
    public function getStat() {
        return $this->stat;
    }
    public function setName($name) {
        $this->name = $name;
        return $this->name;
    }
    public function setEmail($email) {
        $this->email = $email;
        return $this->email;
    }
    public function setMessage($message) {
        $this->message = $message;
        return $this->message;
    }
    public function setReceived() {
        $this->received = date('Y-m-d H:i:s');
        return $this->received;
    }    
    
}
