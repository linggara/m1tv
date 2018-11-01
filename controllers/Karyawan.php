<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');        
	   $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','karyawan/tbl_karyawan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Karyawan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_karyawan' => $row->id_karyawan,
		'nik_karyawan' => $row->nik_karyawan,
		'nama_lengkap' => $row->nama_lengkap,
		'jabatan' => $row->jabatan,
		'department' => $row->department,
		'status' => $row->status,
	    );
            $this->template->load('template','karyawan/tbl_karyawan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('karyawan/create_action'),
	    'id_karyawan' => set_value('id_karyawan'),
	    'nik_karyawan' => set_value('nik_karyawan',noNik()),
	    'nama_lengkap' => set_value('nama_lengkap'),
	    'jabatan' => set_value('jabatan'),
	    'department' => set_value('department'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','karyawan/tbl_karyawan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik_karyawan' => $this->input->post('nik_karyawan',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'department' => $this->input->post('department',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Karyawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('karyawan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('karyawan/update_action'),
		'id_karyawan' => set_value('id_karyawan', $row->id_karyawan),
		'nik_karyawan' => set_value('nik_karyawan', $row->nik_karyawan),
		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'department' => set_value('department', $row->department),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','karyawan/tbl_karyawan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules_updates();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_karyawan', TRUE));
        } else {
            $data = array(
		'nik_karyawan' => $this->input->post('nik_karyawan',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'department' => $this->input->post('department',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Karyawan_model->update($this->input->post('id_karyawan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('karyawan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $this->Karyawan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik_karyawan', 'nik karyawan', 'callback_nik_check');
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('department', 'department', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_updates() 
    {
    // $this->form_validation->set_rules('nik_karyawan', 'nik karyawan', 'callback_nik_check');
    $this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
    $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
    $this->form_validation->set_rules('department', 'department', 'trim|required');
    $this->form_validation->set_rules('status', 'status', 'trim|required');

    $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function nik_check($nik_karyawan) {
        $jum = strlen($nik_karyawan);
        $query = "SELECT * FROM `tbl_karyawan` where nik_karyawan='$nik_karyawan'";
        $hasil = $this->db->query($query)->num_rows();
        if ($jum !==4){
            $this->form_validation->set_message('Nik sudah ada yang pakai');
            return FALSE;
        } else if ($hasil === 1){
            $this->form_validation->set_message('Nik sudah ada yang pakai');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_karyawan.xls";
        $judul = "tbl_karyawan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nik Karyawan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Department");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Karyawan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nik_karyawan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nama_lengkap);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jabatan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->department);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-21 16:37:23 */
/* http://harviacode.com */