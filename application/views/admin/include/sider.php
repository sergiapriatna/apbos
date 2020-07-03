<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="<?php echo base_url('admin');
                        ?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" > <i class="menu-icon fa fa-graduation-cap"></i>Akademik</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-file-text-o"></i><a href="<?= base_url('dosen') ?>">Management Dosen</a></li>
                        <li><i class="fa fa-file-text-o"></i><a href="<?= base_url('mahasiswa') ?>">Management Mahasiswa</a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url('judulskripsi')?>"> <i class="menu-icon fa fa-book"></i>Judul Skripsi</a>
                </li>

                <li>
                    <a href="widgets.html"> <i class="menu-icon fa fa-print"></i>Cetak Laporan</a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Pengaturan</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Chart JS</a></li>
                        <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Flot Chart</a></li>
                        <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Peity Chart</a></li>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->