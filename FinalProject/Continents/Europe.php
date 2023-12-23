<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Atlas - Travel Guides</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js"></script>
    <script src="https://kit.fontawesome.com/6808397e85.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Continents.css">
</head>

<body>
    <?php include '../General/Header.php'; ?>

    <main>
        <div id="summary">
            <p>
                Welcome to Europe, a continent full of vibrant culture, breathtaking scenery, and endless
                possibilities for adventure.
                <br><br>
                From the winding streets of Paris to the soaring peaks of the Swiss Alps, from epic road trips
                through Iceland and climbing experiences in Norway, to exploring the European capital cities of
                Rome, Berlin and London, Europe will fill your bucket list
                within moments of beginning your research.
                <br><br>
                For those seeking outdoor thrills, hike the majestic Triglav national park in Slovenia, ski the powdery slopes of
                the Austrian Alps, or dive into the crystal-clear waters of the Mediterranean.
                <br><br>
                And let's not forget about the mouth-watering cuisine, the world-class museums, and the breathtaking architecture that will make you feel like you've stepped into a storybook.
                <br><br>
                Want to know the best places to visit in Europe, the best city breaks and get top tips for
                travelling? So pack your bags, and get ready to discover the magic of this diverse and captivating
                continent!
            </p>
        </div>

        <div class="photo-show">
            <img class="image-show" src="https://i.pinimg.com/564x/06/7b/6a/067b6aa6598fa5ed4c3bfb73b7f2593c.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/c7/5b/36/c75b367a2affcc2dd244d180ed17bc44.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/73/1a/a3/731aa31278fde872c0da0f1ca1ebbb10.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/43/f6/dc/43f6dc0f170d844e3932e3e1b14c0c1d.jpg">
        </div>

        <div id="bucketlist" class="clearfix">
            <div id="slideshow" class="cycle-slideshow">
                <img src="https://cdn.mos.cms.futurecdn.net/ifJPbUm9XMsQdt7AQAets.jpg">
                <img src="https://i.pinimg.com/564x/1b/98/88/1b988822076454c4afc212c68d0a5884.jpg">
                <img src="https://thepointsguy.global.ssl.fastly.net/us/originals/2017/05/GettyImages-543346423.jpg">
                <img src="https://nextstopadventure.com/wp-content/uploads/2018/07/2018-07-28_0004.jpg">
                <img src="https://www.curieux.live/wp-content/uploads/2021/02/surfing-VGSBTXB-scaled-e1614067829159.jpg">
                <img src="https://worldstrides.com/wp-content/uploads/2018/09/Dubrovnik-Croatia.jpg">
                <img src="https://idsb.tmgrup.com.tr/ly/uploads/images/2022/07/12/217928.jpg">
                <img src="https://lp-cms-production.imgix.net/2021-09/shutterstockRF_786688450.jpg">
                <img src="https://images.squarespace-cdn.com/content/v1/547a7a53e4b0b93ff702af56/1466991407287-GLJ3JEQ414YPH2O9JI0Y/image-asset.jpeg?format=1000w">
                <img src="https://wallpapers.com/images/hd4/cliffs-of-moher-in-ireland-tv33t7j5xhkx8anv.jpg">
            </div>
            <div id="list">
                <h1>Bucket list adventures in Europe</h1>
                <ul>
                    <li>See the Northern Lights in Norway</li>
                    <li>Climb the Eiffel Tower in Paris, France</li>
                    <li>Take a gondola ride in Venice, Italy</li>
                    <li>Hike the Swiss Alps in Switzerland</li>
                    <li>Surf in the coast of Portugal</li>
                    <li>Road trip around Croatia</li>
                    <li>Take a hot air balloon ride over Cappadocia, Turkey</li>
                    <li>Relax in thermal baths in Budapest, Hungary</li>
                    <li>Van life around Iceland</li>
                    <li>Visit the Cliffs of Moher in Ireland</li>
                </ul>
            </div>
        </div>

        <div id="travel-guides">
            <h1>Europe Travel Guides</h1>

            <div class="guide-container">
                <?php
                include '../DatabaseConnection/db_connect.php';

                $sql = "SELECT * FROM guides WHERE accepted = '1' AND location = 'Europe'";
                $result = mysqli_query($link, $sql);


                while ($row = mysqli_fetch_array($result)) {
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
                ?>
            </div>
        </div>
    </main>

    <?php include '../General/Footer.php'; ?>

    <script>
        $("#slideshow").cycle();
    </script>
</body>

</html>