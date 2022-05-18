<style>
@media print {
  body {-webkit-print-color-adjust: exact;}
  .container-top{
    margin-top: -70px;
}
}
.tiket .card {
  border: 2px solid #3399ff;
}
.tiket .card-header  {
    color: #ffffff;
    background-color: #3399ff;
    border-bottom: 1px solid #3399ff;
}
.tiket .card-footer  {
    color: #ffffff;
    background-color: #3399ff;
    border-top: 1px solid #3399ff;
}

@page {
    size:A4 landscape;
    margin-left: 0px;
    margin-right: 0px;
    margin-top: 0px;
    margin-bottom: 0px;
    margin: 0;
    -webkit-print-color-adjust: exact;
}
.card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
}
</style>
<div class="container container-top">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="card-header text-center border-0 bg-primary text-white" id="myDropDown">
                    <h3>Cetak Tiket</h3>
                </div>
                <div class="card-body justify-content-center border-0">

                      <?php 
                      foreach ($tiket as $pesan) { ?>
                           <div class="tiket card" style="width: 700px;">
                            <div class="tiket card-header">
                                # <?php echo $pesan['ID']; ?>
                                <span class="float-right">BOARDING PASS</span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <b>Nama Penumpang</b>
                                        <p>
                                            <?php echo $pesan['nama_penumpang']; ?>
                                        </p>
                                        <b>No Identitas</b>
                                        <p>
                                        <?php echo $pesan['no_identitas']; ?>
                                        </p>
                                        <b>BUS</b>
                                        <p>
                                        <?php echo $pesan['nama_bus']; ?>
                                        </p>
                                    </div>

                                    <div class="col-3">
                                        <b>Kode Booking</b>
                                        <p>
                                        <?php echo $pesan['no_tiket']; ?>
                                        </p>
                                        <b>Kelas</b>
                                        <p>
                                        <?php echo $pesan['Kelas']; ?>
                                        </p>
                                        <b>No Kursi</b>
                                        <p>
                                        <?= $pesan['bagian']; ?>
                                        <?php echo $pesan['kode_kursi']; ?>
                                        </p>
                                    </div>

                                    <div class="col-3">
                                    <b>Waktu Berangkat</b>
                                        <p>
                                        <?php echo date_format(new DateTime($pesan['tgl_berangkat']), "Y-m-d, H:i") . ' WIB'; ?>
                                        </p>
                                        <b>Asal</b>
                                        <p>
                                        <?php echo $pesan['ASAL']; ?>
                                        </p>
                                        <b>Tujuan</b>
                                        <p>
                                        <?php echo $pesan['TUJUAN']; ?>
                                        </p>
                                    </div>

                                    <div class="col-2">
                                    </div>
                                </div>
                            </div>
                            <div class="tiket card-footer">
                            </div>

                        </div>
                      <?php }
                      ?>
            <!-- </tbody>
                    </table> -->
            <button class="btn btn-block btn-primary mt-5" id="printpagebutton" onclick="printpage()">Print</button>
            </div>
        </div>

    </div>
</div>
</div>

<script>
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        var myDropDown = document.getElementById('myDropDown');
        myDropDown.style.display = "none";
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Set Background to white
        document.body.style.backgroundColor = "white"; 
        //Print the page content
        window.print()
        //Set back to original after print
        printButton.style.visibility = 'visible';
        myDropDown.style.display = "block";
    }
</script>