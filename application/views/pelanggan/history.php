<div class="container container-top">
    <div class="row justify-content-center mt-5">
    <div class="col-12">
        <div class="card">
        <div class="card-header text-center">
        <h3>Riwayat Pemesanan Tiket</h3>
        </div>
            <div class="card-body">
                <table class="table table-bordered datatables text-center">
                    <thead class="text-center bg-dark text-white">
                        <th>no_tiket</th>
                        <th>Bus</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>tgl_berangkat</th>
                        <th>total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach ($tiket as $tk) { ?>
                        <tr>
                            <td><?= $tk->no_tiket ?></td>
                            <td><?= $tk->BUS?></td>
                            <td><?= $tk->ASAL ?></td>
                            <td><?= $tk->TUJUAN ?></td>
                            <td><?= $tk->tgl_berangkat ?></td>
                            <td><?= $tk->total ?></td>
                                        <?php 
                                    $date_now = date("Y-m-d H:i:s");
                                    $date_jadwal = date("$tk->tgl_berangkat"); 
                                        if($tk->status == 1){ ; ?>
                                                <td>Lunas</td>
                                                <td>
                                                <?php
                                                if ($date_now < $date_jadwal) { ?>
                                                    <a class="btn btn-dark " href="<?= site_url('pelanggan/pilihkursi/'.$tk->ID.'/'.$tk->id_jadwal.'?no_tiket='.$tk->no_tiket) ?>">pilih kursi</a>
                                             <?php   } else{ ?>

                                                <?php     }
                                         ?>
                                             
                                                    
                                                </td>
                                            <?php  } else { ?>
                                                    <td>Belum dibayar</td>
                                                    <td>
                                                    <?php
                                                      if ($date_now < $date_jadwal) { ?>
                                                          <a href="<?= site_url('pelanggan/konfirmasi_id/'.$tk->ID.'?no_tiket='.$tk->no_tiket) ?>" class="btn btn-primary ">Bayar</a>
                                                          <a href="<?= site_url('pelanggan/hapus_pemesanan/'.$tk->no_tiket.'/'.$tk->pelanggan_id) ?>" class="btn btn-danger">Batal</a>
                                                   <?php }  else{?>
                                                        <?php } ?>
                                                    </td>
                                                <?php  } ?>
                                                
                        </tr>
                            <?php  } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>