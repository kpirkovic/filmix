<?php

if (!defined('included')){
	die('You cannot access this file directly!');
}

//log user in ---------------------------------------------------
function login($connection, $user, $pass){
    //strip all tags from varible   
    $user = strip_tags(mysqli_real_escape_string($connection, $user));
    $pass = strip_tags(mysqli_real_escape_string($connection, $pass));

    $pass = md5($pass);

    // check if the user id and password combination exist in database
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass';";
    $result = mysqli_query($connection, $sql) or die('Query failed. ' . mysqli_error($connection));
        
    if (mysqli_num_rows($result) == 1) {
        // the username and password match,
        // set the session
        $_SESSION['authorized'] = true;
        $_SESSION['success'] = 'You are logged in!';

        // direct to admin
        header('Location: '.DIRADMIN);
        exit();
    } else {
        // define an error message
        $_SESSION['error'] = 'Sorry, wrong username or password';
    }
}

// Authentication
function logged_in() {
	if(isset($_SESSION['authorized']) && $_SESSION['authorized'] == true) {
		return true;
	} else {
		return false;
	}	
}

function login_required() {
	if(logged_in()) {	
		return true;
	} else {
		header('Location: '.DIRADMIN.'login.php');
		exit();
	}	
}

function logout(){
	unset($_SESSION['authorized']);
	header('Location: '.DIRADMIN.'login.php');
	exit();
}

// Render error messages
function messages() {
    $message = '';
    if(isset($_SESSION['success']) && $_SESSION['success'] != '') {
        $message = '<span class="position-absolute popup-box alert alert-success">'.$_SESSION['success'].'</span>';
        $_SESSION['success'] = '';
    }
    if(isset($_SESSION['error']) && $_SESSION['error'] != '') {
        $message = '<span class="popup-box alert alert-danger">'.$_SESSION['error'].'</span>';
        $_SESSION['error'] = '';
    }
    echo "$message";
}

function errors($error){
	if (!empty($error))
	{
			$i = 0;
			while ($i < count($error)){
			$showError.= "<div class=\"msg-error\">".$error[$i]."</div>";
			$i ++;}
			echo $showError;
	}// close if empty errors
} // close function

function deleteGenre($connection, $genreID)
{
    $delpage = mysqli_real_escape_string($connection, $genreID);
    $sql = mysqli_query($connection,"DELETE FROM genre WHERE genreID = '$delpage'");
    if(!$sql){
        $_SESSION['error'] = "There is a movie connected to this genre.";
    }else {
        $_SESSION['success'] = "Genre Deleted";
    }
    return '?page=genres';
}

function deleteMovies($connection, $movie_id)
{
    $delpage = mysqli_real_escape_string($connection, $movie_id);
    $img_dir = DIR . '/Images/movies';
    $delImg = unlink($img_dir . '/' . mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM movies WHERE moviesID = '$delpage'"))['Img']);
    $sql = mysqli_query($connection,"DELETE FROM movies WHERE moviesID = '$delpage'");
    $_SESSION['success'] = "Movie Deleted";
    return '?page=movies';
}

function deleteDirector($connection, $director_id)
{
    $delpage = mysqli_real_escape_string($connection, $director_id);
    //Image Directory
    $img_dir = DIR . '/Images/directors';
    //Delete Image From Folder and Database
    $delImg = unlink($img_dir . '/' . mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM directors WHERE directorsID = '$delpage'"))['Img']);
    $sql = mysqli_query($connection,"DELETE FROM directors WHERE directorsID = '$delpage'");

    if(!$sql){
        $_SESSION['error'] = "There is a movie connected to this director.";
    }else {
        $_SESSION['success'] = "Director Deleted";
    }
    return '?page=directors';
}
function deletePage($connection, $page_id)
{
    $delpage = mysqli_real_escape_string($connection, $page_id);
    $sql = mysqli_query($connection,"DELETE FROM pages WHERE pageID = '$delpage'");
    $_SESSION['success'] = "Page Deleted";
    return '?page=pages';
}
function readPages($connection)
{
    $pages = [];
    $sql = mysqli_query($connection, "SELECT * FROM pages ORDER BY pageID");
    while($row = mysqli_fetch_assoc($sql)){
        $pages[] = $row;
    }

    return $pages;
}
function addPage($connection, $title)
{
    $title = mysqli_real_escape_string($connection, $title);    
    $result = mysqli_query($connection, "INSERT INTO pages VALUES('NULL', '$title')");
    
    return $result;
}
function updatePage($connection, $pageID, $title)
{
    $title = mysqli_real_escape_string($connection, $title);
    $pageID = mysqli_real_escape_string($connection, $pageID);

    $result = mysqli_query($connection, "UPDATE pages SET pageTitle='$title' WHERE pageID='$pageID'");
    return $result;
}
function oldPage($connection, $id)
{
    $id = mysqli_real_escape_string($connection, $id);
    $q = mysqli_query($connection, "SELECT * FROM pages WHERE pageID='$id'");
    $row = mysqli_fetch_assoc($q);

    return $row;
}
function readGenre($connection)
{
    $genres = [];
    $sql = mysqli_query($connection, "SELECT * FROM genre ORDER BY genreID");
    while($row = mysqli_fetch_assoc($sql)){
        $genres[] = $row;
    }

    return $genres;
}
function oldGenre($connection, $id)
{
    $id = mysqli_real_escape_string($connection, $id);
    $q = mysqli_query($connection, "SELECT * FROM genre WHERE genreID='$id'");
    $row = mysqli_fetch_assoc($q);

    return $row;
}
function printGenre($connection, $genre)
{
    $sql = mysqli_query($connection, "SELECT * FROM genre ORDER BY genreID");
    while($row = mysqli_fetch_assoc($sql))
    {
        if($genre == $row['genreID']){
            echo '<option selected value="'.$row['genreID'].'">' . $row['title'] . '</option>';
        } else {
            echo '<option value="'.$row['genreID'].'">' . $row['title'] . '</option>';
        }
    }              
}
function insertGenre($connection, $title)
{
    $title = mysqli_real_escape_string($connection,$title);
    
    $result = mysqli_query($connection, "INSERT INTO genre VALUES('NULL', '$title')");
    return $result;
}

function updateGenre($connection, $genreID, $title)
{
    $title = mysqli_real_escape_string($connection, $title);
    $genreID = mysqli_real_escape_string($connection, $genreID);
        
    $result = mysqli_query($connection, "UPDATE genre SET title='$title' WHERE genreID='$genreID'");

    return $result;
}

function printDirectors($connection, $director)
{
    $sql = mysqli_query($connection, "SELECT * FROM directors ORDER BY directorsID");
    while($row = mysqli_fetch_assoc($sql))
    {
        if($director == $row['directorsID']){
            echo '<option selected value="'.$row['directorsID'].'">' . $row['firstName'] . " " . $row['lastName'] .'</option>';
        } else {
            echo '<option value="'.$row['directorsID'].'">' . $row['firstName'] . " " . $row['lastName'] .'</option>';
        }
    }              
}
function printLanguage($connection, $oldLang)
{
    $arr = array('English', 'Macedonian', 'Serbian', 'Spanish', 'German', 'Italian', 'French');
    foreach($arr as $lang) {
        if($oldLang == $lang){
            echo '<option selected value="'.$lang.'">' . $lang . '</option>';
        } else {
            echo '<option value="'.$lang.'">' . $lang . '</option>';
        }
    }
}
function printDirector($connection)
{
    $director = [];
    $sql = mysqli_query($connection, "SELECT * FROM directors ORDER BY directorsID");
    while($row = mysqli_fetch_assoc($sql)){
        $director[] = $row;
    }

    return $director;
}

function addDirector($connection, $first_name, $last_name, $img)
{
    $first_name = mysqli_real_escape_string($connection, $first_name);
    $last_name = mysqli_real_escape_string($connection, $last_name);
    $img = mysqli_real_escape_string($connection, $img);

    $result = mysqli_query($connection, "INSERT INTO directors VALUES ('NULL', '$first_name','$last_name', '$img')");

    return $result;
}

function updateDirector($connection, $directorID, $first_name, $last_name, $img)
{
    $first_name = mysqli_real_escape_string($connection, $first_name);
    $last_name = mysqli_real_escape_string($connection, $last_name);
    $img = mysqli_real_escape_string($connection, $img);

    if($img) {
        $result = mysqli_query($connection, "UPDATE directors SET firstName='$first_name', lastname='$last_name', Img='$img' WHERE directorsID='$directorID'");
    } else {
        $result = mysqli_query($connection, "UPDATE directors SET firstName='$first_name', lastname='$last_name' WHERE directorsID='$directorID'");
    }

    return $result;
}

function oldDirector($connection, $id)
{
    $id = mysqli_real_escape_string($connection, $id);
    $q = mysqli_query($connection, "SELECT * FROM directors WHERE directorsID='$id'");
    $row = mysqli_fetch_assoc($q);

    return $row;
}

function showMovies($connection)
{
    $movies = [];
    $sql = mysqli_query($connection, "SELECT * FROM movies ORDER BY moviesID");

    while($row = mysqli_fetch_assoc($sql)){
        $movies[] = $row;
    }

    return $movies;
}

function insertMovies($connection, $title, $boxOffice, $director, $genre, $released, $language, $storyline, $img, $ytURL)
{
    $title = mysqli_real_escape_string($connection,$title);
    $boxOffice = mysqli_real_escape_string($connection,$boxOffice);
    $director = mysqli_real_escape_string($connection,$director);
    $genre = mysqli_real_escape_string($connection,$genre);
    $released = mysqli_real_escape_string($connection,$released);
    $language = mysqli_real_escape_string($connection,$language);
    $storyline = mysqli_real_escape_string($connection,$storyline);
    $img = mysqli_real_escape_string($connection,$img);
    $ytURL = mysqli_real_escape_string($connection,$ytURL);

    $result =  mysqli_query($connection, "INSERT INTO movies VALUES ('NULL','$title','$boxOffice', '$director', '$genre', '$released', '$language', '$storyline', '$img', '$ytURL')");

    return $result;
}

function updateMovies($connection, $moviesID, $title, $boxOffice, $director, $genre, $released, $language, $storyline, $img, $ytURL)
{
    $title = mysqli_real_escape_string($connection,$title);
    $boxOffice = mysqli_real_escape_string($connection,$boxOffice);
    $director = mysqli_real_escape_string($connection,$director);
    $genre = mysqli_real_escape_string($connection,$genre);
    $released = mysqli_real_escape_string($connection,$released);
    $language = mysqli_real_escape_string($connection,$language);
    $storyline = mysqli_real_escape_string($connection,$storyline);
    $img = mysqli_real_escape_string($connection,$img);
    $ytURL = mysqli_real_escape_string($connection,$ytURL);

    if($img) {
        $result = mysqli_query($connection,"UPDATE movies SET title='$title', boxOffice='$boxOffice', director='$director', genre='$genre', released='$released', language = '$language', storyline='$storyline', Img='$img', ytURL = '$ytURL' WHERE moviesID='$moviesID'");
    } else {
        $result = mysqli_query($connection,"UPDATE movies SET title='$title', boxOffice='$boxOffice', director='$director', genre='$genre', released='$released', language = '$language', storyline='$storyline', ytURL = '$ytURL' WHERE moviesID='$moviesID'");
    }

    return $result;
}

function getMoviesValues($connection, $id)
{
    $id = $_GET['id'];
    $id = mysqli_real_escape_string($connection,$id);
    $q = mysqli_query($connection, "SELECT * FROM movies WHERE moviesID='$id'");
    $row = mysqli_fetch_assoc($q);

    return $row;
}

function currentPage($name){
    if (strpos($_SERVER['REQUEST_URI'], $name) !== false){
        echo 'btn-info text-dark';
    } else {
        echo 'text-white';
    }
}

function convertYoutube($string) {
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
        $string
    );
}
function findGenre($connection, $genreID){
    $genreID = mysqli_real_escape_string($connection,$genreID);
    $sql = mysqli_query($connection, "SELECT * FROM genre WHERE genreID = $genreID");
    $result = mysqli_fetch_assoc($sql);
    
    return $result;
}
function findDirector($connection, $directorID){
    $directorID = mysqli_real_escape_string($connection,$directorID);
    return mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM directors WHERE directorsID = '$directorID'"));
}
function printDate($date){
    $date = str_replace('-', '', $date);
    return date("d F Y", $date);
}
?>
