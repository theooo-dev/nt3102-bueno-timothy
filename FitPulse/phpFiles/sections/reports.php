<?php
$reports = [
    ['bi-people',          'Active Members'],
    ['bi-person-x',        'Expired Memberships'],
    ['bi-calendar-check',  'Attendance'],
    ['bi-cash-stack',      'Payments'],
    ['bi-arrow-clockwise', 'Renewals'],
];
?>
<section id="reports" class="bg-panel border-top border-hair">
  <div class="container">
    <p class="section-label text-center">REPORTS &amp; ANALYTICS</p>
    <h2 class="text-center mb-5">Reporting, built in from day one</h2>
    <div class="row g-4 text-center">
<?php foreach ($reports as [$icon, $title]): ?>
      <div class="col-6 col-lg">
        <div class="card-feature">
          <h3 class="fs-6"><i class="bi <?= $icon ?> text-pulse me-2"></i><?= e($title) ?></h3>
        </div>
      </div>
<?php endforeach; ?>
    </div>
  </div>
</section>
