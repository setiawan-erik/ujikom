<?php
    error_reporting(0);
    include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
	$a = mysqli_fetch_object($kontak);
	
	$produk = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="index.php">WEB GALERI FOTO</a></h1>
        <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
           <li><a href="profil.php">Profil</a></li>
           <li><a href="registrasi.php">Registrasi</a></li>
           <li><a href="data-image.php">Data Foto</a></li>
           <li><a href="Keluar.php">Keluar</a></li>
        </ul>
        </div>
    </header>
    
    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
              
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>" />
               
            </form>
        </div>
    </div>
    
    <!-- product detail -->
    <div class="section">
        <div class="container">
             <h3>Detail Foto</h3>
            <div class="box">
                <div class="col-2">
                   <img src="foto/<?php echo $p->image ?>" width="100%" /> 
                </div>
                <div class="col-2">
                   <h3><?php echo $p->image_name ?><br />Kategori : <?php echo $p->category_name  ?></h3>
                   <h4>Nama User : <?php echo $p->admin_name ?><br />
                   Upload Pada Tanggal : <?php echo $p->date_created  ?></h4>
                   <p>Deskripsi :<br />
                        <?php echo $p->image_description ?>
                   </p>
                   
                </div>
                
            </div>
        </div>
    </div>
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Pertama</title>
    <style>
          /* CSS tambahan untuk tombol Like */
          .like-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
            display: inline-block;
            margin-top: 10px;
             
        .like-button:hover {
            background-color: #0056b3;
        }

        .like-button:focus {
            outline: none;
        }

        .like-count {
            font-size: 16px;
            margin-left: 10px;
            color: #007bff;
        }
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }
        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            font-size: 16px;
            margin-bottom: 20px;
        }
        p strong {
            font-weight: bold;
        }
        .comment-section {
            background-color: #007bff;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
        }
        .comment-section label {
            font-size: 16px;
        }
        .comment-form {
            display: flex;
            flex-direction: column;
        }
        .comment-form input, .comment-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .comment-form input[type="text"] {
            width: 48%;
        }
        .comment-form .input-group {
            display: flex;
            justify-content: space-between;
        }
        .comment-form button {
            background-color:  #0056b3;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .comment-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
    
        <hr>
        <div class="comment-section">
            <label>Kolom Komentar:</label>
        </div>
        
        <!-- Form Komentar -->
<form class="comment-form" action="submit_comment.php" method="POST">
    <!-- Hidden input untuk image_id -->
    <input type="hidden" name="image_id" value="<?php echo $p->image_id; ?>">
    <div class="input-group">
        <input type="text" name="name" placeholder="Nama" required>
    </div>
    <textarea name="comment" rows="4" placeholder="Komentar" required></textarea>
    <button type="submit">Kirim Komentar</button>
</form>

<!-- Tombol Like -->
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
    </script>
</body>
</html>

        <hr>

        <!-- Menampilkan Komentar -->
        <div class="comments">
            <?php include 'display_comments.php'; ?>
        </div>
    </div>
</body>
</html>

    
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto.</small>
        </div>
    </footer>
</body>
</html>