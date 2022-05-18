<div class="container mt-5">
<table class="table table-hover">
                <tr>
                <td>No</td>
                <td>Nama Bus</td>
                <td>Kelas</td>
                <td>Tanggal Berangkat</td>
                <td>Aksi</td>
                </tr>
                <?php
                            $no = 1;
                            foreach ($tiket as $tk) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $tk->BUS; ?></td>
                                    <td><?php echo $tk->KELAS; ?></td>
                                    <td><?php $date = date_create($tk->tgl_berangkat); echo date_format($date, "d-m-Y h:i:s");  ?></td>
                                    <td>
                                        <a  class="btn btn-primary">Pesan</a>
                                    </td>
                                </tr>
                            <?php } ?>
                </table>
                </div>