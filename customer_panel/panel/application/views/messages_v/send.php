<!-- application/views/messages/send.php -->

<h2>Send Message</h2>

<?= form_open('messages/send'); ?>
    <label for="receiver_id">Recipient ID:</label>
    <input type="text" name="receiver_id" required>
    <br>
    <label for="message">Message:</label>
    <textarea name="message" required></textarea>
    <br>
    <button type="submit">Send</button>
<?= form_close(); ?>
