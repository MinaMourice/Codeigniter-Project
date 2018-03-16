<?php
if (isset($this->session->userdata['logged_in'])) {
header("location: http://localhost/ciblog/index.php/Welcome/signup");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body 
	{
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a
	{
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 
	{
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code
	{
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 40px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	
	.white{
		font-size: 30px;
	}

	.form-control:focus
	{
 	border-color: #FF0000;
  	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
	}
	</style>
</head>
<body>
<center><h1 class="ice panel panel-primary ice">Welcome to IceBook!</h1></center>

	
	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">What is IceBook</button>
	  <div id="demo" class="collapse">
		Icebook is an Egyptian non profit corporation and an online social media and social networking service based in Cairo, Egypt.
	  </div>
<div id="container">
	<div id="body">		

		<h2>Create an account</h2>
<?php //echo validation_errors(); ?>
	
			<form action="http://localhost/ciblog/index.php/Welcome/register" method="post" enctype="multipart/form-data">
			  									<!---Name-->
			  <div class="form-group">
			    <label for="fName">Your First Name</label>
			    <input type="text" class="form-control" id="Name" name="FName" aria-describedby="emailHelp" placeholder="First Name">
			  </div>
			  									<!---Last Name-->
			  <div class="form-group">
			    <label for="lName">Your Last Name</label>
			    <input type="text" class="form-control" id="Name" name="LName" aria-describedby="emailHelp" placeholder="Last Name">
			  </div>
			  									<!---Email-->
			  <div class="form-group">
			    <label for="Email1">Email address</label>
			    <input type="email" class="form-control" id="Email1" name="Email" aria-describedby="emailHelp" placeholder="Enter Email">
			  </div>
			 									 <!---Password-->
			  <div class="form-group">
			    <label for="Password1">Password</label>
			    <input type="password" class="form-control" id="Password1" name="Password" placeholder="New Password">
			  </div>
			  									<!---Gender-->
			  <fieldset class="form-group">
			    <legend>Radio buttons</legend>
			    <div class="form-check">
			      <label class="form-check-label">
			        <input type="radio" class="form-check-input" name="optionsRadios" id="Male" value="Male" checked>
			        Male
			      </label>
			    </div>
			    <div class="form-check">
			    <label class="form-check-label">
			        <input type="radio" class="form-check-input" name="optionsRadios" id="Female" value="Female">
			        Female
			      </label>
			    </div>
			    
			  </fieldset>
			  									<!--bIRTHDAY-->

			  <div class="form-group">
				  <label for="example-date-input" class="col-2 col-form-label">Birthday</label>
				  <div class="col-10">
				    <input class="form-control" type="date" name="Date" value="2017-07-22" id="example-date-input">
				  </div>
			  </div>

			  								<!--Upload CV-->

			  	<div class="form-group">
						<input class="form-control" type="file" name="userfile" size="20" />
				</div>

		
	
			  								<!--Submit-->
			 <center> <button type="submit"  class="btn btn-primary">Submit</button> </center>
			
			</form>
			
<?php if(isset($error))echo $error ; ?>

			
	</div>
<br>

</div>
<br>
<br>
<div class="footer"> 
	<center><h4>Already Have an Account</h4>
		<a href="http://localhost/ciblog/index.php/Welcome/login" class="btn btn-success btn-block"><h4 class="white">login</h4></a>
		</center>
	</div>
</body>
</html>