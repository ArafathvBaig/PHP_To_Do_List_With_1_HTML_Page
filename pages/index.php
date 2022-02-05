<?php
$update = false;
$task = "";
$id = 0;
if (isset($_GET['edit_id'])) {
	$id = $_GET['edit_id'];
	$update = true;
	include 'C:\xampp\htdocs\PHP Programming\To_Do_List\php\database.php';
	$result = mysqli_query($connection, "SELECT * FROM tasks WHERE id='$id'");
	if ($result) {
		$row = mysqli_fetch_assoc($result);
		$task = $row['task'];
		// echo "Id in edit: " . $id;
		// echo "\n\ntask in edit: " . $task;
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>ToDo List Application PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
	<div class="heading">
		<h2>ToDo List Application PHP and MySQL database</h2>
	</div>
	<form method="post" action="../php/submit.php" class="input_form">
		<?php if (isset($errors)) { ?>
			<p><?php echo $errors; ?></p>
		<?php } ?>
		<input type="hidden" value="<?php echo $id ?>" name="id">
		<input type="text" name="task" class="task_input" value="<?php echo $task; ?>" placeholder="Enter Your ToDo List Task">
		<?php
		if ($update == true) :
		?>
			<button formaction="../php/update.php" value="update" type="submit" name="update" id="add_btn" class="add_btn">Update</button>
		<?php else : ?>
			<button value="submit" type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
		<?php endif; ?>
	</form>
	<table>
		<thead>
			<tr>
				<th>S.No</th>
				<th>Tasks</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			<?php
			include 'C:\xampp\htdocs\PHP Programming\To_Do_List\php\database.php';
			// select all tasks if page is visited or refreshed
			$sql = "SELECT * FROM tasks";
			$result = mysqli_query($connection, $sql);
			$i = 1;
			while ($row = mysqli_fetch_array($result)) { ?>
				<tr>
					<td class="serialNumber"> <?php echo $i; ?> </td>
					<td class="task"> <?php echo $row['task']; ?> </td>
					<td class="edit_delete">
						<a href="index.php?edit_id=<?php echo $row['id'] ?>">Edit</a>
						<a href="../php/delete.php?delete_id=<?php echo $row['id'] ?>">X</a>
					</td>
				</tr>
			<?php $i++;
			} ?>
		</tbody>
	</table>
</body>

</html>