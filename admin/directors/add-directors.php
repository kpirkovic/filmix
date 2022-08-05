<?php
require('../../includes/config.php');
if(isset($_POST['submit'])){
    if(isset($_POST['firstName']) && $_POST['firstName'] && isset($_POST['lastName']) && $_POST['lastName']){
        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
        
        $img = rand(5, 1000) * rand(300, 1000) . '.png';
        $file_name = $_FILES["directors_img"]["tmp_name"];
        $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/phpKristijanPirkovic/Images/directors';

        if(move_uploaded_file($file_name, $uploads_dir . '/' . $img)){
            $result = addDirector($connection, $first_name, $last_name, $img);
        } else {
            $result = addDirector($connection, $first_name, $last_name, '');
        }
        if($result){
            $_SESSION['success'] = 'Director Added';
            header('Location: '.DIRADMIN."?page=directors");
            exit();
        }
    }else {
        $_SESSION['error'] = 'Something went wrong!';
        header('Location: ' . DIRADMIN . "?page=directors");
        exit();
    }
} 
?>
<?php
    require('../includes/header.php');
    messages();
?>
    <?php
        require('../includes/menu.php');
    ?>
<div class="dashboard-container">
    <h1 class="mb-4">Add Directors</h1>
    <form enctype='multipart/form-data' action="" method="POST">
        <div class="file_upload position-relative form-group my-3 rounded-3">
            <img id='file_upload_img' src="<?php echo DIR .'Images/Avatar.svg'?>" alt="Avatar">
            <label for="directors_img"></label>
            <input type="file" id='directors_img' name='directors_img' accept="image/png, image/gif, image/jpeg, image/jpg">
        </div>
        <div class="form-group mb-2">
            <label for="firstName">First Name:</label><br />
            <input name="firstName" type="text" id="firstName" value="" size="103" class="form-control" />
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label><br />
            <input name="lastName" type="text" id="lastName" value="" size="103" class="form-control" />
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-info mt-3" />
        <a href="<?php echo DIRADMIN;?>?page=directors" class="btn btn-danger mt-3">Cancel</a>
    </form>
    <?php
    require('../includes/footer.php');
    ?>  
</div>

