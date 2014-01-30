<?php	
	include 'app.php'; // import php files

	$authUser = new AuthUser(); // get auth user
	$authUser->Authenticate('Admin');
	
	Utilities::SetLanguage($authUser->Language); // set language
?>
<!DOCTYPE html>
<html>

<head>
	
<title><?php print _("Stylesheets"); ?>&mdash;<?php print $authUser->SiteName; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<!-- include css -->
<link href="<?php print FONT; ?>" rel="stylesheet" type="text/css">
<link href="<?php print BOOTSTRAP_CSS; ?>" rel="stylesheet">
<link href="<?php print FONTAWESOME_CSS; ?>" rel="stylesheet">
<link type="text/css" href="js/helper/codemirror/codemirror.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/app.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/messages.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/list.css?v=<?php print VERSION; ?>" rel="stylesheet">

</head>

<body data-currpage="styles">
	
<?php include 'modules/menu.php'; ?>

<!-- messages -->
<input id="msg-updating" value="<?php print _("Updating styles..."); ?>" type="hidden">
<input id="msg-updated" value="<?php print _("Styles updated successfully"); ?>" type="hidden">
<input id="msg-updating-error" value="<?php print _("There was a problem saving the style file, please try again"); ?>" type="hidden">
<input id="msg-name-required" value="<?php print _("A name is required to add a stylesheet"); ?>" type="hidden">
<input id="msg-style-adding" value="<?php print _("Adding a stylesheet..."); ?>" type="hidden">
<input id="msg-style-added" value="<?php print _("Stylesheet successfully added"); ?>" type="hidden">
<input id="msg-style-adding-error" value="<?php print _("Adding a stylesheet..."); ?>" type="hidden">
<input id="msg-style-removing" value="<?php print _("Removing the stylesheet..."); ?>" type="hidden">
<input id="msg-style-removed" value="<?php print _("Stylesheet successfully removed"); ?>" type="hidden">
<input id="msg-style-removing-error" value="<?php print _("There was a problem removing the stylesheet, please try again"); ?>" type="hidden">

<section class="main">

    <nav>
        <a class="show-menu"><i class="fa fa-bars fa-lg"></i></a>
        
        <div class="fs-container full">
    
			<div class="fs">
    
		        <ul>
		        <!-- ko foreach: files -->
		            <li data-bind="css: name"><a data-bind="text: file, click: $parent.updateContent"></a><i data-bind="click: $parent.showRemoveDialog" class="fa fa-minus-circle fa-lg"></i></li>
		        <!-- /ko -->    
		            <li class="add"><i class="fa fa-plus-circle fa-lg" data-bind="click: showAddDialog"></i></li>
		        </ul>
			
			</div>
			<!-- /.fs -->
        
        </div>
        <!-- /.fs-container -->
        
    </nav>

	<div class="codemirror-block">
    	<textarea id="content" spellcheck="false" data-bind="value: content"></textarea>
	</div>

    <div class="actions">
        <button class="primary-button" data-bind="click: save"><?php print _("Save"); ?></button>
    </div>
</section>
<!-- /.main -->


<div class="modal fade" id="addDialog">

	<div class="modal-dialog">
	
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<h3><?php print _("Add Stylesheet"); ?></h3>
			</div>
			<!-- /.modal-header -->
			
			<div class="modal-body">
			
			<div class="form-group">
				<label for="name"><?php print _("Name:"); ?></label>
				<input id="name" type="text" class="form-control">
				<span class="help-block"><?php print _("Lowercase, no spaces, leave the .less off"); ?></span>
			</div>
			
			</div>
			<!-- /.modal-body -->
			
			<div class="modal-footer">
				<button class="secondary-button" data-dismiss="modal"><?php print _("Close"); ?></button>
				<button class="primary-button" data-bind="click: addStylesheet"><?php print _("Add Stylesheet"); ?></button>
			</div>
			<!-- /.modal-footer -->
		
		</div>
		<!-- /.modal-content -->
		
	</div>
	<!-- /.modal-dialog -->

  </div>
  <!-- /.modal-body -->

</div>
<!-- /.modal -->

<div class="modal fade" id="removeDialog">

	<div class="modal-dialog">
	
		<div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">x</button>
			<h3><?php print _("Remove Stylesheet"); ?></h3>
		</div>
		<!-- /.modal-header -->
		
		<div class="modal-body">
		
		<p>
			<?php print _("Confirm that you want to remove:"); ?> <strong id="removeName">this styleshet</strong>
		</p>
		
		</div>
		<!-- /.modal-body -->
		
		<div class="modal-footer">
			<button class="secondary-button" data-dismiss="modal"><?php print _("Close"); ?></button>
			<button class="primary-button" data-bind="click: removeStylesheet"><?php print _("Remove Stylesheet"); ?></button>
		</div>
			<!-- /.modal-footer -->
		
		</div>
		<!-- /.modal-content -->
		
	</div>
	<!-- /.modal-dialog -->

  </div>
  <!-- /.modal-body -->

</div>
<!-- /.modal -->

</body>

<!-- include js -->
<script type="text/javascript" src="<?php print JQUERY_JS; ?>"></script>
<script type="text/javascript" src="<?php print JQUERYUI_JS; ?>"></script>
<script type="text/javascript" src="<?php print BOOTSTRAP_JS; ?>"></script>
<script type="text/javascript" src="<?php print KNOCKOUT_JS; ?>"></script>
<script type="text/javascript" src="js/helper/moment.min.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/helper/flipsnap.min.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/helper/codemirror/codemirror.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/helper/codemirror/mode/css/css.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/global.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/messages.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/viewModels/stylesModel.js?v=<?php print VERSION; ?>"></script>

</html>Layout