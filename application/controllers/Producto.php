<?php

    Class Producto extends CI_Controller{

        public function __construct(){

            parent:: __construct();

            $this->load->database();//para manejar bases de datos
            $this->load->library('session');//para manipular las sesiones
            $this->load->helper("file");

            date_default_timezone_set("America/Argentina/Buenos_Aires");
        }

        private $path_img_productos = 'img_productos/';

        public function catalogo($pagina = 1){

            $categoriaSeleccionada = $this->input->post('categoria-seleccionada');

            $cantidadPorPagina = 10;
            $esCategoriaValida = false;

            $categorias = $this->db->get('categoria')->result();
            /*
            foreach($categoriaGuardada as $categorias){

                if($categoriaSeleccionada == null || $categoriaSeleccionada == $categoriaGuardada){
                    $esCategoriaValida = true;
                    break;
                }
            }
            
            if($esCategoriaValida == false)
                redirect('producto/catalogo');
            */
            $this->db->select('p.id_producto id, p.nombre nombre, p.descripcion descripcion, p.img img,p.precio precio, c.nombre categoria');
            $this->db->from('producto p');
            $this->db->join('categoria c','c.id_categoria = p.id_categoria');

            

            if($categoriaSeleccionada != null)
                $this->db->where('c.id_categoria',$categoriaSeleccionada);
            
            $this->db->limit($cantidadPorPagina, ($pagina -1) * $cantidadPorPagina);//disponible la proxima version
            //1er parametro cant. de registros a obtener, 2do parametro numero de registro a partir del cual se tomaran los registros
            $productos = $this->db->get();

            $this->load->view("cliente/productos",array(
                'categorias' => $categorias,
                'categoriaSeleccionada' => $categoriaSeleccionada,
                'productos' => $productos->result(),
                'path_img' => $this->path_img_productos
            ));
        }

    }
?>