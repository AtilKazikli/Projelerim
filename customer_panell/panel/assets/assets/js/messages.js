document.addEventListener("DOMContentLoaded", function () {
    const messageForm = document.getElementById("message-form");
    const messageContainer = document.getElementById("message-container");

    // Sayfa yüklendiğinde mesajları al ve görüntüle
    getMessages();

    document.getElementById("send-message").addEventListener("click", function () {
        const message = document.getElementById("message").value;

        if (message) {
            // AJAX kullanarak mesajı gönder
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "<?= base_url('messages/send_message') ?>", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Gönderilen mesajı ekle ve formu temizle
                        messageContainer.innerHTML += `<div><strong>${response.username}:</strong> ${message}</div>`;
                        messageForm.reset();
                    }
                    alert(response.message);
                }
            };
            xhr.send(`message=${message}`);
        } else {
            alert("Mesaj boş olamaz.");
        }
    });

    function getMessages() {
        // AJAX kullanarak tüm mesajları al
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "<?= base_url('messages') ?>", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Tüm mesajları görüntüle
                    messageContainer.innerHTML = response.messages.map(message => `<div><strong>${message.username}:</strong> ${message.message}</div>`).join('');
                }
            }
        };
        xhr.send();
    }
});
