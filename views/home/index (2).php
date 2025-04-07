<div class="container-fluid" style="margin-top: 10px;">   
    <div class="row">
        <div class="col-md-6 col-md-offset-4 text-center">
                
            <?php if(isset($success)): ?>
                <div class="alert alert-success" role="alert">
                    <?= $success ?>
                </div>
            <?php endif; ?>
            <?php if(isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php endif; ?>
            <div class="list-group">
                <div class="list-group-item active">
                    <center>
                        <img src="<?= BASEURL ?>/assets/img/login.jpeg" width="100" height="100">
                    </center>
                    <h3 class="text-center">Halaman Login</h3>
                    <h4 class="text-center"><b>Basic Arabic Problem</b></h4>
                </div>
                <div class="list-group-item list-group-item-info">
                    <form class="login-form" method="post" action="/?login">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </div>
                            <?php if(isset($_POST['username'])): ?>
                                <input readonly type="text" name="username" placeholder="Nama Lengkap" value="<?= $_POST['username'] ?>" autofocus class="form-control">
                            <?php else: ?>
                                <input disabled type="text" name="username" placeholder="Nama Lengkap" autofocus class="form-control">
                            <?php endif; ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </div>
                            <input type="password" name="password" placeholder="Password" class="form-control">
                          
                        </div>Lupa password? WA ke nomor 085640332895 atau<a href="https://wa.me/6285640332895" target="_blank"> Klik di sini</a>
                        <br/>
                        <button class="btn btn-primary pull-right login-button">
                            <i class="glyphicon glyphicon-log-in"></i> Login
                        </button>
                        <br/>                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>