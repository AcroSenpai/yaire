
<footer>
<div class="footer_links">
    <a href="/conocenos/faq">Preguntas frecuentes</a>
    <a href="/conocenos">Sobre nosotros</a>
  </div>

<label id="footer_text">Proyecto final hecho con ♥ por Aitor Pérez y Olalla Iglesias</label>
</footer>

<div id="nav_bottom">

	<ul class="nav_separator">

    <li>
    <a href="/teorico" class="hvr-grow">
     teórica
    <img src="<?= '/pub/images/icons/006-file.png'; ?>" alt="menú teórica"/>
    </a>
    </li>

	</ul>

  <ul class="nav_separator">

    <li>
    <a href="/practico" class="hvr-grow">
     prácticas
    <img src="<?= '/pub/images/icons/002-car.png'; ?>" alt="menú prácticas"/>
    </a>
    </li>

  </ul>



  <ul class="nav_separator">
    <li>

    <?php if( (! empty ($_SESSION['user'])) && ( ($_SESSION['rol']==3) ) ):?>
      <a href="/tienda/carrito" class="hvr-grow">
        carrito
        <?php if( isset($this->dataTable['tienda']) ): ?>
          <span>(<span class="num_c"></span>)</span>
        <?php endif; ?>
      <img src="<?= '/pub/images/icons/003-shopping-cart.png'; ?>" alt="menú carrito"/>
      </a>
    <?php else: ?>
      <a href="/" class="hvr-grow">

      <img src="<?= '/pub/images/logo.png'; ?>" alt="menú carrito" style="width:50px"/>
      </a>
    <?php endif;?>
    </li>
  </ul>

  <ul class="nav_separator">

    <li>
    <a href="/tienda" class="hvr-grow">
     tienda
    <img src="<?= '/pub/images/icons/001-shop.png'; ?>" alt="menú tienda"/>
    </a>
    </li>

  </ul>

  <ul class="nav_separator">

    <li>
    <a href="/users" class="hvr-grow">
     cuenta
    <img src="<?= '/pub/images/icons/005-social.png'; ?>" alt="menú tienda"/>
    </a>
     </li>

  </ul>

</div>


<script type="text/javascript" src="<?= '/pub/js/script.js'; ?>"></script>
<script type="text/javascript" src="<?='/pub/js/jquery.md5.js'?>"></script>

</body>
</html>
