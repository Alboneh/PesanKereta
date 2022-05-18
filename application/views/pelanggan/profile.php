<style>
.icon {

   display: flex;
   justify-content: center;
   align-items: center;
}
</style>

<div class="container container-top">
    <div class="row justify-content-center">
        <div class="col-8">
        <div class="card pl-5 pr-5">
        <div class="card-body">
            <div class="icon"><i class="material-icons md-36 text-dark" style="font-size: 120px;">account_circle</i></div>
            <form action="<?php echo site_url('pelanggan/profile_update'); ?>" method="POST">
                    <div class="form-group">
                            <label for="" class="form-label">
                            Username
                            </label>
                            <input name="id" type="text" class="form-control" value="<?= $pelanggan->id; ?>" hidden >
                                <input name="username" type="text" class="form-control" value="<?= $pelanggan->username; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">
                           Namalengkap
                            </label>
                                <input name="namalengkap" type="text" class="form-control" value="<?= $pelanggan->namalengkap; ?>">
                        </div>
                        <div class="form-group">
                           No Telepon
                            </label>
                                <input name="no_telpon" type="text" class="form-control" value="<?= $pelanggan->no_telpon; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">
                           Email
                            </label>
                                <input name="email" type="text" class="form-control" value="<?= $pelanggan->email; ?>" >
                        </div>
                        <div class="form-group ">
                        <label> Password</label>
                        <div class="input-group">
                                <input name="password" id="password" type="password" class="form-control" value="<?= $pelanggan->password; ?>">
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <i onclick="myFunction()" class="material-icons md-36">visibility</i>
                                </div>
                                </div>
                            </div>
                         </div>
                        <div class="form-group row"> 
                        <div class="col-6"><button class="btn btn-danger btn-block" type="submit">Change</button></div> 
                        <div class="col-6"><a href="<?= site_url('pelanggan')?>" class="btn btn-dark btn-block">Back</a></div>  
                        </div>
                    </form>
        </div>
        </div>
        </div>
    </div>
</div>
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>