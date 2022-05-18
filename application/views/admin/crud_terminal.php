<main class="main">
<ol class="breadcrumb">
					<li class="breadcrumb-item">Home</li>
					<li class="breadcrumb-item">
						<a href="<?php echo site_url('admin')?>">Admin</a>
					</li>
					<li class="breadcrumb-item active">Terminal</li>
				</ol>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header text-center">
                            CRUD Terminal
                        </div>
                    <div class="card-body justify-content-center">
                        <table class="table table-hover datatables">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Terminal</td>
                                <td>Kota</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($terminal as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->nama_terminal; ?></td>
                                    <td><?php echo $row->kota; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('admin/terminal_id/'.$row->id);?>" class="btn btn-primary">Edit</a>
                                        <a href="<?php echo site_url('admin/terminal_delete/'.$row->id);?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                        <div class="card">
                        <div class="card-header text-center">
                        Tambah terminal
                        </div>
                        <div class="card-body">
                                <form action="<?=site_url('admin/terminal_add')?>" method="POST">
                                <div class="form-group">
                                <label for="" class="col-form-label">Nama Terminal</label>
                                <input type="text" name="nama_terminal" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="" class="col-form-label">Kota</label>
                                <input type="text" name="kota" class="form-control">
                                </div>
                                <button class="btn btn-dark" type="submit">Tambah</button>
                                </form>
                        </div>
                        </div>
                        </div>
        </div>
    </div>
</main>