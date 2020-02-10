<?php $this->load->view('templates/header'); ?>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<form action="" method="post">
    <div class="container">
        <div class="form-group">
            <label for="id">身份证号</label>
            <input class="form-control <?php if($doctorcheck == 1) { echo 'is-valid'; } ?>" name="id" <?php if($doctorcheck == 1) { echo 'readonly'; } ?> type="text" value="<?php echo isset($_POST['id'])? $_POST['id'] : $id; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="name">姓名</label>
            <input class="form-control <?php if($doctorcheck == 1) { echo 'is-valid'; } ?>" name="name" <?php if($doctorcheck == 1) { echo 'readonly'; } ?> type="text" value="<?php echo isset($_POST['name'])? $_POST['name'] : $name; ?>" required>
        </div>

        <?php 
        if ($doctorcheck == -1) {
            echo '<div class="text-center"><button class="btn btn-primary" name="submit">提交</button></div>';
        }
        elseif ($doctorcheck == 0) {
            echo '<div class="text-center"><button class="btn btn-primary" name="submit">提交</button><hr><p>已提交，等待医生审核。</p></div>';
        } 
        else {
            echo '<div class="row d-flex justify-content-center"><p>医生已审核</p></div>';
        } 
        ?>
            
    </div>
</form>

<?php $this->load->view('templates/footer'); ?>
