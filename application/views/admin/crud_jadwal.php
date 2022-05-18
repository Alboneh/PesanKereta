<main class="main">
<ol class="breadcrumb">
					<li class="breadcrumb-item">Home</li>
					<li class="breadcrumb-item">
						<a href="<?php echo site_url('admin')?>">Admin</a>
					</li>
                                        <li class="breadcrumb-item active">Jadwal</li>
				</ol>
<div class="container-fluid mt-5">
					<div class="animated fadeIn">
								<div class="card">
									<div class="card-header bg-dark text-white">
					<div class="row">
                    <div class="col-sm-8"><h2>Jadwal BUS</h2></div>
                    <div class="col-sm-4">
                        <a class="btn btn-info add-new float-right" href="<?php echo site_url('admin/jadwal_add')  ;?>"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                	</div>
            						</div>
								
									<div class="card-body">
										<table class="table table-responsive-sm datatables">
											<thead>
												<tr>
													<th>No</th>
													<th>Bus</th>
													<th>Asal</th>
													<th>Tujuan</th>
													<th>Kelas</th>
													<th>Tgl_Berangkat</th>
													<th>Harga</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1; 
												foreach ($jadwal as $row) {?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $row->BUS; ?></td>
													<td><?php echo $row->ASAL; ?></td>
													<td><?php echo $row->TUJUAN; ?></td>
													<td><?php echo $row->Kelas; ?></td>
													<td><?php $date = date_create($row->tgl_berangkat); echo date_format($date, "d-m-Y h:i:s");  ?></td>
													<td><?php echo $row->harga; ?></td>
													<td>
													<a href="<?php echo site_url('admin/jadwal_id/'.$row->id);?>" class="btn btn-primary">Edit</a>
													<a href="<?php echo site_url('admin/jadwal_delete/'.$row->id);?>" class="btn btn-danger">Hapus</a>
                                    </td>
												<?php } ?>
												</tr>
												
											</tbody>
										</table>
							</div>
					</div>
					</div>
</div>
                            </main>