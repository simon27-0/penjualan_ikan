<?php 
$subtotal = 0;
$total = 0;
$jml = 0;
$kd = $this->session->userdata('kdpesan');

 ?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Pesan Ikan Pemasok</h3>                                    
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Pemasok</th>
                    <th>Kode Ikan</th>
                    <th>Nama Ikan</th>
                    <th>Harga</th>
                    <th>Jenis</th>
                    <th>Merek</th>
                    <th>Stok</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $start=0;
            $data = $this->db->query("SELECT * FROM ikan_pemasok, user where ikan_pemasok.id_user=user.id_user ORDER BY ikan_pemasok.id_ikan_pemasok DESC");
            foreach ($data->result() as $ikan_pemasok) {
             ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $ikan_pemasok->nama ?></td>
                    <td><?php echo $ikan_pemasok->kode_ikan ?></td>
                    <td><?php echo $ikan_pemasok->nama_ikan ?></td>
                    <td><?php echo $ikan_pemasok->harga ?></td>
                    <td><?php echo $ikan_pemasok->jenis ?></td>
                    <td><?php echo $ikan_pemasok->merek ?></td>
                    <td><?php echo $ikan_pemasok->stok ?></td>
                    <td>
                        <form action="<?php echo base_url()?>app/aksi_pesan_pemasok/<?php echo $ikan_pemasok->id_ikan_pemasok ?>" method="post">
                            <input type="number" name="qty" class="form_control"
                            value="<?php 
                            $cekikan = $this->db->query("SELECT qty FROM cart where kode_cart='$kd' and kode_ikan='$ikan_pemasok->kode_ikan'");
                            if ($cekikan->num_rows() =='') {
                                $jml = 0;
                                echo $jml;
                            } else {
                                $cekikan = $cekikan->row();
                                $jml = $cekikan->qty;
                                echo $jml;
                            }
                            $subtotal = $jml * $ikan_pemasok->harga;
                            $total = $total + $subtotal;
                             ?>" 
                             required>
                             <input type="hidden" name="id_user" value="<?php echo $ikan_pemasok->id_user ?>">
                        
                    </td>
                    <td><?php echo number_format($subtotal); ?></td>
                    <td>
                        <button class="btn btn-primary" type="submit">Pesan</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="8">Total Bayar</td>
                <td colspan="2">
                    <?php echo '<b>'.number_format($total); ?>
                </td>
            </tr>
            </tbody>
        </table>
        <a href="app/pembayaran_supplier/<?php echo $total; ?>"><button class="btn btn-primary">Lanjutkan pembayaran</button></a>
    </div>
</div>
            