<?php 

require('../../includes/config.php');

if(!isset($_GET['id']) || $_GET['id'] == ''){ //if no id is passed to this page take user back to previous page
	header('Location: ' . DIRADMIN . "?page=pages"); 
}
if(isset($_POST['submit'])){
    if(isset($_POST['pageTitle']) && $_POST['pageTitle'] && isset($_POST['pageID'])){
        $pageID = $_POST['pageID'];
        $title = $_POST['pageTitle'];
    	
        $result = updatePage($connection, $pageID, $title);

        if($result){
            $_SESSION['success'] = 'Page Edited';
            header('Location: '.DIRADMIN."?page=pages");
            exit();
        }
        else {
            $_SESSION['error'] = 'Something went wrong!';
            header('Location: ' . DIRADMIN . "pages/edit-page.php?id=" . $pageID);
            exit();
        }
    }else {
        $_SESSION['error'] = 'Something went wrong';
        header('Location: ' . DIRADMIN . "?page=pages");
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
    <h1 class="mb-4">Edit Page</h1>
    <?php
        $id = $_GET['id'];
        $page = oldPage($connection, $id);
    ?>
    <form action="" method="POST">
        <input type="hidden" name="pageID" value="<?php echo $page['pageID'];?>" />
        <div class="form-group mb-2">
            <label for="title">Title:</label><br />
            <input id="title" class="form-control" name="pageTitle" type="text" value="<?php echo $page['pageTitle'];?>" size="103" />
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-info mt-3" />
        <a href="<?php echo DIRADMIN;?>?page=pages" class="btn btn-danger mt-3">Cancel</a>
    </form>
    <?php
    require('../includes/footer.php');
?>
</div>
