<?php $this->load->view('templates/header_static'); ?>

<div alt="top photo">
	<img src="<?php echo base_url();?>assets/images/hospital.jpeg" class="w-100">
</div>

<div class="jumbotron">
	<h1 class="font-italic">概览介绍</h1>
	<p class="lead my-3">邵阳市中心医院胸外科室简介邵阳市中心医院胸外科室简介邵阳市中心医院胸外科室简介邵阳市中心医院胸外科室简介邵阳市中心医院胸外科室简介。</p>
</div>

<div class="container">
	<hr>

	<h3 class="text-center my-4">心胸百科</h3>

	<div class="row my-3">
		<div class="col">
			<a href="/category/lung">
				<div class="card">
						<img class="card-img" src="<?php echo base_url();?>assets/images/square.png">
						<div class="card-img-overlay d-flex">
								<div class="my-auto mx-auto text-center text-dark">肺</div>
						</div>
				</div>
			</a>
		</div>

		<div class="col">
			<a href="/category/heart">
				<div class="card">
						<img class="card-img" src="<?php echo base_url();?>assets/images/square.png">
						<div class="card-img-overlay d-flex">
								<div class="my-auto mx-auto text-center text-dark">心脏</div>
						</div>
				</div>
			</a>
		</div>

		<div class="col">
			<a href="/category/esophagus">
				<div class="card">
						<img class="card-img" src="<?php echo base_url();?>assets/images/square.png">
						<div class="card-img-overlay d-flex">
								<div class="my-auto mx-auto text-center text-dark">食管</div>
						</div>
				</div>
			</a>
		</div>

	</div>


	<hr>
</div>

</div>

<footer class="text-center postbox-text">
	<p><a href="#">返回顶部</a></p>
	
	<p>文字文字文字</p>
</footer>

<?php $this->load->view('templates/footer'); ?>