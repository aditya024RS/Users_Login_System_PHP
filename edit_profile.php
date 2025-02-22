<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    die();
}

$current_profile_pic = $_SESSION['profile_pic'];
$current_profile_about = $_SESSION['profile_about'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/edit.css">
    <link rel="stylesheet" href="CSS/main.css">
</head>
<body>
    <div class="wrapper-main edit-profile-main">
    <div class="edit-profile-container">
        <h1>Edit Profile</h1>

        <!-- Edit Profile Form -->
        <form action="includes/edit_profile.inc.php" method="POST" enctype="multipart/form-data">
            <!-- Profile Picture Upload -->
            <div class="form-group">
                <label for="profile_pic">Profile Picture:</label>
                <input type="file" id="profile_pic" name="profile_pic" accept="image/*">
                <small>Current: <?php echo htmlspecialchars($current_profile_pic); ?></small>
            </div>

            <!-- About Section -->
            <div class="form-group">
                <label for="profile_about">About Me:</label>
                <textarea id="profile_about" name="profile_about" rows="4"><?php echo htmlspecialchars($current_profile_about); ?></textarea>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn save-changes">Save Changes</button>
                <a href="user.php" class="btn cancel">Cancel</a>
            </div>
        </form>
    </div>
    </div>

    <?php include 'partials/footer.php';?>
</body>
</html>