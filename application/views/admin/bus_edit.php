<main class="main">
                <ol class="breadcrumb">
					<li class="breadcrumb-item">Home</li>
					<li class="breadcrumb-item">
						<a href="<?php echo site_url('admin')?>">Admin</a>
					</li>
					<li class="breadcrumb-item">
                                        <a href="<?php echo site_url('admin/bus')?>">Bus</a>
                                        </li>
                                        <li class="breadcrumb-item active">Edit</li>
				</ol>
                <div class="container">
                    <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="card card-primary">
                            <div class="card-header text-center">
                                <h3>Data Bus Edit</h3>
                            </div>
                            <div class="card-body">
                            <form method="POST" action="<?=site_url('admin/bus_edit') ?>">
                            <input type="hidden" name="id" value="<?php echo $bus -> id; ?>">
                            <div class="form-group">
                                <label for="" class="form-label">Nama_Bus</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $bus->nama_bus ?>">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Jumlah Kursi A</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $bus->kursi_a ?>">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Jumlah Kursi A</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $bus->kursi_b?>">
                            </div>
                            <div class="form-group">
                                <a href="" class="btn btn-dark">Back</a>
                                <button class="btn btn-danger text-white" type="submit">Submit</button>
                            </div>
                            </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
</main>