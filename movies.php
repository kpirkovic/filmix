<?php
    require_once('includes/config.php');
    require_once('includes/header.php');
    require('includes/nav.php');
    echo "<main class='animated'>";
        if(isset($_GET['id']) && $_GET['id']){
            $currentID = $_GET['id'];
            $sql = mysqli_query($connection, "SELECT * FROM movies WHERE moviesID = '$currentID'");
            if(mysqli_num_rows($sql)){
            while($row = mysqli_fetch_assoc($sql)){
                echo "<div class='position-relative overflow-hidden page-cover'>
                    <button><i class='bi bi-play-fill'></i></button>
                    <img class='position-absolute top-0 start-0' src=" . DIR .'Images/movies/'. $row['Img'] . " alt=" . str_replace(' ', '-', $row['title']) . ">
                </div>";
                echo "<section class='container py-3 py-md-5 px-4 px-md-1'>";
                echo "<div class='d-flex gap-3 align-items-center'>";
                echo "<h1 class='mt-3 heading-page'>" . $row['title'] . '</h1>';
                echo "<a href='genre.php?id=" . $row['genre'] . "' class='fs-small px-2 py-1 mt-2 inline-block bg-white text-dark rounded-3 text-decoration-none'>" . findGenre($connection, $row['genre'])['title'] . '</a>';
                echo "</div>";
                echo "<p class='mt-4'>". $row['storyline'] . "</p>";
                echo "<br><h3>More Info:</h3><br>";

                $director = findDirector($connection, $row['director']);

                echo "<span class='d-block mb-1'>Language: ".$row['language']."</span>";
                echo "<a class='text-decoration-none text-white' href='directors.php?id=".$director['directorsID']."'><span class='d-block mb-1'>Director: ".$director['firstName'].$director['lastName']."</span></a>";
                echo "<span class='d-block mb-1'>Released: ". printDate($row['released']) . "</span>";
                echo "<span class='d-block'>Box Office: ".number_format($row['boxOffice'])."$</span>";
                echo "</section>";
                
                echo "<div id='modal'>". convertYoutube($row['ytURL']) ."</div>";
            }
        } else {
            echo "<div class='container mt-5 pt-5 text-center'>
                    <h2 class='pb-3 mt-4'>The Movie that you selected doesn't exist!</h2>
                    <a class='text-dark text-decoration-none py-2 px-3 bg-info rounded-2' href=".DIR.">Go Back</a>
                </div>";
        } 
    } else {
        header('Location: ' . DIR);
    }
    echo "</main>";
    require('includes/footer.php');
?>
