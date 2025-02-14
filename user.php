<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
    die();
}

// Fetch user data from the session or database
$user_id = $_SESSION['user_id'];
$username = $_SESSION['user_username'];
$firstname = $_SESSION['user_firstname'];
$surname = $_SESSION['user_surname'];
$DOBday = $_SESSION['user_DOBday'];
$DOBmonth = $_SESSION['user_DOBmonth'];
$DOByear = $_SESSION['user_DOByear'];
// Add more fields as needed

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/user.css">
    <link rel="stylesheet" href="CSS/main.css">
</head>
<body>
  <div class="wrapper-main user-profile-main">
    <div class="profile-container">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
        <div class="profile-info">
            <p><strong>Name:</strong> <?php echo htmlspecialchars($firstname . " " .$surname); ?></p>
            <p><strong>Date Of Birth:</strong> <?php echo htmlspecialchars($DOBday . "/" .$DOBmonth . "/" . $DOByear); ?></p>
        </div>
        <div class="profile-actions">
            <a href="#" class="btn">Edit Profile</a>
            <a href="includes/logout.inc.php" class="btn logout">Logout</a>
        </div>
    </div>
  </div>

    <?php include 'partials/footer.php';?>
</body>
</html>