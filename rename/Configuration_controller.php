<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration_controller extends CI_Controller {
	
	public function view_device()
	{
		$data['title'] = 'Equipment';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $data['equipment'] = $this->db->get('equipment')->result_array();
	}

	public function add_device(){
        $data['title'] = 'Equipment';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $data['equipment'] = $this->db->get('equipment')->result_array();

        $this->form_validation->set_rules('description', 'Description', 'required');

        if($this->form_validation->run() == false ){
            $this->load->view('utama/equipment', $data);
        }else{
            $this->db->insert('equipment', [
                'site_id' => $this->input->post('site_id'),
                'plant_id' => $this->input->post('plant_id'),
                'tag_name' => $this->input->post('tag_name'),
                'description' => $this->input->post('description'),
                'lower_range' => $this->input->post('lower_range'),
                'upper_range' => $this->input->post('upper_range'),
                'unit' => $this->input->post('unit'),
                'posisi_kolom' => $this->input->post('posisi_kolom'),
                'date_created' => $this->input->post('date_created'),
                ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Equipment Added!</div>');
            redirect('utama/equipment');
        }
    }
        
    public function edit_device($id){
        $this->load->model('Configuration_model');
        $data['title'] = 'edit Equipment EBT';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $where = array('id'=>$id);
        $data['edit']=$this->Configuration_model->edit_device_m($where,'equipment')->result();
        $this->load->view('utama/editequipment', $data);
    }

    public function updateequipment(){
        $data['title'] = 'edit Equipment EBT';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['equipment'] = $this->db->get('equipment')->result_array();

        $this->form_validation->set_rules('description', 'Description', 'required');
        if($this->form_validation->run() == true ){
            $id = $this->input->post('id');
            $site_id = $this->input->post('site_id');
            $plant_id = $this->input->post('plant_id');
            $tag_name = $this->input->post('tag_name');
            $description = $this->input->post('description');
            $lower_range = $this->input->post('lower_range');
            $upper_range = $this->input->post('upper_range');
            $unit = $this->input->post('unit');
            $posisi_kolom = $this->input->post('posisi_kolom');
            $date_created = $this->input->post('date_modified');
            $date_modified = $this->input->post('date_modified');

            $this->db->set('site_id', $site_id);
            $this->db->set('plant_id', $plant_id);
            $this->db->set('tag_name', $tag_name);
            $this->db->set('description', $description);
            $this->db->set('lower_range', $lower_range);
            $this->db->set('upper_range', $upper_range);
            $this->db->set('unit', $unit);
            $this->db->set('posisi_kolom', $posisi_kolom);
            $this->db->set('date_created', $date_created);
            $this->db->set('date_modified', $date_modified);

            $this->db->where('id', $id);
            $this->db->where('date_created', $date_created);
            $this->db->update('equipment');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Equipment has been changed</div>');
            redirect('utama/equipment');
        }
    }
        
    public function delete_device($id){
        $this->load->model('Configuration_model');
        $this->Configuration_model->deletedevice_m($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Equipment has been deleted</div>');
        redirect('utama/equipment');
    }

    public function view_formula()
	{
		$data['title'] = 'Formula Perhitungan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $data['equipment'] = $this->db->get('equipment')->result_array();
	}

	public function add_formula(){
        $data['title'] = 'Formula Perhitungan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $data['formula'] = $this->db->get('formula_perhitungan')->result_array();

        $this->form_validation->set_rules('nama_perhitungan', 'Nama_perhitungan', 'required');

        if($this->form_validation->run() == false ){
            $this->load->view('utama/formula', $data);
        }else{
            $this->db->insert('formula_perhitungan', [
                'id_perhitungan' => $this->input->post('id_perhitungan'),
                'plant_id' => $this->input->post('plant_id'),
                'jenis_perhitungan' => $this->input->post('jenis_perhitungan'),
                'nama_perhitungan' => $this->input->post('nama_perhitungan'),
                'query_perhitungan' => $this->input->post('query_perhitungan')
                ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Formula Added!</div>');
            redirect('utama/formula');
        }
    }
        
    public function edit_formula($id){
        $this->load->model('Configuration_model');
        $data['title'] = 'edit Formula Perhitungan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $where = array('id_perhitungan'=>$id);
        $data['edit']=$this->Configuration_model->edit_formula_m($where,'formula_perhitungan')->result();
        $this->load->view('utama/editformula', $data);
    }

    public function updateformula(){
        $data['title'] = 'edit Formula Perhitungan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['formula'] = $this->db->get('formula_perhitungan')->result_array();

        $this->form_validation->set_rules('id_perhitungan', 'Id_perhitungan', 'required');
        if($this->form_validation->run() == true ){
            $id = $this->input->post('id_perhitungan');
            $plant_id = $this->input->post('plant_id');
            $jenis_perhitungan = $this->input->post('jenis_perhitungan');
            $nama_perhitungan = $this->input->post('nama_perhitungan');
            $query_perhitungan = $this->input->post('query_perhitungan');
            
            $this->db->set('plant_id', $plant_id);
            $this->db->set('jenis_perhitungan', $jenis_perhitungan);
            $this->db->set('nama_perhitungan', $nama_perhitungan);
            $this->db->set('query_perhitungan', $query_perhitungan);
    
            $this->db->where('id_perhitungan', $id);
            $this->db->update('formula_perhitungan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Formula has been changed</div>');
            redirect('utama/formula');
        }
    }
        
    public function delete_formula($id){
        $this->load->model('Configuration_model');
        $this->model_user->delete_formula_m($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Equipment has been deleted</div>');
        redirect('utama/formula');
    }
}
