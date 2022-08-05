<?php

require('../../includes/config.php');

if(isset($_POST['submit'])){
    if(isset($_POST['moviesTitle']) && $_POST['moviesTitle'] && isset($_POST['boxOffice']) && $_POST['boxOffice'] && isset($_POST['director']) && $_POST['director'] && isset($_POST['genre']) && $_POST['genre'] && isset($_POST['released']) && $_POST['released'] && isset($_POST['storyline']) && $_POST['storyline']){
        $title = $_POST['moviesTitle'];
        $boxOffice = $_POST['boxOffice'];
        $director = $_POST['director'];
        $genre = $_POST['genre'];
        $released = $_POST['released'];
        $language = $_POST['language'];
        $storyline = $_POST['storyline'];
        $ytURL = $_POST['ytURL'];

        $img = rand(5, 1000) * rand(300, 1000) . '.png';
        $file_name = $_FILES["directors_img"]["tmp_name"];
        $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/phpKristijanPirkovic/Images/movies/';

        if(move_uploaded_file($file_name, $uploads_dir . '/' . $img)){
            $result = insertMovies($connection, $title, $boxOffice, $director, $genre, $released, $language, $storyline, $img, $ytURL);
        } else {
            $result = insertMovies($connection, $title, $boxOffice, $director, $genre, $released, $language, $storyline, "movieCover", $ytURL);
        }

        if($result){
            $_SESSION['success'] = 'Movie Added';
            header('Location: '.DIRADMIN."?page=movies");
            exit();
        }
        else {
            $_SESSION['error'] = 'Something went wrong!';
            header('Location: ' . DIRADMIN . "movies/movies.php");
            exit();
        }
    } else {
        $_SESSION['error'] = 'Something went wrong!';
        header('Location: ' . DIRADMIN . "movies/add-movies.php");
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
    <h1 class="mb-4">Add Movies</h1>

    <form enctype='multipart/form-data' action="" method="POST">
        <div class="file_upload position-relative form-group my-3 rounded-3">
            <img id='file_upload_img' src="<?php echo DIR .'Images/Movies.svg'?>" alt="Movies">
            <label for="directors_img"></label>
            <input type="file" id='directors_img' name='directors_img' accept="image/png, image/gif, image/jpeg">
        </div>
        <div class="form-group mb-2">
            <label for="moviesTitle">Title:</label><br />
            <input class="form-control" name="moviesTitle" type="text" id="moviesTitle" size="103" />
        </div>
        <div class="form-group mb-2">
            <label for="ytURL">Trailer Url:</label><br />
            <input class="form-control" name="ytURL" type="text" id="ytURL" size="255" />
        </div>
        <div class="form-group">
            <label for="boxOffice">Box Office:</label><br />
            <input class="form-control mb-2" name="boxOffice" type="number" id="boxOffice" />
        </div>
        <div class="form-group mb-2">
            <label for="director">Director:</label><br />
            <select id="director" name="director" class="browser-default custom-select form-control" required>
                <option selected value='' disabled>Select Director</option>
                <?php
                    printDirectors($connection, $director);
                ?>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="genre">Genre:</label><br />
            <select id="genre" name="genre" class="browser-default custom-select form-control" required>
                <option selected value='' disabled>Select Genre</option>
                <?php
                    printGenre($connection, $genre);
                ?>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="released">Choose date</label>
            <input type="date" id="released" class="form-control" name="released">
        </div>
        <div class="form-group mb-2">
            <label for="language">Language:</label><br />
            <select id="language" name="language" class="browser-default custom-select form-control" required>
                <option selected value='' disabled>Select language</option>
                <?php
                    printLanguage($connection, $author);
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="storyline">Storyline:</label><br />
            <textarea class="form-control" id="storyline" name="storyline" cols="100" rows="20"></textarea>
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-info mt-3" />
        <a href="<?php echo DIRADMIN;?>?page=movies" class="btn btn-danger mt-3">Cancel</a>
    </form>
    <?php
        require('../includes/footer.php');
    ?>
</div>
