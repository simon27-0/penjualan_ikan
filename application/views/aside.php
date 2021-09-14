<aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="assets/img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Mr. <?php echo $this->session->userdata('username'); ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>

                        <?php if ($this->session->userdata('level') == 'pemasok') { ?>

                        <li>
                            <a href="ikan_pemasok">
                                <i class="fa fa-dashboard"></i> <span>Data Pemasok</span>
                            </a>
                        </li>
                        <li>
                            <a href="ikan_pemasok/list_pesanan_supplier">
                                <i class="fa fa-dashboard"></i> <span>List Pesanan Penjual</span>
                            </a>
                        </li>
                        <li>
                            <a href="ikan_pemasok/cetak_pesanan_supplier">
                                <i class="fa fa-dashboard"></i> <span>Cetak Pesanan Penjual</span>
                            </a>
                        </li>

                        <?php } elseif ($this->session->userdata('level') == 'supplier') { ?>

                        <li>
                            <a href="ikan_supplier">
                                <i class="fa fa-dashboard"></i> <span>Data Ikan Penjual</span>
                            </a>
                        </li>
                        <li>
                            <a href="app/pesan_ikan_pemasok">
                                <i class="fa fa-dashboard"></i> <span>Pesan Ikan Pemasok</span>
                            </a>
                        </li>
                        <li>
                            <a href="app/list_pesanan_toko">
                                <i class="fa fa-dashboard"></i> <span>List Pesanan Toko</span>
                            </a>
                        </li>

                        <li>
                            <a href="user">
                                <i class="fa fa-dashboard"></i> <span>Manajemen User</span>
                            </a>
                        </li>  
                        <?php } elseif ($this->session->userdata('level') == 'user') { ?>

                        <li>
                            <a href="app/pesan_ikan_supplier">
                                <i class="fa fa-dashboard"></i> <span>Semua Ikan Penjual</span>
                            </a>
                        </li>

                        <li>
                            <a href="app/daftar_pesanan_toko">
                                <i class="fa fa-dashboard"></i> <span>Daftar Pesanan Toko</span>
                            </a>
                        </li>
                        <?php } ?>

                        <!-- <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Home</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="app/about"><i class="fa fa-angle-double-right"></i> About Us</a></li>
                                <li><a href="app/our"><i class="fa fa-angle-double-right"></i> Our Address</a></li>
                                <li><a href="l_notification"><i class="fa fa-angle-double-right"></i> Notification List</a></li>
                            </ul>
                        </li> -->

                        
                        <li>
                            <a href="app/logout">
                                <i class="fa fa-laptop"></i> <span>LogOut</span>
                            </a>
                        </li>
                        
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>