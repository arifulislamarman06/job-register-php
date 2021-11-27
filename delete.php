<?php include "connection.php"; ?>

<?php 
$id = $_GET['id'];

$delete = "DELETE FROM `register` WHERE id=$id";

$query = mysqli_query($connect,$delete);
?>

<?php 

if ($query) {
	?>
	<script>
		alert("Deleted Successfully");
	</script>
	<?php
}else{
	?>
	<script>
		alert("Not Deleted");
	</script>
	<?php
}
?>

<?php header('Location:display.php');?>
