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
                From the rugged beauty of Canada's wilderness to the vibrant culture of Panama, North and Central America are a diverse and fascinating region that offers endless possibilities for exploration and adventure. 
                <br><br>
                Take a road trip and you'll be amazed by what you see. Drive thousands of miles on a single road, where you'll encounter endless mountains, beaches, and deserts. Hit the slopes in the Canadian Rockies or the Appalachian Mountains. Go snorkeling and sunbathing in Florida or Mexico. You can discover the bustling streets of New York City or relax on the beaches of Mexico's Riviera Maya. You can explore the vibrant art scene of Montreal or trek through the stunning landscapes of Costa Rica. 
                <br><br>
                Whether you're visiting in the summer or the winter, there's no shortage of unique things to do, so buckle up and get ready for the ride of a lifetime!
                <br><br>
                
            </p>
        </div>

        <div class="photo-show">
            <img class="image-show" src="https://i.pinimg.com/564x/17/da/01/17da016ae61cc49acad80d095bd1f99e.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/53/cc/2d/53cc2dd5c5d9ee4cb4c58103f8d57565.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/76/c9/de/76c9dec92758cea08157c956ce8e6c8e.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/15/e0/15/15e015d2aec7f5c12529a6256597446d.jpg">
        </div>

        <div id="bucketlist" class="clearfix">
            <div id="slideshow" class="cycle-slideshow">
                <img src="https://cdn.britannica.com/99/94199-050-72320332/Manly-Beacon-Death-Valley-National-Park-California.jpg">
                <img
                    src="https://cdn.britannica.com/30/94430-050-D0FC51CD/Niagara-Falls.jpg">
                <img src="https://cdn.audleytravel.com/3994/2849/79/1340901-polar-bear-churchill.jpg">
                <img
                    src="https://media.istockphoto.com/id/468572621/pt/foto/pranchas-de-surf-na-praia-do-waikiki-havai.jpg?s=612x612&w=0&k=20&c=x2xwGfRrstV9W2mRTFieayXmqR6K_kcC_eylLjiP1oo=">
                <img src="https://eb3k7ewioxo.exactdn.com/wp-content/uploads/2021/04/Tikal-4.jpeg?strip=all&lossy=1&resize=840%2C560&ssl=1">
                <img
                    src="https://cdn.outsideonline.com/wp-content/uploads/2018/11/20/outside-guide-grand-canyon_h.jpg">
                <img
                    src="https://downtownjuneauhotel.com/wp-content/uploads/2022/04/shutterstock_1478740250.jpg">
                <img src="https://www.travelexcellence.com/wp-content/uploads/2020/09/cr-canopytour.jpg">
                <img src="https://lp-cms-production.imgix.net/2022-04/San%20Blas%20Islands%20Panama%20Stefan%20Neumann%20Shutterstock_1613120053%20RFC.jpg">
                <img src="https://img.buzzfeed.com/buzzfeed-static/static/2020-03/12/13/asset/92235d2d6535/sub-buzz-2334-1584018752-7.jpg">
            </div>

            <div id="list">
                <h1>Bucket list adventures in North & Central America</h1>
                <ul>
                    <li>Go stargazing in Death Valley National Park</li>
                    <li>Chase the biggest waterfalls in North America: Niagara Falls</li>
                    <li>Polar bear watching in Canada</li>
                    <li>Learn how to surf in Hawaii</li>
                    <li>Explore the Mayan ruins in Tikal, Guatemala</li>
                    <li>Hiking the Grand Canyon, Arizona</li>
                    <li>Whale watching in Alaska</li>
                    <li>Zip-lining in Costa Rica</li>
                    <li>Island hopping in over 1,500 islands in Panama</li>
                    <li>Watching a Broadway show in New York City</li>
                </ul>
            </div>
        </div>

        <div id="travel-guides">
            <h1>North & Central America Travel Guides</h1>

            <div class="guide-container">
                <?php
                include '../DatabaseConnection/db_connect.php';

                $sql = "SELECT * FROM guides WHERE accepted = '1' AND location = 'North America'";
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
        // Slideshow of images
        $("#slideshow").cycle();
    </script>
</body>

</html>