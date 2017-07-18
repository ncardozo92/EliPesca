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

            $categoriaSeleccionada = $this->input->post('categoria-seleccionada');//cambiar y usar un segmento de uri

            $cantidadPorPagina = 2;
            $esCategoriaValida = false; //validar la categoria ingresada

            $categorias = $this->db->get('categoria')->result();
            
            //$this->db->start_cache();

            $this->db->select('p.id_producto id, p.nombre nombre, p.descripcion descripcion, p.img img,p.precio precio, c.nombre categoria');
            $this->db->from('producto p');
            $this->db->join('categoria c','c.id_categoria = p.id_categoria');

            if($categoriaSeleccionada != null)
                $this->db->where('c.id_categoria',$categoriaSeleccionada);

            //$this->db->stop_cache();
            //$this->db->get();
            //$totalDeProductos = $this->db->count_all_results();

            /*
            if($pagina == 1)
                $this->db->limit($cantidadPorPagina, ($pagina - 1) * $cantidadPorPagina);
            else
                $this->db->limit($cantidadPorPagina, ($pagina) * $cantidadPorPagina);
            //1er parametro cant. de registros a obtener, 2do parametro numero de registro a partir del cual se tomaran los registros
            */
            $productos = $this->db->get();
            /*
            $this->load->library('pagination');

			$config['base_url'] = base_url()."productos";
			$config['total_rows'] = $totalDeProductos;
			$config['per_page'] = 2;
			$config['uri_segment'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['next_link'] = '&gt';
            $config['prev_link'] = '&lt';
            

            $this->pagination->initialize($config);
            
			$paginado = $this->pagination->create_links();
            */
            $this->load->view("cliente/productos",array(
                'categorias' => $categorias,
                'categoriaSeleccionada' => $categoriaSeleccionada,
                'productos' => $productos->result(),
                'path_img' => $this->path_img_productos,
                //'paginado' => $paginado
            ));
        }

        public function get_data_producto(){

            $id = $this->input->post('dataProducto');

            $this->db->where('id_producto' , $id);
            echo json_encode($this->db->get('producto')->row());
            
        }

    }
?>