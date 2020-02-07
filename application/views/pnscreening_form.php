<?php $this->load->view('templates/header_form'); ?>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<form action="" method="post">
    <div class="container">
        <div class="form-group">
            <label for="id">身份证号</label>
            <input class="form-control" name="id" <?php echo empty($id)? '' : 'readonly'; ?> type="text" value="<?php echo isset($_POST['id'])? $_POST['id'] : $id; ?>" required>
        </div>
        
        <div class="row">
            <div class="form-group col-6">
                <label for="name">姓名</label>
                <input class="form-control" name="name" type="text" value="<?php echo isset($_POST['name'])? $_POST['name'] : $name; ?>" required>
            </div>
            
            <div class="form-group col-6">
                <label for="gender">性别</label>
                <select name="gender" class="form-control">
                    <option <?php echo ((isset($_POST['gender']) && $_POST['gender'] == '男') || (isset($gender) && $gender == '男')) ? 'selected="selected"' : ''; ?>>男</option>
                    <option <?php echo ((isset($_POST['gender']) && $_POST['gender'] == '女') || (isset($gender) && $gender == '女')) ? 'selected="selected"' : ''; ?>>女</option>
                </select>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-6">
                <label for="age">年龄</label>
                <input class="form-control" name="age" type="text" value="<?php echo isset($_POST['age'])? $_POST['age'] : $age; ?>" required>
            </div>
            
            <div class="form-group col-6">
                <label for="smokehistory">吸烟史</label>
                <select name="smokehistory" class="form-control">
                    <option <?php echo ((isset($_POST['smokehistory']) && $_POST['smokehistory'] == '男') || (isset($smokehistory) && $smokehistory == '有')) ? 'selected="selected"' : ''; ?>>有</option>
                    <option <?php echo ((isset($_POST['smokehistory']) && $_POST['smokehistory'] == '女') || (isset($smokehistory) && $smokehistory == '无')) ? 'selected="selected"' : ''; ?>>无</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="address">家庭住址</label>
            <input class="form-control" name="address" type="text" value="<?php echo isset($_POST['address'])? $_POST['address'] : $address; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="phonenumber">电话号码</label>
            <input class="form-control" name="phonenumber" type="text" value="<?php echo isset($_POST['phonenumber'])? $_POST['phonenumber'] : $phonenumber; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="resulttime">诊断时间</label>
            <input class="form-control" name="resulttime" type="date" value="<?php echo isset($_POST['resulttime'])? $_POST['resulttime'] : $resulttime; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="pnposition">结节部位</label>
            <input class="form-control" name="pnposition" type="text" value="<?php echo isset($_POST['pnposition'])? $_POST['pnposition'] : $pnposition; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="pncontent">结节成分</label>
            <input class="form-control" name="pncontent" type="text" value="<?php echo isset($_POST['pncontent'])? $_POST['pncontent'] : $pncontent; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="pnsize">结节大小</label>
            <input class="form-control" name="pnsize" type="text" value="<?php echo isset($_POST['pnsize'])? $_POST['pnsize'] : $pnsize; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="doctor">医师姓名</label>
            <input class="form-control" name="doctor" type="text" value="<?php echo isset($_POST['doctor'])? $_POST['doctor'] : $doctor; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="checktime">检查日期</label>
            <input class="form-control" name="checktime" type="date" value="<?php echo isset($_POST['checktime'])? $_POST['checktime'] : $checktime; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="checkhospital">筛查医院</label>
            <input class="form-control" name="checkhospital" type="text" value="<?php echo isset($_POST['checkhospital'])? $_POST['checkhospital'] : $checkhospital; ?>" required>
        </div>

        <div class="d-flex justify-content-center">
            <button class="btn btn-primary" name="submit">提交</button>
        </div>
    </div>
</form>

<?php $this->load->view('templates/footer'); ?>
