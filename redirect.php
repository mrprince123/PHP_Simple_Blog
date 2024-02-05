<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Blog</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Posting the Data  -->
    <div class="post_div_parent">
        <div class="data_posting">
        <h1>Post Blog</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas minima vero nisi sapiente distinctio beatae assumenda vel esse! Ducimus blanditiis accusamus error vero architecto tenetur aperiam porro quas distinctio neque?</p>
            <form action="" method="post">
                <input type="text" name="blog_name" required placeholder="Blog Title">
                <input type="url" name="blog_image" required placeholder="Blog Image Url">
                <textarea type="text" rows="3" required name="blog_small_desc" placeholder="Blog Small description"></textarea>
                <textarea type="text" rows="5" required name="blog_body" placeholder="Blog Head"></textarea>
                <textarea type="text" rows="3" required name="blog_conclusion" placeholder="Blog Conclusion"></textarea>
                <input type="text" name="blog_publisher" required placeholder="Publisher Name">

                <div class="button_div_data">
                    <input class="button_input" type="submit">
                    <input class="button_input" type="reset">
                </div>

            </form>
        </div>
    </div>
</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {



    $servername = "localhost";
    $database = "Blog";
    $password = "";
    $username = "root";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        echo "Failed to Connect Database " . mysqli_connect_error();
    } else {
        echo "Database Connected Successfully";
    }


    $blog_name = $_POST['blog_name'];
    $blog_image = $_POST['blog_image'];
    $blog_small_desc = $_POST['blog_small_desc'];
    $blog_body = $_POST['blog_body'];
    $blog_conclusion = $_POST['blog_conclusion'];
    $blog_publisher = $_POST['blog_publisher'];


    $sql = "INSERT INTO `blogData` (blog_name, blog_image, blog_small_desc, blog_body, blog_conclusion, publisher_name) VALUES ('$blog_name', '$blog_image', '$blog_small_desc', '$blog_body', '$blog_conclusion', '$blog_publisher');";
    $result =  mysqli_query($conn, $sql);

    if ($result) {
        echo "Data Inserted Successfully";
    } else {
        echo "Error Inserting data: " . mysqli_error($conn);
    }


    $conn->close();
}

?>