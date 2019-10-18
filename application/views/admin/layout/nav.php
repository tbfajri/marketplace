<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <!-- Menu Dashboar -->
        <li><a href="<?php echo base_url('admin/dasbor')?>"><i class="fa fa-dashboard text-aqua"></i> <span>DASHBOARD</span></a></li>

        <!-- Menu Transaksi -->
        <li><a href="<?php echo base_url('admin/transaksi')?>"><i class="fa fa-check text-aqua"></i> <span>Transaksi</span></a></li>

        <!-- Menu Kategori -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i> <span>Produk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/produk')?>"><i class="fa fa-table"></i> Data Produk </a></li>
            <li><a href="<?php echo base_url('admin/produk/tambah')?>"><i class="fa fa-plus"></i> Tambah Produk</a></li>
            <li><a href="<?php echo base_url('admin/kategori')?>"><i class="fa fa-tags"></i> Kategori Produk</a></li>
            <li><a href="<?php echo base_url('admin/slider')?>"><i class="fa fa-tags"></i> Slider Produk</a></li>
          </ul>
        </li>

        <!-- Menu Rekening -->
        <li><a href="<?php echo base_url('admin/rekening')?>"><i class="fa fa-dollar text-aqua"></i> <span>DATA REKENING</span></a></li>

        <!-- Menu User -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-lock"></i> <span>Data User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user')?>"><i class="fa fa-table"></i> Data User </a></li>
            <li><a href="<?php echo base_url('admin/user/tambah')?>"><i class="fa fa-plus"></i> Tambah User</a></li>
          </ul>
        </li>

         <!-- Menu User -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Data IKM</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user/ikm')?>"><i class="fa fa-table"></i> Data IKM </a></li>
            <li><a href="<?php echo base_url('admin/user/tambah')?>"><i class="fa fa-plus"></i> Tambah IKM</a></li>
          </ul>
        </li>

        <!-- Menu Konfigurasi -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>Konfigurasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/konfigurasi')?>"><i class="fa fa-home"></i> Konfigurasi Umum </a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/logo')?>"><i class="fa fa-image"></i> Konfigurasi Logo</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/icon')?>"><i class="fa fa-home"></i> Konfigurasi Icon</a></li>
          </ul>
        </li>

          <!-- Menu Konfigurasi -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Konfirmasi Pembayaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/dasbor/')?>"><i class="fa fa-check-square-o"></i> Konfirmasi </a></li>
           
          </ul>
        </li>


        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">