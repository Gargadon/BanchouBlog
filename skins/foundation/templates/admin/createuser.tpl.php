<?php if (isset($this->envia)) : ?>
  <?php if (isset($this->password)) : ?>
    <p>El nombre de usuario o la cuenta de correo estan ya en uso.</p>
  <?php endif; ?>
  <?php if ($this->crear == 1) :?>
    <p>El usuario <em><?php echo $this->eprint($this->usuario_nuevo); ?></em> se ha creado con la contraseña <em><?php echo $this->eprint($this->password_nuevo); ?></em>.</p>
    <?php if ($this->notify != 1) : ?>
      <p>Favor de avisar al usuario sobre sus datos de acceso.</p>
    <?php endif; ?>
  <?php else : ?>
    <p>El usuario no ha podido ser creado. Verifique los datos e intente de nuevo.</p>
  <?php endif; ?>
<?php else : ?>
  <form action="admin.php?action=createuser" method="post">
  <table class="table large-12 small-12 columns">
  <tr><th colspan="2">Crear usuario</th></tr>
  <tr><td>Nombre de usuario</td><td><input type="text" name="usuario_nuevo"></td></tr>
  <tr><td>Correo electrónico</td><td><input type="text" name="email_nuevo"></td></tr>
  <tr><td>Contraseña</td><td><input type="password" name="password_nuevo"></td></tr>
  <tr><td>Repetir contraseña</td><td><input type="password" name="password2_nuevo"></td></tr>
  <tr><td>Crear contraseña aleatoria<br/>
  <small>Si es así, deje vacío los campos <em>Contraseña</em>
  y <em>Repetir contraseña</em>.</td><td><input type="checkbox" name="password_aleatorio"></td></tr>
  <tr><td>Notificar al usuario</td><td><input type="checkbox" name="notify_nuevo"></td></tr>
  <tr><td><input type="submit" value="Crear usuario" class="button success"></td><td><input type="reset" value="Restablecer campos" class="button secondary"></td></tr>
  </table>
  <input type="hidden" name="envia" value="yes">
  </form>
<?php endif; ?>