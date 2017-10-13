<?php include './backend/show_user.php' ?>
<div id="myPage_container" style="color:#00fcff;position:absolute;top:0px;left:-2000px;width:100%;overflow:hidden;height:100%;background-color:rgba(76,78,76,0.9)">
<!-- <div id="register_header" style="position:relative;margin-top:40px;width:100%;height:100px;text-align:center;">
<p style="margin:20px;padding:0;font-size:50px">Welcome </p> 
</div>
 -->
<div id="userInfo" style="height:60%;">
	<div id="register_header" style="position:relative;margin-top:20px;width:100%;height:60px;text-align:center;">
		<p style="margin:20px;padding:0;font-size:50px">Welcome <?php echo strip_tags($user_name)?></p> 
	</div>

	<div id="myinfo" style="width:50%; float:left; text-align:center; border-right: 1px solid #00fcff;">
		<h1 style="margin-top:-5px;">User Info</h1>
		<div style="margin-top:-20px;">
		<center >

		<?php if($user_flag)
		{?>
			<table style="border-spacing:10px;">
				<tr>
					<td>SID</td>
					<td>: <?php echo htmlspecialchars($user_id) ?></td>   
				</tr>
                                <tr>
					<td>Secret Key</td>
					<td>: <?php echo htmlspecialchars($user_id_hash) ?></td>
				</tr>
				<tr>
					<td>User Name</td>
					<td>: <?php echo htmlspecialchars($user_name); ?></td>
				</tr>
				<tr>
					<td>User EmailId</td>
					<td>: <?php echo htmlspecialchars($email); ?></td>
				</tr>
				<tr>
					<td>User Mobile No.</td>
					<td>: <?php echo $user_mobile; ?></td>
				</tr>
				<tr>
					<td>Accommodation</td>
					<td>: <?php echo $user_accom; ?></td>
				</tr>
				<tr>
				<td colspan="2">
				<form method="post" action="./backend/logout.php">
					<input type="submit" id="logout_bt" name="logout_bt" value="Logout" style="color:#fff;background: linear-gradient(top, #79bc64, #578843);background-color: #69a74e;letter-spacing: 1px;width:100px;height:40px;border-radius:5px;padding: 7px 20px;border:1px solid;text-shadow: 0 1px 2px rgba(0,0,0,0.5);cursor:pointer;box-shadow:inset 0 1px 1px #a4e388;border-color: #3b6e22 #3b6e22 #2c5115">
				</form>
				</td>
				</tr>
			</table>
			<?php
		}
		else 
		{
			?>
			<h1>Some Error Occurred.</h1>
			<?php
		}?>
		</center>
		</div>
	</div>

	<div id="teamInfo" style="width:49%; float:right; text-align:center;">

			

		<?php include './backend/show_team.php';

		if($is_team && $team_flag) 
		{
		?>
		<h1 style="margin-top:-5px;margin-bottom:2px;" >Team Info</h1>
<?php if($isleader==0)
{
?>
<button id="remove_team" style="color:#fff;background: linear-gradient(top, #79bc64, #578843);background-color: #69a74e;letter-spacing: 1px;width:100px;height:30px;border-radius:5px;padding: 3px 20px;border:1px solid;text-shadow: 0 1px 2px rgba(0,0,0,0.5);cursor:pointer;box-shadow:inset 0 1px 1px #a4e388;border-color: #3b6e22 #3b6e22 #2c5115;">
		Remove
		</button>
		<img src="./images/loading.gif" height="60px" width="70px" class="no_display loading">
<?php } else

{
?>
<button id="delete_team" style="color:#fff;background: linear-gradient(top, #79bc64, #578843);background-color: #69a74e;letter-spacing: 1px;width:100px;height:30px;border-radius:5px;padding: 3px 20px;border:1px solid;text-shadow: 0 1px 2px rgba(0,0,0,0.5);cursor:pointer;box-shadow:inset 0 1px 1px #a4e388;border-color: #3b6e22 #3b6e22 #2c5115;">
		Delete
	</button>
	<img src="./images/loading.gif" height="60px" width="70px" class="no_display loading">
<?php }?>
		<h3 style="margin-top:0px;padding:0px;">You belong to the following team:-</h3>	
		<center >
			<div style="overflow-y:scroll; height:85%;">
			<table style="border-spacing:5px; ">
				<tr>
					<td>Team Id</td>
					<td><?php echo $user_team_id ?></td>
				</tr>
				<tr>
					<td>Team Name</td>
					<td><?php echo htmlspecialchars($team_name) ?></td>
				</tr>
				<tr>
					<td>Team College</td>
					<td><?php echo htmlspecialchars($college_name) ?></td>
				</tr>
				<tr>
					<td>Team Leader:</td>
					<td><?php echo htmlspecialchars($team_leader) ?></td>
				</tr>
				<?php 

					for($i = 0; $i<$team_size-1; $i++){ ?>
						<tr>
							<td>Cadet No. <?php echo $i ?>:</td>
							<td> <?php echo htmlspecialchars($members[$i]) ?></td>
						</tr>
					<?php 
					}

				?>
				
			</table>
			</div>
		</center>
		<?php
		}
		else if(!$is_team && $team_flag)
			{
		?>	
			<div id="create_team_form" style="text-align:center;margin-top:-5px;">
	<a href="javascript:showPopup()" style="color:#fff;font-size:20px;">How to register your team</a>
		
			<article style="font-size:20px;">Form a Team</article>
			<form  style="font-size:10px;">
				<table style="margin-left:auto;margin-right:auto;">
					<tr>
					<td colspan="2"><input type="text" name="team_name" id="team_name" placeholder="Team Name" style="width:100%;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;text-align:center;">
					<br>
					</td>
					</tr>

					<tr>
					<td colspan="2"><input type="text" name="college_name" id="college_name" placeholder="College Name" style="width:100%;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;text-align:center;">
					<br>
					</td>
					</tr>

					<tr>
					<td colspan="2"><input type="text" name="team_size" id="team_size"  placeholder="Team Size" style="width:100%;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;text-align:center;">
					<br>
					</td>
					</tr>

					<tr>
					<td ><input type="text" name="team_member_1" id="team_member_1"  placeholder="Secret key 1" style="width:95%;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;text-align:center;">
					</td>
					<td ><input type="text" name="team_member_2" id="team_member_2"   placeholder="Secret Key 2" style="width:99%;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;text-align:center;">
					</td>
					</tr>

					<tr>
					<td ><input type="text" name="team_member_3" id="team_member_3"  placeholder="Secret key 3" style="width:95%;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;text-align:center;">
					</td>
					<td ><input type="text" name="team_member_4" id="team_member_4"  placeholder="Secret key 4" style="width:99%;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;text-align:center;">
					</td>
					
					</tr>

					<tr>
					<td colspan="2"><input type="text" name="team_member_5" id="team_member_5"  placeholder="Secret key 5" style="width:95%;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;text-align:center;">

					</td>
					</tr>



<tr >
<td align="center" colspan="2"><input type="submit" id="create_team_bt" name="create_team_bt" value="Create" style="color:#fff;background: linear-gradient(top, #79bc64, #578843);background-color: #69a74e;letter-spacing: 1px;width:100px;height:40px;border-radius:5px;padding: 7px 20px;border:1px solid;text-shadow: 0 1px 2px rgba(0,0,0,0.5);cursor:pointer;box-shadow:inset 0 1px 1px #a4e388;border-color: #3b6e22 #3b6e22 #2c5115">
<img src="./images/loading.gif" height="60px" width="70px" class="no_display loading">
</td>
</tr>

</table>
</form>
</div>
		

		<?php	}
		else
		{
			echo "<h1>Some Error Occurred</h1>";
		}

			?>

	</div>
</div>

<div id="uploadDiv" style="height:39%;">
	<div class="uploadContainer" >
            <div class="contr"><h2>You can Upload your Abstract in DOC/DOCX/ODT/PDF format for TechnoSpeak</h2></div>

            <div class="upload_form_cont">
                <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php">
                	<div style="width:25%; float:left;">
	                    <div >
	                        <!-- <div><label for="image_file">Please select Zip file</label></div> -->
	                        <div><input type="file" name="image_file" id="image_file" onchange="fileSelected();" /></div>
	                    </div>
	                    <div style="margin-top:10px;">
	                        <input type="button" value="Upload" onclick="startUploading()" />
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
</div>



<article id="register_close" style="position:absolute;top:50px;right:50px;cursor:pointer" onclick="javascript:myPage_hide()">
<img src="./images/leftarrow.png" height="30px" width="40px">
</article>

<div class="fade_bg" style="height:100%; width:100%; background-color:#fff; visibility:hidden; position:fixed" onclick="hidePopup()">
&nbsp;
</div>

<div id="register_your_team" style="position:fixed;
	width:50%;
	z-index:11;
	border: solid 5px #114171;
	background-color:#FFF;
	visibility:hidden;
	-moz-border-radius: 5px;
	border-radius: 5px;
	-moz-box-shadow: 0px 0px 15px #000;
	-webkit-box-shadow: 0px 0px 15px #000;
	box-shadow: 0px 0px 15px #000;text-align:center;color:#000;
	overflow:scroll;">

<h1 style="text-decoration:underline">How to register your team</h1>
<input type="button" value="X" onclick="hidePopup()" style="float:right;margin-top:-10px;position:absolute;top:5px;right:0px;border-radius:0px;cursor:pointer;" />
<div style="clear:both; padding:10px;">
<div style="text-align:justify;">
<ul>
<li style="margin-bottom:10px;">Enter the required details, including the Team Name, and the Secret key of your team members(which they must have received in their registration confirmation email)

<br><br>(Note: Make sure all your team members are already registered on sankalan.info, before creating the team).</li>

<li style="margin-bottom:10px;">Enter the team size including you, between 2 and 6.
  <br> (For instance, if your team size is 2 then you'll have to give only 1 secret key i.e, the Secret key of your partner.
   <br>or<br> 
   if your team size is 3 then you'll have to give 2 Secret keys and similarly for all other cases.)</li>

<li>The one who is creating the team will be the team leader of the team.</li>

</ul>
</div>
    

</div>    
 

</div>


</div>