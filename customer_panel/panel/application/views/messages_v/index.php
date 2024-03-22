<!-- application/views/messages/index.php -->

<h2>Messages</h2>

<?php foreach ($messages as $message): ?>
    <p><?= $message->username ?> (<?= date('Y-m-d H:i:s', strtotime($message->timestamp)) ?>): <?= $message->message ?></p>
<?php endforeach; ?>
