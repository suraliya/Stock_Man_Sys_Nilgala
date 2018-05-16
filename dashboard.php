<?php require_once 'includes/header.php'; ?>
	
<?php 
    if($_SESSION['type'] == 'Manager')
    {
         require_once 'managerDash.php';         
    }
    else
    {
        require_once 'stockDash.php';
    } 
?>

<?php require_once 'includes/footer.php'; ?>

