<html>
    <head>
        <title>My Back End Development Project</title>
    </head>
    <body>
        <h1>Welcome to our School Management System</h1>

        <p>Choose what you would like to do</p>

        <a href="addstudent.php">Add a Student</a>
        <a href="addparent.php">Add a Parent</a>
        <a href="addteacher.php">Add a teacher</a>
        <a href="seestudent.php">See all Students</a>
        <a href="seesparent.php">See all parents</a>
        <a href="seesteacher.php">See all Teachers</a>
        <a href="deleteparent.php">Delete a Parent</a>
        <a href="updateparent.php">Update a Parent</a>
        <br><br>

        <h3>Select a Parent to delete</h3>

        <form method="post" action="deleteparent.php">

        <label>Select Parent:</label>
        <select name="parentID">
            <?php
            // Database connection details
            $servername = "localhost";
            $username = "root";
            $password = "password";
            $dbname = "myschool";

            // Create connection
            $link = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($link->connect_error) {
                die("Connection failed: ". $link->connect_error);
            }

            // Fetch parents from the database
            $sql = $link->query("SELECT ParentID, ParentName FROM Parents");
            while ($row = $sql->fetch_assoc()) {
                echo "<option value='{$row["ParentID"]}'>{$row['ParentName']}</option>";
            }
            $link->close(); // Close the database connection
           ?>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Delete Parent">
        </form>

        <?php
    // Form submission handling
     if (isset($_POST['submit'])) {
        $ParentID = $_POST['parentID']; // Fix: Use 'parentID' instead of 'ParentID'

        // Create connection
        $link = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($link->connect_error) {
            die("Connection failed: ". $link->connect_error);
        }

        // First, delete associated student records
        $delete_students_sql = "DELETE FROM Students WHERE ParentID='$ParentID'";
        if ($link->query($delete_students_sql) === TRUE) {
            // Now, delete the parent record
            $delete_parent_sql = "DELETE FROM Parents WHERE ParentID='$ParentID'";
            if ($link->query($delete_parent_sql) === TRUE) {
                echo "Parent and associated student records deleted successfully.<br>";
            } else {
                echo "Error deleting parent record: ". $link->error. "<br>";
            }
        } else {
            echo "Error deleting associated student records: ". $link->error. "<br>";
        }
        $link->close(); // Close the database connection
    }
   ?>

        <hr>

    </body>
</html>