<?php 

require('../../includes/config.php'); 
if(isset($_POST['submit'])){
    if(isset($_POST['pageTitle']) && $_POST['pageTitle']){
    	$title = $_POST['pageTitle'];	
        $result = addPage($connection, $title);

        if($result){
            $_SESSION['success'] = 'Page Added';
            header('Location: '.DIRADMIN."?page=pages");
            exit();
        }
        else {
            $_SESSION['error'] = 'Something went wrong!';
            header('Location: '.DIRADMIN."pages/add-page.php");
            exit();
        }
    } else {
        $_SESSION['error'] = 'Something went wrong!';
        header('Location: '.DIRADMIN."pages/add-page.php");
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
    <h1 class="mb-4">Add Page</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="title">Title:</label><br />
            <input name="pageTitle" class="form-control mb-2" type="text" id="title" size="103" />
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-info mt-3" />
        <a href="<?php echo DIRADMIN;?>?page=pages" class="btn btn-danger mt-3">Cancel</a>
    </form>
    <?php
        require('../includes/footer.php');
    ?>
</div>
