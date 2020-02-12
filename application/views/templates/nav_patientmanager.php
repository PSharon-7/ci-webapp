<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <h5 class="my-0 font-italic">
        <?php 
        if($this->uri->segment(1) == 'patientmanager' && $this->uri->segment(2) == 'checkin') { echo '入院记录'; }
        elseif($this->uri->segment(1) == 'patientmanager' && $this->uri->segment(2) == 'checkout') { echo '出院记录'; }
        if($this->uri->segment(1) == 'patientmanager' && $this->uri->segment(2) == 'followup') { echo '后续治疗及随访'; }

        ?>
    </h5>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item <?php if($this->uri->segment(1) == 'patientmanager' && $this->uri->segment(2) == 'checkin') { echo 'active'; } ?>">
                <a class="nav-link" href="<?=base_url()?>patientmanager/checkin/<?php echo $id?>">入院记录</a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == 'patientmanager' && $this->uri->segment(2) == 'checkout') { echo 'active'; } ?>">
                <a class="nav-link" href="<?=base_url()?>patientmanager/checkout/<?php echo $id?>">出院记录</a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == 'patientmanager' && $this->uri->segment(2) == 'followup') { echo 'active'; } ?>">
                <a class="nav-link" href="<?=base_url()?>patientmanager/followup/<?php echo $id?>">后续治疗及随访</a>
            </li>
        </ul>
    </div>
</nav>