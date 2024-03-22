<!-- application/views/message_view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesajlaşma Sistemi</title>
</head>
<body>

    <h2>Mesajınız</h2>
    <ul>
        <?php foreach ($messagess as $message): ?>
            <li>
                <?= $message->message_text ?>
                <span><?= $message->created_at ?></span>
                <?php if ($message->is_read == 0): ?>
                    <a href="<?= base_url('MessageController/mark_as_read/' . $message->user_id) ?>">Mark as Read</a>
                <?php endif; ?>
                <a href="<?= base_url('MessageController/delete_message/' . $message->user_id) ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Yeni Mesaj gönder</h2>
    <form action="<?= base_url('MessageController/send_message') ?>" method="post">
        <label for="receiver_id">Receiver:</label>
        <select name="receiver_id" required>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user->id ?>"><?= $user->username ?></option>
            <?php endforeach; ?>
        </select>

        <label for="message_text">Message:</label>
        <textarea name="message_text" required></textarea>

        <button type="submit">Send Message</button>
    </form>
</body>
</html>
