<div class="container-fluid">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo base_url('assets/img/slider1.jpg') ?>" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo base_url('assets/img/slider2.jpg') ?>" class="d-block w-100" alt="...">
      </div>
     
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
    <div class="row text-center mt-5">

    <?php foreach ($pakaian_anak as $brg) : ?>
      <div class="card ml-3 mb-3" style="width: 16rem;">
        <img src="<?php echo base_url().'/uploads/'.$brg->foto ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title mb-1"><?php echo $brg->nama_barang; ?></h5>
          <small><?php echo $brg->keterangan; ?></small><br>
          <span class="badge badge-success mb-3">Rp. <?php echo  number_format($brg->harga, 0,',','.') ; ?></span><br>
          
          <?php echo anchor('dashboard/tambah_ke_keranjang/' .$brg->id_brg, '<div class="btn btn-sm btn-primary">Tambah ke keranjang</div>') ?>
            
          <?php echo anchor('dashboard/detail/' .$brg->id_brg, '<div class="btn btn-sm btn-success">Detail</div>') ?>
         
        </div>
      </div>
    <?php endforeach; ?>
    </div>
</div>