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

            $this->verificar_sesion();

            $query = "
            select p.id_producto id, p.nombre nombre, p.descripcion descripcion, c.nombre categoria, p.img imagen, p.precio precio
            from producto p inner join categoria c on p.id_categoria = c.id_categoria";

            $productos = $this->db->query($query);

            echo json_encode($productos->result());
            
        }

        public function alta_producto(){

            $this->verificar_sesion();

            $categorias = $this->db->query("select * from categoria");

            $this->load->view('administrador/alta-producto',array('categorias' => $categorias -> result()));
        }

        public function agregar_producto(){

            $this->verificar_sesion();

            date_default_timezone_set("America/Argentina/Buenos_Aires");
            
            $config['upload_path'] = './img_productos/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_width'] = 0;
            $config['file_name'] = date("dmYHis",time());
            //esta configuracion es la que yo le indico, hay muchas mas opciones
            $this->load->library('upload', $config); //se carga la libreria que corresponde con la configuracion
           
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

        public function actualizar_producto(){

             echo 'en desarrollo';
        }

        public function eliminar_producto(){

             echo 'en desarrollo';
        }

        public function categorias(){

            $this->verificar_sesion();
            $this->load->view('administrador/categorias');
        }

        public function guardar_categoria(){

            $this->verificar_sesion();

            $datos = json_decode(file_get_contents('php://input'));

            $this->db->insert('categoria',array('nombre' => $datos->nombre)); //inserta un dato en la tabla, tomar nota de esto
        }

        public function eliminar_categoria(){

            $this->verificar_sesion();

            $datos = json_decode(file_get_contents("php://input"));

            $this->db->delete('categoria',array('id_categoria' => $datos->id)); //elimina datos, tomar nota
        }

        public function get_categorias(){

            $this->verificar_sesion();

            $categorias = $this->db->query("select id_categoria id, nombre nombre from categoria");
           
            echo json_encode($categorias->result());
        }

        public function datos_admin(){

            $this->verificar_sesion();
            $this->load->view('administrador/cambiar-datos');
        }

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