<!-- application/views/kullanici_ekle.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kullanıcı Ekle</title>
</head>
<body>

<h1>Kullanıcı Ekleme Formu</h1>
<form action="<?php echo base_url('Kullanici_Controller/ekle'); ?>" method="post">
    <label for="ad">Ad:</label>
    <input type="text" id="ad" name="ad" required><br><br>

    <label for="email">E-posta:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="sifre">Şifre:</label>
    <input type="password" id="sifre" name="sifre" required><br><br>

    <input type="submit" value="Kullanıcı Ekle">
</form>

</body>
</html>
