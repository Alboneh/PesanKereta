
<div class="container mt-5 container-top">
<?php if($this->session->flashdata('flash')) : ?>
                <div class="flash-data" data-flashdata= "<?= $this->session->flashdata('flash')?>"></div>
            <?php unset($_SESSION['flash']);?>
            <?php endif;?>
            
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card card-primary p-5">
                <div class="card-header text-center border-0">
                    <h3 class="font-weight-bold">Login</h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('login/aksi_login'); ?>" method="POST">
                        <div class="form-group">
                            <label for="" class="form-label">
                           Email
                            </label>
                                <input name="email" type="text" class="form-control" >

                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">
                        Password
                            </label>
                                <input name="password" type="password" class="form-control">

                        </div>
                        <div class="form-group">
                        <button class="btn btn-dark btn-block" type="submit">Submit</button>
                        </div>
                        <p>Belum Punya Akun? <a href="<?php echo site_url('login/register'); ?>">Daftar</a> </p> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>