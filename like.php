<?php
include 'db.php';

// Ambil ID gambar yang akan diberi like
$image_id = $_POST['image_id'];

// Gunakan IP untuk mengidentifikasi pengguna yang memberi like
$user_ip = $_SERVER['REMOTE_ADDR']; // Mengambil IP pengguna saat ini

// Cek apakah pengguna dengan IP ini sudah memberi like pada gambar ini
$check_like = mysqli_query($conn, "SELECT * FROM tb_likes WHERE image_id = '$image_id' AND user_ip = '$user_ip'");

if (mysqli_num_rows($check_like) == 0) {
    // Jika belum memberi like, lakukan insert ke tabel tb_likes
    $query = "INSERT INTO tb_likes (image_id, user_ip) VALUES ('$image_id', '$user_ip')";
    if (mysqli_query($conn, $query)) {
        // Perbarui jumlah like pada gambar
        $update_like = mysqli_query($conn, "UPDATE tb_image SET like_count = like_count + 0 WHERE image_id = '$image_id'");
        
        if ($update_like) {
            echo "success"; // Menandakan like berhasil
        } else {
            echo "error"; // Jika update jumlah like gagal
        }
    } else {
        echo "error"; // Jika insert ke tb_likes gagal
    }
} else {
    // Jika sudah pernah memberi like
    echo "already_liked";
}
?>
