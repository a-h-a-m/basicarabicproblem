<html>
<head>
   
<title>Basic Arabic Problem</title>
 
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />

<link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/assets/bootstrap/css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="<?= BASEURL ?>/assets/dataTables/css/dataTables.bootstrap.min.css">
<?php if($_SESSION['login'] == 1): ?>
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/assets/css/style.css?v=4"/>
    <script type="text/javascript" src="<?= BASEURL ?>/assets/js/ujian.js?v=4"></script>
<?php else: ?>
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/assets/css/style.css?v=4"/>
    <script type="text/javascript" src="<?= BASEURL ?>/assets/js/ujian.js?v=4"></script>
<?php endif; ?>
<script type="text/javascript" src="<?= BASEURL ?>/assets/jquery/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="<?= BASEURL ?>/assets/bootstrap/js/bootstrap.min.js"></script>   
<link href='https://fonts.googleapis.com/css?family=Noto+Naskh+Arabic' rel='stylesheet'>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top"> 
   <div class="container">
   <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
        <h5 align="center">
            <img src="/assets/img/login.jpeg" width="30" height="30">
            <font color="white" style="bold"><b>Basic Arabic Problem</b></font>
        </h5>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a href="/" class="navigation"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
            <?php if($_SESSION['login'] == 1): ?>
                <li><a href="/ujian/list" class="navigation"><i class="glyphicon glyphicon-edit"></i> Manajemen Soal</a></li>
                <!-- <li><a href="/ujian/soal" class="navigation"><i class="glyphicon glyphicon-edit"></i> Ujian</a></li> -->
                <li><a href="/ujian/close" class="navigation"><i class="glyphicon glyphicon-edit"></i> Soal</a></li>
                <li><a href="/file/download" class="navigation"><i class="glyphicon glyphicon-download"></i> Download</a></li>
            <?php else: ?>
                <li><a href="/" class="navigation"><i class="glyphicon glyphicon-edit"></i> Soal</a></li>
                <li><a href="/file/download" class="navigation"><i class="glyphicon glyphicon-download"></i> Download</a></li>
            <?php endif; ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="navigation"><i class="glyphicon glyphicon-check"></i> <?= $_SESSION['nama'] ?></a></li>
            <li><a href="/home/logout" class="navigation" onclick="return confirm('Logout dari akun Anda?')"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
        </ul>
    </div>
   </div>
</nav>   

<section>   
   <div  class="container">
      <div class="row">
         <div class="col-xs-12" id="content">
         <?php if(isset($success)): ?>
            <div class="alert alert-success" role="alert">
                <?= $success ?>
            </div>
         <?php endif; if(isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
         <?php endif; ?>
            <?= $html ?>
        </div>
      </div>
   </div>
</section>

<footer> 
   <div class="container">
      <p class="text-center">Basic Arabic Problem | 2024
        <!-- Code: <a href='#' title='StokCoding.com'>StokCoding.com</a> -->
      </p>
   </div>
</footer>

</body>
</html>