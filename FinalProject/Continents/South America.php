<?php session_start(); ?>
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
                Hold onto your hats and get ready for the adventure of a lifetime! We're about to dive into the colorful
                and awe-inspiring continent of South America. From the pristine beaches of Brazil to the ancient ruins
                of Peru, South America is a treasure trove of culture, history, and natural wonders.
                <br><br>
                Whether you're seeking the rush of adrenaline from trekking through the Amazon rainforest or the
                peaceful serenity of watching the sun set over the Andes Mountains, South America has something for
                every kind of traveler. The vibrant music, mouth-watering cuisine, and friendly locals will make you
                feel right at home.
                <br><br>
                If you're ready to experience the vibrant energy of Rio de Janeiro's Carnival, explore the mysterious
                ruins of Machu Picchu, or sample the famous wines of Argentina, South America is the perfect destination
                for you.
                <br><br>
                So dust off your passport, pack your bags, and join us on an unforgettable journey through the heart of
                South America!
            </p>
        </div>

        <div class="photo-show">
            <img class="image-show" src="https://i.pinimg.com/564x/2d/7b/27/2d7b279dbfce3065d238531c114597d8.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/f1/1c/b5/f11cb519c1d68c7c9e1fc89e682f2b43.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/3b/c5/47/3bc5479fb23f1f86359d627c5511b4b5.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/3a/63/51/3a63515565edd10a90d517a2b80cd1ef.jpg">
        </div>

        <div id="bucketlist" class="clearfix">
            <div id="slideshow" class="cycle-slideshow">
                <img src="https://lp-cms-production.imgix.net/features/2013/02/Amazon_tour_Manaus-97746aabd084.jpg?auto=compress&fit=crop&fm=auto&q=50&w=1200&h=800">
                <img src="https://classic.exame.com/wp-content/uploads/2019/05/gettyimages-461357863.jpg?quality=70&strip=info&w=1024">
                <img src="https://daily.jstor.org/wp-content/uploads/2015/08/Solar_de_Uyuni_1050x700.jpg">
                <img src="https://www.travelandleisure.com/thmb/WzL019sDotA4SIo4bacRrE4j_N0=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/galapagos-islands-ecuador-GALAPA1104-d013219debf14369ab5039a4eafb496e.jpg">
                <img src="https://upload.travelawaits.com/ta/uploads/2021/04/f26310814e7a11a9f132dd29b7cd1f26310.jpg">
                <img src="https://www.aventuradobrasil.com/assets/img/news/Drums-in-Rio-de-Janeiro.jpg">
                <img src="https://www.atlasandboots.com/wp-content/uploads/2020/02/Climbing-Aconcagua-featimg.jpg">
                <img src="https://www.chile.travel/wp-content/uploads/2021/07/carretera-austral_prin-min.jpg">
                <img src="https://www.culturesmartbooks.co.uk/news/wp-content/uploads/2017/09/Image-for-opening-of-post.jpg">
            </div>
            <div id="list">
                <h1>Bucket list adventures in South America</h1>
                <ul>
                    <li>Embark on a thrilling Amazon riverboat adventure</li>
                    <li>Trek to the ancient ruins of Machu Picchu</li>
                    <li>Explore the unique and otherworldly landscape of the Salar de Uyuni in Bolivia</li>
                    <li>Get up close to the diverse wildlife of the Galapagos Islands</li>
                    <li>Marvel at the awe-inspiring Iguazu Falls</li>
                    <li>Discover the vibrant culture and music scene of Rio de Janeiro, Brazil</li>
                    <li>Hike to the summit of Aconcagua, the highest peak in the Americas</li>
                    <li>Take a road trip along the stunning Carretera Austral in Chile</li>
                    <li>Dive into the vibrant nightlife and street art scene of Bogotá, Colombia</li>
                </ul>
            </div>
        </div>

        <div id="travel-guides">
            <h1>South America Travel Guides</h1>

            <div class="guide-container">
                <?php
                include '../DatabaseConnection/db_connect.php';

                $sql = "SELECT * FROM guides WHERE accepted = '1' AND location = 'South America'";
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