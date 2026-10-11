<?php
$objectives = [
    ['bi-person-vcard',   'Digitize member records',   'Register, edit, and search member profiles instead of paper folders and loose spreadsheets.'],
    ['bi-arrow-repeat',   'Track plans and renewals',  'See active and expired memberships at a glance, with full renewal history per member.'],
    ['bi-envelope-check', 'Automatic reminders',       'Email members 3–7 days before expiration, and again once a membership has lapsed.'],
];
?>
<section id="objectives">
  <div class="container">
    <p class="section-label text-center">WHY FITPULSE</p>
    <h2 class="text-center mb-5">Built around what a front-desk day actually looks like</h2>
    <div class="row g-4">
<?php foreach ($objectives as [$icon, $title, $text]): ?>
      <div class="col-md-4">
        <div class="card-feature">
          <div class="icon-badge"><i class="bi <?= $icon ?>"></i></div>
          <h3><?= e($title) ?></h3>
          <p><?= e($text) ?></p>
        </div>
      </div>
<?php endforeach; ?>
    </div>
  </div>
</section>
