<?php session_start();
$follower_id = $_SESSION['user_id'] ?? null; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Atlas - Travel Guides</title>
    <script src="https://kit.fontawesome.com/6808397e85.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="user_main_page.css">
</head>

<body>
    <?php include '../General/Header.php'; ?>
    <main class="clearfix">
        <?php
        include '../DatabaseConnection/db_connect.php';

        // Get the user ID from the URL parameter
        if (isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];
        }

        // Fetch the user's information from the database
        $sql = "SELECT name, email, description FROM register WHERE user_id = '$user_id'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);

        $name = $row['name'];
        $description = $row['description'];
        $user_image = "../User Area/Uploads/$user_id.jpg";
        $count_query = "SELECT COUNT(*) AS follower_count FROM user_followers WHERE user_id = $user_id";
        $count_result = mysqli_query($link, $count_query);
        $follower_count = 0;

        if ($count_result && mysqli_num_rows($count_result) > 0) {
            $count_row = mysqli_fetch_assoc($count_result);
            $follower_count = $count_row['follower_count'];
        }
        ?>

        <div class="user-info">
            <div class="profile-picture">
                <?php
                if (file_exists($user_image)) :
                ?>
                    <img src="<?php echo $user_image; ?>" alt="Profile Picture">
                <?php else : ?>
                    <i class="fas fa-user-circle"></i>
                <?php endif; ?>
            </div>

            <div class="user-details">
                <p><strong><?php echo $name; ?></strong></p>
                <p id="description"><?php echo $description; ?></p>

                <?php
                // Check if the user is already following
                $check_query = "SELECT * FROM user_followers WHERE user_id = $user_id AND follower_id = $follower_id";
                $check_result = mysqli_query($link, $check_query);
                $is_following = ($check_result && mysqli_num_rows($check_result) > 0);

                // Determine the button text and action based on whether the user is following or not
                $follow_button_text = $is_following ? 'Unfollow' : 'Follow';
                $follow_button_action = $is_following ? 'unfollow' : 'follow';
                ?>
                <form action="../Community/follow.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <input type="hidden" name="action" value="<?php echo $follow_button_action; ?>">
                    <input type="hidden" name="return_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                    <button type="submit" class="follow-button"><?php echo $follow_button_text; ?></button>
                </form>

                <p class="followers-count"><?php echo $follower_count; ?> followers</p>
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
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

    </main>

    <?php include '../General/Footer.php'; ?>
</body>

</html>