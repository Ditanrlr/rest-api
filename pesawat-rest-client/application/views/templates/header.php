<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

  <title><?php echo $judul; ?>
  </title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
    <img src="airplane.png"><a class="navbar-brand" href="#"><h1>TIKETING PESAWAT</h1></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar - nav ">
          <a class="nav-item nav-link" href="<?= base_url(); ?>">Home
            <span class="sr-only">(current)</span></a>
         <div class="nav">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Tables<b class="caret"></b></a>
          <ul class="dropdown-menu">
          <li><a  href="<?= base_url(); ?>bandara">Bandara</a></li>
          <li><a  href="<?= base_url(); ?>pesawat">Pesawat</a></li>
          <li><a  href="<?= base_url(); ?>customer">Customer</a></li>
          <li><a  href="<?= base_url(); ?>penerbangan">Penerbangan</a></li>
          <li><a  href="<?= base_url(); ?>tarif_penerbangan">Tarif Penerbangan</a></li>
          <li><a  href="<?= base_url(); ?>Booking">Booking</a></li>
          <li><a  href="<?= base_url(); ?>passenger">Passenger</a></li></div>
          <a class="nav-item nav-link" href="#">About</a>
          <form action="" method="post">
                <div class="input-group ">
                    <input type="text" class="form-control" placeholder="Cari data" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </nav>