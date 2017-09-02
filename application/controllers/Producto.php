<?php

    Class Producto extends CI_Controller{

        public function __construct(){

            parent:: __construct();

            $this->load->database();//para manejar bases de datos
            $this->load->library('session');//para manipular las sesiones
            $this->load->helper("file");
            $this->load->library('form_validation');//validacion de formularios

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

        //funciones de admin
        private function validar_form(){
            
                        $this->form_validation->set_rules(
                            array(
                                array(
                                    "field" => "nombre",
                                    "label" => "nombre",
                                    "rules" => "required"
                                ),
                                array(
                                    "field" => "descripcion",
                                    "label" => "descripcion",
                                    "rules" => "required"
                                ),
                                array(
                                    "field" => "categoria",
                                    "label" => "categoria",
                                    "rules" => "required"
                                ),
                                array(
                                    "field" => "precio",
                                    "label" => "precio",
                                    "rules" => "required|numeric"
                                )/*,
                                array(
                                    "field" => "img_actual",
                                    "name" => "img_actual",
                                    "rules" => "required"
                                )*/
                            )
                        );
            
            $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
                            
            return($this->form_validation->run());
        }
                        //
        public function agregar_producto(){
                
            $this->verificar_sesion();
                            
                //configuracion de la carga de la imagen
            $config['upload_path'] = './' . $this->path_img_productos;
            $config['allowed_types'] = 'jpg|png';
            $config['max_width'] = 0;
            $config['file_name'] = date("dmYHis",time());
                            //esta configuracion es la que yo le indico, hay muchas mas opciones
            $this->load->library('upload', $config); //se carga la libreria que corresponde con la configuracion
                            
            if($this->validar_form()){
                if($this->upload->do_upload('imagen'))
                    $nombreArchivo = $config['file_name'] . $this->upload->data('file_ext');
                else
                    $nombreArchivo = null;
                                
                    $this->db->insert('producto', array(
                                    'nombre' => $this->input->post('nombre'),
                                    'descripcion' => $this->input->post('descripcion'),
                                    'id_categoria' => $this->input->post('categoria'),
                                    'precio' => $this->input->post('precio'),
                                    'img' => $nombreArchivo
                                ));
                
                    redirect('admin/productos');
            }
            else echo "fallo de validacion";
                            
        }
                
                        public function actualizar_producto($id){
                
                            $this->verificar_sesion();
                
                            $carpeta_imagenes = './' . $this->path_img_productos;
                
                            if($id == null)
                                redirect('productos');
                            
                            if($this->validar_form()){
                                $config['upload_path'] = './' . $this->path_img_productos;
                                $config['allowed_types'] = 'jpg|png';
                                $config['max_width'] = 0;
                                if($this->input->post('img_actual') == null)
                                    $config['file_name'] = date("dmYHis",time());
                                else
                                    $config['file_name'] = $this->input->post('img_actual');
                                
                                $config['overwrite'] = true;
                                    //esta configuracion es la que yo le indico, hay muchas mas opciones
                                $this->load->library('upload', $config); //se carga la libreria que corresponde con la configuracion
                                $this->upload->do_upload('imagen');
                
                                $this->db->where(array('id_producto' => $id));
                                $this->db->update("producto",array(
                                    'nombre'=> $this->input->post('nombre'),
                                    'descripcion'=> $this->input->post('descripcion'),
                                    'id_categoria'=> $this->input->post('categoria'),
                                    'img'=> $config['file_name'] . $this->upload->data('file_ext'),
                                    'precio'=> $this->input->post('precio')
                                ));
                                
                                redirect('admin/productos');
                            }
                            else echo "fallo de validacion";
                        }
                        
                        public function eliminar_producto($id){
                
                            $this->verificar_sesion();
                
                            $this->db->where(array('id_producto' => $id));
                            $producto = $this->db->get('producto');
                
                            unlink('./' . $this->path_img_productos . $producto->row()->img);
                
                            $this->db->where(array('id_producto' => $id));
                            $this->db->delete("producto");
                
                            redirect('admin/productos');
                        }

    }
?>