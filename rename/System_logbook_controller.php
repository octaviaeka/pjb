<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_logbook_controller extends CI_Controller {
	
	public function view_system_logbook()
	{
		$data['title'] = 'System Logbook';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $data['syslog'] = $this->db->get('system_logbook')->result_array();
	}

	public function add_logbook(){
        $data['title'] = 'System Logbook';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $data['syslog'] = $this->db->get('system_logbook')->result_array();

        $this->form_validation->set_rules('description', 'Description', 'required');

        if($this->form_validation->run() == false ){
            $this->load->view('utama/system_logbook', $data);
        }else{
            $this->db->insert('system_logbook', [
                'type_alarm' => $this->input->post('type_alarm'),
                'time' => $this->input->post('time'),
                'equipment' => $this->input->post('equipment'),
                'description' => $this->input->post('description'),
                'sr' => $this->input->post('sr'),
                'wo' => $this->input->post('wo'),
                'date_created' => $this->input->post('date_created'),
                ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New System Logbook Added!</div>');
            redirect('utama/syslog');
        }
    }

    public function edit_logbook($id){
        $this->load->model('model_user');
        $data['title'] = 'edit System Logbook';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $where = array('id'=>$id);
        $data['edit']=$this->model_user->edit_master($where,'system_logbook')->result();
        $this->load->view('utama/editsyslog',$data);
    }

    public function updateSyslog(){
        $data['title'] = 'edit System Logbook';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['syslog'] = $this->db->get('system_logbook')->result_array();

        $this->form_validation->set_rules('description', 'Description', 'required');
        if($this->form_validation->run() == true ){
            $id = $this->input->post('id');
            $type_alarm = $this->input->post('type_alarm');
            $time = $this->input->post('time');
            $equipment = $this->input->post('equipment');
            $description = $this->input->post('description');
            $sr = $this->input->post('sr');
            $wo = $this->input->post('wo');
            $date_created = $this->input->post('date_created');
            $date_modified = $this->input->post('date_modified');

            $this->db->set('type_alarm', $type_alarm);
            $this->db->set('time', $time);
            $this->db->set('equipment', $equipment);
            $this->db->set('description', $description);
            $this->db->set('sr', $sr);
            $this->db->set('wo', $wo);
            $this->db->set('date_modified', $date_modified);

            $this->db->where('id', $id);
            $this->db->where('date_created', $date_created);
            $this->db->update('system_logbook');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">System Logbook has been changed</div>');
            redirect('utama/syslog');
        }
    }

    public function delete_logbook($id){
        $this->load->model('model_user');
        $this->model_user->deleteSyslog($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">System Logbook has been deleted</div>');
        redirect('utama/syslog');
    }
}
