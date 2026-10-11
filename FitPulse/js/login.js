/** FitPulse — Login page: client-side validation (PHP re-checks on submit). */
$(function () {
  $('#login-form').validate($.extend({}, fitpulseValidateDefaults, {
    rules: {
      email: { required: true, emailRegex: true },
      password: { required: true }
    },
    messages: {
      email: { required: 'Email is required.' },
      password: { required: 'Password is required.' }
    }
  }));
});
