<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>XSS (Cross-Site Scripting)</h2>
    <p>
        Cross-Site Scripting (XSS) is a vulnerability that allows attackers to inject
        malicious scripts into web pages viewed by other users. This can occur when
        user input is not properly sanitized or validated before being displayed on
        a web page.
    </p>
    <p>
        To demonstrate this vulnerability, consider a scenario where a comment form
        accepts input for a user's comment. Let's simulate a basic XSS attack:
    </p>
    <form method="POST" action="xss.php">
        <label for="comment">Enter your comment:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Backend PHP code to handle the form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Simulate displaying user input (vulnerable to XSS if not sanitized)
        $comment = $_POST['comment'];
        echo "<p>Your comment:</p>";
        echo "<p>" . $comment . "</p>";
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
