<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="utf-8">
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
    <div class="box col-md-4">
        <?php echo form_open('admin/edit_konfig')?>
        <input type="text" name="id" value="<?php echo $config->id?>" placeholder="Telpon" hidden=""> 
        <h3>Konfigurasi Aplikasi</h3>
        <table class="table table-hover">
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-pencil blue"></i></span>
                      <input type="text" class="form-control" name="nama_aplikasi" value="<?php echo $config->nama_aplikasi?>" placeholder="Nama Aplikasi">  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar blue"></i></span>
                      <input type="text" class="form-control" name="header" value="<?php echo $config->header?>" placeholder="Header Aplikasi">  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-star blue"></i></span>
                      <input type="text" class="form-control" name="footer" value="<?php echo $config->footer?>" placeholder="Footer Aplikasi">  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-home blue"></i></span>
                      <input type="text" class="form-control" name="telpon" value="<?php echo $config->telpon?>" placeholder="Telpon">  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-camera blue"></i></span>
                      <input type="text" class="form-control" name="alamat" value="<?php echo $config->alamat?>" placeholder="Alamat">  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-tint blue"></i></span>
                      <input type="text" class="form-control" name="meta" value="<?php echo $config->meta?>" placeholder="Meta Aplikasi">  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="submit" class="button form-group btn-primary">Edit dan Simpan Konfigurasi</button>
                </td>
            </tr>
        </table>
    </form>
    </div>
    <div class="box col-md-8">
        <h3>Seluruh Menu Aplikasi</h3>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Nomer</th>
        <th>Nama Menu</th>
        <th>URL</th>
        <th>Simbol</th>
        <th>Tanggal Input</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($menu_all-> result() as $t){?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $t->nama_menu;?></td>
            <td><?php echo $t->url;?></td>
            <td><?php echo $t->simbol;?></td>
            <td><?php echo $t->tgl_input;?></td>
            <td><?php echo $t->email;?></td>
            <td>
                <?php if($grup->id=='1'){?>
                    <a href="<?php echo base_url()?>index.php/admin/edit_menu/<?php echo $t->id?>" class="label label-warning">Edit</a>
                    <a href="<?php echo base_url()?>index.php/admin/hapus_menu/<?php echo $t->id?>" class="label label-danger">Hapus</a>
                <?php } ?>
            </td>
        </tr>
        <?php $no++;} ?>
    </tbody>
    </table>
    </div>
    <!--/span-->

    </div><!--/row-->
    <div class="row">
        <div class="box col-md-4">
        <?php echo form_open('admin/buat_menu')?>
        <h3>Membuat Menu</h3>
        <table class="table table-hover">
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-pencil blue"></i></span>
                      <input type="text" class="form-control" name="nama_menu" placeholder="Nama Menu">  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar blue"></i></span>
                      <input type="text" class="form-control" name="url" placeholder="URL">  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-star blue"></i></span>
                      <input type="text" class="form-control" name="simbol"  placeholder="Simbol">  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="simpan_menu" class="button form-group btn-success">Simpan Menu</button>
                </td>
            </tr>
        </table>
    </form>
    </div>
        <div class="box col-md-3">
        <?php echo form_open('admin/mapping_menu')?>
        <h3>Mapping Menu</h3>
        <table class="table table-hover">
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-pencil blue"></i></span>
                      <select name="menu" id="selectError" data-rel="chosen" class="form-control">
                          <?php foreach ($menu_all->result() as $t){?>
                          <option value="<?php echo $t->nama_menu?>"><?php echo $t->nama_menu?></option>
                          <?php } ?>
                      </select> 
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-ban-circle blue"></i></span>
                      <select name="group" id="selectError" data-rel="chosen" class="form-control">
                          <?php foreach ($user_group->result() as $t){?>
                          <option value="<?php echo $t->name?>"><?php echo $t->name?></option>
                          <?php } ?>
                      </select> 
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="mapping_menu" class="button form-group btn-success">Simpan Menu</button>
                </td>
            </tr>
        </table>
    </form>
    </div>
    <div class="box col-md-5">
        <?php echo form_open('admin/mapping_menu')?>
        <h3>Tabel Mapping Menu</h3>
        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Nomer</th>
        <th>Nama Menu</th>
        <th>Grup</th>
        <th>Tanggal Buat</th>
        <th>Pembuat</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($mapping_menu-> result() as $t){?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $t->menu;?></td>
            <td><?php echo $t->grup;?></td>
            <td><?php echo $t->tgl_input;?></td>
            <td><?php echo $t->email;?></td>
            <td>
                <?php if($grup->id=='1'){?>
                    <a href="<?php echo base_url()?>index.php/admin/delete_mapping/<?php echo $t->id?>" class="label label-danger">Hapus</a>
                <?php } ?>
            </td>
        </tr>
        <?php $no++;} ?>
    </tbody>
    </table>
    </form>
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
