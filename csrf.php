<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>CSRF (Cross-Site Request Forgery)</h2>
    <p>
        Cross-Site Request Forgery (CSRF) is an attack that tricks a user into
        executing unwanted actions on a web application where they are currently
        authenticated. It occurs when a malicious website sends a request to a
        vulnerable web application on behalf of the user.
    </p>
    <p>
        To demonstrate this vulnerability, consider a scenario where a user is
        authenticated and visits a malicious website that submits a request on
        their behalf without their knowledge.
    </p>
    <p>
        This form simulates a vulnerable action:
    </p>
    <form method="POST" action="csrf.php">
        <input type="hidden" name="action" value="transfer">
        <input type="submit" value="Transfer Funds">
    </form>

    <?php
    // Backend PHP code to handle the form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Simulate checking the action
        if ($_POST['action'] === 'transfer') {
            echo "<p>Transferring funds (vulnerable to CSRF)...</p>";
            // Normally, this would execute the action like transferring funds
            // For demonstration purposes only; CSRF prevention mechanisms should be implemented
        }
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
