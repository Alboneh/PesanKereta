<main class="main">
<ol class="breadcrumb">
					<li class="breadcrumb-item">Home</li>
					<li class="breadcrumb-item">
						<a href="<?php echo site_url('admin')?>">Admin</a>
					</li>
					<li class="breadcrumb-item active">BUS</li>
				</ol>
                <?php if($this->session->flashdata('flash')) : ?>
                <div class="flash-data" data-flashdata= "<?= $this->session->flashdata('flash')?>"></div>
            <?php unset($_SESSION['flash']);?>
            <?php endif;?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header text-center">
                            CRUD Data BUS
                        </div>
                    <div class="card-body justify-content-center">
                        <table class="table datatables">
                            <tr>
                                <td>No</td>
                                <td>Nama Bus</td>
                                <td>Jumlah Kursi A</td>
                                <td>Jumlah Kursi B</td>
                                <td>Aksi</td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($bus as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->nama_bus; ?></td>
                                    <td><?php echo $row->kursi_a; ?></td>
                                    <td><?php echo $row->kursi_b; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('admin/bus_id/'.$row->id);?>" class="btn btn-primary">Edit</a>
                                        <a href="<?php echo site_url('admin/bus_delete/'.$row->id);?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                        <div class="card">
                        <div class="card-header text-center">
                        Tambah Data 
                        </div>
                        <div class="card-body">
                                <form action="<?=site_url('admin/bus_add')?>" method="POST">
                                <div class="form-group">
                                <label for="" class="col-form-label">Nama Bus</label>
                                <input type="text" name="nama_bus" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="" class="col-form-label">Jumlah Kursi bagian A</label>
                                <input type="text" name="kursi_a" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="" class="col-form-label">Jumlah Kursi bagian B</label>
                                <input type="text" name="kursi_b" class="form-control">
                                </div>
                                <button class="btn btn-dark" type="submit">Tambah</button>
                                </form>
                        </div>
                        </div>
                        </div>
        </div>
    </div>
</main>