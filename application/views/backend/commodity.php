<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <title><?php echo $config->nama_aplikasi?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $config->meta?>">
    <!-- The styles -->
    <link href="<?php echo base_url()?>backend/css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="<?php echo base_url()?>backend/css/charisma-app.css" rel="stylesheet">
    <link href='<?php echo base_url()?>backend/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='<?php echo base_url()?>backend/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='<?php echo base_url()?>backend/bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='<?php echo base_url()?>backend/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='<?php echo base_url()?>backend/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='<?php echo base_url()?>backend/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='<?php echo base_url()?>backend/css/jquery.noty.css' rel='stylesheet'>
    <link href='<?php echo base_url()?>backend/css/noty_theme_default.css' rel='stylesheet'>
    <link href='<?php echo base_url()?>backend/css/elfinder.min.css' rel='stylesheet'>
    <link href='<?php echo base_url()?>backend/css/elfinder.theme.css' rel='stylesheet'>
    <link href='<?php echo base_url()?>backend/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='<?php echo base_url()?>backend/css/uploadify.css' rel='stylesheet'>
    <link href='<?php echo base_url()?>backend/css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="<?php echo base_url()?>backend/bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>backend/img/favicon.ico">

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            
            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url()?>index.php/Backend/logout">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Menu Utama</li>
                        <?php foreach ($menu_samping->result() as $s){?>
                        <li>
                            <a class="ajax-link" href="<?php echo base_url()?>index.php/<?php echo $s->url?>"><i class="<?php echo $s->simbol?>"></i><span> <?php echo $s->nama_menu?></span></a>
                        </li>
                        <?php } ?>
                        </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

       
        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Tables</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-8">
        <?php echo form_open_multipart('commodity/register')?>
        <h3>Tambah Barang Jualan</h3>
        <table class="table table-hover">
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user blue"></i></span>
                      <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" required>  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar blue"></i></span>
                      <textarea id="deskripsi" name="deskripsi" class="form-control" cols="4" rows="4" placeholder="Deskripsi"></textarea>  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-star blue"></i></span>
                      <input type="text" class="form-control" name="stok"  placeholder="Jumlah Stok" required>  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-phone blue"></i></span>
                      <select class="form-control" name="kondisi_barang">
                          <option value="Baru">Baru</option>
                          <option value="Second">Bekas</option>
                          <option value="Refurbished">Refurbished</option>
                      </select>  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-camera blue"></i></span>
                      <input type="file" class="form-control" name="foto"  placeholder="foto" required>  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-camera blue"></i></span>
                      <input type="file" class="form-control" name="foto1"  placeholder="foto" required>  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-camera blue"></i></span>
                      <input type="file" class="form-control" name="foto2"  placeholder="foto" required>  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-tint blue"></i></span>
                      <select name="kategori" id="selectError" data-rel="chosen" class="form-control">
                          <?php foreach ($kategori->result() as $t){?>
                          <option value="<?php echo $t->id?>"><?php echo $t->kategori?></option>
                          <?php } ?>
                      </select>  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                        <button type="submit" name="submit" class="button form-group btn-primary">Simpan Data Barang</button>
                </td>
            </tr>
        </table>
    </form>
    </div>
    </div><!--/row-->
    <div class="row">
        <div class="box col-md-8">
        <h3>Seluruh Penjual Terdaftar</h3>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Nomer</th>
        <th>Nama Customer</th>
        <th>Alamat</th>
        <th>Status Customer</th>
        <th>Rating</th>
        <th>Tanggal Daftar</th>
        <th>Foto Customer</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($buyer-> result() as $t){?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $t->nama_pembeli;?></td>
            <td><?php echo $t->alamat;?></td>
            <td><?php echo $t->status_pembeli;?></td>
            <td><?php echo $t->rating_pembeli;?></td>
            <td><?php echo $t->tgl_input;?></td>
            <td><img src="<?php echo base_url();?>img/<?php echo $t->foto?>" height="100" width="100"></td>
            <td>
                <?php if($grup->id=='1'){?>
                    <a href="<?php echo base_url()?>index.php/buyer/edit_buyer/<?php echo $t->id?>" class="label label-warning">Edit</a>
                    <a href="<?php echo base_url()?>index.php/buyer/hapus_buyer/<?php echo $t->id?>" class="label label-danger">Hapus</a>
                <?php } ?>
            </td>
        </tr>
        <?php $no++;} ?>
    </tbody>
    </table>
    </div>
    </div>

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
    <div class="row">
        
    </div>
    <!-- Ad ends -->

    <hr>

    

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright center">&copy;<?php echo $config->footer?> | <?php echo date('Y')?>  </p>

        
    </footer>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="<?php echo base_url()?>backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="<?php echo base_url()?>backend/js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='<?php echo base_url()?>backend/bower_components/moment/min/moment.min.js'></script>
<script src='<?php echo base_url()?>backend/bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='<?php echo base_url()?>backend/js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="<?php echo base_url()?>backend/bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="<?php echo base_url()?>backend/bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="<?php echo base_url()?>backend/js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="<?php echo base_url()?>backend/bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="<?php echo base_url()?>backend/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="<?php echo base_url()?>backend/js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="<?php echo base_url()?>backend/js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="<?php echo base_url()?>backend/js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="<?php echo base_url()?>backend/js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="<?php echo base_url()?>backend/js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="<?php echo base_url()?>backend/js/charisma.js"></script>


</body>
</html>
