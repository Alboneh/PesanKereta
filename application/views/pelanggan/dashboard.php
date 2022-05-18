<style>
body {
   width: 100vw;
   margin: 0;
   font-family: helvetica;
}
.card{
   background-color: white;
}
.card-body-custom{
   background-color: white;
}
.card-custom {
   width: 100%;
   max-width: 300px;
   min-width: 200px;
   height: 250px;
   margin: 10px;
   border-radius: 10px;
   box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.24);
   border: 2px solid rgba(7, 7, 7, 0.12);
   font-size: 16px;   
   transition: all 0.3s ease;
   position: relative;
   display: flex;
   justify-content: center;
   align-items: center;
   flex-direction: column;
   cursor: pointer;
   transition: all 0.3s ease;
}

.icon {
   margin: 0 auto;
   width: 100%;
   height: 80px;
   max-width:80px;
   background: black;
   border-radius: 100%;
   display: flex;
   justify-content: center;
   align-items: center;
   color: white;
   transition: all 0.8s ease;
   background-position: 0px;
   background-size: 200px;
}

.material-icons.md-18 { font-size: 18px; }
.material-icons.md-24 { font-size: 24px; }
.material-icons.md-36 { font-size: 36px; }
.material-icons.md-48 { font-size: 48px; }

.card-custom .title {
   width: 100%;
   margin: 0;
   text-align: center;
   margin-top: 30px;
   color: white;
   font-weight: 600;
   text-transform: uppercase;
   letter-spacing: 4px;
}

.card-custom .text {
   width: 80%;
   margin: 0 auto;
   font-size: 13px;
   text-align: center;
   margin-top: 20px;
   color: white;
   font-weight: 200;
   letter-spacing: 2px;
   opacity: 0;
   max-height:0;
   transition: all 0.3s ease;
}

.card-custom:hover {
   height: 270px;
}

.card-custom:hover .info {
   height: 90%;
}

.card-custom:hover .text {
   transition: all 0.3s ease;
   opacity: 1;
   max-height:40px;
}

.card-custom:hover .icon {
   background-position: -120px;
   transition: all 0.3s ease;
}

.card-custom:hover .icon i {
   opacity: 1;
   transition: all 0.3s ease;
}
</style>
<div class="container container-top">
<div class="card col-12  mt-5 border-0">
      <div class="card-body card-body-custom border border-primary rounded">
        <h4>Selamat Datang <?= $this->session->userdata('namalengkap');?></h4>
        <p style="color: grey;"> Silahkan pilih menu dibawah ini untuk melakukan pemesanan tiket</p>
      </div>
      </div>
   <div>
      <!-- card -->
      <div class="row justify-content-center mt-5">
      <div class="card card-custom bg-dark col-4">
      <a href="<?= site_url('pelanggan/pemesanan') ?>" class="card-body mt-4">
            <div class="icon"><i class="material-icons md-36">search</i></div>
            <p class="title">Pencarian Tiket</p>
            <p class="text">Lakukan pencarian tiket yang tersedia sesuai ketentuan anda</p>
            <a class="stretched-link" href="<?= site_url('pelanggan/pemesanan') ?>"></a>
        </a>
      </div>
      <!-- end card -->
      <!-- card -->
      <div class="card card-custom bg-dark col-4">
      <?php $id = $this->session->userdata('id') ; ?>
         <a href="<?= site_url('pelanggan/history/'.$id) ?>" class="card-body ">
            <div class="icon mt-4"><i class="material-icons md-36">calendar_today</i></div>
            <p class="title">Pemesanan Anda</p>
            <p class="text">Cek pemesanan yang sudah anda lakukan.</p>
        </a>
      </div>
      <!-- end card -->
      <!-- card -->
      <div class="card card-custom bg-dark col-4">
      <a href="<?= site_url('pelanggan/profile/'.$id) ?>" class="card-body mt-4">
            <div class="icon"><i class="material-icons md-36">account_circle</i></div>
            <p class="title">Profile</p>
            <p class="text">Ganti data profile anda</p>
      </a>
      </div>
   </div>
   </div>
</div>