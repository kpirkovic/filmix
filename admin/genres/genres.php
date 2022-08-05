<h1 class="mb-4">Manage Genres</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th><strong>Title</strong></th>
            <th><strong>Action</strong></th>
        </tr>
    </thead>
    <tbody>
<?php
    $genre = readGenre($connection);

    foreach ($genre as $key => $row) {
        echo "<tr>";
        echo "<td class='w-100'>".$row['title']."</td>";
        if($row['genreID'] == 1){ //home page hide the delete link
            echo "<td class='d-flex gap-3'><a class='text-white fs-7 bg-secondary text-decoration-none rounded-3' href=\"".DIRADMIN . 'genres/' . "edit-genre.php?id=".$row['genreID'].'">Edit</a></td>';
        } else {
            echo "<td class='d-flex gap-3'>
            <a class='text-white fs-7 bg-secondary text-decoration-none rounded-3' href=\"".DIRADMIN . 'genres/' . "edit-genre.php?id=".$row['genreID'].'">Edit</a>
            <a class="text-white fs-7 bg-danger text-decoration-none rounded-3" href="'.DIRADMIN.'?page=genres&del='.$row['genreID'].'">Delete</a>
            </td>';
        }
        echo "</tr>";
    }
?>
    </tbody>
</table>
<p><a href="<?php echo DIRADMIN . 'genres/';?>add-genre.php" class="btn btn-info">Add Genre</a></p>
