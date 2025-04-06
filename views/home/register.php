<div class="container-fluid" style="margin-top: 10px;">   
    <div class="row">
        <div class="col-md-6 col-md-offset-4 text-center">
                
            <?php if(isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php endif; ?>
            <div class="list-group">
                <div class="list-group-item active">
                    <center>
                        <img src="/assets/img/login.jpeg" width="100" height="100">
                    </center>
                    
                    <h3 class="text-center"><b>Basic Arabic Problem</b></h3>
                </div>
                <div class="list-group-item list-group-item-info">
                    <form class="login-form" method="post">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </div>
                            <?php if(isset($_POST['username'])): ?>
                                <input type="text" name="username" placeholder="Masukkan Nama Lengkap" value="<?= $_POST['username'] ?>" autofocus class="form-control">
                            <?php else: ?>
                                <input type="text" name="username" placeholder="Masukkan Nama Lengkap" autofocus class="form-control">
                            <?php endif; ?>
                        </div>
                        
                        <br/>
                        <button class="btn btn-primary pull-right login-button">
                            <i class="glyphicon glyphicon-log-in"></i> Lanjut
                        </button>
                        <br/>                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>