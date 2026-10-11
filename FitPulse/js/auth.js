/**
 * FitPulse — show / hide password toggle (login and register pages).
 * All validation is done in PHP (phpFiles/core/validation.php).
 */
document.querySelectorAll('.toggle-password').forEach(function (btn) {
  btn.addEventListener('click', function () {
    var input = document.getElementById(btn.dataset.target);
    var showing = input.type === 'text';

    input.type = showing ? 'password' : 'text';
    btn.querySelector('i').classList.toggle('bi-eye');
    btn.querySelector('i').classList.toggle('bi-eye-slash');
    btn.setAttribute('aria-pressed', String(!showing));
    btn.setAttribute('aria-label', showing ? 'Show password' : 'Hide password');
  });
});
