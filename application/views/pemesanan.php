
    <style >
.btn-custom{
    padding: 10px 30px;
    border-radius: 20px;
}
    </style>

        <div class="container container-top mt-5">
            <div class="card ">
            <div class="card-header bg-primary d-flex justify-content-center card-custom border-0 text-center text-white">
                            <h3>Pencarian Tiket Bus & Travel</h3>
                        </div>
            <div class="row justify-content-center">
                <div class="col">
                <div class="card-body">
    <form method="GET" action="<?= site_url('pelanggan/pemesanan')?>" class="formcustom">
    <div class="form-group">
        <label class="col-form-label">Asal</label>
        <select name="asal" class="form-control">
        <option value=""> Pilih Stasiun Asal </option>
        <?php foreach ($terminal as $row) {?>
             <option value="<?= $row->id ?>"><?php echo $row->nama_terminal;?></option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label class="col-form-label">Tujuan</label>
        <select name="tujuan" class="form-control">
        <option value=""> Pilih Stasiun Tujuan </option>
        <?php foreach ($terminal as $row) {?>
             <option value="<?= $row->id ?>"><?php echo $row->nama_terminal;?></option>
        <?php } ?>
        </select>
    </div>
    </div>
                </div>
                <div class="col">
                <div class="card-body mb-5">
    <div class="form-group ">
        <label class="col-form-label">Tanggal berangkat</label>
        <input name="tanggal" type="date" class="form-control" value="<?php echo $this->input->get('tanggal')?>">
    </div>
    <div class="form-group">
        <label class="col-form-label">Jumlah Penumpang</label>
        <select name="jumlah" class="form-control">
            <?php for ($i=1; $i < 5; $i++): ?>
                <option value="<?= $i?>"><?php echo $i?> Penumpang</option>
            <?php  endfor; ?>
            <?php 
            if($this->input->get('jumlah')  != ""){?>
            <optgroup label="TERPILIH">
            <option selected value="<?= $this->input->get('jumlah')?>"><?php echo $this->input->get('jumlah')?> Penumpang</option>
            </optgroup>
<?php }
            ?>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-danger float-right btn-custom" type="submit">Cari</button>
        <a class="btn btn-primary float-right btn-custom mr-2" href="<?php echo site_url('pelanggan/pemesanan') ; ?>">Reset</a>
    </div>
    </div>
                </div>
            </div>
            </form>
        </div>
        </div>
        <div class="container">
        <div class="card">
    <?php if ($tiket == null):{ ?>
      
                            <?php } ?>
                            </tbody>
                </table>
            <?php else: ?>
            <div class="card-body">
                <div class="card-header text-center bg-primary text-white">
                    <h2>Tiket Tersedia</h2>
                </div>
    <table class="table datatables table-bordered">
        <thead class="text-center  bg-primary text-white">
                <tr>
                <td>No</td>
                <td>Nama Bus</td>
                <td>Asal</td>
                <td>Tujuan</td>
                <td>Kelas</td>
                <td>Tanggal Berangkat</td>
                <td>Harga</td>
                <td>Aksi</td>
                </tr>
        </thead>
        <tbody class="text-center">
                <?php
                            $no = 1;
                            foreach ($tiket as $tk) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $tk->BUS; ?></td>
                                    <td><?php echo $tk->ASAL; ?></td>
                                    <td><?php echo $tk->TUJUAN; ?></td>
                                    <td><?php echo $tk->KELAS; ?></td>
                                    <td><?php $date = date_create($tk->tgl_berangkat); echo date_format($date, "d-m-Y h:i:s");  ?></td>
                                    <td><?php echo $tk->harga; ?></td>
                                    <td>
                                    <a href="<?php echo site_url('pelanggan/datadiri/'.$tk->id.'?p='.$penumpang.'&id='.$tk->id);?>" class="btn btn-primary">Pesan</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                </table>
                <?php endif; ?>
    </div>
    </div>
    </div>
    </div>