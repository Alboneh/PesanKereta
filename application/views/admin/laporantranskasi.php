<div class="main">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Laporan Transaksi</h3>
                </div>
                <div class="card-body">
                        <form action="">
                            <table class="table text-center">
                                <thead>
                                    <th>NO</th>
                                    <th>nama admin</th>
                                    <th>nama pemesan</th>
                                    <th>total</th>
                                    <th>tanggal konfirmasi</th>
                                    <th>aksi</th>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($transaksi as $tk) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $tk->nama ?></td>
                                        <td><?= $tk->nama_pemesan ?></td>
                                        <td><?= $tk->total ?></td>
                                        <td><?= $tk->tanggal_konfirmasi ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/transaksi_edit/'.$tk->id) ?>" class="btn btn-primary">Edit</a>
                                            <a href="<?= site_url('admin/transaksi_delete/'.$tk->id) ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                  <?php  } ?>
                                </tbody>
                            </table>
                        </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>