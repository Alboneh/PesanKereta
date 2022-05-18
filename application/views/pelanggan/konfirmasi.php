<style>
    .date {
        font-size: 14px;
        color: grey;
    }

    .card-custom {
        border-radius: 15px;
    }

    .card-header {
        background-color: white;
    }
    .card{
        background-color: white;
    }
    .rincian{
        background-color: white;
    }
 
</style>
<div class="container container-top">
    <div class="row mt-5 justify-content-center">
        <div class="border-0 col-10">
            <div class="border-0 card">
                <div class="card-header border-0 ">
                    <h3 class="ml-2 ">Cek Pesanan</h3>
                </div>
                <div class="mt-3 pr-5 card-body border border-primary card-custom">
                    <img src="<?php echo base_url("assets/check-mark.png")  ?>" alt="">
                    Silakan periksa pesanan Anda. Ini adalah harga total dan Anda tidak perlu membayar biaya tambahan apa pun di titik berangkat.
                    <p class="font-weight-bold mt-3">No Pesanan anda : <?= $this->input->get('no_tiket')
                                                                        ?></p>
                </div>
            </div>
            <div class="card card-custom border-0">
                <div class="card-header border-0">
                    <h3>Detail Pesanan</h3>
                </div>
                <div class="card-body border border-primary card-custom">
                    <h5>Bus Pergi</h5>
                    <?php $timestamp = strtotime($jadwal_id->tgl_berangkat); ?>
                    <p class="date"><?= date('l Y H:i A', $timestamp); ?></p>
                    <div class="row pr-5 pl-2 pt-3">
                        <div class="card col-2 border-0 rincian">
                            <div class="card-body text-center font-weight-bold">
                                <h5 class="font-weight-bold"><?= $jadwal_id->BUS ?></h5>
                                <h5><?= $jadwal_id->Kelas ?></h5>
                            </div>
                        </div>
                        <div class="card col-4 border-0 rincian">
                            <div class="card-body border border-light bg-info" style="border-radius: 15px;">
                                <h5 class="font-weight-bold text-white text-center"><?= $jadwal_id->ASAL ?></h5>
                            </div>
                        </div>
                        <div class="col-2 card border-0 rincian">
                            <div class="card-body border-0 text-center" style="font-size: 20px;">
                                =>
                            </div>
                        </div>
                        <div class="card col-4 border-0 rincian">
                            <div class="card-body border border-light  bg-info" style="border-radius: 15px;">
                                <h5 class="font-weight-bold text-white text-center"><?= $jadwal_id->TUJUAN ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-10 border-0">
            <?php
            $no = 1;
            foreach ($penumpang as $pn) { ?>
                <div class="card-header mt-3">
                    <h3>Penumpang <?= $no++ ?></h3>
                </div>

                <div class="card-body card-custom border border-primary p-4">
                    <div class="form-group">
                        <h5 class="font-weight-bold">Nama &emsp; &emsp; &emsp; &nbsp : <?= $pn->nama ?></h5>
                        <h5 class="font-weight-bold">No_identitas &emsp; : <?= $pn->no_identitas ?></h5>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="card col-10 border-0">
            <div class="card-header mt-5">
            <h3 class="ml-2">Rincian Harga</h3>
            </div>
            <div class="card-body p-4 rounded">
                <div class="row">
                    <div class="col-8">
                        <h5><?= $jadwal_id->BUS ?>&emsp; [<?= $jadwal_id->Kelas ?>]
                        </h5>
                    </div>
                    <div class="col-4 ">
                        <h5 class="float-right"><?= 'Rp. ' . number_format($jadwal_id->harga, 0, ',',  '.') ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 rounded ">
                <div class="row">
                    <div class="col-8">
                        <h5>Tiket x <?= $max; ?></h5>
                    </div>
                    <div class="col-4">
                        <h5 class="font-weight-bold float-right"><?= 'Rp. ' . number_format($pemesanan->total, 0, ',',  '.') ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 rounded mb-5">
                <div class="row">
                    <div class="col-8">
                        <h5 class="font-weight-bold">Total</h5>
                    </div>
                    <div class="col-4">
                        <h5 class="font-weight-bold float-right"><?= 'Rp. ' . number_format($pemesanan->total, 0, ',',  '.') ?></h5>
                    </div>
                </div>
                <div>
                </div>
                </di>
                <a href="<?php echo site_url('pelanggan/pembayaran/' . $pemesanan->id . '?no_tiket=' . $_GET['no_tiket']); ?>" class="btn btn-danger btn-block">Bayar</a>
            </div>
        </div>
    </div>