<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini al
    $payment_method = $_POST["payment_method"];

    // Ödeme yöntemini kontrol et ve işle
    if ($payment_method === "online") {
        // Online kredi kartıyla ödeme işlemleri
        // Örneğin, ödeme geçmişine kaydet, API'ye bağlan, vs.
        // Burada gerçek işlemleri yapacak kodlar yer almalı
        echo "Online kredi kartıyla ödeme işlemi gerçekleştirildi.";
    } elseif ($payment_method === "cash") {
        // Elden ödeme işlemleri
        // Örneğin, makbuz oluştur, veritabanına kaydet, vs.
        // Burada gerçek işlemleri yapacak kodlar yer almalı
        echo "Elden ödeme işlemi gerçekleştirildi.";
    } else {
        echo "Geçersiz ödeme yöntemi.";
    }
} else {
    echo "Form gönderilmedi.";
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini al
    $payment_method = $_POST["payment_method"];

    // Veritabanı bağlantısı veya işlemleri burada yapılabilir

    // Ödeme yöntemi kontrolü
    if ($payment_method === "Sold") {
        // Satıldı olarak işaretleme işlemi veya diğer işlemler yapılabilir
        echo "Ürün satıldı olarak işaretlendi.";
    } elseif ($payment_method === "Not sold") {
        // Satılmadı olarak işaretleme işlemi veya diğer işlemler yapılabilir
        echo "Ürün satılmadı olarak işaretlendi.";
    } else {
        echo "Geçersiz ödeme yöntemi.";
    }
} else {
    echo "Form gönderilmedi.";
}
?>