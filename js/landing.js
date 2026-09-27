/**
 * FitPulse — Landing / dashboard page
 * Runs once the DOM is ready. The access guard in the page's <head>
 * has already redirected anyone without a session, so by the time this
 * runs a logged-in username is guaranteed to be present.
 */
document.addEventListener('DOMContentLoaded', function () {
  var user = sessionStorage.getItem('fitpulse_user') || 'there';

  // Swap every "Open dashboard" call-to-action for a log out control,
  // since the visitor is already on the (now logged-in-only) landing page.
  ['dash-cta', 'hero-cta'].forEach(function (id) {
    var btn = document.getElementById(id);
    if (!btn) return;

    btn.innerHTML = '<i class="bi bi-box-arrow-right me-1"></i>Log out';
    btn.setAttribute('href', '#');
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      sessionStorage.removeItem('fitpulse_user');
      window.location.href = 'login.html';
    });
  });

  // Welcome message, per spec: "Welcome, [username]!"
  var banner = document.createElement('div');
  banner.className = 'welcome-banner';
  banner.innerHTML = '<i class="bi bi-person-check text-pulse me-1"></i>Welcome, <strong>' + user + '</strong>!';

  var lead = document.querySelector('.hero p.lead');
  if (lead) lead.insertAdjacentElement('afterend', banner);
});
