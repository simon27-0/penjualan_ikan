<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="gambar/mujair.jpg" style="width: 900px; height: 350px" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="gambar/2.jpg" style="width: 900px; height: 350px" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="gambar/3.jpg" style="width: 900px; height: 350px" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleInsdicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row">
<?php 
$data = $this->db->query("SELECT * FROM ikan_supplier ORDER BY id_ikan_supplier DESC");
foreach ($data->result() as $row) {
 ?>

 

    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <a href="#"><img class="card-img-top" src="gambar/ikan.png"alt=""<\a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="#" data-toggle="modal" data-target="#myModal<?php echo $row->id_ikan_supplier; ?>"><?php echo $row->nama_ikan ?></a>
          </h4>
          <h5>Rp <?php echo $row->harga ?></h5>
          <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p> -->
        </div>
        <div class="card-footer">
          <div class="col-sm-6 ">
                    <a href="app/aksi_pesan_supplier/<?php echo $row->id_ikan_supplier; ?>">Beli </a> |
                    <a href="app/detail_ikan/<?php echo $row->id_ikan_supplier; ?>">Detail ikan</a>
                </div>
                <!-- <div class="col-sm-6 ">
                    <a href="#" data-toggle="modal" data-target="#myModal<?php echo $row->id_ikan_supplier; ?>">Detail Ikan</a>
                </div> -->
        </div>
      </div>
    </div>

    

  

<!-- <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="gambar/ikan.png" alt="" style="width: 300px; height: 150px">
            <div class="caption">
                <h4 class="pull-right">Rp <?php echo $row->harga ?></h4>
                
                <h4>Harga
                </h4>
                <h5 class="pull-right">Stok <?php echo $row->stok ?></h5>
                <p><a href="#" data-toggle="modal" data-target="#myModal<?php echo $row->id_ikan_supplier; ?>"><?php echo $row->nama_ikan ?></a></p>
                
                <div class="col-sm-6 ">
                    <a href="app/aksi_pesan_supplier/<?php echo $row->id_ikan_supplier; ?>"><button class="btn btn-info btn-lg">Beli</button></a>
                </div>
                <div class="col-sm-6 ">
                    <a href="#" data-toggle="modal" data-target="#myModal<?php echo $row->id_ikan_supplier; ?>"><button class="btn btn-info btn-lg btn-block">Detail Ikan</button></a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Modal -->
                  <div id="myModal<?php echo $row->id_ikan_supplier; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- konten modal-->
                      <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Detail Ikan</h4>
                        </div>
                        <!-- body modal -->
                        <div class="modal-body">
                        <center><p><img src="gambar/ikan.png" alt="" style="width: 100px; height: 100px"></p></center>
                          <p>
                             <b>Kode Ikan :<?php echo $row->kode_ikan; ?></b><br> 
                             <b>Nama Ikan :<?php echo $row->nama_ikan; ?></b><br> 
                             <b>Harga :<?php echo $row->harga; ?></b><br> 
                             <b>Jenis :<?php echo $row->jenis; ?></b><br> 
                             <b>Merek :<?php echo $row->merek; ?></b><br> 
                             <b>Stok :<?php echo $row->stok; ?></b><br> 
                          </p>
                        </div>
                        <!-- footer modal -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--Batas Modal --> 
<?php } ?>
</div>