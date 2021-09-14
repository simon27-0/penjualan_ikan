<form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Kode Ikan <?php echo form_error('kode_ikan') ?></label>
            <?php 
                $uri = $this->uri->segment(2);
                 $cek = $this->db->get('ikan_pemasok')->num_rows();
                 if ($cek == 0) {
                   $data = 'I0001';
                 } else {
                    $this->db->order_by('id_ikan_pemasok', 'DESC');
                   $cekdb = $this->db->get('ikan_pemasok')->row();
                   $data = $cekdb->kode_ikan;
                   $no_urut = (int)substr($data, 3, 4);
                    $no_urut++;

                    $char = "I";
                    $data = $char . sprintf("%04s", $no_urut);
                 }
                 
                  ?>
            <input type="text" class="form-control" name="kode_ikan" id="kode_ikan" placeholder="Kode Ikan" value="<?php if ($uri == 'create') { echo $data; } else { echo $kode_ikan; } ?>" readonly/>
        </div>
        <div class="form-group">
            <label for="varchar">Nama Ikan <?php echo form_error('nama_ikan') ?></label>
            <input type="text" class="form-control" name="nama_ikan" id="nama_ikan" placeholder="Nama Ikan" value="<?php echo $nama_ikan; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Harga <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Jenis <?php echo form_error('jenis') ?></label>
            <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Merek <?php echo form_error('merek') ?></label>
            <input type="text" class="form-control" name="merek" id="merek" placeholder="Merek" value="<?php echo $merek; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Stok <?php echo form_error('stok') ?></label>
            <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo $stok; ?>" />
        </div>
        <input type="hidden" name="id_ikan_pemasok" value="<?php echo $id_ikan_pemasok; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('ikan_pemasok') ?>" class="btn btn-default">Cancel</a>
    </form>