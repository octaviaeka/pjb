<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management_controller extends CI_Controller {

    public function admin_utama(){
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('main/index');

    }

    public function admin_ebt(){
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('main/index');
    }

    public function view_user(){
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $role_view = $this->input->post('role_view');

        // $id= $this->session->userdata('id');
        // $this->load->model('model_user', 'role_view');
        // $data['RoleView']  = $this->role_view->getRole($id);

        // $data = [
        //     'role_view' => $role_view
        // ];

        // $result = $this->db->get_where('user', $data);

        // if($result->num_rows() < 1){
        //     $this->load->view('view_user/index');
        // }else{
        //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        //     // $this->load->view('main/index');
        //     echo 'hai gaes';
        // }
        $this->load->view('view_user/index');
    }

    public function admin_it(){
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin_it/index');
    }
}