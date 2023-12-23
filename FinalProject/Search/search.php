<?php session_start(); 

include '../DatabaseConnection/db_connect.php';

if (isset($_GET['search'])) {
    $query = $_GET['search'];

    $sql = "SELECT * FROM guides WHERE location LIKE '%$query%' OR guide_title LIKE '%$query%' or adventure_types LIKE '%$query%'";
    $result = mysqli_query($link, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Adventure Atlas - Search Results</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js"></script>
            <script src="https://kit.fontawesome.com/6808397e85.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="Search.css">
        </head>

        <body>
            <?php include '../General/Header.php'; ?>
            <div class="intro-text">
                <h2>Your Search Results</h2>
                <p>Here are the travel guides that match your search query:</p>
            </div>
            <main class="guide-container">
            <?php
            while ($row = mysqli_fetch_array($result)) {
                $guide_id = $row['guide_id'];
                $guide_title = $row['guide_title'];
                $guide_image = "../Places/Uploads/$guide_id.jpg"; // Assuming the image file format is JPEG
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
            </main>
            <?php include "../General/Footer.php"; ?>
        </body>
        </html>
        <?php
    } else {
        echo '<p>No guides found for the entered query.</p>';
    }
}
?>
