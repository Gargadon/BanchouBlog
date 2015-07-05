<div class="row"><div class="large-12 columns">
<?php echo $this->footer; ?>
</div>
</div>
<div id="loguear" class="reveal-modal" data-reveal>
 <form action="login.php" method="post">
  <fieldset>
    <legend>Ingresar</legend>
    
        <div class="row">
      <div class="small-12 large-6 columns">
        <label>Usuario</label>
        <input type="text" placeholder="Usuario" name="blogu">
      </div>
      <div class="small-12 large-6 columns">
        <label>Contraseña</label>
        <input type="password" placeholder="Contraseña" name="blogp">
      </div>
    </div>
    
            <div class="row">
      <div class="small-12 large-6 columns">
       <input type="submit" class="button success" value="Ingresar">
      </div>
      <div class="small-12 large-6 columns">
      <a href="forgot.php" class="button alert">Olvidé mi contraseña</a>
      </div>
    </div>
    
    <div class="row">
    <div class="small-12 large-12 columns">
    <p>No es posible registrarse en GargaBlog. Los usuarios los designa el
    administrador. Contacta al administrador del blog para obtener una cuenta.
    </div>
    </div>
    
    </fieldset>
  <input type="hidden" name="envia" value="yes">
  </form>
  <a class="close-reveal-modal">&#215;</a>
</div>

<script src="skins/foundation/js/vendor/jquery.js"></script>
<script src="skins/foundation/js/all.js"></script>
<script>
  $(document).foundation();
</script>

    
</body>
 </html> 
