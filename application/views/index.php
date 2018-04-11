<!DOCTYPE html>
<html >
  <head> 
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>CSS/Custom/style.css"> 
  </head>

  <body>

    <div class="login-form">
     <h1><img src="<?php echo base_url(); ?>images/Propay-Logo_base.png" width="200" alt=""/></h1>
     <span class="label label-warning"><?php echo validation_errors(); ?></span>
     <?php echo form_open('Verifylogin'); ?>
     <div class="form-group ">
       <input type="text" name="username" id="txtUsername" tabindex="1" class="form-control" placeholder="Email Address" value="" autocomplete="off">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" name="password" id="txtPassword" tabindex="2" class="form-control" placeholder="Password" autocomplete="off">
       <i class="fa fa-lock"></i>
     </div>
      <span class="alert">Invalid Credentials</span>
     <input type="submit" name="btnLogin" id="btnLogin" tabindex="4" class="log-btn" value="Log In"> 
     </form>
    
   </div>
    <script src="<?php echo base_url(); ?>JS/jquery-3.1.0.min.js"></script>
    
  </body>
</html>