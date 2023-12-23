<?php session_start();
$follower_id = $_SESSION['user_id'] ?? null; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Atlas - Travel Guides</title>
    <script src="https://kit.fontawesome.com/6808397e85.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Guides.css">
</head>

<body>
    <?php include '../General/Header.php'; ?>
    <main>
        <div class="guide-container">
            <?php
            include '../DatabaseConnection/db_connect.php';

            // Check if guide_id is provided in the URL
            if (isset($_GET['guide_id'])) {
                $guideId = $_GET['guide_id'];

                // Fetch the guide details from the database based on guide_id
                $sql = "SELECT * FROM guides WHERE guide_id = '$guideId'";
                $result = mysqli_query($link, $sql);

                if (!$result) {
                    echo "Query error: " . mysqli_error($link);
                }

                if ($result !== false && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);

                    // Extract the guide details
                    $user_id = $row['user_id'];
                    $guide_title = $row['guide_title'];
                    $guide_date = $row['created_at'];
                    $guide_summary = $row['guide_summary'];
                    $guide_extra = $row['detailed_paragraph'];
                    $guide_location = $row['location'];
                    $t_section1 = $row['t_section1'];
                    $s_section1 = $row['s_section1'];
                    $t_section2 = $row['t_section2'];
                    $s_section2 = $row['s_section2'];
                    $t_section3 = $row['t_section3'];
                    $s_section3 = $row['s_section3'];
                    $t_section4 = $row['t_section4'];
                    $s_section4 = $row['s_section4'];
                    $guide_image = "../Places/Uploads/$guideId.jpg"; // Assuming the image file format is JPEG

                    // Fetch the user's name from the database based on user_id
                    $sqlUser = "SELECT name FROM register WHERE user_id = '$user_id'";
                    $resultUser = mysqli_query($link, $sqlUser);

                    if (!$resultUser) {
                        echo "Query error: " . mysqli_error($link);
                    }

                    if ($resultUser !== false && mysqli_num_rows($resultUser) > 0) {
                        $rowUser = mysqli_fetch_assoc($resultUser);
                        $user_name = $rowUser['name'];
                    }
            ?>
                    <div class="guide-container">
                        <img src="<?php echo $guide_image; ?>" alt="<?php echo $guide_title; ?>" class="guide-image">
                        <h1 class="guide-title"><?php echo $guide_title; ?></h1>
                        <div class="guide-info">
                            <div class="user-details">
                                <?php
                                // Add user image and follow button
                                $user_image = "../User Area/Uploads/$user_id.jpg";

                                if (file_exists($user_image)) :
                                ?>
                                    <img src="<?php echo $user_image; ?>" alt="Profile Picture" class="user-image">
                                <?php else : ?>
                                    <i class="fas fa-user-circle user-icon"></i>
                                <?php endif; ?>

                                <a href="../Community/user_main_page.php?user_id=<?php echo $user_id; ?>"><strong><?php echo $user_name; ?></strong></a>

                                <!-- Follow button -->
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

                            </div>
                            <div class="guide-date"><?php echo $guide_date; ?></div>

                            <div class="guide-summary">
                                <h2 class="summary-title">Summary</h2>
                                <p class="summary-content"><?php echo $guide_summary; ?></p>
                            </div>

                            <div class="guide-extra">
                                <h2 class="extra-title">Important Information</h2>
                                <p class="extra-content"><?php echo $guide_extra; ?></p>
                            </div>

                            <a href="../Continents/<?php echo $guide_location; ?>.php#travel-guides" class="guide-actions">
                                <button id="Other-guides">Explore All <?php echo $guide_location; ?> Travel Guides</button>
                            </a>

                            <div class="guide-sections">
                                <div class="section">
                                    <h2 class="section-title"><?php echo $t_section1; ?></h2>
                                    <p class="section-content"><?php echo $s_section1; ?></p>
                                </div>

                                <div class="section">
                                    <h2 class="section-title"><?php echo $t_section2; ?></h2>
                                    <p class="section-content"><?php echo $s_section2; ?></p>
                                </div>

                                <div class="section">
                                    <h2 class="section-title"><?php echo $t_section3; ?></h2>
                                    <p class="section-content"><?php echo $s_section3; ?></p>
                                </div>

                                <div class="section">
                                    <h2 class="section-title"><?php echo $t_section4; ?></h2>
                                    <p class="section-content"><?php echo $s_section4; ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                } else {
                    echo "Guide not found.";
                }
            } else {
                echo "Invalid guide ID.";
            }
                ?>
                    </div>
                    <hr>
                    <div id="feedback">
                        <h2>Comment section</h2>
                        <p>
                            Did you find this post helpful?
                            <br>
                            Would you recommend anything else?
                        </p>

                        <div class="wrapper">
                            <form action="../Places/Feedback_section/submit_comment.php?guide_id=<?php echo $guideId; ?>" method="POST">
                                <div class="rating">
                                    <input type="number" name="rating" hidden>
                                    <i class='bx bx-star star' style="--i: 0;"></i>
                                    <i class='bx bx-star star' style="--i: 1;"></i>
                                    <i class='bx bx-star star' style="--i: 2;"></i>
                                    <i class='bx bx-star star' style="--i: 3;"></i>
                                    <i class='bx bx-star star' style="--i: 4;"></i>
                                </div>
                                <?php
                                if (isset($_SESSION['user_id'])) {
                                    $username = $_SESSION['username'];
                                    echo '<input type="text" name="name" value="' . $username . '" readonly></input>';
                                } else {
                                    echo '<input type="text" name="name" placeholder="Your name..."></input>';
                                }
                                ?>
                                <textarea name="opinion" cols="30" rows="5" placeholder="Your comment here..."></textarea>
                                <div class="btn-group">
                                    <button type="submit" class="btn submit">Submit</button>
                                </div>
                            </form>
                        </div>

                        <!-- Display comments -->
                        <div id="comments-section">
                            <?php
                            // Fetch comments for the guide from the database
                            $commentsSql = "SELECT * FROM comments WHERE guide_id = '$guideId'";
                            $commentsResult = mysqli_query($link, $commentsSql);

                            if ($commentsResult && mysqli_num_rows($commentsResult) > 0) {
                                while ($commentRow = mysqli_fetch_assoc($commentsResult)) {
                                    $commentName = $commentRow['name'];
                                    $commentRating = $commentRow['score'];
                                    $commentContent = $commentRow['comment'];
                                    $commentID = $commentRow['comment_id']

                            ?>
                                    <div class="comment-bubble">
                                        <div class="comment">
                                            <div class="user-info">
                                                <div class="user-icon">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="Profile Picture" class="user-image">
                                                    <h3><?php echo $commentName; ?></h3>
                                                </div>
                                                <div class="comment-rating">
                                                    <?php
                                                    // Render star icons based on rating
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        if ($i <= $commentRating) { ?>
                                                            <i class="fas fa-star"></i>
                                                        <?php
                                                        } else { ?>
                                                            <i class="far fa-star"></i>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <p><?php echo $commentContent; ?></p>
                                            <button class="reply-btn">Reply</button>
                                        </div>

                                        <div id="replies-section">
                                            <?php
                                            // Fetch replies for the comment from the database
                                            $repliesSql = "SELECT * FROM comment_replies WHERE comment_id = '$commentID'";
                                            $repliesResult = mysqli_query($link, $repliesSql);

                                            if ($repliesResult && mysqli_num_rows($repliesResult) > 0) {
                                                while ($replyRow = mysqli_fetch_assoc($repliesResult)) {
                                                    $replyName = $replyRow['reply_name'];
                                                    $replyContent = $replyRow['reply_content'];
                                            ?>
                                                    <div class="reply">
                                                        <strong><?php echo $replyName; ?>:</strong><br><br>
                                                        <span><?php echo $replyContent; ?></span>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>

                                        <!-- Reply form -->
                                        <form class="reply-form" method="post" action="Feedback_section/handle_reply.php?guide_id=<?php echo $guideId; ?>">
                                            <?php
                                            if (isset($_SESSION['user_id'])) {
                                                $username = $_SESSION['username'];
                                                echo '<input type="text" name="reply_name" value="' . $username . '" readonly></input>';
                                            } else {
                                                echo '<input type="text" name="reply_name" placeholder="Your name..."></input>';
                                            }
                                            ?>
                                            <textarea name="reply_content" placeholder="Enter your reply"></textarea>
                                            <input type="hidden" name="comment_id" value="<?php echo $commentID; ?>">
                                            <button type="submit">Submit</button>
                                        </form>
                                    </div>


                            <?php
                                }
                            } else {
                                echo "<p>No comments yet.</p>";
                            }
                            ?>
                        </div>
                    </div>
    </main>

    <?php include '../General/Footer.php'; ?>

    <script>
        const allStar = document.querySelectorAll('.rating .star')
        const ratingValue = document.querySelector('.rating input')

        allStar.forEach((item, idx) => {
            item.addEventListener('click', function() {
                let click = 0
                ratingValue.value = idx + 1

                allStar.forEach(i => {
                    i.classList.replace('bxs-star', 'bx-star')
                    i.classList.remove('active')
                })
                for (let i = 0; i < allStar.length; i++) {
                    if (i <= idx) {
                        allStar[i].classList.replace('bx-star', 'bxs-star')
                        allStar[i].classList.add('active')
                    } else {
                        allStar[i].style.setProperty('--i', click)
                        click++
                    }
                }
            })
        })



        // Get the reply button and reply form elements
        const replyButtons = document.querySelectorAll(".reply-btn");
        const replyForms = document.querySelectorAll(".reply-form");

        // Add event listeners to each reply button
        replyButtons.forEach((button, index) => {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                // Toggle the visibility of the corresponding reply form
                replyForms[index].classList.toggle("show");
            });
        });
    </script>
</body>

</html>