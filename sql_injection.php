<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>SQL Injection</h2>
    <p>
        SQL Injection is a vulnerability that allows an attacker to interfere with
        the queries that an application makes to its database. It typically occurs
        when user-supplied data is not properly validated or sanitized before being
        used in SQL queries.
    </p>
    <p>
        To demonstrate this vulnerability, consider a scenario where a user login
        form accepts input for username. Let's simulate a basic SQL Injection attack:
    </p>
    <form method="POST" action="sql_injection.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <input type="submit" value="Submit">
    </form>

    <?php
    // Backend PHP code to handle the form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Simulate SQL query with vulnerable code (DO NOT use in production)
        $username = $_POST['username'];
        $sql = "SELECT * FROM users WHERE username = '$username'";

        // Simulate database connection and query execution (do not use in production)
        echo "<p>Executing SQL query: <code>$sql</code></p>";
        
        // Simulate database connection (replace with actual database connection in real use)
        $conn = mysqli_connect("localhost", "root", "", "test_db");
        
        if ($conn) {
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<p>User: " . $row['username'] . "</p>";
                }
            } else {
                echo "<p>Error executing query: " . mysqli_error($conn) . "</p>";
            }
            mysqli_close($conn);
        } else {
            echo "<p>Error connecting to database: " . mysqli_connect_error() . "</p>";
        }
    }
    ?>

</div>

<?php include 'includes/footer.php'; ?>
