<?php // Template Name: Index?>

<?php get_header();?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <!-- Section Imagens em Geral-->
  <section class="slide-geral container">
    <div class="slide" data-slide="principal">
    <?php 
      $imgs = get_field('carrossel_inicial');
      if(isset($imgs)) { 
        foreach($imgs as $img) {?>
          <img src="<?php echo $img?>" alt="">
      <?php }}?>
    </div>
  </section>


  <!-- Missão -->
  <section id="sobre" class="container missao">
    <h2 class="subtitulo"><?php the_field('titulo_missao');?></h2>
    <p class="sup"><?php the_field('texto_m_v_v');?></p>
    <div class="container btn-container">
      <div class="col-16">
        <a class="botao" target="_blank" href="<?php echo getWhatsAppURL();?>"><?php the_field('botao_missao');?></a>
      </div>
    </div>
  </section>

  <!-- Seção do Vídeo sobre a clinica -->
  <section class="se-video">
    <div class="container">
      <h2 class="subtitulo white"><?php the_field('titulo_video');?></h2>
      <div class="grid-16 video">
      <iframe class="responsive-iframe" src="https://www.youtube.com/embed/<?php echo getURLEmbedYoutTube(get_field('url_video'))?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </section>

  <!-- Seção Serviços-->
  <section id="clinica" class="servicos container">
    <h2 class="subtitulo"><?php the_field('titulo_servico');?></h2>
    <div class="container" >
    <ul class="servicos-lista">
    <?php 
      $servicos = get_field('grupo_servicos');
      $count = 0;
      if(isset($servicos)) { 
        foreach($servicos as $servico) {
          $count += 1;?>
        <li class="grid-4" data-toggle="modal" data-target="#<?php echo getModalPost($servico['servico'], $count);?>">
          <div class="servico-icone">
            <img src="<?php echo $servico['img_servico'];?>">
          </div>
          <h3><?php echo $servico['servico'];?></h3>
          <!-- Modal -->
          <div class="modal fade" id="<?php echo getModalPost($servico['servico'], $count);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><?php echo $servico['servico']?></h5>
                  <a type="button" class="close botao" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </a>
                </div>
                <div class="modal-body">
                  <?php echo $servico['desc_servico']?>
                </div>
              </div>
            </div>
          </div>
          <!-- modal -->
        </li>
      <?php } }?>
    </ul>
    </div>
    <div class="container btn-container">
      <div class="col-16">
        <a class="botao" target="_blank" href="<?php echo getWhatsAppURL();?>"><?php the_field('botao_servico');?></a>
      </div>
    </div>
  </section>


  <!-- Seção de Pessoas que trabalham na Clinica -->
  <section id="equipe" class="pessoas container">
    <h2 class="subtitulo"><?php the_field('titulo_equipe');?></h2>
    <div class="container">
      <ul class="pessoas-lista">
        <?php 
          $pessoas = get_field('grupo_esquipe');
          if(isset($pessoas)) { foreach($pessoas as $pessoa) { 
            $img = wp_get_attachment_image_src( $pessoa['img_pessoa_id'], 'thumbnail', true )[0];
            ?>
            <li class="grid-4">
              <div class="pessoa-foto">
                <img src="<?php echo $img;?>" alt="">
              </div>
              <h3><?php echo $pessoa['nome_pessoa'];?></h3>
              <p><?php echo $pessoa['cargo_pessoa'];?></p>
            </li>
          <?php } }?>
      </ul>
    </div>
    <a class="botao" target="_blank" href="<?php echo getWhatsAppURL();?>"><?php the_field('botao_equipe');?></a>
  </section>

  <!-- Seção de Depoimentos -->
  <section class="depoimentos">
    <h2 class="subtitulo white"><?php the_field('titulo_depoimento');?></h2>
    <div class="container" data-slide="depoimento">
    <?php 
      $depoimentos = get_field('grupo_depoimento');
      if(isset($depoimentos)) { foreach($depoimentos as $depoimento) { ?>
        <blockquote class="quote-clientes">
          <p>"<?php echo $depoimento['depoimento'];?>"</p>
          <cite><?php echo $depoimento['autor_depoimento'];?></cite>
        </blockquote>
    <?php } }?>
    </div>
  </section>

  <!-- Seção Contato WhatsApp -->
  <section id="contato" class="container div-whats">
    <div class="whats grid-7">
      <h3><?php the_field('titulo_box_whatsapp');?></h3>
      <p><?php the_field('texto_box_whatsapp');?></p>
     
        <div class="btn-whats">
          <a class="botao" href="<?php echo getWhatsAppURL();?>" target="_blank"><?php the_field('texto_botao_whatsapp');?></a>
        </div>
      
    </div>
  </section>
  <?php endwhile; endif; ?>

  <?php get_footer()?>