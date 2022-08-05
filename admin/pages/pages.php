<h1 class="mb-4">Manage Pages</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th><strong>Title</strong></th>
            <th><strong>Action</strong></th>
        </tr>
    </thead>
    <tbody>
<?php
    $pages = readPages($connection);

    foreach ($pages as $key => $row) {
        echo "<tr>";
        echo "<td class='w-100'>".$row['pageTitle']."</td>";
        echo "<td class='d-flex gap-3'>
        <a class='text-white fs-7 bg-secondary text-decoration-none rounded-3' href=\"".DIRADMIN . 'pages/' . "edit-page.php?id=".$row['pageID'].'">Edit</a>
        <a class="text-white fs-7 bg-danger text-decoration-none rounded-3" href="'.DIRADMIN.'?page=pages&del='.$row['pageID'].'">Delete</a>
        </td>';
        echo "</tr>";
    }
?>
    </tbody>
</table>
<p><a href="<?php echo DIRADMIN . 'pages/';?>add-page.php" class="btn btn-info">Add Page</a></p>
