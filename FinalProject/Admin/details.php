<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Atlas Travel Guides</title>
    <link rel="stylesheet" href="details.css">
</head>

<body>
    <?php
    include '../DatabaseConnection/db_connect.php';

    $guide_id = $_REQUEST['id'];

    $sql = "SELECT * FROM guides WHERE guide_id = $guide_id";

    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);

    $guideTitle = $row['guide_title'];
    $location = $row['location'];
    $travelTypes = $row['adventure_types'];
    $guideSummary = $row['guide_summary'];
    $detailedParagraph = $row['detailed_paragraph'];
    $t_section1 = $row['t_section1'];
    $s_section1 = $row['s_section1'];
    $t_section2 = $row['t_section2'];
    $s_section2 = $row['s_section2'];
    $t_section3 = $row['t_section3'];
    $s_section3 = $row['s_section3'];
    $t_section4 = $row['t_section4'];
    $s_section4 = $row['s_section4'];
    $guide_image = "../Places/Uploads/$guide_id.jpg"
    ?>
    <div class="guide-container">
        <h2><?php echo $guideTitle; ?></h2>
        <img src="<?php echo $guide_image; ?>">
        <p><strong>Location:</strong> <?php echo $location; ?></p>
        <p><strong>Travel Type:</strong> <?php echo $travelTypes; ?></p>
        <p><strong>Guide Summary:</strong> <?php echo $guideSummary; ?></p>
        <p><strong>Extra Paragraph:</strong> <?php echo $detailedParagraph; ?></p>
        <hr>
        <div>
            <h3 class="section-title"><?php echo $t_section1; ?></h3>
            <div class="section-content"><?php echo $s_section1; ?></div>
        </div>
        <div>
            <h3 class="section-title"><?php echo $t_section2; ?></h3>
            <div class="section-content"><?php echo $s_section2; ?></div>
        </div>
        <div>
            <h3 class="section-title"><?php echo $t_section3; ?></h3>
            <div class="section-content"><?php echo $s_section3; ?></div>
        </div>
        <div>
            <h3 class="section-title"><?php echo $t_section4; ?></h3>
            <div class="section-content"><?php echo $s_section4; ?></div>
        </div>
    </div>
    <a href="list.php">Return to the List</a>
</body>

</html>