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

$blog_id = $_GET["id"];

$sql = "SELECT * FROM `blogData` where id = $blog_id;";
$result =  mysqli_query($conn, $sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detailed Blog</title>
    <link rel="stylesheet" href="blog.css">
</head>

<body>

    <div class="blog_full">
        <?php
        if ($result) {

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='full_blog_data'>";
                echo "<img src=" . $row['blog_image'] . ">";
                echo "<h1>" . $row['blog_name'] . " Blog Title</h1>";
                echo "<p>" . $row['blog_small_desc'] . "</p>";
                echo "<p>" . $row['blog_body'] . "</p>";
                echo "<p>" . $row['blog_conclusion'] . "</p>";
                echo "<p> Published By : " . $row['publisher_name'] . "</p>";
                echo "<p> Published On : " . $row['pubished_date'] . "</p>";
                echo "</div>";
            }

            // echo "Data Fetched";
        } else {
            echo "Error Fetching data: " . mysqli_error($conn);
        }
        ?>
    </div>

    <?php
    $conn->close();
    ?>


</body>

</html>