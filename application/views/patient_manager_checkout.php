<?php $this->load->view('templates/header_auth'); ?>
<?php $this->load->view('templates/nav_patientmanager'); ?>

<?php if ($doctorcheck == 0) { ?>
<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<form class="mt-3" action="" method="post">
    <div class="container">
        <div class="form-group">
            <label for="name">姓名</label>
            <input class="form-control" name="name" type="text" value="<?php echo isset($_POST['name'])? $_POST['name'] : $name; ?>">
        </div>

        <div class="form-group">
            <label for="id">身份证号</label>
            <input class="form-control" name="id" type="text" value="<?php echo isset($_POST['id'])? $_POST['id'] : $id; ?>">
        </div>

        <div class="form-group">
            <label for="checkouttime">出院时间</label>
            <input class="form-control" name="checkouttime" type="date" value="<?php echo isset($_POST['checkouttime'])? $_POST['checkouttime'] : $checkouttime; ?>">
        </div>

        <div class="form-group">
            <label for="checkout_diagnosis">出院诊断</label>
            <input class="form-control" name="checkout_diagnosis" type="text" value="<?php echo isset($_POST['checkout_diagnosis'])? $_POST['checkout_diagnosis'] : $checkout_diagnosis; ?>">
        </div>

        <div class="form-group">
            <label for="pathological_result">病理结果</label>
            <input class="form-control" name="pathological_result" type="text" value="<?php echo isset($_POST['pathological_result'])? $_POST['pathological_result'] : $pathological_result; ?>">
        </div>

        <div class="form-group">
            <label for="staging">分期</label>
            <input class="form-control" name="staging" type="text" value="<?php echo isset($_POST['staging'])? $_POST['staging'] : $staging; ?>">
        </div>

        <div class="form-group">
            <label for="surgery_name">手术名称</label>
            <input class="form-control" name="surgery_name" type="text" value="<?php echo isset($_POST['surgery_name'])? $_POST['surgery_name'] : $surgery_name; ?>">
        </div>

        <div class="form-group">
            <label for="surgery_time">手术时间</label>
            <input class="form-control" name="surgery_time" type="date" value="<?php echo isset($_POST['surgery_time'])? $_POST['surgery_time'] : $surgery_time; ?>">
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="surgery_blood_volume">术中出血量</label>
                <div class="input-group">
                    <input class="form-control" name="surgery_blood_volume" type="text" value="<?php echo isset($_POST['surgery_blood_volume'])? $_POST['surgery_blood_volume'] : $surgery_blood_volume; ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">ml</span>
                    </div>
                </div>
            </div>

            <div class="form-group col-6">
                <label for="stay_time">住院天数</label>
                <div class="input-group">
                    <input class="form-control" name="stay_time" type="text" value="<?php echo isset($_POST['stay_time'])? $_POST['stay_time'] : $stay_time; ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">天</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="ic_time">重症监护总时间</label>
                <div class="input-group">
                    <input class="form-control" name="ic_time" type="text" value="<?php echo isset($_POST['ic_time'])? $_POST['ic_time'] : $ic_time; ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">天</span>
                    </div>
                </div>
            </div>

            <div class="form-group col-6">
                <label for="dt_time">引流管留置时间</label>
                <div class="input-group">
                    <input class="form-control" name="dt_time" type="text" value="<?php echo isset($_POST['dt_time'])? $_POST['dt_time'] : $dt_time; ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">天</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="stay_spend">住院费用</label>
            <div class="input-group">
                <input class="form-control" name="stay_spend" type="text" value="<?php echo isset($_POST['stay_spend'])? $_POST['stay_spend'] : $stay_spend; ?>">
                <div class="input-group-append">
                    <span class="input-group-text">元</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="insurance_type">医保类型</label>
            <input class="form-control" name="insurance_type" type="text" value="<?php echo isset($_POST['insurance_type'])? $_POST['insurance_type'] : $insurance_type; ?>">
        </div>

        <div class="form-group">
            <label for="disease_outcome">疾病转归</label>
            <select name="disease_outcome" class="form-control">
                <option <?php echo ((isset($_POST['disease_outcome']) && $_POST['disease_outcome'] == '未愈') || (isset($disease_outcome) && $disease_outcome == '未愈')) ? 'selected="selected"' : ''; ?>>未愈</option>
                <option <?php echo ((isset($_POST['disease_outcome']) && $_POST['disease_outcome'] == '好转') || (isset($disease_outcome) && $disease_outcome == '好转')) ? 'selected="selected"' : ''; ?>>好转</option>
                <option <?php echo ((isset($_POST['disease_outcome']) && $_POST['disease_outcome'] == '复发') || (isset($disease_outcome) && $disease_outcome == '复发')) ? 'selected="selected"' : ''; ?>>复发</option>
                <option <?php echo ((isset($_POST['disease_outcome']) && $_POST['disease_outcome'] == '死亡') || (isset($disease_outcome) && $disease_outcome == '死亡')) ? 'selected="selected"' : ''; ?>>死亡</option>

            </select>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="living_state">生存状态</label>
                <select id="living_state" name="living_state" class="form-control">
                    <option <?php echo ((isset($_POST['living_state']) && $_POST['living_state'] == '活着') || (isset($living_state) && $living_state == '活着')) ? 'selected="selected"' : ''; ?>>活着</option>
                    <option <?php echo ((isset($_POST['living_state']) && $_POST['living_state'] == '死亡') || (isset($living_state) && $living_state == '死亡')) ? 'selected="selected"' : ''; ?>>死亡</option>
                </select>
            </div>

            <div id="deadtime" class="form-group col-6">
                <label for="deadtime">死亡时间</label>
                <input class="form-control" name="deadtime" type="date" value="<?php echo isset($_POST['deadtime'])? $_POST['deadtime'] : $deadtime; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="dna_test">基因检测</label>
            <input class="form-control" name="dna_test" type="text" value="<?php echo isset($_POST['dna_test'])? $_POST['dna_test'] : $dna_test; ?>">
        </div>

        <div class="d-flex justify-content-center">
            <button class="btn btn-primary" name="submit">提交审核</button>
        </div>
    </div>
</form>

<?php } else {?>
<form class="mt-3" action="<?php echo base_url().'patientmanager/checkout_uncheck/'.$id; ?>" method="post">
    <div class="container">
        <div class="form-group">
            <label for="name">姓名</label>
            <input class="form-control-plaintext" readonly name="name" type="text" value="<?php echo isset($_POST['name'])? $_POST['name'] : $name; ?>">
        </div>

        <div class="form-group">
            <label for="id">身份证号</label>
            <input class="form-control-plaintext" readonly name="id" type="text" value="<?php echo isset($_POST['id'])? $_POST['id'] : $id; ?>">
        </div>

        <div class="form-group">
            <label for="checkouttime">出院时间</label>
            <input class="form-control" readonly name="checkouttime" type="date" value="<?php echo isset($_POST['checkouttime'])? $_POST['checkouttime'] : $checkouttime; ?>">
        </div>

        <div class="form-group">
            <label for="checkout_diagnosis">出院诊断</label>
            <input class="form-control-plaintext" readonly name="checkout_diagnosis" type="text" value="<?php echo isset($_POST['checkout_diagnosis'])? $_POST['checkout_diagnosis'] : $checkout_diagnosis; ?>">
        </div>

        <div class="form-group">
            <label for="pathological_result">病理结果</label>
            <input class="form-control-plaintext" readonly name="pathological_result" type="text" value="<?php echo isset($_POST['pathological_result'])? $_POST['pathological_result'] : $pathological_result; ?>">
        </div>

        <div class="form-group">
            <label for="staging">分期</label>
            <input class="form-control-plaintext" readonly name="staging" type="text" value="<?php echo isset($_POST['staging'])? $_POST['staging'] : $staging; ?>">
        </div>

        <div class="form-group">
            <label for="surgery_name">手术名称</label>
            <input class="form-control-plaintext" readonly name="surgery_name" type="text" value="<?php echo isset($_POST['surgery_name'])? $_POST['surgery_name'] : $surgery_name; ?>">
        </div>

        <div class="form-group">
            <label for="surgery_time">手术时间</label>
            <input class="form-control-plaintext" readonly name="surgery_time" type="date" value="<?php echo isset($_POST['surgery_time'])? $_POST['surgery_time'] : $surgery_time; ?>">
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="surgery_blood_volume">术中出血量</label>
                <div class="input-group">
                    <input class="form-control-plaintext" readonly name="surgery_blood_volume" type="text" value="<?php echo isset($_POST['surgery_blood_volume'])? $_POST['surgery_blood_volume'] : $surgery_blood_volume; ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">ml</span>
                    </div>
                </div>
            </div>

            <div class="form-group col-6">
                <label for="stay_time">住院天数</label>
                <div class="input-group">
                    <input class="form-control-plaintext" readonly name="stay_time" type="text" value="<?php echo isset($_POST['stay_time'])? $_POST['stay_time'] : $stay_time; ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">天</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="ic_time">重症监护总时间</label>
                <div class="input-group">
                    <input class="form-control-plaintext" readonly name="ic_time" type="text" value="<?php echo isset($_POST['ic_time'])? $_POST['ic_time'] : $ic_time; ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">天</span>
                    </div>
                </div>
            </div>

            <div class="form-group col-6">
                <label for="dt_time">引流管留置时间</label>
                <div class="input-group">
                    <input class="form-control-plaintext" readonly name="dt_time" type="text" value="<?php echo isset($_POST['dt_time'])? $_POST['dt_time'] : $dt_time; ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">天</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="stay_spend">住院费用</label>
            <div class="input-group">
                <input class="form-control-plaintext" readonly name="stay_spend" type="text" value="<?php echo isset($_POST['stay_spend'])? $_POST['stay_spend'] : $stay_spend; ?>">
                <div class="input-group-append">
                    <span class="input-group-text">元</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="insurance_type">医保类型</label>
            <input class="form-control-plaintext" readonly name="insurance_type" type="text" value="<?php echo isset($_POST['insurance_type'])? $_POST['insurance_type'] : $insurance_type; ?>">
        </div>

        <div class="form-group">
            <label for="disease_outcome">疾病转归</label>
            <input class="form-control-plaintext" readonly name="disease_outcome" type="text" value="<?php echo isset($_POST['disease_outcome'])? $_POST['disease_outcome'] : $disease_outcome; ?>">
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="living_state">生存状态</label>
                <input id="living_state" class="form-control-plaintext" readonly name="living_state" type="text" value="<?php echo isset($_POST['living_state'])? $_POST['living_state'] : $living_state; ?>">
            </div>

            <div id="deadtime" class="form-group col-6">
                <label for="deadtime">死亡时间</label>
                <input class="form-control-plaintext" name="deadtime" type="date" value="<?php echo isset($_POST['deadtime'])? $_POST['deadtime'] : $deadtime; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="dna_test">基因检测</label>
            <input class="form-control-plaintext" readonly name="dna_test" type="text" value="<?php echo isset($_POST['dna_test'])? $_POST['dna_test'] : $dna_test; ?>">
        </div>

        <div class="d-flex justify-content-center">
            <button class="btn btn-danger" name="submit">取消审核</button>
        </div>
    </div>
</form>
<?php }?>

<div class="my-4"></div>

<?php $this->load->view('templates/footer'); ?>

<script type="text/javascript">
$(document).ready(function(){
    var livingstate = $('#living_state :selected').val() || $('#living_state').val() ;
    if (livingstate == '死亡') {
        if ($('#deadtime').hasClass('invisible')) {
            $('#deadtime').removeClass('invisible');
        }
    } else if (!$('#deadtime').hasClass('invisible')){
        $('#deadtime').addClass('invisible');
    }

    $('#living_state').change(function(){
        var selectedVal = $(this).val();
        if (selectedVal == '死亡') {
            if ($('#deadtime').hasClass('invisible')) {
                $('#deadtime').removeClass('invisible');
            }
        } else if (!$('#deadtime').hasClass('invisible')){
            $('#deadtime').addClass('invisible');
        }
    });
});
</script>