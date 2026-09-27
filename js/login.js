/**
 * FitPulse — Login page
 * Handles the password-visibility toggle, client-side validation,
 * a hardcoded staff credential check, and a simple failed-attempt lockout.
 */
$(function () {

  // ---------------------------------------------------------------------
  // Show / hide password toggle
  // ---------------------------------------------------------------------
  $('.toggle-password').on('click', function () {
    var $btn = $(this);
    var $input = $('#' + $btn.data('target'));
    var showing = $input.attr('type') === 'text';

    $input.attr('type', showing ? 'password' : 'text');
    $btn.find('i').toggleClass('bi-eye bi-eye-slash');
    $btn.attr('aria-pressed', String(!showing));
    $btn.attr('aria-label', showing ? 'Show password' : 'Hide password');
  });

  // ---------------------------------------------------------------------
  // Hardcoded lockout settings
  // ---------------------------------------------------------------------
  var MAX_ATTEMPTS = 5;       // max failed attempts before lockout
  var LOCKOUT_SECONDS = 30;   // how long the form stays disabled

  var attemptsLeft = MAX_ATTEMPTS;
  var lockoutInterval = null;

  // Hardcoded default staff login, connecting this form to the FitPulse dashboard preview
  var VALID_EMAIL = 'frontdesk@ironclad.fit';
  var VALID_PASSWORD = 'Ironclad@2026';

  var $submit = $('#login-submit');
  var $status = $('#login-status');

  function setLockedState(locked) {
    $('#login-email, #login-password').prop('disabled', locked);
    $submit.prop('disabled', locked);
    if (!locked) $submit.text('Log in');
  }

  function startLockout() {
    var secondsLeft = LOCKOUT_SECONDS;
    setLockedState(true);
    $submit.text('Locked (' + secondsLeft + 's)');
    $status.removeClass('success')
      .text('Too many failed attempts. Try again in ' + secondsLeft + 's (or reload the page).');

    lockoutInterval = setInterval(function () {
      secondsLeft--;
      if (secondsLeft <= 0) {
        clearInterval(lockoutInterval);
        attemptsLeft = MAX_ATTEMPTS; // reset, same as a page reload would do
        setLockedState(false);
        $status.removeClass('success').text('You can try logging in again.');
      } else {
        $submit.text('Locked (' + secondsLeft + 's)');
        $status.text('Too many failed attempts. Try again in ' + secondsLeft + 's (or reload the page).');
      }
    }, 1000);
  }

  // ---------------------------------------------------------------------
  // jQuery Validation plugin, wired to the existing markup
  // ---------------------------------------------------------------------
  $('#login-form').validate({
    rules: {
      email: { required: true, email: true },
      password: { required: true }
    },
    messages: {
      email: {
        required: 'Email is required.',
        email: 'Enter a valid email address.'
      },
      password: {
        required: 'Password is required.'
      }
    },
    errorPlacement: function (error, element) {
      $('#' + element.attr('id') + '-error').text(error.text());
    },
    highlight: function (element) {
      $(element).addClass('invalid');
    },
    unhighlight: function (element) {
      $(element).removeClass('invalid');
    },
    success: function (label, element) {
      $('#' + $(element).attr('id') + '-error').text('');
    },
    submitHandler: function () {
      if (attemptsLeft <= 0) return; // still locked out

      var val = $('#login-email').val().trim();
      var pass = $('#login-password').val();

      if (val === VALID_EMAIL && pass === VALID_PASSWORD) {
        attemptsLeft = MAX_ATTEMPTS;
        setLockedState(true); // freeze the form while it redirects

        // Remember who's logged in so the landing page can greet them.
        var displayName = val.split('@')[0];
        sessionStorage.setItem('fitpulse_user', displayName);

        $status.addClass('success').text('Login successful! Redirecting to the dashboard…');
        setTimeout(function () {
          window.location.href = 'landing.html#dashboard';
        }, 900);
        return;
      }

      attemptsLeft--;

      if (attemptsLeft <= 0) {
        startLockout();
      } else {
        $status.removeClass('success')
          .text('Incorrect email or password. ' + attemptsLeft + ' attempt' + (attemptsLeft === 1 ? '' : 's') + ' left.');
      }
    }
  });
});
