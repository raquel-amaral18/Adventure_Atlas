<?php session_start();
$follower_id = $_SESSION['user_id'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Atlas - Travel Guides</title>
    <script src="https://kit.fontawesome.com/6808397e85.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="community.css">
</head>

<body>
    <?php include '../General/Header.php'; ?>
    <main>
        <h1>Registered Users</h1>
        <?php
        include '../DatabaseConnection/db_connect.php';

        // Fetch user data from the database
        $query = "SELECT * FROM register";
        if ($follower_id !== null) {
            $query .= " WHERE user_id != $follower_id";
        }
        $result = mysqli_query($link, $query); 
        if (!$result) {
            die('Query Error: ' . mysqli_error($link));
        }?>

        <div class="user-card-container">
            <?php
            // Loop through the result set and generate user cards
            while ($row = mysqli_fetch_assoc($result)) {
                $user_id = $row['user_id'];
                $name = $row['name'];
                $user_image = "../User Area/Uploads/$user_id.jpg";

                // Count the number of followers
                $count_query = "SELECT COUNT(*) AS follower_count FROM user_followers WHERE user_id = $user_id";
                $count_result = mysqli_query($link, $count_query);
                $follower_count = 0;

                if ($count_result && mysqli_num_rows($count_result) > 0) {
                    $count_row = mysqli_fetch_assoc($count_result);
                    $follower_count = $count_row['follower_count'];
                }

                // Query to count the number of travel guides for the current user
                $guides_query = "SELECT COUNT(*) AS guide_count FROM guides WHERE user_id = $user_id";
                $guides_result = mysqli_query($link, $guides_query);
                $guide_count = 0; // Default guide count to 0

                if ($guides_result) {
                    $guide_row = mysqli_fetch_assoc($guides_result);
                    $guide_count = $guide_row['guide_count'];
                }

                // Check if the user is already following
                $check_query = "SELECT * FROM user_followers WHERE user_id = $user_id AND follower_id = $follower_id";
                $check_result = mysqli_query($link, $check_query);
                $is_following = ($check_result && mysqli_num_rows($check_result) > 0);

                // Determine the button text and action based on whether the user is following or not
                $follow_button_text = $is_following ? 'Unfollow' : 'Follow';
                $follow_button_action = $is_following ? 'unfollow' : 'follow';
            ?>

                <a href="user_main_page.php?user_id=<?php echo $user_id; ?>" class="user-card">
                    <?php if (file_exists($user_image)) : ?>
                        <img src="<?php echo $user_image; ?>" alt="Profile Picture">
                    <?php else : ?>
                        <i class="fas fa-user-circle"></i>
                    <?php endif; ?>
                    <div class="user-card-info">
                        <h2><?php echo $name; ?></h2>
                        <div class="count-wrapper">
                            <p class="count-large"><?php echo $follower_count; ?></p>
                            <p class="count-small">Followers</p>
                        </div>
                        <div class="count-wrapper">
                            <p class="count-large"><?php echo $guide_count; ?></p>
                            <p class="count-small">Travel Guides</p>
                        </div>
                    </div>
                    <form action="follow.php" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <input type="hidden" name="action" value="<?php echo $follow_button_action; ?>">
                        <input type="hidden" name="return_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                        <button type="submit"><?php echo $follow_button_text; ?></button>
                    </form>
                </a>
            <?php
            }
            ?>
        </div>

    </main>
    <?php include '../General/Footer.php'; ?>
</body>

</html>