<?php // Top banner. Shows the "Welcome, [username]!" message for the logged-in user. ?>
<header id="top" class="hero">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-7">
        <p class="section-label">IRONCLAD FITNESS — INTERNAL SYSTEM</p>
        <h1 class="display-4">One dashboard for the front desk, built just for Ironclad.</h1>
        <p class="lead mt-3">FitPulse is Ironclad Fitness's own membership and attendance system — member records, QR-based check-in, equipment upkeep, and payments, all in one place, with automatic email reminders before a membership lapses.</p>
        <div class="welcome-banner"><i class="bi bi-person-check text-pulse me-1"></i>Welcome, <strong><?= e($_SESSION['user']) ?></strong>!</div>
        <div class="d-flex gap-3 mt-4 flex-wrap">
          <a href="logout.php" class="btn btn-pulse btn-lg px-4" id="hero-cta"><i class="bi bi-box-arrow-right me-2"></i>Log out</a>
          <a href="#features" class="btn btn-outline-pulse btn-lg px-4"><i class="bi bi-info-circle me-2"></i>See features</a>
        </div>
        <div class="d-flex gap-5 mt-5 flex-wrap">
          <div class="stat"><b>1</b><span>Scan to check in</span></div>
          <div class="stat"><b>7-day</b><span>Expiry reminder window</span></div>
          <div class="stat"><b>5</b><span>Built-in report types</span></div>
        </div>
      </div>
      <div class="col-lg-5 text-center">
        <div class="qr-box mx-auto" role="img" aria-label="Sample member QR code used for gym check-in"></div>
        <p class="text-muted-ink mt-3 mb-0">Every member gets a unique QR code for entry.</p>
      </div>
    </div>
  </div>
</header>
