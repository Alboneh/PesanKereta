
<div class="container mt-5 container-top">
<?php if($this->session->flashdata('flash')) : ?>
                <div class="flash-data" data-flashdata= "<?= $this->session->flashdata('flash')?>"></div>
            <?php unset($_SESSION['flash']);?>
            <?php endif;?>
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card card-primary p-2 pl-5 pr-5">
                <div class="card-header text-center border-0">
                    <h3 class="font-weight-bold">Register</h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('login/aksi_register'); ?>" method="POST">
                    <div class="form-group">
                            <label for="" class="form-label">
                            Username
                            </label>
                                <input name="username" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">
                           Namalengkap
                            </label>
                                <input name="namalengkap" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                           No Telepon
                            </label>
                                <input name="no_telpon" type="text" class="form-control">
                        </div>
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
                        <p>Sudah Punya Akun? <a href="<?php echo site_url('login'); ?>">Login</a> </p> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>