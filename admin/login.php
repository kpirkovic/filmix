<?php

 require('../includes/config.php');

if(logged_in()) {
    header('Location: '.DIRADMIN);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="<?php echo DIR ?>Images/Fav-Icon.svg" type="image/x-icon">  
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITETITLE;?></title>
<link href="<?php echo DIR;?>style/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="overflow-hidden d-flex align-items-center justify-content-center position-relative">
<?php
    if(isset($_POST['submit']) && $_POST['submit']) {
        login($connection, $_POST['username'], $_POST['password']);
    }
    ?>
    <?php echo messages();?>
    <div class="px-5 py-4 rounded-3 login-box">
        <form style="width: 20rem" class="mb-5" method="post" action="">
            <div class="mb-4 text-center">
                <h1 class="brand fs-login mt-2 mb-0"><?php echo SITETITLE ?></h1>
                <span>Login to your Dashboard.</span>
            </div>
            <div class="form-group">
                <input type="text" placeholder="Username" class="form-control mb-2" name="username" />
                <input type="password" placeholder="Password" class="form-control" name="password" />
            </div>
            <input type="submit" name="submit" class="btn btn-info mt-2 w-100" value="Login" />
        </form>
    </div>
</body>
</html>
