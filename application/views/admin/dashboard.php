
<style>
			.jumbotron{
        margin-top: 0px;
        margin-bottom: 0px;
  }
</style>
<main class="main">
  <div class="container mt-5">
  <div class="row justify-content-center">
  <div class="col-5">
    <div class="card">
      <div class="card-body">
      <h1 class="font-weight-bold">Selamat datang di halaman administrator</h1>
    <p class="lead">Anda telah Login sebagai admin.</p>
    <br>
    <p> Nama : <?php echo $this->session->userdata("namalengkap"); ?></p>
    <p> Username : <?php echo  $this->session->userdata("username"); ?></p>
    <p> Email : <?php echo  $this->session->userdata("email"); ?></p>
      </div>
    </div>
  </div>
  <div class="col-7">
    <div class="card">
      <div class="card-header">
        Pemesanan yang perlu di konfirmasi
      </div>
      <div class="card-body">
          <table class="table text-center">
            <thead>
            <th>no</th>
            <th>nama pemesan</th>
            <th>no_tiket</th>
            <th>asal</th>
            <th>tujuan</th>
            <th>total</th>
            <th>aksi</th>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($pemesanan as $pn) {?>
              <tr>
              <form action="<?= site_url('admin/konfirmasi') ?>" method="POST">
              <td><?= $no++?></td>
              <td><?= $pn->namalengkap?></td>
              <td><?= $pn->no_tiket?></td>
              <td><?= $pn->ASAL?></td>
              <td><?= $pn->TUJUAN?></td>
              <td><?= $pn->total?></td>
              <td>
                <input type="text" name="id" hidden value="<?= $pn->ID ?>">
                <input type="text" name="pemesan" hidden value="<?= $pn->namalengkap ?>">
                <input type="text" name="total" hidden value="<?= $pn->total?>">
                <button class="btn btn-success btn-block">Konfimrasi</button>
              </td>
              </form>
              </tr> 
             <?php  }
              ?>
            </tbody>
          </table>
      </div>
      </div>
      </div>
    </div>
  </div>
    <!-- <div class="jumbotron jumbotron-fluid text-center">
  <div class="container">
    <h1 class="font-weight-bold">Selamat datang di halaman administrator</h1>
    <p class="lead">Anda telah Login sebagai admin.</p>
    <br>
    <p> Nama : <?php $this->session->userdata("namalengkap"); ?></p>
    <p> Username : <?php  $this->session->userdata("username"); ?></p>
    <p> Email : <?php  $this->session->userdata("email"); ?></p>
  </div>
</div> -->
</main>