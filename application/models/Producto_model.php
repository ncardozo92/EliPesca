<?php

Class Producto_model extends CI_Model{

    //public $id_producto = null;
    public $id_categoria = null;
    public $descripcion = null;
    public $img = null;
    public $precio = null;
    public $nombre = null;

    public function __construct($id){

        Parent:: __construct();

        if(isset($id)){

            $resultado = $this->db->get_where('producto',array('id' => $id));

            //$this->id_producto = $resultado->row()->id_producto;
            $this->id_categoria = $resultado->row()->id_categoria;
            $this->descripcion = $resultado->row()->descripcion;
            $this->img = $resultado->row()->img;
            $this->precio = $resultado->row()->precio;
            $this->nombre = $resultado->row()->nombre;
        }
    }
}
?>