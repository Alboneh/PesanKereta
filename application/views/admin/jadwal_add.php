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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
                        <div class="card card-primary">
                        <div class="card-header text-center bg-dark text-white">
                       Form Tambah Jadwal Bus
                        </div>
                        <div class="card-body">
                                <form action="<?=site_url('admin/jadwal_add_aksi')?>" method="POST"> 
                                <div class="form-group">
                                    <label for="" class="col-form-label">BUS</label>
                                    <select name="bus" class="form-control">
                                    <?php foreach ($bus as $bs) { ?>
                                        <option value="<?=$bs->id;?>"><?php echo $bs->nama_bus; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>                              
                                <div class="form-group">
                                    <label for="" class="col-form-label">Asal</label>
                                    <select name="asal" class="form-control">
                                    <?php foreach ($terminal as $tr) { ?>
                                            <option value="<?=$tr->id;?>"><?php echo $tr->nama_terminal ; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">Tujuan</label>
                                    <select name="tujuan" class="form-control">
                                    <?php foreach ($terminal as $tr) { ?>
                                            <option value="<?=$tr->id;?>"><?php echo $tr->nama_terminal ; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">Tgl_berangkat</label>
                                    <input type="datetime-local" name="tanggal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">Kelas</label>
                                    <select name="kelas" class="form-control">
                                        <option value="Ekonomi">Ekonomi</option>
                                        <option value="Bisnis">Bisnis</option>
                                        <option value="VIP">VIP</option>
                                        <option value="Executive">Executive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="" >Harga</label>
                                <input type="number" name="harga" id="">
                                </div>
                                <div>

                                <a href="<?=site_url('admin/jadwal')?>" class="btn btn-dark">Back</a>
                                <button class="btn btn-danger" type="submit">Submit</button>
                                </div>
                                </form>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
</main>