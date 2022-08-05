<h1 class="mb-4">Manage Movies</h1>
<table class="table table-hover">
    <thead>
    <tr>
        <th><strong>Title</strong></th>
        <th><strong>Action</strong></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $movies = showMovies($connection);

    foreach($movies as $key => $row){
        echo "<tr>";
        echo "<td class='w-100'>".$row['title']."</td>";
        echo "<td class='d-flex gap-3'>
                <a class='text-white fs-7 text-decoration-none opacity-75' href=". DIR . "movies.php?id=".$row['moviesID']." target='_blank'>View</a>
                <a class='text-white fs-7 bg-secondary text-decoration-none rounded-3' href=".DIRADMIN . 'movies/' . "edit-movies.php?id=".$row['moviesID'].'">Edit</a>
                <a class="text-white fs-7 bg-danger text-decoration-none rounded-3" href="'.DIRADMIN.'?page=movies&del='.$row['moviesID'].'">Delete</a>
            </td>';
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<p><a href="<?php echo DIRADMIN . 'movies/';?>add-movies.php" class="btn btn-info">Add Movies</a></p>
