<?php $this->load->view('templates/header_auth'); ?>
<style>
ul.timeline {
    list-style-type: none;
    position: relative;
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {
    margin: 20px 0;
    padding-left: 20px;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #22c0e8;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}
</style>


<div class="container mt-4 mb-4">
<h4 class="font-italic"><?php echo $name;?> - 时间轴</h6>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <ul class="timeline" id="timeline">
                <?php 
                if (!empty($followup)) { 
                    foreach ($followup as $v) {
                        echo 
                        '<li>
                            <h6 class="font-italic"><a href="'.base_url().'patientmanager/followup/'.$id.'">随访</a></h6>
                            <p class="my-0 mt-2">复查时间: '.$v[0].'</p><p class="my-0">复查结果: '.$v[1].'</p><p class="my-0">复发情况: '.$v[2].'</p>
                        </li>';
                    }
                }
                if (!empty($checkout)) { 
                    echo '
                    <li>
                        <h6 class="font-italic"><a href="'.base_url().'patientmanager/checkout/'.$id.'">出院</a></h6>
                        <p class="my-0 mt-2">手术名称: '.$checkout[0].'</p><p class="my-0">手术时间: '.$checkout[1].'</p><p class="my-0">住院天数: '.$checkout[2].'</p><p class="my-0">出院诊断: '.$checkout[3].'</p>
                    </li>';
                }
                if (!empty($checkin)) { 
                    echo 
                        '<li>
                            <h6 class="font-italic"><a href="'.base_url().'patientmanager/checkin/'.$id.'">入院</a></h6>
                            <p class="my-0 mt-2">入院时间: '.$checkin[0].'</p><p class="my-0">入院诊断: '.$checkin[1].'</p><p class="my-0">既往史: '.$checkin[2].'</p>
                        </li>';
                } ?>
            </ul>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

