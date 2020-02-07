<!DOCTYPE html>  
<html>  
<head>  
    <title></title>  
</head>  
<body>  
    Welcome 
    <?php echo $this->session->userdata('user'); ?>   
<br>  
    <?php echo anchor('Login/logout', 'Logout'); ?> 


    <?php echo $this->session->userdata('remember'); ?> 
  
</body>  
</html>  