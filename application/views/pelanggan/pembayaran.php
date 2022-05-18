
<style>
    .card{
        background-color: white;
    }
    .card-header{
        background-color: white;
    }
.card-body{
    background-color: white;
}
</style>
<div class="contianer container-top">
<!-- <p><?php 
$total = $pemesanan->total;
$bayar = $kode + $total ?>
<?= $bayar ?>
</p> -->

    <div class="row justify-content-center mt-5">
    <div class="card border-0 col-10 text-center">
        <div class="card-header">
        <h2>Pembayaran</h2>
        </div>
    <div class="card-body rounded border border-primary">
        <div class="form-group">
        <img src="<?php echo base_url("assets/check-mark.png")  ?>" alt="">
        <h5>Pemesanan Berhasil</h5>
          <h5>Silahkan lakukan pembayaran pada:</h5>
        </div>
    </div>
    </div>
    <div class="col-10">
    <div class="card border-0 text-center p-5">
        <div class="card-body rounded border border-primary">
        <div class="form-group">
            <h5>7252-01-00892-53-2</h5>
            <p>A/N Tegayoso Tour And Travel</p>
            <p>Kode BRI = 002</p>
            <?php 
$total = $pemesanan->total;
$bayar = $kode + $total ?>
            <h5 >Jumlah yg harus dibayarkan :</h5>
            <?php
            $a =  number_format($bayar, 0, ',',  '.');
            $n = $a;
            $nums = explode(".",$n);
            ?>
            <h5 style="font-size: 20px;"><?= 'Rp. '. $nums[0] . '<span class="text-danger font-weight-bold" style="font-size: 20px;">.' . $nums[1] . '</span>' ?></h5>
            <p>*Mohon Transfer sampe digit terakhir karena merupakan kode unik pembayaran</p>
        </div>
        </div>
        <div class="form-group">
            <a href="<?= site_url('pelanggan') ?>" class="btn btn-block btn-primary">Kembali ke Dashboard</a>
        </div>
    </div>
    </div>
    </div>
    </div>
</div>