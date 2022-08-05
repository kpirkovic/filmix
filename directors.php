<?php
    require_once('includes/header.php');
    require('includes/nav.php');
    echo "<main class='container py-5 px-md-1'>";
    if(isset($_GET['id']) && $_GET['id']){
        $directorID = $_GET['id'];
        $movieSQL = mysqli_query($connection, "SELECT * FROM movies WHERE director = '$directorID'");
        $director = findDirector($connection, $directorID);
        if(mysqli_num_rows($movieSQL)){
            echo "<div class='animated rounded-2 vh-25 pt-4 mt-5 text-center'><h2 class='m-0'>Movies by ". $director['firstName'] . $director['lastName'] ."</h2></div>";
            echo "<section class='grid mt-5'>";
                while($row = mysqli_fetch_assoc($movieSQL)){ ?>
                    <a href="movies.php?id=<?php echo $row['moviesID']; ?>" class="animated text-decoration-none content-card rounded-3 p-4 position-relative overflow-hidden d-flex align-items-end">
                        <div class='text-white'>
                            <?php
                                echo "<span class='px-2 py-1 bg-white text-dark rounded-3'>" . findGenre($connection, $row['genre'])['title'] . '</span>';
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
            echo "<div class='animated d-flex align-items-center gap-3 w-100 justify-content-center pt-5 mt-5 flex-column'><h2>". $director['firstName'] . $director['lastName'] ." has no films to their credit.</h2>
                <a class='text-dark text-decoration-none py-2 px-3 bg-info rounded-2' href='directors.php'>Go Back</a>
            ";
        }
    } else { ?>
    <section class='grid-directors mt-5'>
        <?php 
            $sql = mysqli_query($connection, "SELECT * FROM directors");
            while($row = mysqli_fetch_assoc($sql)){ ?>
                <a href="directors.php?id=<?php echo $row['directorsID']; ?>" class="directors animated rounded-3 text-decoration-none text-white d-flex flex-column gap-3 align-items-center">
                    <?php
                        if(empty($row['Img'])){
                            echo "<img class='rounded-circle' src=" . DIR ."Images/Avatar.svg>";
                        } else {
                            echo "<img class='rounded-circle' src=" . DIR .'Images/directors/'. $row['Img'] . ">";
                        }
                    ?>
                    <div>
                        <?php
                            echo "<h3 class='fs-5 m-0'>". $row['firstName'] . ' ' . $row['lastName']  ."</h3>";
                        ?>
                    </div>
                </a>
        <?php } ?>
    </section> 
<?php }
    echo "</main>";
    require('includes/footer.php');
?>