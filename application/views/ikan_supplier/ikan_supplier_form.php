<form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Kode Ikan <?php echo form_error('kode_ikan') ?></label>
            <input type="text" class="form-control" name="kode_ikan" id="kode_ikan" placeholder="Kode Ikan" value="<?php echo $kode_ikan; ?>" />
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
        <input type="hidden" name="id_ikan_supplier" value="<?php echo $id_ikan_supplier; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('ikan_supplier') ?>" class="btn btn-default">Cancel</a>
    </form>