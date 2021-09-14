<b><p>Silahkan lakukan pembayaran dengan mengirim ke No Rekening Pemasok 03454362535.</p></b>
<form action="app/simpan_pembayaran_supplier" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Lengkap</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>">
		<input type="hidden" name="username" value="<?php echo $this->session->userdata('username');?>">
		<input type="hidden" name="kdpesan" value="<?php echo $this->session->userdata('kdpesan');?>">
	</div>
	<div class="form-group">
		<label>Alamat Pengiriman</label>
		<textarea class="form-control" rows="3" name="alamat"><?php echo $this->session->userdata('alamat');?></textarea>
	</div>
	<div class="form-group">
		<label>Jumlah pembayaran</label>
		<p>Total bayar : <?php echo number_format($this->uri->segment(3)); ?></p>
		<input type="text" name="jumlah" class="form-control">
	</div>
	<div class="form-group">
		<label>Upload bukti pembayaran</label>
		<input type="file" name="foto" class="form-control" >
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Kirim</button>
	</div>
</form>