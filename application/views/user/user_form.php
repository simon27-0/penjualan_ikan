<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Level <?php echo form_error('level') ?></label>
            <!-- <input type="text" class="form-control" name="level" id="level" placeholder="Level" value="<?php echo $level; ?>" /> -->
            <select class="form-control" name="level">
                <option value="<?php echo $level ?>"><?php echo $level ?></option>
                <option value="pemasok">pemasok</option>
                <option value="supplier">supplier</option>
                <option value="user">user</option>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Foto <?php  ?></label>
            <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto"/>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
    </form>