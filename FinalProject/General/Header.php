<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Atlas - Travel Guides</title>
    <link rel="stylesheet" href="../General/Header.css">
</head>

<body>
    <?php
    //session_start();

    // Check if the user is logged in
    if (isset($_SESSION['email'])) {
        // User is logged in
        $email = $_SESSION['email'];

        // Check if the logout button is clicked
        if (isset($_GET['logout'])) {
            // Destroy all session data
            session_destroy();

            // Redirect the user back to the main page
            header("Location: ../Main Page/MainPage.php");
            exit();
        }
    ?>
        <header>
            <div class="ribbon">
                <a href="../Main Page/MainPage.php">Home</a>
                <a href="../Ribbon/About.php">About</a>
                <a href="../Ribbon/FAQ.php">FAQ</a>
            </div>
            <div>
                <a href="../Main Page/MainPage.php">
                    <img src="../General/Images/Logo.png" alt="AdventureAtlas Logo">
                </a>
                <div class="navbar">
                    <a href="../Destinations/Destinations.php">Destinations</a>
                    <div class="dropdown">
                        <a href="#">Adventure Type &#9662;</a>
                        <div class="dropdown-content" id="dropdown-content">
                            <a href="../Adventure Types/AdventureTypes.php?type=Roadtrips">Roadtrips</a>
                            <a href="../Adventure Types/AdventureTypes.php?type=Backpacking">Backpacking</a>
                            <a href="../Adventure Types/AdventureTypes.php?type=Solo Travel">Solo Travel</a>
                            <a href="../Adventure Types/AdventureTypes.php?type=Luxury Travel">Luxury Travel</a>
                            <a href="../Adventure Types/AdventureTypes.php?type=Budget Travel">Budget Travel</a>
                            <a href="../Adventure Types/AdventureTypes.php?type=Active">Active Travel</a>
                        </div>
                    </div>
                    <a href="../Community/community.php">Community</a>
                    <div class="dropdown">
                        <a href="#"><?php echo $email; ?> &#9662;</a>
                        <div class="dropdown-content" id="dropdown-content">
                            <a href="../User Area/my_adventures.php">My Adventures</a>
                        </div>
                    </div>
                    <a href="?logout" class="logout-button">Logout</a>
                </div>
            </div>
        </header>
    <?php
    } else {
        // User is not logged in
    ?>
        <header>
            <div class="ribbon">
                <a href="../Main Page/MainPage.php">Home</a>
                <a href="../Ribbon/About.php">About</a>
                <a href="../Ribbon/FAQ.php">FAQ</a>
            </div>
            <div>
                <a href="../Main Page/MainPage.php">
                    <img src="../General/Images/Logo.png" alt="AdventureAtlas Logo">
                </a>
                <div class="navbar">
                    <a href="../Destinations/Destinations.php">Destinations</a>
                    <div class="dropdown">
                        <a href="#" onclick="toggleDropdown()">Adventure Type &#9662;</a>
                        <div class="dropdown-content" id="dropdown-content">
                            <a href="../Adventure Types/AdventureTypes.php?type=Roadtrips">Roadtrips</a>
                            <a href="../Adventure Types/AdventureTypes.php?type=Backpacking">Backpacking</a>
                            <a href="../Adventure Types/AdventureTypes.php?type=Solo Travel">Solo Travel</a>
                            <a href="../Adventure Types/AdventureTypes.php?type=Luxury Travel">Luxury Travel</a>
                            <a href="../Adventure Types/AdventureTypes.php?type=Budget Travel">Budget Travel</a>
                            <a href="../Adventure Types/AdventureTypes.php?type=Active">Active Travel</a>
                        </div>
                    </div>
                    <a href="../Community/community.php">Community</a>
                    <a href="../Login&RegistrationForm/Form.php">Login/Register</a>
                </div>
            </div>
        </header>
    <?php
    }
    ?>
</body>

</html>