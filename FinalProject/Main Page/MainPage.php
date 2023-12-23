<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Atlas - Travel Guides</title>
    <script src="https://kit.fontawesome.com/6808397e85.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="MainPage.css">
</head>

<body>
    <?php include '../General/Header.php'; ?>
    <main>
        <div class="parallax parallax-1">
            <div class="search-bar-container">
                <p class="intro-text">Your adventure starts here</p>
                <form action="../Search/search.php" method="get" class="search-form">
                    <input type="text" name="search" placeholder="Search the site...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <div id="summary">
            <p>
                Map your way to adventure with AdventureAtlas - the fun and interactive site for user-generated maps of
                the world's greatest cities!
                <br>
                <br>
                Discover insider tips and hidden gems, created by travelers just like you. Customize your own map and
                share your adventures with the world.
                <br>
                <br>
                Start mapping your adventures today!
            </p>
            <?php

            // Check if the user is logged in
            if (isset($_SESSION['email'])) {
            ?>
                <a href="../Places/Places_forms.php">
                    <button id="your-guides">Upload your travel guides</button>
                </a>
            <?php
            } else {
                // User is not logged in
            ?>
                <a href="../Login&RegistrationForm/Form.php">
                    <button id="your-guides">Upload your travel guides</button>
                </a>
            <?php
            }
            ?>
        </div>

        <div class="novidades-container">
            <h1>What's new?</h1>
            <p>Check out our 3 most recent guides below and start planning your next unforgettable trip today!</p>

            <div class="slideshow-container">
                <?php
                include '../DatabaseConnection/db_connect.php';

                // Retrieve the last three guides based on guide_id
                $query = "SELECT * FROM guides WHERE accepted = '1' ORDER BY guide_id DESC LIMIT 3";
                $result = mysqli_query($link, $query);
                if (!$result) {
                    die('Error: ' . mysqli_error($link));
                }


                while ($row = mysqli_fetch_assoc($result)) {
                    $guide_id = $row['guide_id'];
                    $guide_title = $row['guide_title'];
                    $guide_image = "../Places/Uploads/$guide_id.jpg"; // Assuming the image file format is JPEG

                    // Display the guide content within the HTML structure
                    echo '
                    <div class="mySlides">
                        <div class="slide-container">
                            <div class="slide-image">
                                <img src="' . $guide_image . '">
                            </div>
                            <div class="slide-content">
                                <h2>' . $guide_title . '</h2>
                                <a href="../Places/Guides.php?guide_id=' . $guide_id . '" class="slide-button">
                                    <button>View Post</button>
                                </a>
                            </div>
                        </div>
                    </div>';
                }
                ?>
                <div class="slideshow-buttons">
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>

                <br>

                <div style="text-align:center">
                    <span class="dot active" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>
        </div>

        <div class="adventure-type-container">
            <h1>Adventure Types</h1>
            <div class="adventure-type">
                <div class="adventure-type-card">
                    <div class="adventure-type-card-image">
                        <img src="https://i.pinimg.com/564x/60/f4/4b/60f44b43d6879c3aabeb4f377bd4fe55.jpg" alt="Adventure Image 1">
                    </div>
                    <div class="adventure-type-card-content">
                        <h3 class="adventure-type-card-title">Roadtrips</h3>
                        <p class="adventure-type-card-description">Endless highways, scenic landscapes, and unforgettable adventures on wheels</p>
                        <div class="adventure-type-card-button">
                            <a href="../Adventure Types/AdventureTypes.php?type=Roadtrips">
                                <button>Explore Roadtrips</button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="adventure-type-card">
                    <div class="adventure-type-card-image">
                        <img src="https://i.pinimg.com/564x/a8/4b/6f/a84b6f49ecb1265bbfb70314d6cdb407.jpg" alt="Adventure Image 1">
                    </div>
                    <div class="adventure-type-card-content">
                        <h3 class="adventure-type-card-title">Backpacking</h3>
                        <p class="adventure-type-card-description">Embrace the spontaneity of backpacking, where every day brings unexpected surprises</p>
                        <div class="adventure-type-card-button">
                            <a href="../Adventure Types/AdventureTypes.php?type=Backpacking">
                                <button>Explore Backpacking Trips</button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="adventure-type-card">
                    <div class="adventure-type-card-image">
                        <img src="https://i.pinimg.com/564x/f0/b8/cc/f0b8cc374ca3eca2697f28d8865582ee.jpg" alt="Adventure Image 1">
                    </div>
                    <div class="adventure-type-card-content">
                        <h3 class="adventure-type-card-title">Solo Travel</h3>
                        <p class="adventure-type-card-description">Embrace independence, find inner strength, and forge connections around the world</p>
                        <div class="adventure-type-card-button">
                            <a href="../Adventure Types/AdventureTypes.php?type=Solo Travel">
                                <button>Explore Solo Travel</button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="adventure-type-card">
                    <div class="adventure-type-card-image">
                        <img src="https://i.pinimg.com/564x/77/a8/cd/77a8cddcbddc44dbe83716c4d10a900e.jpg" alt="Adventure Image 1">
                    </div>
                    <div class="adventure-type-card-content">
                        <h3 class="adventure-type-card-title">Luxury Travel</h3>
                        <p class="adventure-type-card-description">Embark on exclusive experiences tailored to your every desire</p>
                        <div class="adventure-type-card-button">
                            <a href="../Adventure Types/AdventureTypes.php?type=Luxury Travel">
                                <button>Explore Luxury Travel</button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="adventure-type-card">
                    <div class="adventure-type-card-image">
                        <img src="https://i.pinimg.com/564x/b0/c1/7a/b0c17a8484361be5998c0e6d0198ca61.jpg" alt="Adventure Image 1">
                    </div>
                    <div class="adventure-type-card-content">
                        <h3 class="adventure-type-card-title">Budget Travel</h3>
                        <p class="adventure-type-card-description">Travel smart, spend wisely, and create priceless memories on a budget</p>
                        <div class="adventure-type-card-button">
                            <a href="../Adventure Types/AdventureTypes.php?type=Budget Travel">
                                <button>Explore Budget Travel</button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="adventure-type-card">
                    <div class="adventure-type-card-image">
                        <img src="https://i.pinimg.com/564x/4a/d6/ed/4ad6ed1ac1a6dde58a3372b3c6afca87.jpg" alt="Adventure Image 1">
                    </div>
                    <div class="adventure-type-card-content">
                        <h3 class="adventure-type-card-title">Active Travel</h3>
                        <p class="adventure-type-card-description">Embrace the outdoors and challenge yourself physically and mentally</p>
                        <div class="adventure-type-card-button">
                            <a href="../Adventure Types/AdventureTypes.php?type=Active">
                                <button>Explore Active Trips</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="podium-section">
            <h1>Top Travel Guide Contributors</h1>
            <p>Explore the incredible travel stories from our most popular adventurers!</p>

            <div class="podium-container">
                <?php
                // Query to fetch the top contributors based on the number of comments
                $query = "SELECT register.user_id, register.name, COUNT(comments.comment_id) AS comment_count
              FROM comments
              INNER JOIN guides ON comments.guide_id = guides.guide_id
              INNER JOIN register ON guides.user_id = register.user_id
              GROUP BY guides.user_id
              ORDER BY comment_count DESC
              LIMIT 3";

                $result = mysqli_query($link, $query);

                // Check if the query executed successfully
                if ($result) {
                    // Array to hold the medal icons
                    $medals = array('gold', 'silver', 'bronze');

                    // Fetch and display the top contributors
                    $rank = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $user_id = $row['user_id'];
                        $username = $row['name'];
                        $commentCount = $row['comment_count'];
                        $profilePicture = "../User Area/Uploads/{$row['user_id']}.jpg";
                        $medal = $medals[$rank]; // Get the corresponding medal based on rank
                ?>

                        <div class="podium-item <?php echo $medal; ?>">
                            <span class="medal-icon <?php echo $medal; ?>"><i class="fas fa-medal"></i></span>
                            <a href="../Community/user_main_page.php?user_id=<?php echo $user_id; ?>">
                                <img src="<?php echo $profilePicture; ?>" alt="<?php echo $username; ?>">
                                <h3 class="username"><?php echo $username; ?></h3>
                            </a>
                        </div>

                <?php
                        $rank++; // Increment the rank for the next user
                    }

                    // Free the result set
                    mysqli_free_result($result);
                } else {
                    // Handle the query error
                    echo "Error: " . mysqli_error($link);
                }
                ?>
            </div>
        </div>


        <div class="join_network">
            <img src="Images/Logo2-joiningTheNetwork.png" alt="Logo">
            <a class="login_button" href="../Login&RegistrationForm/Form.php">Join the Network</a>
        </div>

        <div class="parallax parallax-2"></div>
    </main>

    <?php include '../General/Footer.php'; ?>

    <script>
        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdown-content");
            dropdownContent.classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropdown a')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

        // What's new slideshow
        var slideIndex = 1;
        showSlides(slideIndex);


        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = slides.length;
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>

</body>

</html>