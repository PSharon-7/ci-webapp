<?php $this->load->view('templates/header_form'); ?>

<form>
  <div class="form-group"> <!-- left unspecified, .bmd-form-group will be automatically added (inspect the code) -->
    <label for="formGroupExampleInput" class="bmd-label-floating">Example label</label>
    <input type="text" class="form-control" id="formGroupExampleInput">
  </div>
  <div class="form-group bmd-form-group"> <!-- manually specified --> 
    <label for="formGroupExampleInput2" class="bmd-label-floating">Another label</label>
    <input type="text" class="form-control" id="formGroupExampleInput2">
  </div>
</form>

<?php $this->load->view('templates/footer'); ?>
