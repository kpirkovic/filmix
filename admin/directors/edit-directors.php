<?php

require('../../includes/config.php');

if(!isset($_GET['id']) || $_GET['id'] == ''){ //if no id is passed to this page take user back to previous page
    header('Location: '.DIRADMIN);
}

if(isset($_POST['submit'])){
    if(isset($_POST['firstName']) && $_POST['firstName'] && isset($_POST['lastName']) && $_POST['lastName']){
        $directorID = $_POST['directorID'];
        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];

        $img = rand(5, 1000) * rand(300, 1000) . '.png';
        $file_name = $_FILES["directors_img"]["tmp_name"];
        $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/phpKristijanPirkovic/Images/directors';

        if($file_name){
            move_uploaded_file($file_name, $uploads_dir . '/' . $img);
            $result = updateDirector($connection, $directorID, $first_name, $last_name, $img);
        } else {
            $result = updateDirector($connection, $directorID, $first_name, $last_name, '');
        }
        


        if($result){
            $_SESSION['success'] = 'Director Added';
            header('Location: ' . DIRADMIN . "?page=directors");
            exit();
        }
        else {
            $_SESSION['error'] = 'Something went wrong!';
            header('Location: ' . DIRADMIN . "directors/edit-directors.php?id=" . $directorID);
            exit();
        } 
    } else {
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
    <h1 class="mb-4">Edit Directors</h1>
    <?php
        $id = $_GET['id'];
        $director = oldDirector($connection, $id);
    ?>
    <form enctype='multipart/form-data' action="" method="POST">
        <input type="hidden" name="directorID" value="<?php echo $director['directorsID'];?>" />
        <div class="file_upload position-relative form-group my-3 rounded-3">
            <img id='file_upload_img' src="<?php echo DIR .'Images/directors/'. $director['Img'] ?>" alt="<?php echo $director['Img'] ?>">
            <label for="directors_img"></label>
            <input type="file" id='directors_img' name='directors_img' accept="image/png, image/gif, image/jpeg, image/jpg">
        </div>
        <div class="form-group mb-2">
            <label for="firstName">First Name:</label><br />
            <input name="firstName" type="text" id="firstName" value="<?php echo $director['firstName'];?>" size="103" class="form-control" />
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label><br />
            <input name="lastName" type="text" id="lastName" value="<?php echo $director['lastName'];?>" size="103" class="form-control" />
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-info mt-3" />
        <a href="<?php echo DIRADMIN;?>?page=directors" class="btn btn-danger mt-3">Cancel</a>
    </form>
    <?php
        require('../includes/footer.php');
    ?>
</div>
