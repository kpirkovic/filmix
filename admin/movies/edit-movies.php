<?php

require('../../includes/config.php');

if(!isset($_GET['id']) || $_GET['id'] == ''){ //if no id is passed to this page take user back to previous page
    header('Location: '.DIRADMIN);
}

if(isset($_POST['submit'])){
    if(isset($_POST['moviesTitle']) && $_POST['moviesTitle'] && isset($_POST['boxOffice']) && $_POST['boxOffice'] && isset($_POST['director']) && $_POST['director'] && isset($_POST['genre']) && $_POST['genre'] && isset($_POST['released']) && $_POST['released'] && isset($_POST['storyline']) && $_POST['storyline']){
        $moviesID = $_POST['moviesID'];
        $title = $_POST['moviesTitle'];
        $boxOffice = $_POST['boxOffice'];
        $director = $_POST['director'];
        $genre = $_POST['genre'];
        $released = $_POST['released'];
        $language = $_POST['language'];
        $storyline = $_POST['storyline'];
        $ytURL = $_POST['ytURL'];

        $img = rand(5, 1000) * rand(300, 1000) .'.png';
        $file_name = $_FILES["directors_img"]["tmp_name"];
        $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/phpKristijanPirkovic/Images/movies/';

        if($file_name){
            move_uploaded_file($file_name, $uploads_dir . '/' . $img);
            $result = updateMovies($connection, $moviesID, $title, $boxOffice, $director, $genre, $released, $language, $storyline, $img, $ytURL);
        } else {
            $result = updateMovies($connection, $moviesID, $title, $boxOffice, $director, $genre, $released, $language, $storyline, '', $ytURL);
        }
        

        if($result){
            $_SESSION['success'] = 'Movie Updated';
            header('Location: '.DIRADMIN."?page=movies");
            exit();
        }
        else {
            $_SESSION['error'] = 'Something went wrong!';
            header('Location: ' . DIRADMIN . "edit-movies.php?id=" . $directorID);
            exit();
        }
    } else {
        $_SESSION['error'] = 'Something went wrong!';
        header('Location: ' . DIRADMIN . "?page=movies.php");
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
    <h1 class="mb-4">Edit Movies</h1>
    <?php
        $id = $_GET['id'];
        $current_movies = getMoviesValues($connection, $id);
    ?>
    <form enctype='multipart/form-data' action="" method="POST">
        <input type="hidden" name="moviesID" value="<?php echo $current_movies['moviesID'];?>" />
        <div class="file_upload position-relative form-group my-3 rounded-3">
            <img id='file_upload_img' src="<?php echo DIR .'Images/movies/'. $current_movies['Img'] ?>" alt="<?php echo $current_movies['Img'] ?>">
            <label for="directors_img"></label>
            <input type="file" id='directors_img' name='directors_img' accept="image/png, image/gif, image/jpeg">
        </div>
        <div class="form-group">
            <label for="moviesTitle">Title:</label><br />
            <input class="form-control mb-2" name="moviesTitle" type="text" id="moviesTitle" value="<?php echo $current_movies['title'] ?>" size="103" />
        </div>
        <div class="form-group mb-2">
            <label for="ytURL">Trailer Url:</label><br />
            <input class="form-control" name="ytURL" type="text" id="ytURL" size="255" value="<?php echo $current_movies['ytURL']?>" />
        </div>
        <div class="form-group">
            <label for="boxOffice">Box Office:</label><br />
            <input class="form-control mb-2" name="boxOffice" type="number" value="<?php echo $current_movies['boxOffice'] ?>" id="boxOffice" />
        </div>
        <div class="form-group">
            <label for="director">Director:</label><br />
            <select id="director" name="director" class="browser-default custom-select form-control mb-2" required>
                <option disabled>Select Directors</option>
                <?php
                    printDirectors($connection, $current_movies['director']);
                    ?>
            </select>
        </div>
        <div class="form-group">
            <label for="genre">Genre:</label><br />
            <select id="genre" name="genre" class="browser-default custom-select form-control mb-2" value="<?php echo $current_movies['genre'] ?>" required>
                <option disabled>Select Genre</option>
                <?php
                    printGenre($connection, $current_movies['genre']);
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="released">Choose date</label>
            <input type="date" id="released" class="form-control mb-2" name="released" value="<?php echo $current_movies['released'] ?>">
        </div>
        <div class="form-group">
            <label for="language">Language:</label><br />
            <select id="language" name="language" class="browser-default custom-select form-control mb-2" required>
                <option value='' disabled>Select Language</option>
                <?php
                    printLanguage($connection, $current_movies['language']);
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="storyline">Storyline:</label><br />
            <textarea class="form-control mb-2" id="storyline" name="storyline" cols="100" rows="20"><?php echo $current_movies['storyline'] ?></textarea>
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-info mt-3" />
        <a href="<?php echo DIRADMIN;?>?page=movies" class="btn btn-danger mt-3">Cancel</a>
    </form>
    <?php
        require('../includes/footer.php');
    ?>
</div>
