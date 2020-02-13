<?php $this->load->view('templates/header_auth'); ?>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<div id="form_validation_errors"></div>
<form class="mt-3" action="" method="post">
    <div class="container">
        <div class="form-group">
            <label for="id">身份证号</label>
            <input id="idcard" class="form-control" name="id" type="text" value="<?php echo isset($_POST['id'])? $_POST['id'] : $id; ?>" required>
        </div>

        <div class="form-group">
            <label for="name">姓名</label>
            <input class="form-control" name="name" type="text" value="<?php echo isset($_POST['name'])? $_POST['name'] : $name; ?>" required>
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
                <input id="age" class="form-control" readonly name="age" type="text" value="<?php echo isset($_POST['age'])? $_POST['age'] : $age; ?>">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="smokehistory">吸烟史</label>
                <select id="smokehistory" name="smokehistory" class="form-control">
                    <option <?php echo ((isset($_POST['smokehistory']) && $_POST['smokehistory'] == '有') || (isset($smokehistory) && $smokehistory == '有')) ? 'selected="selected"' : ''; ?>>有</option>
                    <option <?php echo ((isset($_POST['smokehistory']) && $_POST['smokehistory'] == '无') || (isset($smokehistory) && $smokehistory == '无')) ? 'selected="selected"' : ''; ?>>无</option>
                </select>
            </div>

            <div id="smoketime" class="form-group col-6">
                <label for="smoketime">吸烟时长</label>
                <div class="input-group">
                    <input class="form-control" name="smoketime" type="text" value="<?php echo isset($_POST['smoketime'])? $_POST['smoketime'] : $smoketime; ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">年</span>
                    </div>
                </div>
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
            <div class="input-group">
                <select name="pnposition_lung" class="form-control">
                    <option <?php echo ((isset($_POST['pnposition_lung']) && $_POST['pnposition_lung'] == '左') || (isset($pnposition_lung) && $pnposition_lung == '左')) ? 'selected="selected"' : ''; ?>>左</option>
                    <option <?php echo ((isset($_POST['pnposition_lung']) && $_POST['pnposition_lung'] == '右') || (isset($pnposition_lung) && $pnposition_lung == '右')) ? 'selected="selected"' : ''; ?>>右</option>
                </select>
                <div class="input-group-append">
                    <span class="input-group-text">肺</span>
                </div>
                <select name="pnposition_lobe" class="form-control">
                    <option <?php echo ((isset($_POST['pnposition_lobe']) && $_POST['pnposition_lobe'] == '上') || (isset($pnposition_lobe) && $pnposition_lobe == '上')) ? 'selected="selected"' : ''; ?>>上</option>
                    <option <?php echo ((isset($_POST['pnposition_lobe']) && $_POST['pnposition_lobe'] == '中') || (isset($pnposition_lobe) && $pnposition_lobe == '中')) ? 'selected="selected"' : ''; ?>>中</option>
                    <option <?php echo ((isset($_POST['pnposition_lobe']) && $_POST['pnposition_lobe'] == '下') || (isset($pnposition_lobe) && $pnposition_lobe == '下')) ? 'selected="selected"' : ''; ?>>下</option>
                </select>
                <div class="input-group-append">
                    <span class="input-group-text">叶</span>
                </div>
                <select name="pnposition_segment" class="form-control">
                    <option <?php echo ((isset($_POST['pnposition_segment']) && $_POST['pnposition_segment'] == '尖') || (isset($pnposition_segment) && $pnposition_segment == '尖')) ? 'selected="selected"' : ''; ?>>尖</option>
                    <option <?php echo ((isset($_POST['pnposition_segment']) && $_POST['pnposition_segment'] == '后') || (isset($pnposition_segment) && $pnposition_segment == '后')) ? 'selected="selected"' : ''; ?>>后</option>
                    <option <?php echo ((isset($_POST['pnposition_segment']) && $_POST['pnposition_segment'] == '前') || (isset($pnposition_segment) && $pnposition_segment == '前')) ? 'selected="selected"' : ''; ?>>前</option>
                    <option <?php echo ((isset($_POST['pnposition_segment']) && $_POST['pnposition_segment'] == '内侧') || (isset($pnposition_segment) && $pnposition_segment == '内侧')) ? 'selected="selected"' : ''; ?>>内侧</option>
                    <option <?php echo ((isset($_POST['pnposition_segment']) && $_POST['pnposition_segment'] == '外侧') || (isset($pnposition_segment) && $pnposition_segment == '外侧')) ? 'selected="selected"' : ''; ?>>外侧</option>
                    <option <?php echo ((isset($_POST['pnposition_segment']) && $_POST['pnposition_segment'] == '上舌') || (isset($pnposition_segment) && $pnposition_segment == '上舌')) ? 'selected="selected"' : ''; ?>>上舌</option>
                    <option <?php echo ((isset($_POST['pnposition_segment']) && $_POST['pnposition_segment'] == '下舌') || (isset($pnposition_segment) && $pnposition_segment == '下舌')) ? 'selected="selected"' : ''; ?>>下舌</option>
                    <option <?php echo ((isset($_POST['pnposition_segment']) && $_POST['pnposition_segment'] == '上') || (isset($pnposition_segment) && $pnposition_segment == '上')) ? 'selected="selected"' : ''; ?>>上</option>
                    <option <?php echo ((isset($_POST['pnposition_segment']) && $_POST['pnposition_segment'] == '前底') || (isset($pnposition_segment) && $pnposition_segment == '前底')) ? 'selected="selected"' : ''; ?>>前底</option>
                    <option <?php echo ((isset($_POST['pnposition_segment']) && $_POST['pnposition_segment'] == '后底') || (isset($pnposition_segment) && $pnposition_segment == '后底')) ? 'selected="selected"' : ''; ?>>后底</option>
                    <option <?php echo ((isset($_POST['pnposition_segment']) && $_POST['pnposition_segment'] == '内侧底') || (isset($pnposition_segment) && $pnposition_segment == '内侧底')) ? 'selected="selected"' : ''; ?>>内侧底</option>
                    <option <?php echo ((isset($_POST['pnposition_segment']) && $_POST['pnposition_segment'] == '外侧底') || (isset($pnposition_segment) && $pnposition_segment == '外侧底')) ? 'selected="selected"' : ''; ?>>外侧底</option>
                </select>
                <div class="input-group-append">
                    <span class="input-group-text">段</span>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="pncontent">结节成分</label>
            <select name="pncontent" class="form-control">
                <option <?php echo ((isset($_POST['pncontent']) && $_POST['pncontent'] == '实性结节') || (isset($pncontent) && $pncontent == '实性结节')) ? 'selected="selected"' : ''; ?>>实性结节</option>
                <option <?php echo ((isset($_POST['pncontent']) && $_POST['pncontent'] == '部分实性结节') || (isset($pncontent) && $pncontent == '部分实性结节')) ? 'selected="selected"' : ''; ?>>部分实性结节</option>
                <option <?php echo ((isset($_POST['pncontent']) && $_POST['pncontent'] == '磨玻璃密度结节') || (isset($pncontent) && $pncontent == '磨玻璃密度结节')) ? 'selected="selected"' : ''; ?>>磨玻璃密度结节</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="pnsize">结节大小</label>
            <div class="input-group">
                <input class="form-control" name="pnsize" type="text" value="<?php echo isset($_POST['pnsize'])? $_POST['pnsize'] : $pnsize; ?>" required>
                <div class="input-group-append">
                    <span class="input-group-text">cm</span>
                </div>
            </div>
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

        <div class="form-group">
            <label for="patientsuggestion">患者建议</label>
            <textarea class="form-control" name="patientsuggestion" value="<?php echo isset($_POST['patientsuggestion'])? $_POST['patientsuggestion'] : $patientsuggestion; ?>"></textarea>
        </div>

        <!-- TODO -->
        <!-- 添加推送字段 -->

        <div class="d-flex justify-content-center">
            <button class="btn btn-primary" name="submit">提交审核</button>
        </div>
    </div>
</form>

<div class="my-4"></div>

<?php $this->load->view('templates/footer'); ?>

<script type="text/javascript" src="<?=base_url('assets')?>/js/form.js"></script>
