<!DOCTYPE html>
<html>

<head>
    <title>School Management System</title>
</head>

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
    <br><br>


    <h3>Add a new teacher</h3>
    <form method="post" action="addteacher.php">
        <label>Teacher Name:</label>
        <input type="text" name="TeacherName">
        <br><br>
        <input type="submit" name="submit" value="Add Teacher">
    </form>


    <?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "myschool";

    // Create connection
    $link = new mysqli($servername, $username, $password);

    // Check connection
    if ($link->connect_error) {
        die("Connection failed: ". $link->connect_error);
    } else {
        echo "Connected successfully.<br>";
    }

    // Create database if not exists
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($link->query($sql) === TRUE) {
        echo "Database created successfully or already exists.<br>";
    } else {
        echo "Error creating database: ". $link->error. "<br>";
    }

    // Select the database
    $link->select_db($dbname);

    // SQL to create tables if they do not exist
    $sql = "CREATE TABLE IF NOT EXISTS Teachers (
        TeacherID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        TeacherName VARCHAR(50) NOT NULL
    )";

    if ($link->query($sql) === TRUE) {
        echo "Table Teachers created successfully or already exists.<br>";
    } else {
        echo "Error creating table: ". $link->error. "<br>";
    }

    // Form submission handling
    if (isset($_POST['submit'])) {
        $TeacherName = $_POST['TeacherName'];
        // Debug: Display input values
        //echo "TeacherName: $TeacherName<br>";

        // SQL Insert Query to add a new teacher
        $sql = "INSERT INTO Teachers (TeacherName) VALUES ('$TeacherName')";

        // Debug: Display SQL query
        //echo "SQL Query: $sql<br>";
        if ($link->query($sql) === TRUE) {
            echo "New record created successfully.<br>";
        } else {
            echo "Error adding record: ". $link->error. "<br>";
        }
    }
    // Close the database connection
    $link->close();
   ?>


    <hr>

</body>

</html>