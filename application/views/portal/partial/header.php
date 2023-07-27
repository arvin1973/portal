<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="<?= base_url('assets/') ?>img/logo.png" type="image/png">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <title><?= $judul ?></title>

  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/maicons.css">

  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.css">

  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/animate/animate.css">

  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/theme.css">


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
      <div class="container">
        <a href="<?= base_url('overview')?>">
          <img src="<?= base_url('assets/') ?>img/logo2.png" height="50" alt="Logo">
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-auto">
            <li <?= $this->uri->segment(1) == 'overview' || $this->uri->segment(1)=='' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
              <a class="nav-link" href="<?= base_url('overview')?>">Beranda</a>
            </li>
            <li <?= $this->uri->segment(1) == 'listberita'  ? 'class="nav-item active"' : 'class="nav-item"' ?>>
              <a class="nav-link" href="<?= base_url('listberita')?>">Berita</a>
            </li>
            <li <?= $this->uri->segment(1) == 'visimisi'  || $this->uri->segment(1)=='struktur' || $this->uri->segment(1)=='penduduk' ? 'class="nav-item dropdown active"' : 'class="nav-item dropdown"' ?>>
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Informasi
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= base_url('visimisi')?>">Visi & Misi</a>
                <a class="dropdown-item" href="<?= base_url('penduduk')?>">Kependudukan</a>
                <a class="dropdown-item" href="<?= base_url('struktur')?>">Struktur Organisasi</a>
              </div>
            </li>
            <li <?= $this->uri->segment(1) == 'hubungikami'  ? 'class="nav-item active"' : 'class="nav-item"' ?>>
              <a class="nav-link" href="<?= base_url('hubungikami')?>">Hubungi Kami</a>
            </li>
          </ul>
        </div>

      </div>
    </nav>
