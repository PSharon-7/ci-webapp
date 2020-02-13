<?php $this->load->view('templates/header_auth'); ?>

<div class="container mt-3">
<?php
    $template = array
    (
        'table_open' => '<table id="patient_list" class="table table-bordered table-striped table-hover table-responsive text-nowrap">',
        'row_start'  => '<tr class="row_detail">',
        'row_end'    => '</tr>',
        'row_alt_start'  => '<tr class="row_detail">',
        'row_alt_end'    => '</tr>',
        'table_close'    => '</table>',
    );

    $this->table->set_template($template);
    $this->table->set_heading(array('姓名', '身份证', '性别', '年龄', '吸烟史', '饮酒史', '电话号码', '家庭住址', '入院诊断', '入院时间', '既往史'));
    $this->db->select('name, id, gender, age, smokehistory, drinkhistory, phonenumber, address, checkindiagnosis, checkintime, history');

    $query = $this->db->get('patientinfo');

    echo $this->table->generate($query);
?>
</div>

<div class="my-4"></div>

<?php $this->load->view('templates/footer'); ?>


<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="<?=base_url('assets')?>/js/datatables.min.js"></script>
<script>
    var rows = document.getElementsByClassName("row_detail");
    for (i = 0; i < rows.length; i++) 
    {
        rows[i].onclick = function()
        {
            var id = this.childNodes[2].innerHTML;
            window.location = '<?php echo base_url()?>patientmanager/checkin/'+ id;
        }; 
    }

    $(document).ready( function () {
        $('#patient_list').DataTable({
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
    } );
</script>

