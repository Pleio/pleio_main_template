<?php
header("Content-type: text/html; charset=UTF-8");
$lang = get_current_language();

if (empty($vars["title"])) {
    $title = elgg_get_config("sitename");
} else {
    $title = elgg_get_config("sitename") . ": " . $vars["title"];
}

?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width,height=device-height,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700" rel="stylesheet">
        <link href="/mod/pleio_main_template/assets/pleio_main_template.css?v=<?php echo $CONFIG->lastcache; ?>" rel="stylesheet" type="text/css">
        <link rel="icon" href="/mod/pleio_main_template/assets/images/favicon.png">
    </head>
    <body>
        <?php echo elgg_view("page/elements/messages", array("object" => $vars["sysmessages"])); ?>
        <?php echo $vars["body"]; ?>

        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
        <script src="/mod/pleio_main_template/assets/pleio_main_template.js?v=<?php echo $CONFIG->lastcache; ?>"></script>
        <?php echo elgg_view('footer/analytics'); ?>
    </body>
</html>