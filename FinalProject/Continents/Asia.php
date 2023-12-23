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
                Welcome to the vibrant and diverse continent of Asia! If you are looking for a lively, colourful
                adventure that's sure to throw you out of your comfort
                zone and provide some stories to tell, think of Asia.
                <br><br>
                With over 4.5 billion people and 48 countries, Asia is a melting pot of cultures, cuisines, and
                landscapes that will leave you breathless. From the towering mountains of the Himalayas to the
                pristine beaches of Southeast Asia, and from the bustling cities of Tokyo and Shanghai to the
                ancient temples of Angkor Wat and the Taj Mahal, Asia has something to offer for everyone.
                <br><br>
                So come along and let's explore the wonders of this amazing continent together!
            </p>
        </div>

        <div class="photo-show">
            <img class="image-show" src="https://i.pinimg.com/564x/90/d9/73/90d973cd4637f52f8b0cbe2e71ef3f7c.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/fb/d0/fb/fbd0fb8f50a5b2748799c43d01f9e6e3.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/0c/f7/69/0cf7699bbbdec204b9a401a8b75b1e8a.jpg">
            <img class="image-show" src="https://i.pinimg.com/564x/0d/0e/51/0d0e51b26b1ff9bd994ae0e3eca3d39a.jpg">
        </div>

        <div id="bucketlist" class="clearfix">
            <div id="slideshow" class="cycle-slideshow">
                <img src="https://static.uc.ac.id/htb/2019/07/whats-in-my-pack-istock.jpg">
                <img src="https://conquerthewater.com/wp-content/uploads/2020/11/scubamarinelife01.jpg">
                <img
                    src="https://i.natgeofe.com/n/69e2cf60-ad59-4d20-bdd1-dc96f40ab4e8/petra-world-heritage-jordan.jpg?w=636&h=424">
                <img src="https://broganabroad.com/wp-content/uploads/2021/09/Phuket-Elephant-Sanctuary-6.jpg.webp">
                <img
                    src="https://super.abril.com.br/wp-content/uploads/2003/08/everest.jpg?quality=90&strip=info&w=1024">
                <img src="https://static01.nyt.com/images/2018/04/15/travel/15bangkok1/15bangkok1-superJumbo.jpg">
                <img src="https://img.jakpost.net/c/2017/12/29/2017_12_29_38104_1514528224._large.jpg">
                <img
                    src="https://cdn.britannica.com/89/179589-138-3EE27C94/Overview-Great-Wall-of-China.jpg?w=800&h=450&c=crop">
                <img
                    src="https://www.bordersofadventure.com/wp-content/uploads/2022/02/Travel-to-Korea-Bukchon-Hanok-Village-Seoul.jpg">
                <img
                    src="https://i0.wp.com/www.touristisrael.com/wp-content/uploads/2020/05/Dead-Sea-Beaches-scaled-e1589809735923.jpg?fit=1500%2C1000&ssl=1">
                <img
                    src="https://images.thrillophilia.com/image/upload/s--vI0Q6HT9--/c_fill,g_auto,h_600,q_auto,w_975/f_auto,fl_strip_profile/v1/images/photos/000/082/497/original/1675261154_shutterstock_2148766633.jpg.jpg">
            </div>
            <div id="list">
                <h1>Bucket list adventures in Asia</h1>
                <ul>
                    <li>Backpacking Southeast Asia</li>
                    <li>Scuba diving in the clear waters of the Philippines</li>
                    <li>Visiting the ancient city of Petra in Jordan</li>
                    <li>Volunteering at an elephant sanctuary</li>
                    <li>Trekking to Mount Everest Base Camp in Nepal</li>
                    <li>Sampling the diverse street food of Bangkok, Thailand</li>
                    <li>Watching the sunrise over the stunning landscape of Bali, Indonesia</li>
                    <li>Walking along the Great Wall of China</li>
                    <li>Exploring the bustling streets of Seoul, South Korea's capital city</li>
                    <li>Floating in the Dead Sea, the lowest point on earth</li>
                    <li>Relaxing on the white sandy beaches of the Maldives</li>
                </ul>
            </div>
        </div>
        
        <div id="travel-guides">
            <h1>Asia Travel Guides</h1>

            <div class="guide-container">
                <?php
                include '../DatabaseConnection/db_connect.php';

                $sql = "SELECT * FROM guides WHERE accepted = '1' AND location = 'Asia'";
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