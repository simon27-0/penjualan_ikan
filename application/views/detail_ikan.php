<img class="card-img-top" src="gambar/ikan.png" alt="">

<?php 
$id = $this->uri->segment('3');
$s = $this->db->query("SELECT * FROM ikan_supplier where id_ikan_supplier='$id'")->row();
 ?>
<table class="table table-bordered">
	
	<tr>
		<td>Kode Ikan</td>
		
		<td><?php echo $s->kode_ikan; ?></td>
	</tr>
	<tr>
		<td>Nama Ikan</td>
		
		<td><?php echo $s->nama_ikan; ?></td>
	</tr>
	<tr>
		<td>Harga</td>
		
		<td><?php echo $s->harga; ?></td>
	</tr>
	<tr>
		<td>Jenis</td>
		
		<td><?php echo $s->jenis; ?></td>
	</tr>
	<tr>
		<td>Merek</td>
		
		<td><?php echo $s->merek; ?></td>
	</tr>
	<tr>
		<td>Stok</td>
		
		<td><?php echo $s->stok; ?></td>
	</tr>
</table>