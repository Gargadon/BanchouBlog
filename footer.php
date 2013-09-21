<?php
echo '</div>
<div class="row"><div class="large-12 columns">
'.$config['footer'].'</div></div>';

echo '<div id="loguear" class="reveal-modal">
 <form action="login.php" method="post">
  <fieldset>
    <legend>Ingresa</legend>
    
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
</div>';

echo '<script>
  document.write(\'<script src=js/vendor/\'
    + (\'__proto__\' in {} ? \'zepto\' : \'jquery\')
    + \'.js><\/script>\');
</script>
<script src="js/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>
    <script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = \''.$config['disqusname'].'\'; // required: replace example with your forum shortname

    /* * * DON\'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement(\'script\'); s.async = true;
        s.type = \'text/javascript\';
        s.src = \'//\' + disqus_shortname + \'.disqus.com/count.js\';
        (document.getElementsByTagName(\'HEAD\')[0] || document.getElementsByTagName(\'BODY\')[0]).appendChild(s);
    }());
    </script>
    
</body>
</html>';
?>
