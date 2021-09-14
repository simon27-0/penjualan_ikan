<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ikan_pemasok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ikan_pemasok_model');
        $this->load->library('form_validation');
    }

    public function list_pesanan_supplier()
    {
        $data = array(
            'konten' => 'ikan_pemasok/ikan_pemasok_listpesanan',
            'judul' => 'Ikan Pemasok',
        );
        $this->load->view('v_index', $data);
    }

    public function cetak_pesanan_supplier()
    {
        $this->load->view('ikan_pemasok/cetak_pesanan_supplier');
    }

    public function simpan_pesanan_supplier($kode)
    {
        $sql = $this->db->query("SELECT * FROM cart where kode_cart='$kode'");
        foreach ($sql->result() as $d) {
            $cek = $this->db->query("SELECT * from ikan_supplier where kode_ikan='$d->kode_ikan'");
            if ($cek->num_rows() == 1) {
                $row = $this->db->query("select * from ikan_pemasok where kode_ikan='$d->kode_ikan'")->row();
                $sql1= $this->db->query("UPDATE ikan_supplier SET nama_ikan='$row->nama_ikan',         harga='$row->harga', jenis='$row->jenis', merek='$row->merek', stok=stok+'$d->qty'WHERE kode_ikan='$d->kode_ikan'");
            } else {
                $row = $this->db->query("select * from ikan_pemasok where kode_ikan='$d->kode_ikan'")->row();
                $data = array(
                    'kode_ikan' => $row->kode_ikan,
                    'nama_ikan' => $row->nama_ikan,
                    'harga' => $row->harga,
                    'jenis' => $row->jenis,
                    'merek' => $row->merek,
                    'stok' => $d->qty,
                );
                $this->db->insert('ikan_supplier', $data);
            }

            $sql2 = $this->db->query("UPDATE ikan_pemasok SET stok=stok-'$d->qty' WHERE kode_ikan='$d->kode_ikan'");

        }
        $sql3= $this->db->query("UPDATE pesanan_supplier SET status_pesanan='y' WHERE kode_pesanan='$kode'");
        redirect('ikan_pemasok/list_pesanan_supplier');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ikan_pemasok/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ikan_pemasok/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ikan_pemasok/index.html';
            $config['first_url'] = base_url() . 'ikan_pemasok/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ikan_pemasok_model->total_rows($q);
        $ikan_pemasok = $this->Ikan_pemasok_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ikan_pemasok_data' => $ikan_pemasok,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'ikan_pemasok/ikan_pemasok_list',
            'judul' => 'Ikan Pemasok',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Ikan_pemasok_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_ikan_pemasok' => $row->id_ikan_pemasok,
		'nama_ikan' => $row->nama_ikan,
		'harga' => $row->harga,
		'jenis' => $row->jenis,
		'merek' => $row->merek,
		'stok' => $row->stok,
	    );
            $this->load->view('ikan_pemasok/ikan_pemasok_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ikan_pemasok'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ikan_pemasok/create_action'),
	    'id_ikan_pemasok' => set_value('id_ikan_pemasok'),
        'nama_ikan' => set_value('nama_ikan'),
	    'kode_ikan' => set_value('kode_ikan'),
	    'harga' => set_value('harga'),
	    'jenis' => set_value('jenis'),
	    'merek' => set_value('merek'),
	    'stok' => set_value('stok'),
        'konten' => 'ikan_pemasok/ikan_pemasok_form',
            'judul' => 'Ikan Pemasok',
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'nama_ikan' => $this->input->post('nama_ikan',TRUE),
		'kode_ikan' => $this->input->post('kode_ikan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'merek' => $this->input->post('merek',TRUE),
		'stok' => $this->input->post('stok',TRUE),
        'id_user' => $this->session->userdata('id_user'),
	    );

            $this->Ikan_pemasok_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ikan_pemasok'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ikan_pemasok_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ikan_pemasok/update_action'),
		'id_ikan_pemasok' => set_value('id_ikan_pemasok', $row->id_ikan_pemasok),
        'nama_ikan' => set_value('nama_ikan', $row->nama_ikan),
		'kode_ikan' => set_value('kode_ikan', $row->kode_ikan),
		'harga' => set_value('harga', $row->harga),
		'jenis' => set_value('jenis', $row->jenis),
		'merek' => set_value('merek', $row->merek),
		'stok' => set_value('stok', $row->stok),
        'konten' => 'ikan_pemasok/ikan_pemasok_form',
            'judul' => 'Ikan Pemasok',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ikan_pemasok'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ikan_pemasok', TRUE));
        } else {
            $data = array(
        'nama_ikan' => $this->input->post('nama_ikan',TRUE),
		'kode_ikan' => $this->input->post('kode_ikan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'merek' => $this->input->post('merek',TRUE),
		'stok' => $this->input->post('stok',TRUE),
	    );

            $this->Ikan_pemasok_model->update($this->input->post('id_ikan_pemasok', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ikan_pemasok'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ikan_pemasok_model->get_by_id($id);

        if ($row) {
            $this->Ikan_pemasok_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ikan_pemasok'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ikan_pemasok'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('nama_ikan', 'nama ikan', 'trim|required');
	$this->form_validation->set_rules('kode_ikan', 'kode ikan', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	$this->form_validation->set_rules('merek', 'merek', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');

	$this->form_validation->set_rules('id_ikan_pemasok', 'id_ikan_pemasok', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
