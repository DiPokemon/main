<?php
//смена шаблона записи в зависимости от категории
  $post = $wp_query->post;
  if (in_category('blog')) { 
    include(TEMPLATEPATH.'/single-blog.php');
  } 
  elseif (in_category('cases')){
    include(TEMPLATEPATH.'/single-case.php');
  }
  else {
    include(TEMPLATEPATH.'/single-service.php');
  }
?>