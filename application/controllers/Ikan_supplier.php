<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ikan_supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ikan_supplier_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ikan_supplier/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ikan_supplier/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ikan_supplier/index.html';
            $config['first_url'] = base_url() . 'ikan_supplier/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ikan_supplier_model->total_rows($q);
        $ikan_supplier = $this->Ikan_supplier_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ikan_supplier_data' => $ikan_supplier,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'ikan_supplier/ikan_supplier_list',
            'judul' => 'Ikan Penjual',
        );
        $this->load->view('v_index', $data);
    }

    public function simpan_pesanan_toko($kode)
    {
        $sql = $this->db->query("SELECT * FROM cart where kode_cart='$kode'");
        foreach ($sql->result() as $d) {
            $sql2 = $this->db->query("UPDATE ikan_supplier SET stok=stok-'$d->qty' WHERE kode_ikan='$d->kode_ikan'");
        }
        $this->db->query("UPDATE pemesanan SET status_pesanan='y' where kode_pemesanan='$kode'");
        redirect("app/list_pesanan_toko");
    }

    public function read($id) 
    {
        $row = $this->Ikan_supplier_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_ikan_supplier' => $row->id_ikan_supplier,
		'kode_ikan' => $row->kode_ikan,
		'nama_ikan' => $row->nama_ikan,
		'harga' => $row->harga,
		'jenis' => $row->jenis,
		'merek' => $row->merek,
		'stok' => $row->stok,
	    );
            $this->load->view('ikan_supplier/ikan_supplier_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ikan_supplier'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ikan_supplier/create_action'),
	    'id_ikan_supplier' => set_value('id_ikan_supplier'),
	    'kode_ikan' => set_value('kode_ikan'),
	    'nama_ikan' => set_value('nama_ikan'),
	    'harga' => set_value('harga'),
	    'jenis' => set_value('jenis'),
	    'merek' => set_value('merek'),
	    'stok' => set_value('stok'),
	);
        $this->load->view('ikan_supplier/ikan_supplier_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_ikan' => $this->input->post('kode_ikan',TRUE),
		'nama_ikan' => $this->input->post('nama_ikan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'merek' => $this->input->post('merek',TRUE),
		'stok' => $this->input->post('stok',TRUE),
	    );

            $this->Ikan_supplier_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ikan_supplier'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ikan_supplier_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ikan_supplier/update_action'),
		'id_ikan_supplier' => set_value('id_ikan_supplier', $row->id_ikan_supplier),
		'kode_ikan' => set_value('kode_ikan', $row->kode_ikan),
		'nama_ikan' => set_value('nama_ikan', $row->nama_ikan),
		'harga' => set_value('harga', $row->harga),
		'jenis' => set_value('jenis', $row->jenis),
		'merek' => set_value('merek', $row->merek),
		'stok' => set_value('stok', $row->stok),
        'konten' => 'ikan_supplier/ikan_supplier_form',
            'judul' => 'Ikan Penjual',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ikan_supplier'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ikan_supplier', TRUE));
        } else {
            $data = array(
		'kode_ikan' => $this->input->post('kode_ikan',TRUE),
		'nama_ikan' => $this->input->post('nama_ikan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'merek' => $this->input->post('merek',TRUE),
		'stok' => $this->input->post('stok',TRUE),
	    );

            $this->Ikan_supplier_model->update($this->input->post('id_ikan_supplier', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ikan_supplier'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ikan_supplier_model->get_by_id($id);

        if ($row) {
            $this->Ikan_supplier_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ikan_supplier'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ikan_supplier'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_ikan', 'kode ikan', 'trim|required');
	$this->form_validation->set_rules('nama_ikan', 'nama ikan', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	$this->form_validation->set_rules('merek', 'merek', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');

	$this->form_validation->set_rules('id_ikan_supplier', 'id_ikan_supplier', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

