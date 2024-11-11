<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image_id = $_POST['image_id'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    
    // Masukkan komentar ke dalam database
    $query = "INSERT INTO tb_comments (image_id, name, comment, date_created) VALUES ('$image_id', '$name', '$comment', NOW())";
    
    if (mysqli_query($conn, $query)) {
        // Redirect ke halaman foto setelah komentar berhasil dikirim
        header("Location: dashboard.php?id=$image_id");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
