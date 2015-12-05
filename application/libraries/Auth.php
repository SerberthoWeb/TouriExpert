<?php
class Auth {
    public function __construct() {
        // get main CI object
        $this->CI = & get_instance();

        // Dependancies
        $this->CI->load->library('session');
        $this->CI->load->library('email');
        $this->CI->load->database();
        $this->CI->load->helper('url');
        $this->CI->load->helper('string');
        $this->CI->load->helper('email');
        $this->CI->load->helper('language');
    }
    
    public function is_loggedin(){
        return false;
    }
}
?>
