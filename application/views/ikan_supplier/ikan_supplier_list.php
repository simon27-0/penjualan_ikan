<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php //echo anchor(site_url('ikan_supplier/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('ikan_supplier/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('ikan_supplier'); ?>" class="btn btn-default">Reset</a>
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
            foreach ($ikan_supplier_data as $ikan_supplier)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $ikan_supplier->kode_ikan ?></td>
            <td><?php echo $ikan_supplier->nama_ikan ?></td>
            <td><?php echo $ikan_supplier->harga ?></td>
            <td><?php echo $ikan_supplier->jenis ?></td>
            <td><?php echo $ikan_supplier->merek ?></td>
            <td><?php echo $ikan_supplier->stok ?></td>
            <td style="text-align:center" width="200px">
                <?php  
                echo anchor(site_url('ikan_supplier/update/'.$ikan_supplier->id_ikan_supplier),'Update'); 
                echo ' | '; 
                echo anchor(site_url('ikan_supplier/delete/'.$ikan_supplier->id_ikan_supplier),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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