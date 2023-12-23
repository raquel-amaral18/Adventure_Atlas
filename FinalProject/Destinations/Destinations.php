<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Atlas - Travel Guides</title>
    <script src="https://kit.fontawesome.com/6808397e85.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Destinations.css">
</head>

<body>
    <?php include '../General/Header.php'; ?>

    <main>
        <div class="parallax parallax-1">
            <div class="parallax-text">
                <h2>
                    Explore your next adventure, one destination at a time
                </h2>
            </div>
        </div>

        <div id="search-container">
            <h1>
                Already know where you're going?
            </h1>
            <form action="../Search/search.php" method="get" class="search-box">
                <input type="text" name="search" placeholder="Search the site...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>



        <div class="continents-container">
            <div class="continents-card">
                <a href="../Continents/Africa.php">
                    <img src="../Destinations/Images/Africa.png" alt="Africa, map">
                </a>
            </div>

            <div class="continents-card">
                <a href="../Continents/Asia.php">
                    <img src="../Destinations/Images/Asia.png" alt="Asia, map">
                </a>
            </div>

            <div class="continents-card">
                <a href="../Continents/Europe.php">
                    <img src="../Destinations/Images/Europe.png" alt="Europe, map">
                </a>
            </div>
        </div>

        <div class="continents-container">
            <div class="continents-card">
                <a href="../Continents/Oceania.php">
                    <img src="../Destinations/Images/Oceania.png" alt="Oceania, map">
                </a>
            </div>

            <div class="continents-card">
                <a href="../Continents/North America.php">
                    <img src="../Destinations/Images/NorthAmerica.png" alt="North America, map">
                </a>
            </div>

            <div class="continents-card">
                <a href="../Continents/South America.php">
                    <img src="../Destinations/Images/SouthAmerica.png" alt="South America, map">
                </a>
            </div>
        </div>

        <div class="parallax parallax-2"></div>
    </main>

    <?php include '../General/Footer.php'; ?>
</body>

</html>