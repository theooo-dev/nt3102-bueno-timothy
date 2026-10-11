/**
 * FitPulse — shared client-side rules (jQuery Validation).
 * These mirror the PHP rules in phpFiles/core/validation.php.
 * PHP always re-checks everything, so this is only for instant feedback.
 */
$.validator.addMethod('emailRegex', function (value, element) {
  return this.optional(element) || /^[A-Za-z0-9._%+\-]+@[A-Za-z0-9\-]+(\.[A-Za-z0-9\-]+)*\.[A-Za-z]{2,}$/.test(value);
}, 'Enter a valid email address (e.g. you@example.com).');

$.validator.addMethod('noNumbers', function (value, element) {
  return this.optional(element) || !/\d/.test(value);
}, 'Name should not contain numbers.');

$.validator.addMethod('validName', function (value, element) {
  return this.optional(element) || /^\p{L}[\p{L} .'-]{1,49}$/u.test(value);
}, 'Use 2-50 letters only (spaces, . \' - allowed).');

$.validator.addMethod('hasSymbol', function (value, element) {
  return this.optional(element) || /^(?=.*[^A-Za-z0-9\s]).{8,64}$/.test(value);
}, 'Password must contain at least one symbol (e.g. ! @ # $ %).');

/** Options shared by both forms: show errors in the existing <span class="error-msg">. */
var fitpulseValidateDefaults = {
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
  }
};
