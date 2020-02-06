<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/signin.css">
	<title>医生入口</title>
</head>


<body>
	<!-- <?php echo isset($error) ? $error : ''; ?>   --> 
	<form method="POST" class="form-signin" action="<?php echo site_url('Login/process'); ?>">
		<img class="mb-4" src="{{ site.baseurl }}/docs/{{ site.docs_version }}/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">请登录</h1>

		<label for="inputAccountID" class="sr-only">医生账号</label>
		<input type="text" id="inputAccountID" name="user" class="form-control" placeholder="医生账号" required autofocus>

		<label for="inputPassword" class="sr-only">密码</label>
		<input type="password" id="inputPassword" name="pass" class="form-control" placeholder="密码" required>

		<div class="checkbox mb-3">
	    <label>
	    	<input type="checkbox" value="remember-me"> 记住我
	    </label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
	</form>
</body>
</html>