<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('Report_model');
    }

    // index view report
    public function index()
    {
        $data['title'] = 'Report Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['reports'] = $this->db->order_by('date_reported');
        $data['reports'] = $this->Report_model->getAll();
            
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('report/index', $data);
        $this->load->view('templates/admin_footer');
    }

    // add report
    public function addreport()
    {
        $report = $this->Report_model;

        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status is required!'
        ]);

        $this->form_validation->set_rules('uqid', 'UQID', 'required', [
            'required' => 'UQID is required!'
        ]);
        $this->form_validation->set_rules('accused_name', 'Accused Name', 'required', [
            'required' => 'Accused Name is required!'
        ]);
        $this->form_validation->set_rules('address', 'Address', 'required', [
            'required' => 'Address is required!'
        ]);
        $this->form_validation->set_rules('age', 'Age', 'required|numeric', [
            'required' => 'Age is required!'
        ]);
        $this->form_validation->set_rules('contactnum', 'Contact Number', 'required|numeric', [
            'required' => 'Contact Number is required!'
        ]);
        $this->form_validation->set_rules('title', 'Report Title', 'required', [
            'required' => 'Report title is required!'
        ]);
        $this->form_validation->set_rules('description', 'Report Description', 'required', [
            'required' => 'Report description is required!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Report';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['notif'] = $this->db->get_where('user_report', ['is_read' => 0])->row_array();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('report/add_report');
            $this->load->view('templates/admin_footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Failed to report!</div>');
        } else {
            $report->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Reported successfully!</div>');
            redirect('user');
        }
    }

    // view detail report
    public function detail($id)
    {
            
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'Status Report', 'required', [
            'required' => 'Status is required!'
        ]);
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Report Detail Information';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['report'] = $this->db->get_where('user_report', ['id' => $id])->row_array();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('report/detail', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'status' => $this->input->post('status'),
                'name' => $this->input->post('name'),
                'accused_name' => $this->input->post('accused_name'),
                'uqid' => $this->input->post('uqid'),
                'address' => $this->input->post('address'),
                'age' => $this->input->post('age'),
                'contactnum' => $this->input->post('contactnum'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'type' => $this->input->post('type'),           
            ];
                
            $this->db->update('user_report', $data, ['id' => $data['id']]);

            redirect('report/user_report_detail');
        }
        
    }

        // edit member
        public function update_detail($id)
        {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('status', 'Status Report', 'required', [
                'required' => 'Status is required!'
            ]);
            
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Report Update';
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $data['ureport'] = $this->db->get_where('user_report', ['id' => $id])->row_array();
                $this->load->view('templates/admin_header', $data);
                $this->load->view('templates/admin_sidebar');
                $this->load->view('templates/admin_topbar', $data);
                $this->load->view('report/update_detail', $data);
                $this->load->view('templates/admin_footer');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Failed to Update status report!</div>');
            } else {
                $data = [
                    'id' => $this->input->post('id'),
                    'status' => $this->input->post('status'),
                    'name' => $this->input->post('name'),
                    'accused_name' => $this->input->post('accused_name'),
                    'uqid' => $this->input->post('uqid'),
                    'address' => $this->input->post('address'),
                    'age' => $this->input->post('age'),
                    'contactnum' => $this->input->post('contactnum'),
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'type' => $this->input->post('type'),           
                ];
                    
                $this->db->update('user_report', $data, ['id' => $data['id']]);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Report updated successfully!</div>');
                redirect('report');
            }
        }
    
    // view detail report history

        public function user_report_detail()
        {
            $data['title'] = 'History';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['userid'] = $this->db->get_where('user', ['id' => $this->session->userdata('email')])->row_array();
            $data['reports2'] = $this->db->order_by('date_reported', 'DESC');
            $data['reports2'] = $this->Report_model->getAll();
                
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('report/user_report_detail', $data);
            $this->load->view('templates/admin_footer');
        }

/*
    // cancel own report
    public function cancelownreport($id = null)
    {
        $data = [
            'status' => $this->input->post('status'),         
        ];
            
        $this->db->update('user_report', $data, ['id' => $data['id']]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Report updated successfully!</div>');
        redirect('report/user_report_detail');
    }
*/

    // delete report
    public function deletereport($id = null)
    {
        if (!isset($id)) show_404();

        $report = $this->Report_model;
        if ($report->delete($id)) {
            redirect('report');
        }
    }

}