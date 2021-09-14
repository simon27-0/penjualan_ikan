<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('ikan_pemasok/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('ikan_pemasok/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('ikan_pemasok'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>

        <th>Kode Ikan</th>
        <th>Nama Ikan</th>
        <th>Harga</th>
        <th>Jenis</th>
        <th>Merek</th>
        <th>Stok</th>
        <th>Action</th>
            </tr><?php
            $start = 0;
            $id = $this->session->userdata('id_user');
            $ikan_pemasok_data = $this->db->query("SELECT * FROM ikan_pemasok where id_user='$id'");
            foreach ($ikan_pemasok_data->result() as $ikan_pemasok)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $ikan_pemasok->kode_ikan ?></td>
            <td><?php echo $ikan_pemasok->nama_ikan ?></td>
            <td><?php echo $ikan_pemasok->harga ?></td>
            <td><?php echo $ikan_pemasok->jenis ?></td>
            <td><?php echo $ikan_pemasok->merek ?></td>
            <td><?php echo $ikan_pemasok->stok ?></td>
            <td style="text-align:center" width="200px">
                <?php  
                echo anchor(site_url('ikan_pemasok/update/'.$ikan_pemasok->id_ikan_pemasok),'Update'); 
                echo ' | '; 
                echo anchor(site_url('ikan_pemasok/delete/'.$ikan_pemasok->id_ikan_pemasok),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>