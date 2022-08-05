<?php 

require('../../includes/config.php');

if(!isset($_GET['id']) || $_GET['id'] == ''){ //if no id is passed to this page take user back to previous page
	header('Location: ' . DIRADMIN . "?page=genre"); 
}

if(isset($_POST['submit'])){
    if(isset($_POST['genreTitle']) && $_POST['genreTitle'] && isset($_POST['genreID'])){
        $genreID = $_POST['genreID'];
        $title = $_POST['genreTitle'];

        $result = updateGenre($connection, $genreID, $title);

        if($result){
            $_SESSION['success'] = 'Genre Edited';
            header('Location: '.DIRADMIN."?page=genres");
            exit();
        }
        else {
            $_SESSION['error'] = 'Something went wrong!';
            header('Location: ' . DIRADMIN . "genres/edit-genre.php?id=" . $genreID);
            exit();
        }
    }else {
        $_SESSION['error'] = 'Something went wrong';
        header('Location: ' . DIRADMIN . "?page=genres");
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
    <h1 class="mb-4">Edit Genre</h1>
    <?php
        $id = $_GET['id'];
        $genre = oldGenre($connection, $id);
    ?>
    <form action="" method="POST">
        <input type="hidden" name="genreID" value="<?php echo $genre['genreID'];?>" />
        <div class="form-group mb-2">
            <label for="title">Title:</label><br />
            <input id="title" class="form-control" name="genreTitle" type="text" value="<?php echo $genre['title'];?>" size="103" />
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-info mt-3" />
        <a href="<?php echo DIRADMIN;?>?page=genres" class="btn btn-danger mt-3">Cancel</a>
    </form>
    <?php
    require('../includes/footer.php');
?>
</div>
