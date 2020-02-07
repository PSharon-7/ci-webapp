<?php $this->load->view('templates/header_static_login'); ?>

<form method="POST" class="form-signin" action="<?php echo site_url('Login/process'); ?>">

	<h1 class="h3 mb-3 font-weight-normal">邵阳市中心医院</h1>

	<label for="inputAccountID" class="sr-only">医生账号</label>
	<input type="text" id="inputAccountID" name="user" class="form-control" placeholder="医生账号" required autofocus>

	<label for="inputPassword" class="sr-only">密码</label>
	<input type="password" id="inputPassword" name="pass" class="form-control" placeholder="密码" required>

	<div class="checkbox mb-3">
    <label>
    	<input type="checkbox" name="remember_me" value="1"> 下次自动登录
    </label>
	</div>
	<button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
</form>

<?php $this->load->view('templates/footer'); ?>