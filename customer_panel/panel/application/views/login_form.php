<!-- login_form.php (views klasöründe) -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Giriş Formu</title>
</head>
<body>

<h2>Giriş Formu</h2>
<form action="<?= base_url('Login/do_login') ?>" method="post">
    <div>
        <label for="email">E-posta Adresiniz:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Şifreniz:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <input type="submit" value="Giriş Yap">
    </div>
</form>

</body>
</html>
