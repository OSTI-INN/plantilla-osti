<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class S extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function index(){
		redirect(site_url().'/modulo_gtk/ticket_c','location');
    }  
}
