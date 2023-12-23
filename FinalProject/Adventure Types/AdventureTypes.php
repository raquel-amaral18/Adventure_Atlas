<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Atlas - Travel Guides</title>
    <link rel="stylesheet" href="AdventureTypes.css">
</head>

<body>
    <?php include '../General/Header.php'; ?>
    <main>
        <?php
        include '../DatabaseConnection/db_connect.php';

        // Retrieve the selected adventure type from the URL parameter
        $selectedAdventureType = $_GET['type'];

        // Query the database to fetch the guides for the selected adventure type
        $query = "SELECT * FROM guides WHERE adventure_types LIKE '%$selectedAdventureType%'";
        $result = mysqli_query($link, $query);

        // Check if any guides were found for the selected adventure type
        if (mysqli_num_rows($result) > 0) {
        ?>

            <div class="adventure-intro">
                <h2><?php echo $selectedAdventureType; ?></h2>
                <div class="intro">
                    <?php
                    switch ($selectedAdventureType) {
                        case 'Roadtrips':
                            echo '<p>Embark on thrilling road trips that take you on scenic routes, winding through picturesque landscapes and hidden gems. Whether it\'s a cross-country journey or exploring a specific region, road trips offer the freedom to explore at your own pace, stopping at charming towns, natural wonders, and iconic landmarks along the way.</p>';
                            break;
                        case 'Backpacking':
                            echo '<p>For the adventurous souls seeking immersive experiences on a budget, backpacking is the way to go. Strap on your backpack and venture into the wilderness, hike through breathtaking trails, stay at hostels or campgrounds, and connect with fellow travelers. Backpacking allows you to get closer to nature, embrace new cultures, and create unforgettable memories.</p>';
                            break;
                        case 'Solo Travel':
                            echo '<p>Discover the joys and freedom of traveling alone. Solo travel offers the opportunity for self-discovery, personal growth, and the chance to navigate the world on your own terms. Whether you crave solitude or seek to meet fellow travelers, exploring new destinations solo allows you to tailor your journey to your interests and create a truly unique experience.</p>';
                            break;
                        case 'Luxury Travel':
                            echo '<p>Indulge in opulence and luxury as you embark on a journey of extravagance and pampering. Luxury travel offers unparalleled comfort, lavish accommodations, fine dining experiences, and exclusive access to iconic attractions. Immerse yourself in luxury resorts, private tours, and tailored experiences that cater to your every desire, creating memories of a lifetime.</p>';
                            break;
                        case 'Budget Travel':
                            echo '<p>Traveling on a budget doesn\'t mean compromising on experiences. Budget travel allows you to explore the world while being mindful of your expenses. From finding affordable accommodations and local eateries to discovering free or low-cost attractions, budget travel encourages resourcefulness and creativity, proving that adventure knows no price tag.</p>';
                            break;
                        case 'Active':
                            echo '<p>Experience the thrill of active travel, where adventure and physical activities take center stage. Whether it\'s hiking, biking, surfing, or any other adrenaline-pumping pursuit, active travel allows you to engage with the natural world, push your limits, and immerse yourself in breathtaking landscapes. Get ready to embark on exciting adventures that combine exploration and fitness.</p>';
                            break;
                    }
                    ?>
                </div>
            </div>

            <div class="guide-container">
            <?php
            // Loop through the guides and display them
            while ($row = mysqli_fetch_assoc($result)) {
                $guide_id = $row['guide_id'];
                $guide_title = $row['guide_title'];
                $guide_image = "../Places/Uploads/$guide_id.jpg"; // Assuming the image file format is JPEG

                echo '<div class="guide">';
                echo '<img src="' . $guide_image . '">';
                echo '<div class="overlay">';
                echo '<h2>' . $guide_title . '</h2>';
                echo '<a href="../Places/Guides.php?guide_id=' . $guide_id . '"><button>View Post</button></a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'No guides found for the selected adventure type.';
        }
            ?>
            </div>
    </main>
    <?php include '../General/Footer.php'; ?>
</body>

</html>