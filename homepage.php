<section class='grid mt-5'>
    <?php 
        $sql = mysqli_query($connection, "SELECT * FROM movies");
        while($row = mysqli_fetch_assoc($sql)){ ?>
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
    <?php } ?>
</section>
