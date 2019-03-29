<!DOCTYPE html>
<html lang="en">
<head>
    
     <meta charset="utf-8">
    <title><?php echo $config->nama_aplikasi?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $config->meta?>">
    
    <!-- The styles -->
    <link href="<?php echo base_url()?>backend/css/bootstrap-cerulean.min.css" rel="stylesheet">
    <script src="<?php echo base_url()?>backend/ckeditor/ckeditor.js"></script>
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
        <?php echo form_open('soal/input_ganda')?>
        <h3>Soal Ganda Baru</h3>
        <table class="table table-hover">
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <textarea id="editor1" name="editor1"></textarea>
                    </div><br>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-home blue"></i></span>
                      <select name="kelas" id="selectError" data-rel="chosen" class="form-control">
                          <option value="-">-Pilih Kelas-</option>
                          <?php foreach ($kelas->result() as $t){?>
                          <option value="<?php echo $t->id?>"><?php echo $t->kelas?></option>
                          <?php } ?>
                      </select>
                    </div><br>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-time blue"></i></span>
                      <select name="kunci" id="selectError" data-rel="chosen" class="form-control">
                          <option value="-">-Pilih Jawaban-</option>
                          <option value="pilihan1">Jawaban A</option>
                          <option value="pilihan2">Jawaban B</option>
                          <option value="pilihan3">Jawaban C</option>
                          <option value="pilihan4">Jawaban D</option>
                          <option value="pilihan5">Jawaban E</option>
                      </select>
                    </div><br>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar blue"></i></span>
                      <input type="text" name="pilihan1" class="form-control" placeholder="Pilihan A"  required>  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar blue"></i></span>
                      <input type="text" name="pilihan2" class="form-control" placeholder="Pilihan B"  required>  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar blue"></i></span>
                      <input type="text" name="pilihan3" class="form-control" placeholder="Pilihan C"  required>  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar blue"></i></span>
                      <input type="text" name="pilihan4" class="form-control" placeholder="Pilihan D"  required>  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar blue"></i></span>
                      <input type="text" name="pilihan5" class="form-control" placeholder="Pilihan E"  required>  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="ganda" class="button form-group btn-primary">Simpan Data</button>
                </td>
            </tr>
        </table>
    </form>
    </div>
    <div class="box col-md-8">
        <h3>Seluruh Soal Pilihan Ganda</h3>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Nomer</th>
        <th>Isi Soal/Deskripsi</th>
        <th>A</th>
        <th>B</th>
        <th>C</th>
        <th>D</th>
        <th>E</th>
        <th>Kunci</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
        <?php $no=1; 
            if($grup->id=='1')
            {
            foreach ($soal_ganda_admin->result() as $t){?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $t->isi_soal?></td>
            <td><?php echo $t->pilihan1?></td>
            <td><?php echo $t->pilihan2?></td>
            <td><?php echo $t->pilihan3?></td>
            <td><?php echo $t->pilihan4?></td>
            <td><?php echo $t->pilihan5?></td>
            <td><?php echo $t->kunci?></td>
            <td><?php echo $t->nama_kelas?></td>
            <td>
                <a href="<?php echo base_url()?>index.php/soal/edit_soal_ganda/<?php echo $t->id?>" class="label label-warning">Edit</a>
                <a href="<?php echo base_url()?>index.php/soal/hapus_soal_ganda/<?php echo $t->id?>" class="label label-danger">Hapus</a>
            </td>
        </tr>
            <?php $no++;}}
            else if($grup->id!='1'){
                foreach ($soal_ganda->result() as $t){?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $t->isi_soal?></td>
            <td><?php echo $t->pilihan1?></td>
            <td><?php echo $t->pilihan2?></td>
            <td><?php echo $t->pilihan3?></td>
            <td><?php echo $t->pilihan4?></td>
            <td><?php echo $t->pilihan5?></td>
            <td><?php echo $t->kunci?></td>
            <td><?php echo $t->nama_kelas?></td>
            <td>
                <a href="<?php echo base_url()?>index.php/soal/edit_soal_ganda/<?php echo $t->id?>" class="label label-warning">Edit</a>
                <a href="<?php echo base_url()?>index.php/soal/hapus_soal_ganda/<?php echo $t->id?>" class="label label-danger">Hapus</a>
            </td>
        </tr>
            <?php }}?>
    </tbody>
    </table>
    </div>
    </div>
    <div class="row">        
    <div class="box col-md-4">
        <?php echo form_open('soal/input_esay')?>
        <h3>Soal Esay Baru</h3>
        <table class="table table-hover">
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <textarea id="editor2" name="editor2"></textarea>
                    </div><br>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-home blue"></i></span>
                      <select name="kelas" id="selectError" data-rel="chosen" class="form-control">
                          <option value="-">-Pilih Kelas-</option>
                          <?php foreach ($kelas->result() as $t){?>
                          <option value="<?php echo $t->id?>"><?php echo $t->kelas?></option>
                          <?php } ?>
                      </select>
                    </div><br>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="esay" class="button form-group btn-primary">Simpan Data</button>
                </td>
            </tr>
        </table>
    </form>
    </div>
    <div class="box col-md-8">
        <h3>Seluruh Soal Esay</h3>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Nomer</th>
        <th>Isi Soal/Deskripsi</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
        <?php $no=1; 
            if($grup->id=='1')
            {
            foreach ($soal_esay_admin->result() as $t){?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $t->isi_soal_esay?></td>
            <td><?php echo $t->nama_kelas?></td>
            <td>
                <a href="<?php echo base_url()?>index.php/soal/edit_soal_esay/<?php echo $t->id?>" class="label label-warning">Edit</a>
                <a href="<?php echo base_url()?>index.php/soal/hapus_soal_esay/<?php echo $t->id?>" class="label label-danger">Hapus</a>
            </td>
        </tr>
            <?php $no++;}}
            else if($grup->id!='1'){
                foreach ($soal_esay->result() as $t){?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $t->isi_soal_esay?></td>
            <td><?php echo $t->nama_kelas?></td>
            <td>
                <a href="<?php echo base_url()?>index.php/soal/edit_soal_esay/<?php echo $t->id?>" class="label label-warning">Edit</a>
                <a href="<?php echo base_url()?>index.php/soal/hapus_soal_esay/<?php echo $t->id?>" class="label label-danger">Hapus</a>
            </td>
        </tr>
            <?php }}?>
    </tbody>
    </table>
    </div>
    </div><!--/row-->
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
<script>
		CKEDITOR.replace( 'editor1', {
			extraPlugins: 'uploadimage,image2',
			height: 300,

			// Upload images to a CKFinder connector (note that the response type is set to JSON).
			uploadUrl: '<?php echo base_url();?>backend/kcfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

			// Configure your file manager integration. This example uses CKFinder 3 for PHP.
                        filebrowserBrowseUrl : '<?php echo base_url();?>backend/kcfinder/browse.php?opener=ckeditor&type=files',
                        filebrowserImageBrowseUrl : '<?php echo base_url();?>backend/kcfinder/browse.php?opener=ckeditor&type=images',
                        filebrowserFlashBrowseUrl : '<?php echo base_url();?>backend/kcfinder/browse.php?opener=ckeditor&type=flash',
                        filebrowserUploadUrl : '<?php echo base_url();?>backend/kcfinder/upload.php?opener=ckeditor&type=files',
                        filebrowserImageUploadUrl : '<?php echo base_url();?>backend/kcfinder/upload.php?opener=ckeditor&type=images',
                        filebrowserFlashUploadUrl : '<?php echo base_url();?>backend/kcfinder/upload.php?opener=ckeditor&type=flash',
			// The following options are not necessary and are used here for presentation purposes only.
			// They configure the Styles drop-down list and widgets to use classes.

			stylesSet: [
				{ name: 'Narrow image', type: 'widget', widget: 'image', attributes: { 'class': 'image-narrow' } },
				{ name: 'Wide image', type: 'widget', widget: 'image', attributes: { 'class': 'image-wide' } }
			],

			// Load the default contents.css file plus customizations for this sample.
			contentsCss: [ CKEDITOR.basePath + 'contents.css', 'https://sdk.ckeditor.com/samples/assets/css/widgetstyles.css' ],

			// Configure the Enhanced Image plugin to use classes instead of styles and to disable the
			// resizer (because image size is controlled by widget styles or the image takes maximum
			// 100% of the editor width).
			image2_alignClasses: [ 'image-align-left', 'image-align-center', 'image-align-right' ],
			image2_disableResizer: true
		} );
	</script>
        <script>
		CKEDITOR.replace( 'editor2', {
			extraPlugins: 'uploadimage,image2',
			height: 300,

			// Upload images to a CKFinder connector (note that the response type is set to JSON).
			uploadUrl: '<?php echo base_url();?>backend/kcfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

			// Configure your file manager integration. This example uses CKFinder 3 for PHP.
                        filebrowserBrowseUrl : '<?php echo base_url();?>backend/kcfinder/browse.php?opener=ckeditor&type=files',
                        filebrowserImageBrowseUrl : '<?php echo base_url();?>backend/kcfinder/browse.php?opener=ckeditor&type=images',
                        filebrowserFlashBrowseUrl : '<?php echo base_url();?>backend/kcfinder/browse.php?opener=ckeditor&type=flash',
                        filebrowserUploadUrl : '<?php echo base_url();?>backend/kcfinder/upload.php?opener=ckeditor&type=files',
                        filebrowserImageUploadUrl : '<?php echo base_url();?>backend/kcfinder/upload.php?opener=ckeditor&type=images',
                        filebrowserFlashUploadUrl : '<?php echo base_url();?>backend/kcfinder/upload.php?opener=ckeditor&type=flash',
			// The following options are not necessary and are used here for presentation purposes only.
			// They configure the Styles drop-down list and widgets to use classes.

			stylesSet: [
				{ name: 'Narrow image', type: 'widget', widget: 'image', attributes: { 'class': 'image-narrow' } },
				{ name: 'Wide image', type: 'widget', widget: 'image', attributes: { 'class': 'image-wide' } }
			],

			// Load the default contents.css file plus customizations for this sample.
			contentsCss: [ CKEDITOR.basePath + 'contents.css', 'https://sdk.ckeditor.com/samples/assets/css/widgetstyles.css' ],

			// Configure the Enhanced Image plugin to use classes instead of styles and to disable the
			// resizer (because image size is controlled by widget styles or the image takes maximum
			// 100% of the editor width).
			image2_alignClasses: [ 'image-align-left', 'image-align-center', 'image-align-right' ],
			image2_disableResizer: true
		} );
	</script>

</body>
</html>
