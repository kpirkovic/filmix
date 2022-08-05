<!-- NAV -->
<nav class="navbar container-md w-100 py-3 py-md-2 position-fixed rounded-3 navbar-expand-lg navbar-dark px-lg-4">
  <a class="brand fs-2 text-decoration-none text-white" href="<?php echo DIR ?>"><?php echo SITETITLE ?></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex gap-3">
          <?php 
            $pages = mysqli_query($connection, "SELECT * FROM pages");
            while($row = mysqli_fetch_assoc($pages)){ 
              if(strtolower($row['pageTitle']) != 'genres'){?>
              <li class="nav-item">
                <a class="nav-link py-3 py-md-2" href="<?php echo strtolower($row["pageTitle"]) ?>.php" role="button" >
                    <?php echo $row['pageTitle'] ?>
                </a>
              </li>
            <?php } else { ?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle py-3 py-md-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $row['pageTitle'] ?>
                </a>
                <ul class="dropdown-menu p-0 dropdown-menu-dark" aria-labelledby="navbarDropdown">
                  <?php $sql = mysqli_query($connection, "SELECT * FROM genre");
                while($row = mysqli_fetch_assoc($sql)){ 
                  echo "<li><a class='dropdown-item' href='genre.php?id=" . $row['genreID'] . "'>" . $row['title'] . "</a></li>";
                } ?>
                </ul>
              </li>
           <?php }}?>
      </ul>
  </div>
</nav>
<!-- END NAV -->