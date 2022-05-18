<div class="container container-top mt-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5>INFO PERJALANAN</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="" class="form-label">Nama Bus</label>
                            <input type="text" class="form-control" value="<?= $tiket->BUS ;?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Terminal Asal</label>
                            <input type="text" class="form-control" value="<?= $tiket->ASAL;?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Terminal Tujuan</label>
                            <input type="text" class="form-control" value="<?= $tiket->TUJUAN;?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Waktu Berangkat</label>
                            <?php 
                            $date = new DateTime($tiket->tgl_berangkat);
                            ?>
                            <input type="datetime" class="form-control" value='<?= date_format($date, 'd/m/Y h:i a'); ?>'  name="tanggal" disabled>
                        </div>
                        <div class="form-group">
                        <label for="">Harga per tiket</label>
                        <input name="harga" type="text" value='<?= 'Rp. '.number_format($tiket->harga, 0, ',',  '.') ?>' class="form-control" disabled>
                        </div>
                        <div class="form-group">
                        <?php
                        $p = $_GET['p'];

                                    if($this->input->post('jumlah') == ""){
                                        $jumlah = $p;
                                    }
                                    else{
                                        if($p == $this->input->post('jumlah')){
                                            $jumlah = $p;
                                        }
                                        else{
                                            $jumlah = $this->input->post('jumlah');
                                        }
                                    }
                                    ?>
                            <label for="" class="form-label">Penumpang</label>
                            <div class="input-group mb-3">
                            <input type="number" name="jumlah" class="form-control" min="1" max="4" value="<?= $jumlah ?>">
                            <div class="input-group-append">
                            <button class="btn">change</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
        <div class="card">
        <div class="card-header bg-primary">
        <h5 class="font-weight-bold text-white">Data Diri</h5>
        </div>
        <div class="card-body">
        <form action="<?= site_url('pelanggan/pesan_tiket') ?>" method="POST">
        <input name="harga" type="number" value="<?= $tiket->harga;?>" class="form-control" hidden>
        <input type="number" name="jumlah" class="form-control" value="<?= $jumlah ?>" hidden>
        <input name="id_jadwal" type="text" class="form-control" value="<?=$_GET['id'];?>" hidden >
            <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No_identitas</th>
                <th>Gender</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                    $no = 1;
                   $max = $jumlah;
                   for ($x = 1; $x <= $max; $x++) { ?>
                   <tr>
                   <td><?php echo $no++?></td>
                   <td><input type="text" name="nama<?= $x ?>" id="" class="form-control"></td>
                   <td><input type="text" name="identitas<?= $x ?>" class="form-control"></td>
                   <td>
                   <select class="form-control" name="gender<?= $x ?>" id="">
                   <option value="laki-laki">laki-laki</option>
                   <option value="perempuan">perempuan</option>
                   </td>
                   </select>
                   </tr>

            <?php 
                   };
            ?>
            </tbody>
            </table>
            <button class='btn btn-success float-right'>Simpan & Lanjutkan</button>
            </form>
        </div>
        </div>
        </div>
    </div>
</div>