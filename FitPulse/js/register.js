/** FitPulse — Register page: client-side validation (PHP re-checks on submit). */
$(function () {
  $('#register-form').validate($.extend({}, fitpulseValidateDefaults, {
    rules: {
      name: { required: true, noNumbers: true, validName: true },
      email: { required: true, emailRegex: true },
      password: { required: true, minlength: 8, hasSymbol: true },
      'confirm-password': { required: true, equalTo: '#register-password' }
    },
    messages: {
      name: { required: 'Name is required.' },
      email: { required: 'Email is required.' },
      password: {
        required: 'Password is required.',
        minlength: 'Password must be at least 8 characters.'
      },
      'confirm-password': {
        required: 'Please confirm your password.',
        equalTo: 'Passwords do not match.'
      }
    }
  }));
});
