<?php

class Categoria extends CI_Controller{

    public function __construct(){

            parent:: __construct();

            $this->load->database();//para manejar bases de datos
        }

    public function guardar_categoria(){

            $categoria = $this->input->post("categoria");

            $this->db->insert('categoria',array('nombre' => $categoria)); //inserta un dato en la tabla, tomar nota de esto

            //$categoriaNueva = $this->db->select("*")->from("categoria")->order_by("id_categoria","DESC")->limit(1)->get()->result();
            
            $this->get_categorias();
        }

        public function eliminar_categoria(){

            $this->db->delete('categoria',array('id_categoria' => $this->input->post("idCategoria"))); //elimina datos, tomar nota
        }

        public function get_categorias(){

            $categorias = $this->db->query("select id_categoria id, nombre nombre from categoria");
           
            echo json_encode($categorias->result());
        }
}

?>