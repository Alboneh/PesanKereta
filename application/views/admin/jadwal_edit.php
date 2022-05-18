<main class="main">
<ol class="breadcrumb">
					<li class="breadcrumb-item">Home</li>
					<li class="breadcrumb-item">
						<a href="<?php echo site_url('admin')?>">Admin</a>
					</li>
					<li class="breadcrumb-item">
                                        <a href="<?php echo site_url('admin/jadwal')?>">Jadwal</a>
                                        </li>
                                        <li class="breadcrumb-item active">Edit</li>
				</ol>
    <div class="container mt-5">
        <div class="row justified-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">
                        <h4>Form Edit</h3>
                    </div>
                    <div class="card-body">
                <form method="POST" action="<?= site_url('admin/jadwal_edit') ?>">
                <div class="form-group">
                                    <label for="" class="col-form-label">BUS</label>
                                    <input type="hidden" name="id" value="<?php echo $jadwal -> id; ?>">
                                    <select name="bus" class="form-control">
                                    <optgroup label="TERPILIH">
										<option selected value="<?= $jadwal->bus_id ?>"><?= $jadwal->BUS ?></option>
									</optgroup>
									<optgroup label="PILIHAN">
										<?php foreach ($bus as $st): ?>
											<option value="<?= $st->id ?>"><?= $st->nama_bus ?></option>
										<?php endforeach ?>	
									</optgroup>
                                    </select>
                                </div>                              
                                <div class="form-group">
                                    <label for="" class="col-form-label">Asal</label>
                                    <select name="asal" class="form-control">
                                    <optgroup label="TERPILIH">
										<option selected value="<?= $jadwal->asal ?>"><?= $jadwal->ASAL ?></option>
									</optgroup>
									<optgroup label="PILIHAN">
										<?php foreach ($terminal as $tr): ?>
											<option value="<?= $tr->id ?>"><?= $tr->nama_terminal ?></option>
										<?php endforeach ?>	
									</optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">Tujuan</label>
                                    <select name="tujuan" class="form-control">
                                    <optgroup label="TERPILIH">
										<option selected value="<?= $jadwal->tujuan ?>"><?= $jadwal->TUJUAN ?></option>
									</optgroup>
									<optgroup label="PILIHAN">
										<?php foreach ($terminal as $tr): ?>
											<option value="<?= $tr->id ?>"><?= $tr->nama_terminal ?></option>
										<?php endforeach ?>	
									</optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">Tgl_berangkat</label>
                                    <?php $date = date_create($jadwal->tgl_berangkat); ?>
                                    <input type="datetime-local" name="tanggal" class="form-control" min="<?= date_format($date, 'Y-m-d\TH:i'); ?>" value='<?= date_format($date, 'Y-m-d\TH:i'); ?>' required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">Kelas</label>
                                    <select name="kelas" class="form-control">
                                    <optgroup label="TERPILIH">
										<option selected value="<?= $jadwal->KELAS ?>"><?= $jadwal->KELAS ?></option>
									</optgroup>
                                    <optgroup label="PILIHAN">
                                    <option value="Ekonomi">Ekonomi</option>
                                        <option value="Bisnis">Bisnis</option>
                                        <option value="VIP">VIP</option>
                                        <option value="Executive">Executive</option>
									</optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="harga" class="form-control" value="<?= $jadwal->harga ?>">
                                </div>
                                <div class="form-group">
                                <a href="<?php echo site_url('admin/jadwal') ?>" class="btn btn-dark">Back</a>
                                <button class="btn btn-danger text-white" type="submit">Submit</button>
                                </div>

                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</main>