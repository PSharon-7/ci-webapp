<?php $this->load->view('templates/header_auth'); ?>
<?php $this->load->view('templates/nav_patientmanager'); ?>

<div class="container mt-3">

    <?php
        $template = array
        (
            'table_open' => '<table id="follow_list" class="table table-bordered table-striped table-hover table-responsive text-nowrap">',
            'row_start'  => '<tr>',
            'row_end'    => '</tr>',
            'table_close'    => '</table>',
        );

        $this->table->set_template($template);
        $this->table->set_heading(array('复查结果', '复查日期', '治疗方式', '药物名称', '剂量', '疗程', '住院费用', '疾病转归', '死亡时间'));
        
        $this->db->select('review_result, review_date, treatment, medicine_name, dose, treatment_course, stay_spend, disease_outcome, deadtime');
        $this->db->where('id', $id);

        $query = $this->db->get('patientinfo_followup');

        echo $this->table->generate($query);
    ?>


    <div id="followup_form" class="collapse mt-3">
    <?php echo validation_errors('<div class="mt-3 alert alert-danger validation_errors">', '</div>'); ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="review_result">复查结果</label>
                <input class="form-control" name="review_result" type="text" value="<?php echo isset($_POST['review_result'])? $_POST['review_result'] : ''; ?>">
            </div>

            <div class="form-group">
                <label for="review_date">复查日期</label>
                <input class="form-control" name="review_date" type="date" value="<?php echo isset($_POST['review_date'])? $_POST['review_date'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="treatment">治疗方式</label>
                <input class="form-control" name="treatment" type="text" value="<?php echo isset($_POST['treatment'])? $_POST['treatment'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="medicine_name">药物名称</label>
                <input class="form-control" name="medicine_name" type="text" value="<?php echo isset($_POST['medicine_name'])? $_POST['medicine_name'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="dose">剂量</label>
                <input class="form-control" name="dose" type="text" value="<?php echo isset($_POST['dose'])? $_POST['dose'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="treatment_course">疗程</label>
                <input class="form-control" name="treatment_course" type="text" value="<?php echo isset($_POST['treatment_course'])? $_POST['treatment_course'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="stay_spend">住院费用</label>
                <input class="form-control" name="stay_spend" type="text" value="<?php echo isset($_POST['stay_spend'])? $_POST['stay_spend'] : ''; ?>">
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="disease_outcome">疾病转归</label>
                    <select id="disease_outcome" name="disease_outcome" class="form-control">
                        <option <?php echo ((isset($_POST['disease_outcome']) && $_POST['disease_outcome'] == '未愈') || (isset($disease_outcome) && $disease_outcome == '未愈')) ? 'selected="selected"' : ''; ?>>未愈</option>
                        <option <?php echo ((isset($_POST['disease_outcome']) && $_POST['disease_outcome'] == '好转') || (isset($disease_outcome) && $disease_outcome == '好转')) ? 'selected="selected"' : ''; ?>>好转</option>
                        <option <?php echo ((isset($_POST['disease_outcome']) && $_POST['disease_outcome'] == '复发') || (isset($disease_outcome) && $disease_outcome == '复发')) ? 'selected="selected"' : ''; ?>>复发</option>
                        <option <?php echo ((isset($_POST['disease_outcome']) && $_POST['disease_outcome'] == '死亡') || (isset($disease_outcome) && $disease_outcome == '死亡')) ? 'selected="selected"' : ''; ?>>死亡</option>                    
                    </select>
                </div>

                <div id="deadtime" class="form-group col-6">
                    <label for="deadtime">死亡时间</label>
                    <input class="form-control" name="deadtime" type="date" value="<?php echo isset($_POST['deadtime'])? $_POST['deadtime'] : ''; ?>">
                </div>
            </div>

            <div class="justify-content-center">
                <button class="btn btn-primary" name="submit">提交随访</button>
            </div>
        </form>
    </div>

    <hr class="my-4">
    <div class="d-flex justify-content-center">
        <button id="add_followup" class="btn btn-primary" data-toggle="collapse" data-target="#followup_form" name="submit">添加新随访记录</button>
    </div>
</div>

<div class="my-4"></div>

<?php $this->load->view('templates/footer'); ?>

<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="<?=base_url('assets')?>/js/datatables.min.js"></script>
<script>
    var rows = document.getElementsByClassName("validation_errors");
    if (rows.length > 0) {
        $("#followup_form").addClass("show");
    }

    $(document).ready( function () {
        $('#follow_list').DataTable({
            "language": {
                "sProcessing":   "处理中...",
                "sLengthMenu":   "显示 _MENU_ 项结果",
                "sZeroRecords":  "没有匹配结果",
                "sInfo":         "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                "sInfoEmpty":    "显示第 0 至 0 项结果，共 0 项",
                "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                "sInfoPostFix":  "",
                "sSearch":       "搜索:",
                "sUrl":          "",
                "sEmptyTable":     "表中数据为空",
                "sLoadingRecords": "载入中...",
                "sInfoThousands":  ",",
                "oPaginate": {
                    "sFirst":    "首页",
                    "sPrevious": "上页",
                    "sNext":     "下页",
                    "sLast":     "末页"
                },
                "oAria": {
                    "sSortAscending":  ": 以升序排列此列",
                    "sSortDescending": ": 以降序排列此列"
                }
            }
        });

        var diseaseoutcome = $('#disease_outcome :selected').val() || $('#disease_outcome').val() ;
        if (diseaseoutcome == '死亡') {
            if ($('#deadtime').hasClass('invisible')) {
                $('#deadtime').removeClass('invisible');
            }
        } else if (!$('#deadtime').hasClass('invisible')){
            $('#deadtime').addClass('invisible');
        }

        $('#disease_outcome').change(function(){
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