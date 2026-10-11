<?php
// Sample numbers for the staff dashboard preview.
$dashStats = [
    ['412', 'Active members'],
    ['18',  'Expiring this week'],
    ['76',  'Checked in today'],
    ['3',   'Equipment needs repair'],
];

$weekBars = ['Mon' => 55, 'Tue' => 70, 'Wed' => 48, 'Thu' => 82, 'Fri' => 65, 'Sat' => 95, 'Sun' => 38];

$legend = [
    ['var(--pulse)', 'Active — 62%'],
    ['#E0B04A',      'Expiring soon — 20%'],
    ['#4B4D53',      'Expired — 18%'],
];

// [member, id, time, badge class, status text]
$recentCheckins = [
    ['J. Villanueva', '#1042', '9:12 AM', 'badge-good', 'Active'],
    ['M. Reyes',      '#0987', '8:57 AM', 'badge-soon', 'Expires in 4 days'],
    ['A. Cruz',       '#1103', '8:40 AM', 'badge-good', 'Active'],
    ['R. Santos',     '#0765', '8:15 AM', 'badge-late', 'Expired'],
];
?>
<section id="dashboard" class="bg-panel border-top border-hair">
  <div class="container">
    <p class="section-label text-center">STAFF VIEW</p>
    <h2 class="text-center mb-5">Dashboard View for Staff</h2>

    <div class="dash-frame">
      <div class="dash-topbar">
        <span><span class="dash-dot"></span>Ironclad Fitness — Dashboard</span>
        <span class="text-muted-ink small">Today, <?= date('g:i A') ?></span>
      </div>

      <div class="row g-3 mb-4">
<?php foreach ($dashStats as [$value, $label]): ?>
        <div class="col-6 col-lg-3"><div class="dash-stat"><b><?= e($value) ?></b><span><?= e($label) ?></span></div></div>
<?php endforeach; ?>
      </div>

      <div class="row g-4 align-items-center mb-4">
        <div class="col-lg-7">
          <p class="text-muted-ink small mb-2">Check-ins this week</p>
          <div class="bar-chart">
<?php foreach ($weekBars as $day => $height): ?>
            <div class="bar" style="height:<?= (int) $height ?>%"><span class="bar-label"><?= e($day) ?></span></div>
<?php endforeach; ?>
          </div>
        </div>
        <div class="col-lg-5 d-flex align-items-center gap-4">
          <div class="donut" role="img" aria-label="Membership status: 62% active, 20% expiring soon, 18% expired"></div>
          <div class="small">
<?php foreach ($legend as $i => [$color, $label]): ?>
            <div<?= $i < count($legend) - 1 ? ' class="mb-2"' : '' ?>><span class="legend-dot" style="background:<?= $color ?>"></span><?= e($label) ?></div>
<?php endforeach; ?>
          </div>
        </div>
      </div>

      <p class="text-muted-ink small mb-2">Recent check-ins</p>
      <div class="table-responsive">
        <table class="table table-dash align-middle mb-0">
          <thead class="text-muted-ink small">
            <tr><th>Member</th><th>Member ID</th><th>Time</th><th>Status</th></tr>
          </thead>
          <tbody>
<?php foreach ($recentCheckins as [$member, $id, $time, $badge, $status]): ?>
            <tr><td><?= e($member) ?></td><td><?= e($id) ?></td><td><?= e($time) ?></td><td><span class="badge <?= $badge ?>"><?= e($status) ?></span></td></tr>
<?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
