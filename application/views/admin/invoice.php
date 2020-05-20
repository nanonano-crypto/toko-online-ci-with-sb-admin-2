<div class="container-fluid">
    <h4>Invoice pemesanan produk</h4>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>Id Invoice </th>
            <th>Nama pemesan</th>
            <th>Alamat</th>
            <th>Tanggal pemesanan</th>
            <th>Batas pembayaran</th>
            <th>Aksi</th>
        </tr>

       
        <?php foreach($invoice as $in): ?>
        <tr>
            <td><?php echo $in->id ?> </td>
            <td><?php echo $in->nama_pemesan ?> </td>
            <td><?php echo $in->alamat ?> </td>
            <td><?php echo $in->tgl_pesan ?> </td>
            <td><?php echo $in->batas_bayar ?> </td>
            <td><?php echo anchor('admin/invoice/detail/' .$in->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>    
            
        </tr>
        <?php endforeach; ?>
    </table>
</div>