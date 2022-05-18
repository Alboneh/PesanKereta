<div class="main">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Halaman Edit transaksi
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?= site_url('admin/transaksi_edit_aksi') ?>">
                            <div class="form-group">
                                <label for="">
                                    <p>admin</p>
                                </label>
                                <input type="text" name="id" value="<?= $transaksi->id ?>" hidden>
                                <select name="admin" class="form-control">
                                    <optgroup label="Terpilih">
                                    <option value="<?= $transaksi->admin_id ?>"><?= $transaksi->nama ?></option>
                                    </optgroup>
                                    <optgroup label="admin">
                                    <?php 
                                    foreach ($admin as $ad) { ?>
                                        <option value="<?= $ad->id ?>"><?= $ad->namalengkap ?></option>
                                   <?php
                                    }
                              ?>
                                    </optgroup>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    <p>nama pemesan</p>
                                </label>
                                <input type="text" name="pemesan" value="<?= $transaksi->nama_pemesan?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    <p>total</p>
                                </label>
                                <input name="total" type="text" value="<?= $transaksi->total?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>