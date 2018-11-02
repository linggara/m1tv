<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengembalian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pengembalian_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','pengembalian/tbl_pengembalian_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pengembalian_model->json();
    }

    public function kembali(){
        $uriString = $this->uri->uri_string();
        $noPinjam = substr($uriString, 21);
        $query = "SELECT * FROM `tbl_barang` where tag_form_pinjam='$noPinjam'";
        $query2 = "SELECT barcode_barang_detail FROM `tbl_barang` where tag_form_pinjam='$noPinjam'";
        $hasil = $this->db->query($query)->result();
        $jumlah = $this->db->query($query)->num_rows();
        // $barcode = $this->db->query($query2)->row_array();
        $this->db->select('tbl_karyawan.nik_karyawan, tbl_karyawan.nama_lengkap,tbl_peminjaman.nama_program')
         ->from('tbl_peminjaman')
         ->join('tbl_karyawan', 'tbl_peminjaman.user_peminjaman = tbl_karyawan.id_karyawan');
        $result = $this->db->get()->row_array();
        $nik = $result['nik_karyawan'];
        $nama = $result['nama_lengkap'];
        $program = $result['nama_program'];
        $data = array (
            'db' => $hasil,
            'no_form' => $noPinjam,
            'nik' => $nik,
            'nama' => $nama,
            'program' => $program,
            'button' => 'save',
            'jumlah' => $jumlah
            // 'barcode_detail' => $barcode['barcode_barang_detail']
        );
        $this->template->load('template','pengembalian/tbl_pengembalian_form',$data);
    }

    public function read($id) 
    {
        $row = $this->Pengembalian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pengembalian' => $row->id_pengembalian,
		'no_form_pengembalian' => $row->no_form_pengembalian,
		'nama_barang_balik' => $row->nama_barang_balik,
		'kondisi_barang' => $row->kondisi_barang,
		'keterangan_barang' => $row->keterangan_barang,
		'tanggal_balik' => $row->tanggal_balik,
	    );
            $this->template->load('template','pengembalian/tbl_pengembalian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengembalian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengembalian/create_action'),
	    'id_pengembalian' => set_value('id_pengembalian'),
	    'no_form_pengembalian' => set_value('no_form_pengembalian'),
	    'nama_barang_balik' => set_value('nama_barang_balik'),
	    'kondisi_barang' => set_value('kondisi_barang'),
	    'keterangan_barang' => set_value('keterangan_barang'),
	    'tanggal_balik' => set_value('tanggal_balik'),
	);
        $this->template->load('template','pengembalian/tbl_pengembalian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_form_pengembalian' => $this->input->post('no_form_pengembalian',TRUE),
		'nama_barang_balik' => $this->input->post('nama_barang_balik',TRUE),
		'kondisi_barang' => $this->input->post('kondisi_barang',TRUE),
		'keterangan_barang' => $this->input->post('keterangan_barang',TRUE),
		'tanggal_balik' => $this->input->post('tanggal_balik',TRUE),
	    );

            $this->Pengembalian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pengembalian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pengembalian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengembalian/update_action'),
		'id_pengembalian' => set_value('id_pengembalian', $row->id_pengembalian),
		'no_form_pengembalian' => set_value('no_form_pengembalian', $row->no_form_pengembalian),
		'nama_barang_balik' => set_value('nama_barang_balik', $row->nama_barang_balik),
		'kondisi_barang' => set_value('kondisi_barang', $row->kondisi_barang),
		'keterangan_barang' => set_value('keterangan_barang', $row->keterangan_barang),
		'tanggal_balik' => set_value('tanggal_balik', $row->tanggal_balik),
	    );
            $this->template->load('template','pengembalian/tbl_pengembalian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengembalian'));
        }
    }

    public function testlagi(){
        $query = "UPDATE tbl_barang SET tag_form_pinjam = 'AVAILABLE' WHERE barcode_barang_detail = '23'";
        $hasil = $this->db->query($query);
        print_r($hasil);
    }

    public function ceklist(){
        $date = date("Y-m-d H:i:s");
        $id = $this->input->post('idBarang');
        $barcode_detail = $this->input->post('barcode_detail');
        $form = $this->input->post('no_form_peminajam');
        $data = array(
            'tanggal_balik' => $date,
            'no_form_pengembalian' => $this->input->post('no_form_peminajam'),
            'nama_barang_balik' => $this->input->post('idBarang'),
            'kondisi_barang' => $this->input->post('status'),
            'keterangan_barang' => $this->input->post('keterangan')
        );
        $this->Pengembalian_model->insert($data);
        $query = "UPDATE tbl_barang SET tag_form_pinjam = 'AVAILABLE' WHERE barcode_barang_detail = '$barcode_detail'";
        $this->db->query($query);       
        $query2 = "UPDATE `tbl_peminjaman` SET `status_peminjaman` = 'SUDAH KEMBALI' , `tgl_pengembalian` = '$date' WHERE id_form_barang = '$id'";
        $this->db->query($query2);
        $query3 = "SELECT * FROM `tbl_peminjaman` where `no_form_peminjaman`='$form' AND `status_peminjaman`='DIPINJAM'";
        $jum = $this->db->query($query3)->num_rows();
        if ($jum === 0){
            $query_date = "UPDATE `tbl_pengembalian` SET `tanggal_balik` = '$date' WHERE no_form_pengembalian = '$form'";
            $this->db->query($query_date);
            $query_date2 = "UPDATE `tbl_peminjaman` SET `tgl_pengembalian` = '$date' WHERE no_form_peminjaman = '$form'";
            $this->db->query($query_date2);
            redirect(site_url('peminjaman'));
        } else {
            redirect(site_url('pengembalian/kembali/'.$data['no_form_pengembalian']));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pengembalian', TRUE));
        } else {
            $data = array(
		'no_form_pengembalian' => $this->input->post('no_form_pengembalian',TRUE),
		'nama_barang_balik' => $this->input->post('nama_barang_balik',TRUE),
		'kondisi_barang' => $this->input->post('kondisi_barang',TRUE),
		'keterangan_barang' => $this->input->post('keterangan_barang',TRUE),
		'tanggal_balik' => $this->input->post('tanggal_balik',TRUE),
	    );

            $this->Pengembalian_model->update($this->input->post('id_pengembalian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengembalian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pengembalian_model->get_by_id($id);

        if ($row) {
            $this->Pengembalian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengembalian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengembalian'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_form_pengembalian', 'no form pengembalian', 'trim|required');
	$this->form_validation->set_rules('nama_barang_balik', 'nama barang balik', 'trim|required');
	$this->form_validation->set_rules('kondisi_barang', 'kondisi barang', 'trim|required');
	$this->form_validation->set_rules('keterangan_barang', 'keterangan barang', 'trim|required');
	$this->form_validation->set_rules('tanggal_balik', 'tanggal balik', 'trim|required');

	$this->form_validation->set_rules('id_pengembalian', 'id_pengembalian', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pengembalian.php */
/* Location: ./application/controllers/Pengembalian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-23 05:36:42 */
/* http://harviacode.com */