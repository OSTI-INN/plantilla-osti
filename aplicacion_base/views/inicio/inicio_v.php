<section>
   <div class="section ancho-full centrado">

      <?php global $config; ?>
      <?php if ( $config['aplicacion']['mostrar_logo'] ){ ?>

         <div class="img-logo"></div>

      <?php } ?>
      <?php if ( $config['aplicacion']['mostrar_titulo'] ){ ?>

         <h1 class="titulo-portada"><?=$config['aplicacion']['nombre_completo']?></h1>

      <?php } ?>
      <?php if ( $config['aplicacion']['mostrar_portada'] ){ ?>
         
         <div class="img-portada" src='<?=base_url()?>imgs/portada.png'></div>

      <?php } ?>
      <?php if ( $config['aplicacion']['descripcion'] ){ ?>
         <br><hr>
   		<p>
            <?=$config['aplicacion']['descripcion']?>
   		</p>
      <?php } ?>

	</div>
</section>