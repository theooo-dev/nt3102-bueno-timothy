<?php
$checkinPoints = [
    'One QR code per member, generated automatically',
    'Entry is timestamped the moment it\'s scanned',
    'Full attendance history searchable by member',
];
?>
<section id="checkin" class="bg-panel border-top border-hair border-bottom">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-5 order-lg-2 text-center">
        <div class="qr-box mx-auto" role="img" aria-label="QR code scanner illustration"></div>
      </div>
      <div class="col-lg-7 order-lg-1">
        <p class="section-label">QR-BASED CHECK-IN</p>
        <h2>Attendance that logs itself</h2>
        <p class="text-muted-ink mb-4">Each member's unique QR code is scanned at the door. FitPulse timestamps the visit and adds it straight to their attendance history — no sign-in sheet required.</p>
        <ul class="list-unstyled text-muted-ink">
<?php foreach ($checkinPoints as $point): ?>
          <li class="mb-2">✓ <?= e($point) ?></li>
<?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
