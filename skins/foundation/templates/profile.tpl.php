<?php if ($this->usuario == 1) : ?>
<?php if (is_array($this->perfil)): ?>
<table class="table table-bordered table-hover">
      <tbody>
      <tr>
      <th colspan="2">Perfil del usuario</th>
      </tr>
        <tr>
          <td colspan="2">
          <img style="display:block;margin-left:auto;margin-right:auto;" src=" <?php echo $this->eprint($this->perfil['avatar']); ?>" alt="Avatar de <?php echo $this->eprint($this->perfil['usuario']); ?>" title="Avatar de <?php echo $this->eprint($this->perfil['usuario']); ?>" />
          </td>
        </tr>
        <tr>
          <td>Nombre de usuario:
          </td>
          <td>
          <?php echo $this->eprint($this->perfil['usuario']); ?>
          </td>
        </tr>
        <tr>
          <td>Rol:
          </td>
          <td>
          <?php echo $this->eprint($this->perfil['rol']); ?>
          </td>
        </tr>
        <?php if($this->group == 1): ?>
        <tr>
          <td>IP:</td>
          <td>
          <?php echo $this->eprint($this->perfil['ip']); ?></td>
        </tr>
        <tr>
          <td>Nombre del servidor:</td>
          <td>
          <?php echo $this->eprint($this->perfil['host']); ?>
          </td>
        </tr>
        <?php endif; ?>
        <tr>
          <td>Acerca de mí:
          </td>
          <td><?php echo $this->eprint($this->perfil['about']); ?>
          </td>
        </tr>
      </tbody>
    </table></div>
    <?php if(($this->perfil['usuario'] == $_COOKIE['gargauser'])) : ?>
        <a href="edit_profile.php?id=<?php echo $_GET['id']; ?>">Editar perfil</a>
    <br />
    <?php elseif ($this->group == 1) : ?>
    <a href="edit_profile.php?id=<?php echo $_GET['id']; ?>">Editar perfil</a>
    <br />
    <?php endif; ?>
<?php endif; ?>
<?php else: ?>
<div data-alert class="alert-box alert">No tienes permisos para ver este perfil.</div>
<?php endif; ?>