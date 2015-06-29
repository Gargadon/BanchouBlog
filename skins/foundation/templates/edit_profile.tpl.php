<?php if ($this->logged == 1) : ?>
<?php if (isset($this->profid)) : ?>
<?php if ($this->nousuario == 0) : ?>
<table>
      <tbody>
      	<tr>
      	<th colspan="2">
      	Editar tu perfil
      	</th>
      	</tr>
       <?php if (isset($this->actualiza)) : ?>       
              <tr>
              Se ha realizado el cambio correctamente.
              <?php if ($this->destroysession == 1) : ?>
              Para mayor seguridad, el sistema lo desconectará de su sesión. Deberá volver a iniciar sesión con sus nuevos datos.
              <?php endif; ?>
					</td></tr></tbody>
					</table>
              <td></td></tr></tbody></table>
        <?php else: ?>
          <td colspan="2">
<div align="center">Los campos deshabilitados no pueden editarse.</div>
                   <form METHOD="post" action="edit_profile.php?id=<?php echo $this->eprint($this->profid); ?>"> </td>
        </tr>
        <tr>
          <td>Nombre de usuario:
          </td>
          <td><input type="text" name="usuario" value="<?php echo $this->eprint($this->profile['usuario']); ?>" />
          </td>
        </tr>
        <tr>
          <td>Avatar:
          </td>
          <td><p>El sistema usa Gravatar para mostrar tu avatar.</p>
          <p>¿No usas Gravatar? Regístrate <a href="http://es.gravatar.com/site/signup/" target="_blank">aquí</a> con tu cuenta de correo.</p>
          </td>
        </tr>
        <tr>
        <td>Nombre(s):
          </td>
          <td><input type="text" name="nombre" value="<?php echo $this->eprint($this->profile['nombre']); ?>" />
          </td>
        </tr>
        <tr>
        <td>Apellidos:</td>
          <td><input type="text" name="apellidos" value="<?php echo $this->eprint($this->profile['apellido']); ?>" />
          </td>
        </tr>
        <tr>
        <td>Contraseña (si no seas cambiarla deja este espacio en blanco):
          </td>
          <td><input type="password" name="password1" maxlength="10" />
          </td>
        </tr>
        <tr>
          <td>Repetir contraseña (si deseas cambiar tu contraseña completa este campo):
          </td>
          <td><input type="password" name="password2" maxlength="10" />
          </td>
        </tr>
	 <tr>
          <td>Correo electrónico:
          </td>
          <td><input type="text" name="email" value="<?php echo $this->eprint($this->profile['correo']); ?>" />
          </td>
        </tr>
<?php if ($this->canchangegroup == 1) : ?>
        <tr>
          <td>Rol:
          </td>
          <td><select name="grupo">
          <option value="<?php echo $this->eprint($this->profile['grupo']); ?>" selected>No cambiar (<?php echo $this->eprint($this->profile['nombre_grupo']); ?>)</option>
      <?php for($i=1; $i<=($this->contador); $i++) { ?>
<option value="<?php echo $this->eprint($this->grupo_id[$i]); ?>"><?php echo $this->eprint($this->grupo_nombre[$i]); ?></option>
      <?php } ?>
	  </select></td>
        </tr>
<?php else : ?>
        <tr>
          <td>Rol:
          </td>
          <td><input type="text" name="grupo" value="<?php echo $this->eprint($this->profile['nombre_grupo']); ?>" disabled /><input type="hidden" name="grupo" value="<?php echo $this->eprint($this->profile['grupo']); ?>">
          </td>
        </tr>
<?php endif; ?>       
        <tr>
          <td>Fecha de registro:</td>
          <td><input type="text" name="fecha" value="<?php echo $this->eprint($this->profile['fecha']); ?>" disabled />
          </td>
        </tr>
        <tr>
          <td>Acerca de mí:
          </td>
          <td><textarea name="descripcion"><?php echo $this->eprint($this->profile['acerca']); ?></textarea>
          </td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" value="Editar datos" />
          </td>
        </tr>
        <tr>
         <td colspan="2">
        <a href="profile.php">Regresar al perfil</a>
         </td>
        </tr>
      </tbody>
    </table>
    <input type="hidden" name="actualiza" value="1" />
    </form>
<?php endif; ?>    
<?php endif; ?>
<?php endif; ?>
<?php else : ?>

<?php endif; ?>
<?php if ($this->nousuario == 1) : ?>
No tienes permiso de estar en este sitio.
<?php endif; ?>