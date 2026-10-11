<?php
// Closes the page. Set before including:  $pageScripts (array of script URLs)
$pageScripts = $pageScripts ?? [];
foreach ($pageScripts as $src): ?>
  <script src="<?= e($src) ?>"></script>
<?php endforeach; ?>
</body>
</html>
