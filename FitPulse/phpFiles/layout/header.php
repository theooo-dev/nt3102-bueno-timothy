<?php
/**
 * Opens the page: <head> and <body>.
 * Set before including:  $pageTitle (string), $pageStyles (array of stylesheet URLs)
 */
$pageTitle  = $pageTitle  ?? 'FitPulse';
$pageStyles = $pageStyles ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($pageTitle) ?></title>
<?php foreach ($pageStyles as $href): ?>
  <link rel="stylesheet" href="<?= e($href) ?>">
<?php endforeach; ?>
</head>
<body>
