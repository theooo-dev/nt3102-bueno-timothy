<?php
// Landing-page navigation bar. Menu items are listed in an array so they are easy to edit.
$navLinks = [
    ['#top',        'bi-house-door',   'Home',        true],
    ['#objectives', 'bi-bullseye',     'Objectives',  false],
    ['#features',   'bi-grid',         'Features',    false],
    ['#checkin',    'bi-qr-code',      'QR Check-in', false],
    ['#reports',    'bi-bar-chart',    'Reports',     false],
    ['#dashboard',  'bi-speedometer2', 'Dashboard',   false],
];
?>
<nav class="navbar navbar-expand-lg fixed-top py-3">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#top">Fit<span>Pulse</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="nav">
      <ul class="navbar-nav gap-lg-4 align-items-lg-center">
<?php foreach ($navLinks as [$href, $icon, $label, $active]): ?>
        <li class="nav-item"><a class="nav-link<?= $active ? ' active' : '' ?>" href="<?= $href ?>"><i class="bi <?= $icon ?> me-1"></i><?= e($label) ?></a></li>
<?php endforeach; ?>
        <li class="nav-item mt-2 mt-lg-0"><a class="btn btn-pulse btn-sm px-3" href="logout.php" id="dash-cta"><i class="bi bi-box-arrow-right me-1"></i>Log out</a></li>
      </ul>
    </div>
  </div>
</nav>
