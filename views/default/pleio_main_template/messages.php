<?php
$messages = $vars["messages"];
?>

<?php if ($messages && array_key_exists("error", $messages)): ?>
    <ul class="messages error">
        <?php foreach($messages["error"] as $message): ?>
            <li><?php echo $message; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>