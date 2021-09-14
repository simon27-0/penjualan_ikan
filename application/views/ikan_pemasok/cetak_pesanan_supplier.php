
<!DOCTYPE html>
<html>
<head>
	<title>Cetak Pesanan Supplier</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
</head>
<body onload="print()">
<table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Pesanan</th>
                    <th>Tanggal Pesan</th>
                    <th>Detail Pesanan</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $start=0;
            $data = $this->db->query("SELECT * FROM pesanan_supplier ORDER BY id_pesanan DESC");
            foreach ($data->result() as $ikan_pemasok) {
             ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $ikan_pemasok->kode_pesanan ?></td>
                    <td><?php echo $ikan_pemasok->tgl ?></td>
                    <td>
                        
                        <table class="table table-bordered">
                            <tr>
                                <th>Kode ikan</th>
                                <th>Nama ikan</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                            <?php 
                        $total = 0;
                        $sql = $this->db->query("SELECT * FROM cart WHERE kode_cart='$ikan_pemasok->kode_pesanan'");

                        foreach ($sql->result() as $row) {
                         ?>
                            <tr>
                                <td><?php
                                 echo $row->kode_ikan; ?></td>
                                <td>
                                    <?php 
                                    $sql1 = $this->db->query("SELECT * FROM ikan_pemasok where kode_ikan='$row->kode_ikan'")->row();
                                    echo $sql1->nama_ikan;
                                     ?>

                                </td>
                                <td><?php echo 'Rp. '.number_format($row->harga) ?></td>
                                <td><?php echo $row->qty ?></td>
                                <td><?php echo 'Rp. '.number_format($row->subtotal) ?></td>
                            </tr>
                        
                        <?php $total = $total + $row->subtotal; ?>
                        <?php } ?>
                        </table>
                    </td>
                    <td><?php echo $total; ?></td>
                    <td><?php 
                    if ($ikan_pemasok->status_pesanan == 't') {
                        ?><b>Belum</b><?php
                    } elseif ($ikan_pemasok->status_pesanan == 'y') {
                        ?><b>disetujui</b><?php
                    }
                    ?></td>
                    
                    
                </tr>
            <?php } ?>
            </tbody>
        </table>
</body>
</html>