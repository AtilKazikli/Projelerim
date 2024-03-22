<!-- kullanici_listesi.php (application/views klasöründe) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kullanıcı Listesi</title>
</head>
<body>
    <?php echo $ekleme_butonu; ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Adı</th>
                <th>E-posta</th>
                <!-- Diğer sütunlar -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kullanicilar as $kullanici): ?>
                <tr>
                    <td><?php echo $kullanici['id']; ?></td>
                    <td><?php echo $kullanici['ad']; ?></td>
                    <td><?php echo $kullanici['email']; ?></td>
                    <!-- Diğer sütunlar -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
