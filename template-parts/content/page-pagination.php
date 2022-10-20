<?php

the_posts_pagination(
      array(
          
        'screen_reader_text' => ' ', 
        'before_page_number' => __( 'Page', 'textdomain' ),
        'mid_size'           => 5,
        'prev_text'          => __('« Précédents', 'textdomain' ),
        'next_text'          => __('Suivants »', 'textdomain' ),
      )
    );
    
        
    ?>
