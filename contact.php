<?php
class Contact {
    
    private $_mode;
    private $_message;
    
    public function __construct($data = array()) {
        
        $this->_mode = '_'. $data['mode'];
        $this->_message = $data['message'];
       
    }
    
    public function send() {
        
        if(method_exists($this, $this->_mode)) {
            $this->{$this->_mode}($this->_message);
        }
        
    }
    
    private function _tweet($message = '') {
        
        $url = 'http://twitter.com/home?status=@jklmnop%20'. $message;
        $this->_redirect($url);  
        
    }

    private function _email($message = '') {
        
        if(!$message) {
            $this->_redirect('mailto:spaceyraygun@gmail.com');
            return false;
        }
        
        
        $to = 'spaceyraygun@gmail.com';
        $headers = 'From: Anon<spaceyraygun+anon@gmail.com>\r\n';
        $subject = 'Contact from website';

        $message = str_replace("\n.", "\n..", $message);

        mail($to, $subject, $message, $headers);

        $url = $_SERVER['HTTP_REFERER'] . '#thanks';
        $this->_redirect($url);
        
    }

    private function _redirect($url = '') {
        
        if($url) {
            header('Location: '. $url);
        }
        
    }    
}