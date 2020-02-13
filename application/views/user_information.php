<?php $this->load->view('templates/header'); ?>

<?php if ($doctorcheck == 1) { ?>

<form class="mt-3" action="<?php echo base_url().'patientmanager/checkin_uncheck/'.$id; ?>" method="post">
    <div class="container">
        <div class="form-group">
            <label for="name">姓名</label>
            <input class="form-control-plaintext" readonly name="name" type="text" value="<?php echo isset($_POST['name'])? $_POST['name'] : $name; ?>">
        </div>

        <div class="form-group">
            <label for="id">身份证号</label>
            <input class="form-control-plaintext" readonly name="id" type="text" value="<?php echo isset($_POST['id'])? $_POST['id'] : $id; ?>">
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="gender">性别</label>
                <input class="form-control-plaintext" readonly name="gender" type="text" value="<?php echo isset($_POST['gender'])? $_POST['gender'] : $gender; ?>">
            </div>

            <div class="form-group col-6">
                <label for="age">年龄</label>
                <input class="form-control-plaintext" readonly name="age" type="text" value="<?php echo isset($_POST['age'])? $_POST['age'] : $age; ?>">
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-6">
                <label for="smokehistory">吸烟史</label>
                <input class="form-control-plaintext" readonly name="smokehistory" type="text" value="<?php echo isset($_POST['smokehistory'])? $_POST['smokehistory'] : $smokehistory; ?>">
            </div>

            <div class="form-group col-6">
                <label for="drinkhistory">饮酒史</label>
                <input class="form-control-plaintext" readonly name="drinkhistory" type="text" value="<?php echo isset($_POST['drinkhistory'])? $_POST['drinkhistory'] : $drinkhistory; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="phonenumber">电话号码</label>
            <input class="form-control-plaintext" readonly name="phonenumber" type="text" value="<?php echo isset($_POST['phonenumber'])? $_POST['phonenumber'] : $phonenumber; ?>">
        </div>
        
        <div class="form-group">
            <label for="address">家庭住址</label>
            <input class="form-control-plaintext" readonly name="address" type="text" value="<?php echo isset($_POST['address'])? $_POST['address'] : $address; ?>">
        </div>
        
        <div class="form-group">
            <label for="checkindiagnosis">入院诊断</label>
            <input class="form-control-plaintext" readonly name="checkindiagnosis" type="text" value="<?php echo isset($_POST['checkindiagnosis'])? $_POST['checkindiagnosis'] : $checkindiagnosis; ?>">
        </div>
        
        <div class="form-group">
            <label for="checkintime">入院时间</label>
            <input class="form-control-plaintext" readonly name="checkintime" type="date" value="<?php echo isset($_POST['checkintime'])? $_POST['checkintime'] : $checkintime; ?>">
        </div>
        
        <div class="form-group">
            <label for="history">既往史</label>
            <input class="form-control-plaintext" readonly name="history" type="text" value="<?php echo isset($_POST['history'])? $_POST['history'] : $history; ?>">
        </div>

        <div class="row d-flex justify-content-center text-success"><p>医生已审核</p></div>
    </div>
</form>

<?php } else { ?>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<div id="form_validation_errors"></div>
<form action="" method="post">
    <div class="container">
        <div class="form-group">
            <label for="id">身份证号</label>
            <input id="idcard" class="form-control" name="id" <?php if($doctorcheck == 0) { echo 'readonly'; } ?> type="text" value="<?php echo isset($_POST['id'])? $_POST['id'] : $id; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="name">姓名</label>
            <input class="form-control" name="name" type="text" value="<?php echo isset($_POST['name'])? $_POST['name'] : $name; ?>" required>
        </div>

        <?php 
        if ($doctorcheck == -1) {
            echo '<div class="text-center"><button class="btn btn-primary" name="submit">提交</button></div>';
        }
        elseif ($doctorcheck == 0) {
            echo '<div class="text-center"><button class="btn btn-primary" name="submit">提交</button><hr><p>已提交，等待医生审核。</p></div>';
        }
        ?> 
    </div>
</form>

<?php } ?> 
<?php $this->load->view('templates/footer'); ?>

<script type="text/javascript" src="<?=base_url('assets')?>/js/form.js"></script>
