<?php
/**
 * Register form.
 * Expects: $old (array), $errors (array), $status (string)
 */
?>
      <form id="register-form" class="auth-form" action="register.php" method="post" novalidate>
        <?= csrf_field() ?>
        <h2>Create your account</h2>
        <p class="lead">Set up FitPulse and start your first streak today.</p>

        <div class="field">
          <label for="register-name">Name</label>
          <div class="input-wrap">
            <i class="bi bi-person field-icon"></i>
            <input type="text" id="register-name" name="name" placeholder="Jordan Lee" autocomplete="name" class="has-icon<?= isset($errors['name']) ? ' invalid' : '' ?>" value="<?= e($old['name']) ?>">
          </div>
          <span class="error-msg" id="register-name-error"><?= e($errors['name'] ?? '') ?></span>
        </div>

        <div class="field">
          <label for="register-email">Email</label>
          <div class="input-wrap">
            <i class="bi bi-envelope field-icon"></i>
            <input type="email" id="register-email" name="email" placeholder="you@example.com" autocomplete="email" class="has-icon<?= isset($errors['email']) ? ' invalid' : '' ?>" value="<?= e($old['email']) ?>">
          </div>
          <span class="error-msg" id="register-email-error"><?= e($errors['email'] ?? '') ?></span>
        </div>

        <div class="field">
          <label for="register-password">Password</label>
          <div class="input-wrap">
            <i class="bi bi-lock field-icon"></i>
            <input type="password" id="register-password" name="password" placeholder="At least 8 characters, incl. a symbol" autocomplete="new-password" class="has-icon has-icon-right<?= isset($errors['password']) ? ' invalid' : '' ?>">
            <button type="button" class="toggle-password" data-target="register-password" aria-label="Show password" aria-pressed="false">
              <i class="bi bi-eye"></i>
            </button>
          </div>
          <span class="error-msg" id="register-password-error"><?= e($errors['password'] ?? '') ?></span>
        </div>

        <div class="field">
          <label for="register-confirm-password">Confirm Password</label>
          <div class="input-wrap">
            <i class="bi bi-lock field-icon"></i>
            <input type="password" id="register-confirm-password" name="confirm-password" placeholder="Re-enter your password" autocomplete="new-password" class="has-icon has-icon-right<?= isset($errors['confirm']) ? ' invalid' : '' ?>">
            <button type="button" class="toggle-password" data-target="register-confirm-password" aria-label="Show password" aria-pressed="false">
              <i class="bi bi-eye"></i>
            </button>
          </div>
          <span class="error-msg" id="register-confirm-password-error"><?= e($errors['confirm'] ?? '') ?></span>
        </div>

        <p class="form-status" id="register-status"><?= e($status) ?></p>

        <button type="submit" id="register-submit">Create account</button>

        <p class="switch">Already have an account? <a href="login.php">Log in</a></p>
      </form>
