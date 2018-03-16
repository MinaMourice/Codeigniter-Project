<?php
if (isset($this->session->userdata['logged_in'])) {
//$username = ($this->session->userdata['logged_in']['fname']);
$fusername = $this->session->userdata['logged_in']['fname'];
$lusername = $this->session->userdata['logged_in']['lname'];
$email = ($this->session->userdata['logged_in']['email']);
$profile_pic = $this->session->userdata['logged_in']['file'];
} 
else 
{
header("location: welcome");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style type="text/css">
.shadow
{
    text-shadow: 0 0 3px #FF0000;
}
</style>

<body>

<div class="jumbotron text-center">
  <h1>Welcome <?php echo $fusername ." ". $lusername ; ?></h1>
  
  <center> <img class="img-rounded" alt="Cinque Terre" width="304" height="236" src="<?php echo sprintf("../../uploads/images/%s", $profile_pic);?>" />

  <p>Welcome To Your Home Page</p> 
  <p>Your Email is <?php echo $email ; ?>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3 class="shadow">Wall Posts</h3></a>
      <a href="#"><p>Write Post</p></a>
      <a href="#"><p>View Posts</p></a>
    </div>
    <div class="col-sm-4">
      <h3 class="shadow">Friends</h3>
      <a href="#"><p>Add Friends</p></a>
      <a href="#"><p>View Friend</p></a>
    </div>
    <div class="col-sm-4">
      <h3 class="shadow">Events</h3>        
      <a href="#"><p>Add Events</p></a>
      <a href="#"><p>View Events</p></a>
    </div>
  </div>
</div>

</body>
</html>
