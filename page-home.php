<?php // Template Name: Index?>

<?php get_header();?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <!-- Section Imagens em Geral-->
  <section class="slide-geral container">
    <div class="slide">
      <img src="<?php echo get_template_directory_uri()?>/img/pexels-andrea-piacquadio-3884125.jpg" alt="">
    </div>
  </section>


  <!-- Missão -->
  <section id="sobre" class="container missao">
    <h2 class="subtitulo"><?php the_field('titulo_missao');?></h2>
    <p class="sup"><?php the_field('texto_m_v_v');?></p>

    <button><?php the_field('botao_missao');?></button>
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
    <ul class="servicos-lista">
      <li class="grid-4" data-toggle="modal" data-target="#exampleModal">
        <div class="servico-icone">
          <img src="<?php echo get_template_directory_uri()?>/img/pexels-andrea-piacquadio-3884125.jpg">
        </div>
        <h3>Serviço Prestado</h3>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Serviço Prestado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Texto sobre o serviço prestado
              </div>
            </div>
          </div>
        </div>

      </li>
      <li class="grid-4">
        <div class="servico-icone">
          <img src="<?php echo get_template_directory_uri()?>/img/pexels-andrea-piacquadio-3884125.jpg">
        </div>
        <h3>Serviço Prestado</h3>
      </li>
      <li class="grid-4">
        <div class="servico-icone">
          <img src="<?php echo get_template_directory_uri()?>/img/pexels-andrea-piacquadio-3884125.jpg">
        </div>
        <h3>Serviço Prestado</h3>
      </li>
      <li class="grid-4">
        <div class="servico-icone">
          <img src="<?php echo get_template_directory_uri()?>/img/pexels-andrea-piacquadio-3884125.jpg">
        </div>
        <h3>Serviço Prestado</h3>
      </li>
    </ul>

    <button>Entre em contato</button>
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
    <button><?php the_field('botao_equipe');?></button>
  </section>

  <!-- Seção de Depoimentos -->
  <section class="depoimentos">
    <div class="container">
      <h2 class="subtitulo white">Depoimentos</h2>
      <blockquote class="quote-clientes">
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nec amet, erat etiam semper dui cum congue turpis augue. Eu viverra ut et nec gravida ut. Amet sit egestas morbi lobortis tellus mattis nibh augue arcu. Cursus sit amet, arcu cursus. Ridiculus facilisi ipsum non urna varius. Et mauris cursus fermentum tortor tincidunt. Eget nunc felis mauris a."</p>
        <cite>Barbara Moss</cite>
      </blockquote>
    </div>
  </section>

  <!-- Seção Contato WhatsApp -->
  <section id="contato" class="container div-whats">
    <div class="whats grid-7">
      <h3><?php the_field('titulo_box_whatsapp');?></h3>
      <p><?php the_field('texto_box_whatsapp');?></p>
      <button><?php the_field('texto_botao_whatsapp');?></button>
    </div>
  </section>
  <?php endwhile; endif; ?>

  <?php get_footer()?>