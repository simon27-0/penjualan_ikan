<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Ikan_pemasok Read</h2>
        <table class="table">
	    <tr><td>Nama Ikan</td><td><?php echo $nama_ikan; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td>Jenis</td><td><?php echo $jenis; ?></td></tr>
	    <tr><td>Merek</td><td><?php echo $merek; ?></td></tr>
	    <tr><td>Stok</td><td><?php echo $stok; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('ikan_pemasok') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>