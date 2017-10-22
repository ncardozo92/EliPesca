<?php

    class Home extends CI_Controller{

        public function index(){

            $this->load->view("cliente/home");
        }

        public function contacto(){
            
            $this->load->view("cliente/contacto");
        }

        
    }
?>