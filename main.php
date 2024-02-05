<?php

$servername = "localhost";
$database = "Blog";
$password = "";
$username = "root";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    echo "Failed to Connect Database " . mysqli_connect_error();
} else {
    // echo "Database Connected Successfully";
}

$sql = "SELECT * FROM `blogData`;";
$result =  mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="card_parent">
    <!-- <h1>All Blogs Here</h1> -->

        <div class="card_top">

        

            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='one_card'>";
                    echo "<img src=" . $row['blog_image'] . ">";
                    echo "<div class='card_text'>";
                    echo "<h1>" . $row['blog_name'] . "</h1>";
                    echo "<p>" . $row['blog_small_desc'] . "</p>";
                    echo "<a href='full_blog.php?id=" . $row['id'] . "'><button>See Full</button></a>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Error Fetching data: " . mysqli_error($conn);
            }
            ?>
        </div>
    </div>

    <?php
    $conn->close();
    ?>

</body>

</html>