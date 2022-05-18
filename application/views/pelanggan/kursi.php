<div class="container container-top">
    <div class="row ">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                Pilih Kursi
            </div>
                <div  class="card-body">
                    <form action="">
                         <table class="table datatables text-center">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Identitas</th>
                                <th>Bagian</th>
                                <th>Nomor Kursi</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php  
                                $no = 1;
                                foreach ($penumpang as $pn) { ?>
                                       <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $pn->nama ?></td>
                                            <td><?= $pn->no_identitas ?></td>
                                            <td><?= $pn->bagian ?></td>
                                            <td><?= $pn->kode_kursi ?></td>
                                            <td>
                                            <?php if($pn->bagian != ""){?>
                                                <a data-item="<?= $pn->kursi_id ?>" href="" class="btn btn-block data btn-success" data-toggle="modal" data-target="#pilihkursi">Ganti</a>
                                           <?php }else{?>
                                            <a data-item="<?= $pn->kursi_id  ?>" href="" class="btn btn-block data btn-primary" data-toggle="modal" data-target="#pilihkursi">Pilih</a>
                                          <?php } ?>
                                            </td>
                                       </tr> 
                                 
                  <?php 
                                 } ?>
                            </tbody>
                        </table>

                    </form>
                    <?php
                if ($kursi < 1) {?>
                  <form action="<?= site_url('pelanggan/print') ?>" method="post">
                                <input type="text" name="no_tiket" value="<?= $_GET['no_tiket'] ?>" hidden>
                                <button class="btn btn-block btn-danger">Print</button>
                  </form>
                <?php }
                ?>
                </div>
            </div>
    <!-- Modal -->
<div class="modal fade" id="pilihkursi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Kursi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card ">
      <?php if($this->session->flashdata('flash')) : ?>
                <div class="flash-data" data-flashdata= "<?= $this->session->flashdata('flash')?>"></div>
            <?php unset($_SESSION['flash']);?>
            <?php endif;?>
      <form action="<?= site_url('pelanggan/aksipilihkursi') ?>" method="POST">
                <input type="text" name="jadwal" value="<?=$jadwal?>" hidden>
                 <input type="text" name="id" id="inputitem" hidden>
                 <input type="text" name="tiket" value="<?= $tiket2?>" hidden>
                 <input type="text" name="no_tiket" value="<?= $no_tiket ?>" hidden>
                <div class="card-body justify-content-center">
                <img class="img-fluid rounded mx-auto d-block" src="<?= base_url('assets/skemakursi.png') ?>" alt="">
                <p class="text-danger">*jumlah kursi pada Denah hanya sebagai contoh,setiap bus memiliki jumlah kursi masing masing</p>
                <div class="form-group">
                <label for="">Bagian</label>
                <select class="form-control bagian" name="bagian" onchange="cekbagian()">
                    <option disabled selected>Pilih bagian kursi</option>
                    <option value="A">Bagian A</option>
                    <option value="B">Bagian B</option>                
                </select>
                </div>
                <div class="form-group bagian_a">
                <label for="">pilih kursi A</label>
                <select name="kursi" required class="form-control kursi_a">
                <option disabled selected></option>
                <?php  foreach ($kursi_a as $i => $kursi) { ?>
                    <option value="<?= $kursi ?>"><?= $kursi ?></option>
               <?php } ?>
                 </select>
                </div>
                <div class="form-group bagian_b">
                <label for=""></label>
                <select name="kursi" required class="form-control kursi_b">
                <option  disabled selected>pilih kursi</option>
                <?php  foreach ($kursi_b as $i => $kursi) { ?>
                    <option value="<?= $kursi ?>"><?= $kursi ?></option>
               <?php } ?>
                 </select>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-danger">Submit</button>
                </div>
                </div>
                </form>
            </div>
        </div>
    </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
$('.bagian_a').hide();
$('.bagian_b').hide();
function cekbagian(){
    var bagian = $('.bagian');
    var bagian_a = $('.bagian_a');
    var bagian_b = $('.bagian_b');
    var kursi_a = $('.kursi_a');
    var kursi_b = $('.kursi_b');
    if (bagian.val() == "A") {
        bagian_a.show();
        bagian_b.hide();
        kursi_b.removeAttr('name');
		kursi_b.removeAttr('required');
    }
    else if (bagian.val() == "B"){
		bagian_b.show();
        bagian_a.hide();
        kursi_a.removeAttr('name');
		kursi_a.removeAttr('required');
    }
}
$(document).on("click", ".data", function () {
    var itemid= $(this).attr('data-item');
    $("#inputitem").val(itemid);
 });
</script>