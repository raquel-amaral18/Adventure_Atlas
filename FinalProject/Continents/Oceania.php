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
                Welcome to the beautiful and enchanting Oceania, where the sky is always blue, the beaches are pristine, and the people are friendly! This incredible region is home to over 25,000 islands scattered throughout the Pacific Ocean, each with its unique history, culture, and natural beauty.
                <br><br>
                One of the most iconic destinations in Oceania is Australia, famous for its vast deserts, stunning beaches, and fascinating wildlife. No visit to Australia would be complete without exploring the outback, cuddling a koala, or snorkeling in the Great Barrier Reef.
                <br><br>
                New Zealand, another popular destination in Oceania, offers breathtaking scenery with its rugged mountains, glaciers, and fjords. The country is also known for its adventurous activities, such as bungee jumping, skydiving, and hiking.
                <br><br>
                The islands of Polynesia, Micronesia, and Melanesia offer a wealth of cultural experiences, from traditional dances to ancient rituals. Samoa, for example, is famous for its fire knife dance, while Fiji is renowned for its Kava ceremonies.
                <br><br>
                No matter where you go, you'll be greeted with warmth and hospitality from the locals. So pack your bags, grab your sunscreen, and get ready to experience the wonders of Oceania!
            </p>
        </div>

        <div class="photo-show">
            <img class="image-show" src="https://i.pinimg.com/564x/6f/40/ec/6f40ec2a60aba4d545e0b9031da1bbe0.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/2b/99/05/2b99053dd9b5ebd3c735d0fd60ad12c8.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/58/fc/44/58fc4438477e86e36ceb830959210056.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/fe/6b/7f/fe6b7f63e7fe424813974b93012f0c3d.jpg">
        </div>

        <div id="bucketlist" class="clearfix">
            <div id="slideshow" class="cycle-slideshow">
                <img src="https://d2rdhxfof4qmbb.cloudfront.net/wp-content/uploads/20180221130120/5-1.jpg">
                <img src="https://static.nationalgeographic.co.uk/files/styles/image_3200/public/coverstorygettyimages-912291130hr-copy.jpg?w=1600&h=900">
                <img
                    src="https://cdn2.wanderlust.co.uk/media/1840/articles-underwater-safari-snorkel-with-whale-sharks-in-western-australia1.jpg?anchor=center&mode=crop&width=1200&height=0&rnd=131480758970000000">
                <img src="https://i.imgur.com/NWXMgwn.jpg">
                <img src="https://images.luxuryescapes.com/q_auto:good,c_fill,g_auto,ar_16:9/rjnk1b8n7l1czzgh730h.jpeg">
                <img src="https://www.commongroundbyronbay.com.au/wp-content/uploads/2010/11/Byron.surf_.2.jpg">
                <img src="https://d11xlc182tbthb.cloudfront.net/files/xggnV9FdfmIxB11bgbVQx3CzVBiXEmTWJ2p8xs7B.jpeg">
                <img src="https://images.rove.me/w_1920,q_85/fpln4tbwwv3lwngbxshm/tahiti-waterfalls.jpg">
            </div>
            <div id="list">
                <h1>Bucket list adventures in Oceania</h1>
                <ul>
                    <li>Dive the Great Barrier Reef in Australia</li>
                    <li>Explore the Waitomo Glowworm Caves in New Zealand</li>
                    <li>Swim with whale sharks in Western Australia</li>
                    <li>Trek to Mount Yasur in Vanuatu</li>
                    <li>Go island hopping in Fiji</li>
                    <li>Go surfing at Byron Bay</li>
                    <li>Visit Kangaroo Island</li>
                    <li>See the waterfalls in Tahiti</li>
                </ul>
            </div>
        </div>

        <div id="travel-guides">
            <h1>Oceania Travel Guides</h1>

            <div class="guide-container">
                <?php
                include '../DatabaseConnection/db_connect.php';

                $sql = "SELECT * FROM guides WHERE accepted = '1' AND location = 'Oceania'";
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