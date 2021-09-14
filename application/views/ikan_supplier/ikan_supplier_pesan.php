<br><br><br><br><br>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Pesanan Toko</h3>                                    
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal Pesan</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $kode = $this->session->userdata('kdpesan');
            $tgl = date('Y-m-d');
            $total = 0;
            $start=0;
            $data = $this->db->query("SELECT * FROM pemesanan, cart where pemesanan.kode_pemesanan=cart.kode_cart and cart.kode_cart='$kode' and pemesanan.tgl='$tgl' and pemesanan.status_pesanan='t' ");
            foreach ($data->result() as $row) {
             ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $row->tgl ?></td>
                    <td><?php 
                    $sql = $this->db->query("SELECT nama_ikan from ikan_supplier where kode_ikan='$row->kode_ikan'")->row();
                    echo $sql->nama_ikan;
                     ?></td>
                    <td><?php echo $row->harga ?></td>
                    <td>
                        <form action="app/ubah_qty/<?php echo $row->kode_pemesanan; ?>/<?php echo $row->kode_ikan; ?>" method="post">
                            <input type="number" name="qty" value="<?php echo $row->qty; ?>">
                            <input type="submit" name="kirim" value="ubah">
                        </form>
                    </td>
                    <td><?php echo $row->subtotal; ?></td>
                </tr>

            <?php
            $total = $total+$row->subtotal;
             } ?>
                <tr>
                    <td colspan="5"><b>Total Bayar</b></td>
                    <td><?php echo $total; ?></td>
                </tr>
            </tbody>
        </table>

        <a href="app/pembayaran"><button class="btn btn-primary">Lanjutkan pembayaran</button></a>
    </div>
</div>
<br><br><br><br><br><br><br>
<br>

            