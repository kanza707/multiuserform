<?php
session_start()
?>

<?php
if (isset($_SESSION['name'] ) ) { ?>
    <h1>my name is<?php echo $_SESSION['name']; ?></h1>and my email is <?php echo $_SESSION['email']; ?>
    <a href="logout.php">logout</a>
<?php

}else{
    header('location: login.php');
}



?>