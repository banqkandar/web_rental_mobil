  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../index.php"><?=nama;?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Halaman Utama</span>
          </a>
        </li>
<?php  if($_SESSION['karyawan']){
  ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="mobil.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Menu Mobil</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="konsumen.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Menu Konsumen</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="transaksi.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Menu Transaksi</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="backup.php">
            <i class="fa fa-cogs"></i>
            <span class="nav-link-text">Backup Data</span>
          </a>
        </li>

<?php }elseif($_SESSION['admin']){
  ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="karyawan.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Menu Karyawan</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Halaman Film">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-cogs"></i>
            <span class="nav-link-text">Backup Restore Data</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="backup.php" class="fa fa-cloud-download " >Backup</a>
            </li>
            <li>
              <a href="restore.php" class="fa fa-cloud-upload ">Restore</a>
            </li>
          </ul>
        </li>
<?php } ?>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
