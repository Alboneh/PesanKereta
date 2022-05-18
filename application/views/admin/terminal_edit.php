<main class="main">
                                <ol class="breadcrumb">
					<li class="breadcrumb-item">Home</li>
					<li class="breadcrumb-item">
						<a href="<?php echo site_url('admin')?>">Admin</a>
					</li>
					<li class="breadcrumb-item">
                                        <a href="<?php echo site_url('admin/terminal')?>">Terminal</a>
                                        </li>
                                        <li class="breadcrumb-item active">Edit</li>
				</ol>
<div class="container">
                        <div class="card">
                        <div class="card-header text-center">
                        Edit terminal
                        </div>
                        <div class="card-body">
                                <form action="<?=site_url('admin/terminal_edit')?>" method="POST"> 
                                <input type="hidden" name="id" value="<?php echo $terminal -> id; ?>">
                                <div class="form-group">
                                <label for="" class="col-form-label">Nama Terminal</label>
                                <input type="text" name="nama_terminal" value="<?php echo $terminal -> nama_terminal;?>" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="" class="col-form-label">Kota</label>
                                <input type="text" name="kota" value="<?php echo $terminal -> kota;?>" class="form-control">
                                </div>
                                <div>

                                <a href="<?=site_url('admin/terminal')?>" class="btn btn-dark">Back</a>
                                <button class="btn btn-danger" type="submit">Edit</button>
                                </div>
                                </form>
                        </div>
                        </div>
                        </div>
        </div>
</main>