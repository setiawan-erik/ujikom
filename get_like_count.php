<?php
// Koneksi ke database
include 'db.php';

// Ambil ID gambar dari parameter GET
$image_id = $_GET['image_id'];

// Query untuk mendapatkan jumlah like
$query = "SELECT like_count FROM tb_image WHERE image_id = '$image_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Kirimkan jumlah like sebagai respons
echo $row['like_count'];
?>


<!-- Tombol Like
<div class="like-container">
    <button class="like-button" id="like-button">
        <i class="fas fa-thumbs-up"></i> Like
    </button>
    <span class="like-count" id="like-count">0 Likes</span>
</div>

        <script>
        // Logika untuk mengupdate jumlah Like
        
        let likeCount = 0;
        const likeButton = document.getElementById('like-button');
        const likeCountElement = document.getElementById('like-count');

        likeButton.addEventListener('click', function() {
            likeCount++;
            likeCountElement.textContent = `${likeCount} Like${likeCount > 1 ? 's' : ''}`;
        });
    </script> -->