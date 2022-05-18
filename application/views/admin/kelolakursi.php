<main class="main">
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Data Penumpang
                </div>
                <div class="card-body">
                    <table class="table table-stripped" id="myTable">
                    <thead>
                        <th>No</th>
                        <th>no_tiket</th>
                        <th>Nama Penumpang</th>
                        <th>No_identitas</th>
                        <th>Bagian</th>
                        <th>KodeKursi</th>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        foreach ($kursi as $ks) { ?>
                           <tr>
                           <td><?= $no++?></td>
                            <td><?= $ks->no_tiket ?></td>
                           <td><?= $ks->nama ?></td>
                           <td><?= $ks->no_identitas ?></td>
                           <td><?= $ks->bagian ?></td>
                           <td><?= $ks->kode_kursi ?></td>
                           </tr>
                            
                        <?php   }  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</main>