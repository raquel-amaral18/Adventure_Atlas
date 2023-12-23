<!DOCTYPE html>
<html>

<head>
    <style>
        .guide-list {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
        }

        .guide-item {
            margin-bottom: 10px;
        }

        .guide-link {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .actions {
            margin-left: 10px;
        }

        .guide-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .logout-link {
            display: block;
            margin-top: 20px;
            color: black;
        }
    </style>
</head>

<body>
    <div class="guide-list">
        <?php
        include '../DatabaseConnection/db_connect.php';

        $sql = "SELECT * FROM guides";

        $result = mysqli_query($link, $sql);

        if ($result !== false) {
            $acceptedGuidesExist = false;
            $notAcceptedGuidesExist = false;

            while ($row = mysqli_fetch_array($result)) {
                $user_id = $row['user_id'];
                $guide_id = $row['guide_id'];
                $guide_title = $row['guide_title'];
                $accepted = $row['accepted'];

                if ($accepted == 1) {
                    if (!$acceptedGuidesExist) {
                        echo '<h2 class="guide-title">Accepted Guides</h2>';
                        $acceptedGuidesExist = true;
                    }
                } else {
                    if (!$notAcceptedGuidesExist) {
                        echo '<h2 class="guide-title">Not Accepted Guides</h2>';
                        $notAcceptedGuidesExist = true;
                    }
                }

        ?>
                <div class="guide-item">
                    <a href="details.php?id=<?php echo $guide_id; ?>" class="guide-link">
                        <?php echo $guide_id; ?> | <?php echo $user_id; ?> | <?php echo $guide_title; ?>
                    </a>
                    <span class="actions">
                        <?php if ($accepted == 0) { ?>
                            <a href="accept_guide.php?id=<?php echo $guide_id; ?>">Accept</a>
                        <?php } ?>
                        <a href="delete.php?id=<?php echo $guide_id; ?>" onclick="return confirmDelete();">X</a>
                    </span>
                </div>
        <?php
            }
        } else {
            echo "No guides found.";
        }
        ?>
    </div>

    <a href="../Main Page/MainPage.php" class="logout-link">Logout and Return to Main Page</a>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this guide?");
        }
    </script>
</body>

</html>