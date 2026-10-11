<?php
/**
 * Login form.
 * Expects: $old (array), $errors (array), $status (string), $statusOk (bool), $locked (bool)
 */
$dis = $locked ? ' disabled' : '';
?>
      <form id="login-form" class="auth-form" action="login.php" method="post" novalidate>
        <?= csrf_field() ?>
        <h2>Welcome back</h2>
        <p class="lead">Log in to pick up your training where you left off.</p>

        <div class="field">
          <label for="login-email">Email</label>
          <div class="input-wrap">
            <i class="bi bi-envelope field-icon"></i>
            <input type="email" id="login-email" name="email" placeholder="frontdesk@ironclad.fit" autocomplete="username" class="has-icon<?= isset($errors['email']) ? ' invalid' : '' ?>" value="<?= e($old['email']) ?>"<?= $dis ?>>
          </div>
          <span class="error-msg" id="login-email-error"><?= e($errors['email'] ?? '') ?></span>
        </div>

        <div class="field">
          <label for="login-password">Password</label>
          <div class="input-wrap">
            <i class="bi bi-lock field-icon"></i>
            <input type="password" id="login-password" name="password" placeholder="Ironclad@2026" autocomplete="current-password" class="has-icon has-icon-right<?= isset($errors['password']) ? ' invalid' : '' ?>"<?= $dis ?>>
            <button type="button" class="toggle-password" data-target="login-password" aria-label="Show password" aria-pressed="false">
              <i class="bi bi-eye"></i>
            </button>
          </div>
          <span class="error-msg" id="login-password-error"><?= e($errors['password'] ?? '') ?></span>
        </div>

        <div class="row">
          <label class="remember" for="remember">
            <input type="checkbox" id="remember" name="remember">
            Remember me
          </label>
          <a href="#">Forgot password?</a>
        </div>

        <p class="form-status<?= $statusOk ? ' success' : '' ?>" id="login-status"><?= e($status) ?></p>

        <button type="submit" id="login-submit"<?= $dis ?>><?= $locked ? 'Locked' : 'Log in' ?></button>

        <p class="switch">Don't have an account? <a href="register.php">Register</a></p>
      </form>
