<?php

    class Admin extends CI_Controller{

        public function __construct(){

            parent:: __construct();

            $this->load->database();//para manejar bases de datos
            $this->load->library('session');//para manipular las sesiones
            $this->load->helper("file");

            date_default_timezone_set("America/Argentina/Buenos_Aires");
        }

        private $path_img_productos = 'img_productos/';

        public function index(){

            $this->load->view("administrador/login-admin");
        }
        public function cerrar_sesion(){

            $this->session->unset_userdata(array('id','usuario'));
            redirect('admin');
        }

        //metodos para formularios
        public function autentificar_admin(){

            $usuario = $this->input->post('usuario');
            $clave = $this->input->post('password');

            $this->db->select('*');
            $this->db->from('administrador');
            $this->db->where(array('nombre='=> $usuario, 'clave=' => md5($clave)));
            $usuarioEncontrado = $this->db->get();

           if(count($usuarioEncontrado->result()) ==1){

                $this->session->set_userdata('usuario', $usuarioEncontrado->row()->nombre);
                $this->session->set_userdata('id', $usuarioEncontrado->row()->id_admin);
                $this->session->unset_userdata('authError');
                
                redirect('admin/productos');
            }
            else{

                $this->session->set_userdata(array('authError' => true));
                $this->session->mark_as_flash("authError");
                redirect('admin');
            }
        }
        
        public function productos(){

            $filtro = $this->input->post("filtro");
            $this->verificar_sesion();

            $this->db->select("p.id_producto id, p.nombre nombre, p.descripcion descripcion, c.nombre categoria, p.img imagen, p.precio precio")
                    ->from("producto p")
                    ->join("categoria c","c.id_categoria = p.id_categoria","INNER");

            if($filtro != null)
                $this->db->like("p.nombre", $filtro );
            
            $productos = $this->db->get()->result();

            //logica para el filtrado por nombre
            $this->load->view("administrador/productos-admin",
                array("productos"=>$productos,
                        "path_img_productos"=>$this->path_img_productos,
                        "filtro" => $filtro));
        }

        public function alta_producto(){

            $this->verificar_sesion();

            $categorias = $this->db->query("select * from categoria");

            $this->load->view('administrador/alta-producto',array('categorias' => $categorias -> result()));
        }

        public function editar_producto($id = null){
            
            $this->verificar_sesion();
                        
                $categorias = $this->db->query("select * from categoria");
            
                $this->db->where(array('id_producto=' => $id));
                $producto = $this->db->get('producto');
            
                $this->load->view('administrador/editar-producto',array(
                'producto' => $producto->row_array(),
                'path' => base_url() . $this->path_img_productos, //path para la imagen
                'categorias' => $categorias->result_array()
                ));
        }

        //ajuste de valores para carga de archivos

        private function subir_foto(){

            
        }

        
        //
        public function categorias(){

            $this->verificar_sesion();

             $categorias = $this->db->get("categoria")->result();

            $this->load->view('administrador/categorias', array( "categorias" => $categorias));
        }

        public function datos_admin(){

            $this->verificar_sesion();
            $this->load->view('administrador/cambiar-datos');
        }
        //-
        public function update_datos(){

            $this->verificar_sesion();

            $this->db->where('id_admin',$this->session->userdata('id'));
            $this->db->update('administrador',array(
                'nombre' => $this->input->post('usuario'),
                'clave' => md5($this->input->post('password2'))
            ));

            $this->cerrar_sesion();

        }
    }
?>