<!DOCTYPE html>
<html>

<head>
	<title>Sankalan 2014:Backend</title>

<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="./css/fileUpload.css">


<script type="text/javascript" src="./scripts/jquery.min.js"></script>
<script type="text/javascript" src="./scripts/jquery-ui.min.js"></script>


<script type="text/javascript" src="./scripts/excelUpload.js"></script>

<script>
	$(function() {
		// alert("activate Tabs");
		$( "#tabs" ).tabs();
	});
</script>


</head>
<body>
	
	<h1>Sankalan 2014</h1>

<div id="tabs">
	<ul>
	<li><a href="#tabs-1">Mass Mail</a></li>
	<li><a href="#tabs-2">Proin dolor</a></li>
	<li><a href="#tabs-3">Aenean lacinia</a></li>
	</ul>
	<div id="tabs-1">
		<div id="uploadDiv" style="height:39%;">
			<div class="uploadContainer" >
		            <div class="contr"><h2>Select the excel(.xlsx) file Containing the emails in column 1</h2></div>

		            <div class="upload_form_cont">
		                <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php">
		                	<div style="width:25%; float:left;">
			                    <div >
			                        <!-- <div><label for="image_file">Please select Zip file</label></div> -->
			                        <div><input type="file" name="image_file" id="image_file" onchange="fileSelected();" /></div>
			                    </div>
			                    <div style="margin-top:10px;">
			                        <input type="button" value="Upload" onclick="startExcelUploading()" />
			                    </div>
		                    </div>
		                    <div style="width:74%; float:right;">
		                    	<div style="width:20%; float:left;">
				                    <div id="fileinfo">
				                        <div id="filename"></div>
				                        <div id="filesize"></div>
				                        <div id="filetype"></div>
				                        <div id="filedim" style="display:none;"></div>
				                    </div>
				                    <div id="error">You should select valid image files only!</div>
				                    <div id="error2">An error occurred while uploading the file</div>
				                    <div id="abort">The upload has been canceled by the user or the browser dropped the connection</div>
				                    <div id="warnsize">Your file is very big. We can't accept it. Please select more small file</div>
				                </div>
				                <div style="width:79%; float:right;">
				                    <div id="progress_info">
				                        <div id="progress"></div>
				                        <div id="progress_percent">&nbsp;</div>
				                        <div class="clear_both"></div>
				                        <div>
				                            <div id="speed">&nbsp;</div>
				                            <div id="remaining">&nbsp;</div>
				                            <div id="b_transfered">&nbsp;</div>
				                            <div class="clear_both"></div>
				                        </div>
				                        <div id="upload_response"></div>
				                    </div>
			                    </div>
		                    </div>
		                </form>

		                <img style="display:none;"id="preview" />
		            </div>
		        </div>

		        <div id="massMailBtn"style="display:none;">
			        <form action="./scripts/massMail.php" method="post">
			        	<input type="hidden" value="sendMassMails" name="sendMassMails" /><!--  No Security Here :P -->
			        	<input type="submit" value="Send Mass Mails"/>
		        	</form>
		        </div>
</div>
	</div>
	<div id="tabs-2">
		<p>This is tab 2</p>
	</div>
	<div id="tabs-3">
		<p>This is tab 3</p>
	</div>
</div>

</body>
</html>