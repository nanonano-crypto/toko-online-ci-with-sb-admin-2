<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php 
                $grand_total = 0;
                if($keranjang = $this->cart->contents())
                {
                    foreach($keranjang as $item)
                    {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h4>Total Belanja Anda : Rp. ".number_format($grand_total, 0,',','.');
                
                ?>
            </div><br><br>
            <h3>Input Alamat Pengiriman Dan Pembayaran</h3>
            <form action="<?php echo base_url('dashboard/proses_pesanan') ?>" method="post">
                <div class="form-goup">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama_pemesan" placeholder="Nama Lengkap Anda" class="form-control">
                </div>
                <div class="form-goup">
                    <label for="">Alamat Lengkap</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                </div>
                <div class="form-goup">
                    <label for="">No Telp</label>
                    <input type="text" name="no_telp" placeholder="No telpon" class="form-control">
                </div>
                <div class="form-goup">
                    <label>Jasa Pengiriman</label>
                    <select class="form-control">
                        <option>Jne</option>
                        <option>Tiki</option>
                        <option>Post Indonesia</option>
                        <option>GOJEK</option>
                        <option>GRAB</option>
                    </select>
                </div>
                <div class="form-goup">
                    <label>Pilih Bank</label>
                    <select class="form-control">
                        <option>BCA - XXXXXXXX</option>
                        <option>BNI - XXXXXXXX</option>
                        <option>BRI - XXXXXXXX</option>
                        <option>MANDIRI - XXXXXXXX</option>
                        <option>BRA - XXXXXXXX</option>
                     
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Pesan</button>
            </form>

            <?php
                } else {
                    echo "Keranjang belanja anda masih kosong";
                }

                ?>


        </div>

       
        <div class="col-md-2"></div>
    </div>
</div>