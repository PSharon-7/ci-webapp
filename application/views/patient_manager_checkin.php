<?php $this->load->view('templates/header_auth'); ?>
<?php $this->load->view('templates/nav_patientmanager'); ?>

<?php if ($doctorcheck == 0) { ?>
<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<form class="mt-3" action="" method="post">
    <div class="container">
        <div class="form-group">
            <label for="name">姓名</label>
            <input class="form-control" name="name" type="text" value="<?php echo isset($_POST['name'])? $_POST['name'] : $name; ?>" required>
        </div>

        <div class="form-group">
            <label for="id">身份证号</label>
            <input class="form-control" name="id" type="text" value="<?php echo isset($_POST['id'])? $_POST['id'] : $id; ?>" required>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="gender">性别</label>
                <select name="gender" class="form-control">
                    <option <?php echo ((isset($_POST['gender']) && $_POST['gender'] == '男') || (isset($gender) && $gender == '男')) ? 'selected="selected"' : ''; ?>>男</option>
                    <option <?php echo ((isset($_POST['gender']) && $_POST['gender'] == '女') || (isset($gender) && $gender == '女')) ? 'selected="selected"' : ''; ?>>女</option>
                </select>
            </div>

            <div class="form-group col-6">
                <label for="age">年龄</label>
                <input class="form-control" name="age" type="text" value="<?php echo isset($_POST['age'])? $_POST['age'] : $age; ?>">
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-6">
                <label for="smokehistory">吸烟史</label>
                <select name="smokehistory" class="form-control">
                    <option <?php echo ((isset($_POST['smokehistory']) && $_POST['smokehistory'] == '有') || (isset($smokehistory) && $smokehistory == '有')) ? 'selected="selected"' : ''; ?>>有</option>
                    <option <?php echo ((isset($_POST['smokehistory']) && $_POST['smokehistory'] == '无') || (isset($smokehistory) && $smokehistory == '无')) ? 'selected="selected"' : ''; ?>>无</option>
                </select>
            </div>

            <div class="form-group col-6">
                <label for="drinkhistory">饮酒史</label>
                <select name="drinkhistory" class="form-control">
                    <option <?php echo ((isset($_POST['drinkhistory']) && $_POST['drinkhistory'] == '有') || (isset($drinkhistory) && $drinkhistory == '有')) ? 'selected="selected"' : ''; ?>>有</option>
                    <option <?php echo ((isset($_POST['drinkhistory']) && $_POST['drinkhistory'] == '无') || (isset($drinkhistory) && $drinkhistory == '无')) ? 'selected="selected"' : ''; ?>>无</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="phonenumber">电话号码</label>
            <input class="form-control" name="phonenumber" type="text" value="<?php echo isset($_POST['phonenumber'])? $_POST['phonenumber'] : $phonenumber; ?>">
        </div>
        
        <div class="form-group">
            <label for="address">家庭住址</label>
            <input class="form-control" name="address" type="text" value="<?php echo isset($_POST['address'])? $_POST['address'] : $address; ?>">
        </div>
        
        <div class="form-group">
            <label for="checkindiagnosis">入院诊断</label>
            <input class="form-control" name="checkindiagnosis" type="text" value="<?php echo isset($_POST['checkindiagnosis'])? $_POST['checkindiagnosis'] : $checkindiagnosis; ?>">
        </div>
        
        <div class="form-group">
            <label for="checkintime">入院时间</label>
            <input class="form-control" name="checkintime" type="date" value="<?php echo isset($_POST['checkintime'])? $_POST['checkintime'] : $checkintime; ?>">
        </div>
        
        <div class="form-group">
            <label for="history">既往史</label>
            <input class="form-control" name="history" type="text" value="<?php echo isset($_POST['history'])? $_POST['history'] : $history; ?>">
        </div>

        <div class="d-flex justify-content-center">
            <button class="btn btn-primary" name="submit">提交审核</button>
        </div>
    </div>
</form>

<?php } else {?>
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

        <div class="d-flex justify-content-center">
            <button class="btn btn-danger" name="submit">取消审核</button>
        </div>
    </div>
</form>
<?php }?>

<div class="my-4"></div>

<?php $this->load->view('templates/footer'); ?>