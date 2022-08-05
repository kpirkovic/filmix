<h1 class="mb-4">Manage Directors</h1>
<table class="table table-hover">
    <thead>
    <tr>
        <th><strong>Title</strong></th>
        <th><strong>Action</strong></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $directors = printDirector($connection);
    foreach($directors as $key => $row){
        echo "<tr>";
        echo "<td class='w-100'>".$row['firstName']." ".$row['lastName']."</td>";
        echo "<td class='d-flex gap-3'>
                <a class='text-white fs-7 bg-secondary text-decoration-none rounded-3' href=\"".DIRADMIN . 'directors/' . "edit-directors.php?id=".$row['directorsID'].'">Edit</a>
                <a class="text-white fs-7 bg-danger text-decoration-none rounded-3" href="'.DIRADMIN.'?page=directors&del='.$row['directorsID'].'">Delete</a>
            </td>';
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<p><a href="<?php echo DIRADMIN . 'directors/';?>add-directors.php" class="btn btn-info">Add Director</a></p>

