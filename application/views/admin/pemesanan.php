<main class="main">
    <div class="container mt-5">
        <div class="row">
        <div class="col">
            <div class="card">
            <div class="card-header">
                Data Pemesanan
            </div>
                <div class="card-body">
                     <form action="<?= site_url('admin/batal') ?>" method="POST">
                        <table class="table">
                        <thead>
                            <th>no</th>
                            <th>nama pemesan</th>
                            <th>no_tiket</th>
                            <th>asal</th>
                            <th>tujuan</th>
                            <th>total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                        <?php
              $no = 1;
              foreach ($pemesanan as $pn) {?>
                  <tr>
              <td><?= $no++?></td>
              <td><?= $pn->namalengkap?></td>
              <td><?= $pn->no_tiket?></td>
              <td><?= $pn->ASAL?></td>
              <td><?= $pn->TUJUAN?></td>
              <td><?= $pn->total?></td>
              <td><?= $pn->status?></td>
              <td>
              <input type="text" name="id" value="<?= $pn->ID ?>" hidden>
                <button class="btn btn-danger btn-block" type="submit">Batal</button>
              </td>
              </tr> 
             <?php  }
              ?>
                        </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</main>