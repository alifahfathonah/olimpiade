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
        
    </div>

    <div class="row">
        <div class="box col-md-4">
        <?php echo form_open_multipart('soal/edit_soal_esay')?>
        <h3>Edit Soal Essay</h3>
        <input type="text" name="id" value="<?php echo $detail_soal_esay->id?>" hidden=""> 
        <table class="table table-hover">
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <textarea id="editor2" name="editor2"><?php echo $detail_soal_esay->isi_soal_esay?></textarea>
                    </div><br>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group col-md-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-tint blue"></i></span>
                      <select name="kelas" id="selectError" data-rel="chosen" class="form-control">
                          <?php foreach ($kelas->result() as $t){?>
                          <option value="<?php echo $t->id?>"><?php echo $t->kelas?></option>
                          <?php } ?>
                      </select>  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                        <button type="submit" name="submit" class="button form-group btn-primary">Edit dan Simpan Soal Esay</button>
                </td>
            </tr>
        </table>
    </form>
    </div>
    </div><!--/row-->
    
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    
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
