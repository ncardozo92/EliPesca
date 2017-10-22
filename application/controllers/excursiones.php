<?php

    class Excursiones extends CI_Controller{

        public function __construct(){

            parent:: __construct();

            $this->load->database();
            $this->load->library("form_validation");
            $this->load->library('session');
        }

        public function index(){
            
            $this->load->view("cliente/excursiones",array( "excursiones" => $this->get_excursiones() ));
        }
        
        private function get_excursiones(){
        
            return $this->db->get("excursion")
                    //->order_by->('fecha DESC')
            ->result();
        }

        public function listado_excursiones(){
            
            $this->load->view("administrador/excursiones",array( "excursiones" => $this->get_excursiones() ));
        }

        public function nueva_excursion(){

            $this->form_validation->set_rules("fecha","fecha","required");
            $this->form_validation->set_rules("destino","destino","required|max_length[25]");
            $this->form_validation->set_rules("descripcion","descripcion","max_length[250]");

            if($this->form_validation->run() == false){

                $this->session->set_flashdata('validacion_excursion', false);
            }
            else{
                
                $this->db->insert("excursion",array(
                    "fecha" => $this->input->post("fecha"),
                    "destino" => $this->input->post("destino"),
                    "descripcion" => $this->input->post("descripcion")
                ));
            }

            redirect("admin/excursiones");
        }

        public function eliminar($fecha){

            $this->db->where("fecha", $fecha)->delete("excursion");
            redirect("excursiones/listado_excursiones");
        }
    }
?>