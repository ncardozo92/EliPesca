<?php

    class Admin extends CI_Controller{

        public function __construct(){

            parent:: __construct();

            $this->load->database();//para manejar bases de datos
            $this->load->library('session');//para manipular las sesiones
        }

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

               echo $usuarioEncontrado->row()->nombre;
                
                $this->session->set_userdata('usuario', $usuarioEncontrado->row()->nombre);
                $this->session->set_userdata('id', $usuarioEncontrado->row()->id_admin);
                $this->session->unset_userdata('authError');
                
                redirect('admin/productos');
            }
            else{

                $this->session->set_userdata(array('authError' => true));
                redirect('admin');
            }
        }

        private function verificar_sesion(){

            if($this->session->has_userdata('id') == false)
                redirect('admin');
        }
        
        public function productos(){

            $this->verificar_sesion();
            $this->load->view("administrador/productos-admin");
        }

        public function get_productos(){

            $query = "
            select p.id_producto id, p.nombre nombre, p.descripcion descripcion, c.nombre categoria, p.img imagen, p.precio precio
            from producto p inner join categoria c on p.id_categoria = c.id_categoria";

            $productos = $this->db->query($query);

            echo json_encode($productos->result());
            
        }


    }
?>