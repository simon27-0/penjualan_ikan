<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Pesanan Supplier</h3>                                    
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Pesanan</th>
                    <th>Tanggal Pesan</th>
                    <th>Detail Pesanan</th>
                    <th>Nama Supplier</th>
                    <th>Alamat Pengiriman</th>
                    <th>di bayar</th>
                    <th>Bukti Pembayaran</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $start=0;
            $id = $this->session->userdata('id_user');
            $data = $this->db->query("SELECT * FROM pesanan_supplier,cart,ikan_pemasok 
WHERE pesanan_supplier.kode_cart=cart.kode_cart AND cart.kode_ikan=ikan_pemasok.kode_ikan AND ikan_pemasok.id_user='$id' ORDER BY id_pesanan DESC");
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
                        $sql = $this->db->query("SELECT * FROM cart,ikan_pemasok WHERE cart.kode_ikan=ikan_pemasok.kode_ikan and cart.kode_cart='$ikan_pemasok->kode_pesanan' and ikan_pemasok.id_user='$id'");

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
                    <td><?php echo $ikan_pemasok->username_pelanggan ?></td>
                    <td><?php echo $ikan_pemasok->alamat_pengiriman ?></td>
                    <td><?php echo $ikan_pemasok->jumlah_bayar ?></td>
                    <td>
                        <a href="gambar/<?php echo $ikan_pemasok->bukti_pembayaran ?>">
                            <img src="gambar/<?php echo $ikan_pemasok->bukti_pembayaran ?>" style="height: 100px; height: 100px;">
                        </a>
                    </td>
                    <td><?php echo $total; ?></td>
                    <td><?php 
                    if ($ikan_pemasok->status_pesanan == 't') {
                        ?><b>Belum</b><?php
                    } elseif ($ikan_pemasok->status_pesanan == 'y') {
                        ?><b>disetujui</b><?php
                    }
                    ?></td>
                    <td><a href="ikan_pemasok/simpan_pesanan_supplier/<?php echo $ikan_pemasok->kode_pesanan; ?>">Konfirmasi</a></td>
                    
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

            