<html>
<Head>
<title>My Back End Development Project</title>
</head>
<body>
<h1>Welcome to our School Management System</h1>
 
        <p>Choose what you would like to do</p>
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
        // Database connection details
        $link = mysqli_connect("localhost", "root", "password", "myschool");
 
        // Check connection
        if ($link === false) {
            die("Connection failed: ". mysqli_connect_error());
        }
        ?>
 
        <hr>
<h3>See all Teachers</h3>
<table border="1">
<tr>
<th width="150px">Teacher ID<br><hr></th>
<th width="150px">Teacher Name<br><hr></th>
</tr>
<?php
            // Execute the query
            $sql = mysqli_query($link, "SELECT TeacherID, TeacherName FROM Teachers");
            // Fetch the data and display in table
            while ($row = $sql->fetch_assoc()) {
                echo "
<tr>
<td>".$row['TeacherID']."</td>
<td>".$row['TeacherName']."</td>
</tr>";
            }
            ?>
</table>
<?php
        // Close the database connection
        $link->close();
        ?>
 
        <hr>
 
    </body>
</html>