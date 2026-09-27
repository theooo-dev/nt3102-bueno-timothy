/**
 * FitPulse — Register page
 * Handles the password-visibility toggle and client-side validation
 * for the account creation form.
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
  // Custom rules for the fields this form actually has
  // ---------------------------------------------------------------------
  $.validator.addMethod('noNumbers', function (value, element) {
    return this.optional(element) || /^[^0-9]+$/.test(value);
  }, 'Name should not contain numbers.');

  $.validator.addMethod('hasSymbol', function (value, element) {
    return this.optional(element) || /[^A-Za-z0-9]/.test(value);
  }, 'Password must contain at least one symbol.');

  var $status = $('#register-status');

  $('#register-form').validate({
    rules: {
      name: { required: true, noNumbers: true },
      email: { required: true, email: true },
      password: { required: true, minlength: 8, hasSymbol: true },
      'confirm-password': { required: true, equalTo: '#register-password' }
    },
    messages: {
      name: {
        required: 'Name is required.',
        noNumbers: 'Name should not contain numbers.'
      },
      email: {
        required: 'Email is required.',
        email: 'Enter a valid email address (e.g. you@example.com).'
      },
      password: {
        required: 'Password is required.',
        minlength: 'Password must be at least 8 characters.',
        hasSymbol: 'Password must contain at least one symbol (e.g. ! @ # $ %).'
      },
      'confirm-password': {
        required: 'Please confirm your password.',
        equalTo: 'Passwords do not match.'
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
    submitHandler: function (form) {
      $status.addClass('success').text('Account created! Redirecting to log in…');
      form.reset();
      setTimeout(function () {
        window.location.href = 'login.html';
      }, 900);
    }
  });
});
