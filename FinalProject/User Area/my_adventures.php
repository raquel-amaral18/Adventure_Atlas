<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adventure Atlas - Travel Guides</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js"></script>
        <script src="https://kit.fontawesome.com/6808397e85.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="my_adventures.css">
    </head>
</head>

<body>
    <?php include '../General/Header.php'; ?>

    <main class="clearfix">
        <?php

        include '../DatabaseConnection/db_connect.php';

        $user_id = $_SESSION['user_id'];
        ?>

        <div class="intro-text">
            <h2>Your Incredible Travel Guides Await!</h2>
            <p>Relive your amazing adventures and share your insider knowledge with fellow travelers. Your travel guides are a treasure trove of experiences, tips, and hidden gems. Revisit the places you've explored, the cultures you've encountered, and the memories you've made. Get ready to inspire others and continue your travel journey through your exceptional guides!</p>
            <p>Click on the guide to view its details, or click on the trash icon to delete it if needed. Keep your collection organized and showcase your best travel guides.</p>
        </div>

        <div class="user-info">
            <div class="profile-picture">
                <?php
                $user_image = "../User Area/Uploads/$user_id.jpg"; // Assuming the image file format is JPEG

                if (file_exists($user_image)) : ?>
                    <img src="<?php echo $user_image; ?>" alt="Profile Picture">
                <?php else : ?>
                    <i class="fas fa-user-circle"></i>
                <?php endif; ?>
            </div>

            <div class="user-details">
                <?php
                // Fetch the user's information from the database
                $sql = "SELECT name, email, description FROM register WHERE user_id = '$user_id'";
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_assoc($result);

                $name = $row['name'];
                $email = $row['email'];
                $description = $row['description'];

                $count_query = "SELECT COUNT(*) AS follower_count FROM user_followers WHERE user_id = $user_id";
                $count_result = mysqli_query($link, $count_query);
                $follower_count = 0;

                if ($count_result && mysqli_num_rows($count_result) > 0) {
                    $count_row = mysqli_fetch_assoc($count_result);
                    $follower_count = $count_row['follower_count'];
                }
                ?>

                <p><strong><?php echo $name; ?></strong></p>
                <div class="count-wrapper">
                    <p class="count-large"><?php echo $follower_count; ?></p>
                    <p class="count-small">Followers</p>
                </div>
                <p id="description"><?php echo $description; ?></p>

                <div id="update-info-container">
                    <button id="update-info-btn">Update Information</button>

                    <form id="update-info-form" action="update_user.php" method="POST" enctype="multipart/form-data">
                        <input type="file" id="image" name="image" accept="image/*">
                        <textarea name="description" rows="10" cols="50" placeholder="Add a description about yourself..."></textarea>

                        <button type="submit">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="guide-container">
            <?php
            $sql = "SELECT * FROM guides WHERE user_id = '$user_id' AND accepted = '1'";
            $result = mysqli_query($link, $sql);

            while ($row = mysqli_fetch_array($result)) {
                $guide_id = $row['guide_id'];
                $guide_title = $row['guide_title'];
                $guide_image = "../Places/Uploads/$guide_id.jpg";
            ?>

                <div class="guide">
                    <img src="<?php echo $guide_image; ?>">
                    <div class="overlay">
                        <h2><?php echo $guide_title; ?></h2>
                        <div class="button-container">
                            <a href="../Places/Guides.php?guide_id=<?php echo $guide_id; ?>" class="view-post-btn">
                                <button>View Post</button>
                            </a>
                            <form action="delete_guide.php" method="POST" onsubmit="return confirmDelete();">
                                <input type="hidden" name="guide_id" value="<?php echo $guide_id; ?>">
                                <button type="submit" class="delete-btn"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <div>
            <a href="../Places/Places_forms.php">
                <button id="your-guides">Upload more travel guides</button>
            </a>
        </div>

        <div id="followed-users">
            <div class="followed-users-header">
                <h2>Users You Follow</h2>
            </div>

            <div class="followed-users-container">
                <?php
                $followed_users_query = "SELECT user_id FROM user_followers WHERE follower_id = $user_id";
                $followed_users_result = mysqli_query($link, $followed_users_query);

                // Array to store the followed users' details
                $followed_users = array();

                while ($followed_user_row = mysqli_fetch_assoc($followed_users_result)) {
                    $followed_user_id = $followed_user_row['user_id'];

                    //This code fetches the details (name) of each followed user and stores them in the $followed_users array.
                    $followed_user_query = "SELECT name FROM register WHERE user_id = '$followed_user_id'";
                    $followed_user_result = mysqli_query($link, $followed_user_query);
                    $followed_user_row = mysqli_fetch_assoc($followed_user_result);

                    // Add the followed user's details to the array
                    $followed_user_row['user_id'] = $followed_user_id;
                    $followed_users[] = $followed_user_row;
                }
                
                foreach ($followed_users as $followed_user) : ?>
                    <div class="followed-user">
                        <?php
                        $followed_user_id = $followed_user['user_id'];
                        $followed_user_image = "../User Area/Uploads/{$followed_user_id}.jpg";
                        ?>
                        <a href="../Community/user_main_page.php?user_id=<?php echo $followed_user_id; ?>">
                            <div class="followed-user-details">
                                <div class="followed-user-image">
                                    <?php
                                    if (file_exists($followed_user_image)) {
                                        echo '<img src="' . $followed_user_image . '" alt="Profile Picture">';
                                    } else {
                                        echo '<i class="fas fa-user-circle"></i>';
                                    }
                                    ?>
                                </div>
                                <div class="followed-user-info">
                                    <h3><?php echo $followed_user['name']; ?></h3>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </main>

    <?php include '../General/Footer.php'; ?>

    <script>
        // Pop-up to confirm a guides' delete
        function confirmDelete() {
            return confirm("Are you sure you want to delete this guide?");
        }


        // Toggle the Update Info in the User's Info Section
        const UpdateButton = document.getElementById("update-info-btn");
        const UpdateForm = document.getElementById("update-info-form");

        // Add event listener to the Update button
        UpdateButton.addEventListener("click", function() {
            // Toggle the visibility of the Update form
            UpdateForm.classList.toggle("show");
        });
    </script>
</body>

</html>