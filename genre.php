<?php
    require_once('includes/config.php');
    require_once('includes/header.php');
    require('includes/nav.php');
    echo "<main class='container py-5 px-md-1'>";
    if(isset($_GET['id']) && $_GET['id']){
        $currentGenre = $_GET['id'];
        $sql = mysqli_query($connection, "SELECT * FROM movies WHERE genre = '$currentGenre'");
        if(mysqli_num_rows($sql)){ 
            echo "<div class='animated rounded-2 vh-25 pt-4 mt-5 text-center'><h2 class='m-0'>Movies in ". findGenre($connection, $currentGenre)['title'] ." Genre</h2></div>";
            echo "<section class='grid mt-5'>";
            while($row = mysqli_fetch_assoc($sql)){ ?>
                <a href="movies.php?id=<?php echo $row['moviesID']; ?>" class="animated text-decoration-none content-card rounded-3 p-4 position-relative overflow-hidden d-flex align-items-end">
                    <div class='text-white'>
                        <?php
                            echo "<span class='px-2 py-1 bg-white text-dark rounded-3'>" . findGenre($connection, $currentGenre)['title'] . '</span>';
                            echo "<h3 class='mt-3'>" . $row['title'] . '</h3>';
                            echo "<p class='m-0'>". substr($row['storyline'], 0, 95)  . "...</p>";
                        ?>
                    </div>
                    <?php 
                        echo "<img style='z-index: -1' class='position-absolute top-0 start-0' src=" . DIR .'Images/movies/'. $row['Img'] . " alt=" . str_replace(' ', '-', $row['title']) . ">"
                    ?>
                </a>
            <?php }
            echo "</section>";
        } else {
            echo "<div class='animated d-flex align-items-center gap-3 w-100 justify-content-center mt-5 pt-4 flex-column'><h2>There are not films in ". findGenre($connection, $currentGenre)['title'] ." Category</h2>
            <a class='text-dark text-decoration-none py-2 px-3 bg-info rounded-2' href='index.php'>Go Back</a>";
        }
    }
    echo "</main>";
    require('includes/footer.php');
?>

