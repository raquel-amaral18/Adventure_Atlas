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
                Africa is a world of its own. With its stunning natural beauty, incredible wildlife, and rich cultural
                heritage, Africa is a truly unique destination that offers something for everyone.
                <br><br>
                From the towering sand dunes of the Sahara to the lush rainforests of the Congo Basin, Africa is a land
                of incredible contrasts. Whether you're looking to hike mount Kilimanjaro, encounter exotic wildlife, or
                simply relax on the beach, Africa has it all.
                <br><br>
                But beyond its stunning scenery, Africa is also a place of vibrant cultures, with a wealth of traditions
                and customs that have been passed down through the generations. So come and discover the magic of Africa
                for yourself, and let its beauty and wonder captivate your heart and soul.
            </p>
        </div>

        <div class="photo-show">
            <img class="image-show" src="https://i.pinimg.com/564x/76/5c/28/765c28b1735a26cb0a4b8b370eafa898.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/67/10/81/67108158b0dc0c197d752284b1126cd3.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/87/ae/85/87ae85639138d78f8c398d59c25ba262.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/80/8f/88/808f88a44118ba88f055d438fa492ce2.jpg">
        </div>

        <div id="bucketlist" class="clearfix">
            <div id="slideshow" class="cycle-slideshow">
                <img src="https://www.traveltalktours.com/wp-content/uploads/2022/03/AdobeStock_266476840-scaled.jpeg">
                <img
                    src="https://www.travelpharm.com/blog/wp-content/uploads/2019/07/Everything-You-Need-To-Know-About-Climbing-Kilimanjaro.jpg">
                <img src="https://guardian.ng/wp-content/uploads/2018/04/Photo_-Art-of-Safari.jpg">
                <img
                    src="https://images.prismic.io/mystique/24d6af7e-53ba-47c4-baef-da7de5b49130_86c7e78d-48e2-4414-9c99-60c5ca83c906-13944-cairo-skip-the-line-tickets---pyramids-of-giza-01.webp?auto=compress,format&rect=0,0,1200,750&w=1200&h=750">
                <img src="https://media.tacdn.com/media/attractions-splice-spp-674x446/06/ea/ab/5a.jpg">
                <img
                    src="https://i0.wp.com/geckoridge.com.na/wp-content/uploads/2017/09/Sand-Boarding.jpg?fit=1024%2C683&ssl=1">
                <img
                    src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/14/10/2e/1e/cape-town.jpg?w=700&h=-1&s=1">
                <img src="https://www.arabnews.com/sites/default/files/userimages/1347/dsc06840.jpg">
                <img src="https://www.onde-e-quando.net/site/images/illustration/zanzibar_247.jpg">
                <img src="https://www.andbeyond.com/wp-content/uploads/sites/5/gorillas-uganda.jpg">
            </div>

            <div id="list">
                <h1>Bucket list adventures in Africa</h1>
                <ul>
                    <li>Exploring the colourful markets of Morocco</li>
                    <li>Climbing Kilimanjaro, the highest peak in Africa</li>
                    <li>Exploring the stunning sand dunes of Namibia's Sossusvlei</li>
                    <li>Visiting the pyramids of Giza in Egypt</li>
                    <li>White water rafting in the Zambezi River in Zimbabwe</li>
                    <li>Sandboarding in the deserts of Swakopmund, Namibia</li>
                    <li>Exploring the vibrant culture and history of Cape Town, South Africa</li>
                    <li>Going on a camel trek through the Sahara Desert in Morocco</li>
                    <li>Visiting the colorful fishing villages of Zanzibar, Tanzania</li>
                    <li>Going on a gorilla trekking adventure in Uganda</li>
                </ul>
            </div>
        </div>

        <div id="travel-guides">
            <h1>Africa Travel Guides</h1>

            <div class="guide-container">
                <?php
                include '../DatabaseConnection/db_connect.php';

                $sql = "SELECT * FROM guides WHERE accepted = '1' AND location = 'Africa'";
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