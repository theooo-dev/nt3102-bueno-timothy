<?php
$features = [
    ['bi-person-plus',      'Member registration & profile management', 'Register new members, store contact details, edit records, and view full profiles at any time.'],
    ['bi-card-checklist',   'Membership management',                    'Assign plans, record start and expiration dates, and view active, expired, and renewal history in one screen.'],
    ['bi-tools',            'Equipment monitoring & maintenance',       'Track equipment by category and condition (Good, Needs Maintenance, Under Repair, Out of Service), log repair history, and get notified when inspections are due.'],
    ['bi-qr-code-scan',     'QR code-based attendance',                 'Generate a unique QR code per member, scan on entry, and automatically record check-in date and time.'],
    ['bi-cash-coin',        'Payment monitoring',                       'Log cash or GCash payments manually, with amount and date, and browse full payment history per member. No online payment gateway is processed by the system.'],
    ['bi-envelope-paper',   'Email notification system',                'Automatically flag memberships nearing expiration and send reminder emails, plus a separate notice once a membership has expired.'],
    ['bi-search',           'Search & record retrieval',                'Find any member by name, member ID, or contact information, and open their complete record instantly.'],
];
?>
<section id="features">
  <div class="container">
    <p class="section-label text-center">WHAT IT MANAGES</p>
    <h2 class="text-center mb-5">Every part of daily operations, in one place</h2>
    <div class="accordion" id="funcAccordion">
<?php foreach ($features as $i => [$icon, $title, $text]): $id = 'f' . ($i + 1); $first = ($i === 0); ?>

      <div class="accordion-item">
        <h3 class="accordion-header">
          <button class="accordion-button<?= $first ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $id ?>">
            <i class="bi <?= $icon ?> me-2"></i><?= e($title) ?>
          </button>
        </h3>
        <div id="<?= $id ?>" class="accordion-collapse collapse<?= $first ? ' show' : '' ?>" data-bs-parent="#funcAccordion">
          <div class="accordion-body"><?= e($text) ?></div>
        </div>
      </div>
<?php endforeach; ?>

    </div>
  </div>
</section>
