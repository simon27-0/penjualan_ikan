<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	
	public function index()
	{
		if ($this->session->userdata('id_user') == "") {
            redirect('app/login');
        } 

		$data = array(
			'konten' => 'home',
            'judul' => 'Dashboard',
		);
		$this->load->view('v_index', $data);
	}

	public function hal_user()
	{
		$this->load->view('v_web');
	}

	public function login()
	{

		if ($this->input->post() == NULL) {
			$this->load->view('login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$cek_user = $this->db->query("SELECT * FROM user WHERE username='$username' and password='$password' and level='user'");
			$cek_pemasok = $this->db->query("SELECT * FROM user WHERE username='$username' and password='$password' and level='pemasok' ");
			$cek_supplier = $this->db->query("SELECT * FROM user WHERE username='$username' and password='$password' and level='supplier' ");
			if ($cek_user->num_rows() == 1) {
				foreach ($cek_user->result() as $row) {
					$sess_data['id_user'] = $row->id_user;
					$sess_data['nama'] = $row->nama;
					$sess_data['username'] = $row->username;
					$sess_data['foto'] = $row->foto;
					$sess_data['alamat'] = $row->alamat;
					$sess_data['level'] = $row->level;
					$this->session->set_userdata($sess_data);
				}
				redirect('app/pesan_ikan_supplier');
			}elseif ($cek_pemasok->num_rows() == 1) {
				foreach ($cek_pemasok->result() as $row) {
					$sess_data['id_user'] = $row->id_user;
					$sess_data['nama'] = $row->nama;
					$sess_data['username'] = $row->username;
					$sess_data['foto'] = $row->foto;
					$sess_data['alamat'] = $row->alamat;
					$sess_data['level'] = $row->level;
					$this->session->set_userdata($sess_data);
				}
				redirect('app');
			}elseif ($cek_supplier->num_rows() == 1) {
				foreach ($cek_supplier->result() as $row) {
					$sess_data['id_user'] = $row->id_user;
					$sess_data['nama'] = $row->nama;
					$sess_data['username'] = $row->username;
					$sess_data['foto'] = $row->foto;
					$sess_data['alamat'] = $row->alamat;
					$sess_data['level'] = $row->level;
					$this->session->set_userdata($sess_data);
				}
				redirect('app');
			} else {
				?>
				<script type="text/javascript">
					alert('Username dan password kamu salah !');
					window.location="<?php echo base_url('app/login'); ?>";
				</script>
				<?php
			}

		}
	}

	public function pesan_ikan_pemasok()
	{
		$data = array(
			'konten' => 'ikan_pemasok/ikan_pemasok_pesan',
            'judul' => 'Ikan Pemasok',
		);
		$this->load->view('v_index', $data);
	}

	public function list_pesanan_toko()
	{
		$data = array(
			'konten' => 'ikan_supplier/ikan_supplier_listpesanan',
            'judul' => 'Ikan Penjual',
		);
		$this->load->view('v_index', $data);
	}

	public function daftar_pesanan_toko()
	{
		$data = array(
			'konten' => 'ikan_supplier/ikan_supplier_pesan',
            'judul' => 'Keranjang Pesanan',
		);
		$this->load->view('v_web', $data);
	}

	public function detail_ikan($id)
	{
		$data = array(
			'konten' => 'detail_ikan',
            'judul' => 'Detail Ikan',
		);
		$this->load->view('v_web', $data);
	}

	public function simpan_pembayaran()
	{
		$username = $this->input->post('username');
		$alamat = $this->input->post('alamat');
		$jumlah = $this->input->post('jumlah');
		$kdpesan = $this->input->post('kdpesan');
		// setting konfigurasi upload
            $nmfile = "bukti_".$kdpesan;
            $config['upload_path'] = './gambar/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $nmfile;
            // load library upload
            $this->load->library('upload', $config);
            // upload gambar 1
            $this->upload->do_upload('foto');
            $result1 = $this->upload->data();
            $result = array('gambar'=>$result1);

            $data = array(
            	'username_pelanggan' => $username,
            	'alamat_pengiriman' => $alamat,
            	'jumlah_bayar' => $jumlah,
            	'bukti_pembayaran' => $result['gambar']['file_name'],
            );

            $this->db->where('kode_pemesanan', $kdpesan);
            $this->db->update('pemesanan', $data);
            ?>
            <script type="text/javascript">
            	alert("Terima Kasih telah melakukan pembayaran, Barang anda akan segara kami antar !");
            	window.location="<?php echo base_url() ?>app/pesan_ikan_supplier";
            </script>
            <?php
	}

	public function simpan_pembayaran_supplier()
	{
		$username = $this->input->post('username');
		$alamat = $this->input->post('alamat');
		$jumlah = $this->input->post('jumlah');
		$kdpesan = $this->input->post('kdpesan');
		// setting konfigurasi upload
            $nmfile = "bukti_".$kdpesan;
            $config['upload_path'] = './gambar/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $nmfile;
            // load library upload
            $this->load->library('upload', $config);
            // upload gambar 1
            $this->upload->do_upload('foto');
            $result1 = $this->upload->data();
            $result = array('gambar'=>$result1);

            $data = array(
            	'username_pelanggan' => $username,
            	'alamat_pengiriman' => $alamat,
            	'jumlah_bayar' => $jumlah,
            	'bukti_pembayaran' => $result['gambar']['file_name'],
            );

            $this->db->where('kode_pesanan', $kdpesan);
            $this->db->update('pesanan_supplier', $data);

            $this->session->unset_userdata('kdpesan');
            $wkt = date('dmy').''.time();
			$array = array('kdpesan' => $wkt);
			$this->session->set_userdata($array);
            ?>
            <script type="text/javascript">
            	alert("Terima Kasih telah melakukan pembayaran, Barang anda akan segara kami antar !");
            	window.location="<?php echo base_url() ?>app/pesan_ikan_pemasok";
            </script>
            <?php
	}

	public function pembayaran()
	{
		$data = array(
			'konten' => 'pembayaran',
            'judul' => '',
		);
		$this->load->view('v_web', $data);
	}

	public function pembayaran_supplier()
	{
		$data = array(
			'konten' => 'pembayaran_supplier',
            'judul' => 'pembayaran',
		);
		$this->load->view('v_index', $data);
	}

	public function ubah_qty($kp, $ki)
	{
		$n = $this->input->post('qty');
		$this->db->query("UPDATE cart set qty='$n', subtotal=harga*'$n' where kode_cart='$kp' and kode_ikan='$ki' ");

		redirect('app/daftar_pesanan_toko');
	}

	public function pesan_ikan_supplier()
	{
		$data = array(
			'konten' => 'ikan_supplier/supplier_list',
            'judul' => 'Ikan Penjual',
		);
		$this->load->view('v_web', $data);
	}

	public function aksi_pesan_pemasok($id)
	{
		if ($this->session->userdata('kdpesan') == '') {
			$wkt = date('dmy').''.time();
			$array = array('kdpesan' => $wkt);
			$this->session->set_userdata($array);
		} else { }
		$this->db->where('id_ikan_pemasok',$id);
		$dt = $this->db->get('ikan_pemasok')->row();
		$kdpesan = $this->session->userdata('kdpesan');
		$qty = $this->input->post('qty');
		$id_user = $this->input->post('id_user');
		$data = array(
			'kode_cart' => $kdpesan,
            'kode_ikan' => $dt->kode_ikan,
            'harga' => $dt->harga,
            'qty' => $qty,
            'subtotal' => $qty*$dt->harga,
		);
		$this->db->insert('cart', $data);

		$cek_pesanan_supplier = $this->db->query("SELECT * FROM pesanan_supplier WHERE kode_pesanan='$kdpesan'");
		if ($cek_pesanan_supplier->num_rows() == 1) {
			redirect('app/pesan_ikan_pemasok');
		} else {
			$data1 = array(
				'kode_pesanan' => $kdpesan,
	            'tgl' => date('Y-m-d'),
	            'kode_cart' => $kdpesan,
			);
			$this->db->insert('pesanan_supplier', $data1);
			redirect('app/pesan_ikan_pemasok');
		}
	}

	public function aksi_pesan_supplier($id)
	{
		$cekikan = $this->db->query("SELECT stok FROM ikan_supplier WHERE id_ikan_supplier='$id'")->row();
		if ($cekikan->stok == 0) {
			?>
			<script type="text/javascript">
				alert('Stok Ikan Habis !');
				window.location="<?php echo base_url()?>app/pesan_ikan_supplier";
			</script>
			<?php
		} else {

			if ($this->session->userdata('kdpesan') == '') {
				$wkt = date('dmy').''.time();
				$array = array('kdpesan' => $wkt);
				$this->session->set_userdata($array);
			} else { }
			$this->db->where('id_ikan_supplier',$id);
			$dt = $this->db->get('ikan_supplier')->row();
			$kdpesan = $this->session->userdata('kdpesan');
			$qty = 1;
			$data = array(
				'kode_cart' => $kdpesan,
	            'kode_ikan' => $dt->kode_ikan,
	            'harga' => $dt->harga,
	            'qty' => $qty,
	            'subtotal' => $qty*$dt->harga,
			);
			$this->db->insert('cart', $data);

			$cek_pemesanan = $this->db->query("SELECT * FROM pemesanan WHERE kode_pemesanan='$kdpesan'");
			if ($cek_pemesanan->num_rows() == 1) {
				redirect('app/daftar_pesanan_toko');
			} else {
				$data1 = array(
					'kode_pemesanan' => $kdpesan,
		            'tgl' => date('Y-m-d'),
		            'kode_cart' => $kdpesan,
				);
				$this->db->insert('pemesanan', $data1);
				?>
				<script type="text/javascript">
					alert('Anda berhasil membeli Ikan !');
					window.location="<?php echo base_url()?>app/daftar_pesanan_toko";
				</script>
				<?php
				//redirect('app/daftar_pesanan_toko');
			}

		}
	}

	function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('kdpesan');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('foto');
		$this->session->unset_userdata('alamat');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('app/login');
	}


}
