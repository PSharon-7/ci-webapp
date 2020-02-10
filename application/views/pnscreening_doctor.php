<?php $this->load->view('templates/header_auth'); ?>

<div class="container">
	<h4 class="pb-2 font-italic border-bottom text-danger">未审核</h4>
<?php
	$template = array
	(
		'table_open' => '<table id="pn_list" class="table table-bordered table-striped table-hover table-responsive text-nowrap">',
		'row_start'  => '<tr class="row_detail">',
		'row_end'    => '</tr>',
		'row_alt_start'  => '<tr class="row_detail">',
		'row_alt_end'    => '</tr>',
        'table_close'    => '</table>',
	);

	$this->table->set_template($template);
	$this->table->set_heading(array('身份证', '姓名', '性别', '年龄', '吸烟史', '家庭住址', '电话号码', '诊断时间', '结节部位', '结节成分', '结节大小', '医师名字', '检查日期', '筛查医院'));
	
	$this->db->select('id, name, gender, age, smokehistory, address, phonenumber, resulttime, pnposition, pncontent, pnsize, doctor, checktime, checkhospital');
	$this->db->where('doctor_checked_already', 0);
    $query = $this->db->get('pnctscreen');

    echo $this->table->generate($query);
?>
</div>

<div class="container">
	<h4 class="py-2 mt-4 font-italic border-bottom text-success">已审核</h4>
<?php
	$template = array
	(
		'table_open' => '<table id="pn_list_checked" class="table table-bordered table-striped table-hover table-responsive text-nowrap">',
		'row_start'  => '<tr class="row_detail">',
		'row_end'    => '</tr>',
		'row_alt_start'  => '<tr class="row_detail">',
		'row_alt_end'    => '</tr>',
        'table_close'    => '</table>',
	);

	$this->table->set_template($template);
	$this->table->set_heading(array('身份证', '姓名', '性别', '年龄', '吸烟史', '家庭住址', '电话号码', '诊断时间', '结节部位', '结节成分', '结节大小', '医师名字', '检查日期', '筛查医院'));
	
	$this->db->select('id, name, gender, age, smokehistory, address, phonenumber, resulttime, pnposition, pncontent, pnsize, doctor, checktime, checkhospital');
	$this->db->where('doctor_checked_already', 1);
    $query = $this->db->get('pnctscreen');

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
			var id = this.childNodes[1].innerHTML;
			window.location = 'pnscreening_doctor/'+ id;
		}; 
	}

	$(document).ready( function () {
	    $('#pn_list').DataTable({
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

	$(document).ready( function () {
	    $('#pn_list_checked').DataTable({
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

