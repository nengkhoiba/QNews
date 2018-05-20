<html>
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.css">
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700);
body {
    background: -webkit-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
    background: -moz-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
    background: -ms-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
    background: -o-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
    background: linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
    font-family: 'Open Sans', sans-serif!important;
}
.well{
    background-color:#fff!important;
    border-radius:0!important;
    border:none!important;
}

.well.login-box {
    width:300px;
    margin:0 auto;
    display:block;
    margin-top:100px;
}
.well.login-box legend {
  font-size:26px;
  text-align:center;
  font-weight:300;
}
.well.login-box label {
  font-weight:300;
  font-size:16px;
  
}
.well.login-box input[type="text"] {
  box-shadow:none;
  border-color:#ddd;
  border-radius:0;
}

.well.welcome-text{
    font-size:21px;
}

/* Notifications */

.notification{
    position:fixed;
    top: 20px;
    right:0;
    background-color:#FF4136;
    padding: 20px;
    color: #fff;
    font-size:21px;
}
.notification-success{
  background-color:#3D9970;
}

.notification-show{
    display:block!important;
}


.logged-in h1{
  margin:0;
  font-weight:300;
}
</style>
</head>
<body>
<div class="container">
<div class="row">
        <div class="com-md-12">
<?php 
session_start();
if($_SESSION["Msg"]!=""){
	?>
	<div class="notification login-alert">
  <?php echo $_SESSION['Msg'];
  $_SESSION["Msg"]="";
  ?>
  
</div>
	<?php 
}

?>
   
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well login-box">
                <form action="admin/data_controller.php" method="post">
                    <legend>Login</legend>
                    <div class="form-group">
                        <label for="username-email">E-mail</label>
                        <input name='email' id="email" placeholder="E-mail " type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" name='password' placeholder="Password" type="password" class="form-control" />
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-danger btn-cancel-action">Cancel</button>
                        <input type="submit" class="btn btn-success btn-login-submit" value="Login" />
                    </div>
                </form>
            </div>
         
        </div>
    </div>
</div>
</body>
<script type="text/javascript">


</script>
</html>