<?php
// Ambil ID gambar dari URL
$image_id = $_GET['id'];

// Query untuk mengambil komentar berdasarkan image_id
$comments_query = mysqli_query($conn, "SELECT * FROM tb_comments WHERE image_id = '$image_id' ORDER BY date_created DESC");

// Tampilkan komentar
while ($comment = mysqli_fetch_object($comments_query)) {
    echo '<div class="comment">';
    echo '<strong>' . htmlspecialchars($comment->name) . '</strong><br>';
    echo '<p>' . htmlspecialchars($comment->comment) . '</p>';
    echo '<small>' . $comment->date_created . '</small>';
    echo '</div>';
}
?>
