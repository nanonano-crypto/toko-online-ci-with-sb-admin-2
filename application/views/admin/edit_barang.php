<div class="container-fluid">
    <h3><i class="fa fa-edit"></i> EDIT DATA BBARANG</h3>

    <?php foreach($barang as $brg) : ?>

        <form action="<?php echo base_url('admin/data_barang/update') ?>" method="post">
            <div class="form-group">
                <label for="">Id Barng</label>
                <input type="hidden" name="id_brg" class="form-control" value="<?php echo
                $brg->id_brg ?> ">
            </div>
            <div class="form-group">
                <label for="">Nama Barng</label>
                <input type="text" name="nama_barang" class="form-control" value="<?php echo
                $brg->nama_barang ?> ">
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="<?php echo
                $brg->keterangan ?> ">
            </div>
            <div class="form-group">
                <label for="">kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?php echo
                $brg->kategori ?> ">
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type="text" name="harga" class="form-control" value="<?php echo
                $brg->harga ?> ">
            </div>
            <div class="form-group">
                <label for="">Stok</label>
                <input type="text" name="stok" class="form-control" value="<?php echo
                $brg->stok ?> ">
            </div>

            <button type="submit" class=" btn btn-sm btn-primary mt-3">Simpan</button>
           
        </form>
    <?php endforeach; ?>
</div>