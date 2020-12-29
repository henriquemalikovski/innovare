<?php 
// functions.php
function get_field($key, $page_id = 0) {
    $id = $page_id !== 0 ? $page_id : get_the_ID();
    return get_post_meta($id, $key, true);
  }
  
  function the_field($key, $page_id = 0) {
    echo get_field($key, $page_id);
  }

function getURLEmbedYoutTube($url) {
    $pos_str = strripos($url, "=")+1;
    $url_embed = substr($url, $pos_str);
    return $url_embed;
}

function getModalPost($post_name, $seq) {
    $str = str_replace(' ', '', $post_name);
    $temp_id =  $str . $seq; 
    return $temp_id;
}

function getInfoContato($groupID, $campoID) {
    $campos = get_field($groupID);
    $return = "";
    $count = 0;
    $qtdReg = count($campos);
    if(isset($campos)) { 
        foreach($campos as $campo) {
            $count += 1;
            $return .= $campo[$campoID];
            if($count !== $qtdReg) {
                $return .= " | ";
            }
        } 
    }
    return $return;
}

function getWhatsAppURL(){
    $numero = get_field('btn_whatsapp');
    $msg = get_field('msg_whatsapp');
    $url = 'https://api.whatsapp.com/send?phone='.$numero.'&text='.$msg;
    return $url;
}

add_action('cmb2_admin_init', 'cmb2_fields_home');

// array('item1', 'item2') === ['item1', 'item2']
function cmb2_fields_home() {
  // Adiciona um bloco
  $cmb = new_cmb2_box([
    'id' => 'home_box', // id deve ser único
    'title' => 'Home',
    'object_types' => ['page'], // tipo de post
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-home.php',
    ], // modelo de página
  ]);
  

    // Carrossel de Inicio do site
    $cmb->add_field( array(
        'name' => 'Carrossel Inicial do Site',
        'desc' => '',
        'id'   => 'carrossel_inicial',
        'type' => 'file_list',
        'query_args' => array( 'type' => 'image' ),
        'text' => array(
            'add_upload_files_text' => 'Adicione ou Faça Upload', // default: "Add or Upload Files"
            'remove_image_text' => 'Excluir Imagem', // default: "Remove Image"
            'file_text' => 'Replacement', // default: "File:"
            'file_download_text' => 'Download', // default: "Download"
            'remove_text' => 'remove', // default: "Remove"
        ),
    ) );


    // Titulo Missão
    $cmb->add_field( array(
        'name'    => 'Titulo Missão',
        'desc'    => '',
        'default' => '',
        'id'      => 'titulo_missao',
        'type'    => 'text',
    ) );

    // Texto missão, visão e valores
    $cmb->add_field( array(
        'name' => 'Texto Missão, Visão e Valores',
        'desc' => '',
        'default' => '',
        'id' => 'texto_m_v_v',
        'type' => 'textarea'
    ) );
    // Texto Botão Missão
    $cmb->add_field( array(
        'name'    => 'Texto Botão Missão',
        'desc'    => '',
        'default' => '',
        'id'      => 'botao_missao',
        'type'    => 'text',
    ) );

    $cmb = new_cmb2_box([
      'id' => 'video', // id deve ser único
      'title' => 'Vídeo',
      'object_types' => ['page'], // tipo de post
      'show_on' => [
        'key' => 'page-template',
        'value' => 'page-home.php',
      ], // modelo de página
    ]);
    // Titulo Vídeo
    $cmb->add_field( array(
        'name'    => 'Titulo Vídeo',
        'desc'    => '',
        'default' => '',
        'id'      => 'titulo_video',
        'type'    => 'text',
    ) );

    // URL Vídeo
    $cmb->add_field( array(
        'name' => 'URL do Vídeo',
        'id'   => 'url_video',
        'type' => 'text',
        // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

    $cmb = new_cmb2_box([
      'id' => 'servicos', // id deve ser único
      'title' => 'Serviços',
      'object_types' => ['page'], // tipo de post
      'show_on' => [
        'key' => 'page-template',
        'value' => 'page-home.php',
      ], // modelo de página
    ]);
    //Inicio Serviços
    // Titulo Serviços
    $cmb->add_field( array(
        'name'    => 'Titulo Serviços',
        'desc'    => '',
        'default' => '',
        'id'      => 'titulo_servico',
        'type'    => 'text',
    ) );

    // Grupo para Reunir as Informações de Serviços
    $group_field_id = $cmb->add_field( array(
        'id'          => 'grupo_servicos',
        'type'        => 'group',
        'repeatable'  => true,
        'options'     => array(
            'group_title'       => 'Serviço {#}', 'cmb2', 
            'add_button'        => 'Adicionar Serviço',
            'remove_button'     => 'Remover Serviço',
            'sortable'          => true,
            // 'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Serviço',
        'id'   => 'servico',
        'type' => 'text',
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Imagem do Serviço',
        'id'   => 'img_servico',
        'type' => 'file',
        'options' => [
            'url' => false,
        ],
        'query_args' => array(
            'type' => array(
             	'image/jpeg',
             	'image/png',
             ),
        ),
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Descrição sobre o Serviço',
        'id'   => 'desc_servico',
        'type' => 'textarea',
    ) );

    // Botão Serviços
    $cmb->add_field( array(
        'name'    => 'Texto Botão Serviços',
        'desc'    => '',
        'default' => '',
        'id'      => 'botao_servico',
        'type'    => 'text',
    ) );
    // Fim de serviços

    $cmb = new_cmb2_box([
      'id' => 'equipe', // id deve ser único
      'title' => 'Equipe',
      'object_types' => ['page'], // tipo de post
      'show_on' => [
        'key' => 'page-template',
        'value' => 'page-home.php',
      ], // modelo de página
    ]);
    //Inicio Equipe
    // Titulo Equipe
    $cmb->add_field( array(
        'name'    => 'Titulo Equipe',
        'id'      => 'titulo_equipe',
        'type'    => 'text',
    ) );

    // Grupo para Reunir as Informações de Equipe
    $group_field_id = $cmb->add_field( array(
        'id'          => 'grupo_esquipe',
        'type'        => 'group',
        'description' => 'Equipe da Clinica',
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => 'Pessoa {#}', // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => 'Adicionar Pessoa',
            'remove_button'     => 'Remover Pessoa',
            'sortable'          => true,
            // 'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Nome Pessoa',
        'id'   => 'nome_pessoa',
        'type' => 'text',
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Imagem da Pessoa',
        'id'   => 'img_pessoa',
        'type' => 'file',
        'options' => [
            'url' => false,
        ],
        'query_args' => array(
            'type' => array(
             	'image/jpeg',
             	'image/png',
             ),
        ),
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Cargo da Pessoa',
        'id'   => 'cargo_pessoa',
        'type' => 'text',
    ) );

    // Botão Equipe
    $cmb->add_field( array(
        'name'    => 'Texto Botão Equipe',
        'desc'    => '',
        'default' => '',
        'id'      => 'botao_equipe',
        'type'    => 'text',
    ) );
    // Fim de Equipe


    //Inicio Depoimentos
    $cmb = new_cmb2_box([
      'id' => 'depoimentos', // id deve ser único
      'title' => 'Depoimentos',
      'object_types' => ['page'], // tipo de post
      'show_on' => [
        'key' => 'page-template',
        'value' => 'page-home.php',
      ], // modelo de página
    ]);
    
    // Titulo Depoimento
    $cmb->add_field( array(
        'name'    => 'Titulo Depoimento',
        'id'      => 'titulo_depoimento',
        'type'    => 'text',
    ) );

    // Grupo para Reunir as Informações dos Depoimentos
    $group_field_id = $cmb->add_field( array(
        'id'          => 'grupo_depoimento',
        'type'        => 'group',
        'description' => 'Depoimentos sobre a Clinica',
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'Depoimento {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => 'Adicionar Depoimento',
            'remove_button'     => 'Remover Depoimento',
            'sortable'          => true,
            // 'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Depoimento',
        'id'   => 'depoimento',
        'type' => 'text_url',
    ) );
    // Fim de Depoimentos

    $cmb = new_cmb2_box([
      'id' => 'whatsapp', // id deve ser único
      'title' => 'Box WhatsApp',
      'object_types' => ['page'], // tipo de post
      'show_on' => [
        'key' => 'page-template',
        'value' => 'page-home.php',
      ], // modelo de página
    ]);
    // Box whatsapp
    // Titulo 
    $cmb->add_field( array(
        'name'    => 'Titulo Box WhatsApp',
        'desc'    => '',
        'default' => '',
        'id'      => 'titulo_box_whatsapp',
        'type'    => 'text',
    ) );
    // Texto
    $cmb->add_field( array(
        'name'    => 'Texto Box WhatsApp',
        'desc'    => '',
        'default' => '',
        'id'      => 'texto_box_whatsapp',
        'type'    => 'text',
    ) );
    // Texto Botão
    $cmb->add_field( array(
        'name'    => 'Texto Botão WhatsApp',
        'desc'    => '',
        'default' => '',
        'id'      => 'texto_botao_whatsapp',
        'type'    => 'text',
    ) );
    //Fim Box WhatsApp

    $cmb = new_cmb2_box([
      'id' => 'redes_sociais', // id deve ser único
      'title' => 'Redes Sociais',
      'object_types' => ['page'], // tipo de post
      'show_on' => [
        'key' => 'page-template',
        'value' => 'page-home.php',
      ], // modelo de página
    ]);
    //Redes Sociais
    // URL Facebook
    $cmb->add_field( array(
        'name' => 'URL do Facebook',
        'id'   => 'url_face',
        'type' => 'text_url',
        // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );
    // URL Instagram
    $cmb->add_field( array(
        'name' => 'URL do Instagram',
        'id'   => 'url_insta',
        'type' => 'text_url',
        // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );
    // URL WhatsApp
    $cmb->add_field( array(
        'name' => 'URL do WhatsApp',
        'id'   => 'url_whats',
        'type' => 'text_url',
        // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );


    $cmb = new_cmb2_box([
      'id' => 'contato', // id deve ser único
      'title' => 'Contato',
      'object_types' => ['page'], // tipo de post
      'show_on' => [
        'key' => 'page-template',
        'value' => 'page-home.php',
      ], // modelo de página
    ]);
    // Informações de Contato
    // Grupo para Reunir as Informações dos Contatos
    $group_field_id = $cmb->add_field( array(
        'id'          => 'grupo_fone',
        'type'        => 'group',
        'description' => 'Telefones da Clínica da Clinica',
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => 'Telefone {#}', // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => 'Adicionar Telefone',
            'remove_button'     => 'Remover Telefone',
            'sortable'          => true,
        ),
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Telefone',
        'id'   => 'telefone',
        'type' => 'text',
    ) );
    
    
    $group_field_id = $cmb->add_field( array(
        'id'          => 'grupo_email',
        'type'        => 'group',
        'description' => 'E-mails da Clínica',
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => 'E-mail {#}', // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => 'Adicionar E-mail',
            'remove_button'     => 'Remover E-mail',
            'sortable'          => true,
        ),
    ) );
    
    
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'E-mail',
        'id'   => 'email',
        'type' => 'text_email',
    ) );
    //Fim Contato

    // Endereço
    $cmb->add_field( array(
        'name' => 'Endereço da Clinica',
        'id'   => 'endereco',
        'type' => 'text',
    ) );

  // Informações do Botão de WhatsApp
    $cmb = new_cmb2_box([
        'id' => 'btn_whatsapp', // id deve ser único
        'title' => 'Botão de WhatsApp',
        'object_types' => ['page'], // tipo de post
        'show_on' => [
          'key' => 'page-template',
          'value' => 'page-home.php',
        ], // modelo de página
      ]);

      // Numero
    $cmb->add_field( array(
        'name' => 'Numero WhatsApp da Clinica',
        'desc' => 'Inclua o numero com +55 DDD na frente',
        'id'   => 'btn_whatsapp',
        'type' => 'text',
    ) );
     // Numero
     $cmb->add_field( array(
        'name' => 'Mensagem WhatsApp',
        'desc' => 'Escreva a Mensagem inicia que a pessoa irá enviar',
        'id'   => 'msg_whatsapp',
        'type' => 'textarea',
    ) );


    // Informações do SEO
    $cmb = new_cmb2_box([
        'id' => 'seo', // id deve ser único
        'title' => 'SEO',
        'object_types' => ['page'], // tipo de post
        'show_on' => [
          'key' => 'page-template',
          'value' => 'page-home.php',
        ], // modelo de página
      ]);

      // Numero
    $cmb->add_field( array(
        'name' => 'Título do Site',
        'id'   => 'titulo_site',
        'type' => 'text',
    ) );
     // Numero
     $cmb->add_field( array(
        'name' => 'Descrição do Site',
        'desc' => 'Escreva aqui uma breve descrição sobre a clinica, no máximo 2 linhas',
        'id'   => 'desc_site',
        'type' => 'textarea',
    ) );

}
    ?>