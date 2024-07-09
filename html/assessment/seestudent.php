<html>

	<head><title>School Management System</title></head>

	<body>
		
		<h2>Welcome to our School Management System</h2>
		<p>Choose what you would like to do:</p>
		<a href="index.php">Home</a>
    	<a href="addstudent.php">Add a student</a>
    	<a href="addparent.php">Add a parent</a>
    	<a href="seestudent.php">See all students</a>
    	<a href="seesparent.php">See all parents</a>
    	<a href="seesteacher.php">See all Teachers</a>
		<a href="addteacher.php">Add a Teacher</a>
		<a href="deleteparent.php">Delete a Parent</a>
		<a href="updateparent.php">Update a Parent</a>
	
		<?php
		
		$link = mysqli_connect("localhost", "root", "password", "myschool");
		// Check connection
		if ($link === false) {
			die("Connection failed: ");
		}
		?>
		<hr>

		<h3>See all Teachers</h3>
	
		<table>
			<tr>
				<th width="150px">Teacher ID<br><hr></th>
				<th width="250px">Teacher Name<br><hr></th>
			</tr>
					
			<?php
			$sql = mysqli_query($link, "SELECT TeacherID, TeacherName FROM Teachers");
			while ($row = $sql->fetch_assoc()){
			echo "
			<tr>
				<th>{$row['TeacherID']}</th>
				<th>{$row['TeacherName']}</th>
			</tr>";
			}
			?>
		</table>
		<?php
		$link->close();
		?>
		<hr>
	</body>

</html>