<?php
$url = str_replace("/", "\/", elgg_get_site_url());
if (get_input("returnto") && preg_match("/^${url}/", $_GET["returnto"])) {
    $returnTo = urldecode($_GET["returnto"]);
} elseif ($_SESSION['last_forward_from']) {
    $returnTo = $_SESSION['last_forward_from'];
} elseif (get_input('returntoreferer')) {
    $returnTo = REFERER;
}
?>

<?php if ($returnTo): ?>
    <script>
    var returnTo = "<?php echo $returnTo; ?>";
    </script>
<?php endif; ?>

<div id="root"></div>