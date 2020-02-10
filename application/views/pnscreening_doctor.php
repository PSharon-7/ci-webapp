<?php $this->load->view('templates/header_auth'); ?>

<div class="container">
<?php
	$template = array
	(
		'table_open' => '<table id="pn_list" class="table table-bordered table-striped table-hover table-responsive text-nowrap">',
		'row_start'  => '<tr class="row_detail">',
		'row_end'    => '</tr>',
		'row_alt_start'  => '<tr class="row_detail">',
        'row_alt_end'    => '</tr>',
	);

	$this->table->set_template($template);

    $query = $this->db->get('pnctscreen');
    echo $this->table->generate($query);


 ?>
</div>


<?php $this->load->view('templates/footer'); ?>


<script>
	var rows = document.getElementsByClassName("row_detail");
	for (i = 0; i < rows.length; i++) 
	{
		rows[i].onclick = function()
		{
			// alert(this.rowIndex);
			// alert(this.childNodes[1].innerHTML);
			var wxid = this.childNodes[1].innerHTML;
			window.location = 'pnscreening_doctor_comment?wxid='+ wxid;


		}; 
		// rows[i].onclick = Func(i); //call the function like this
	}


</script>
