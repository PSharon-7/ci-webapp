<?php $this->load->view('templates/header_static'); ?>
<style>
    html, body {
        height: 100%;
        background-color: #f5f5f5;
    }
</style>

<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <form class="col-10" method="POST" action="<?php echo site_url('Login/process'); ?>">

        	<h1 class="h3 mb-3 font-weight-normal">邵阳市中心医院</h1>

        	<label for="user" class="sr-only">医生账号</label>
        	<input type="text" name="user" class="form-control" placeholder="医生账号" required autofocus>

        	<label for="user" class="sr-only">密码</label>
        	<input type="password" name="pass" class="form-control" placeholder="密码" required>

        	<div class="checkbox mb-3">
                <label>
                	<input type="checkbox" name="remember_me" value="1"> 下次自动登录
                </label>
        	</div>

        	<button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
        </form>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>