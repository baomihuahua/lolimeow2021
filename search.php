<?php
/*
* Boxmoe.com template file.
*/
get_header(); ?>
      <div class="container">
        <div class="section-head">
          <span>Search</span></div>
        <div class="site-main">
          <h1 class="main-title">
            <i class="fa fa-search"></i>
            <span>搜索:[<?php echo htmlspecialchars($s); ?>]关键词<?php global $wp_query;echo ' 共' . $wp_query->found_posts . ' 篇文章';?></span></h1>
        </div>		  
      </div>
      <div class="boxmoe-blog-content mb30">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-lg-10 ml-auto mr-auto">
            <?php while ( have_posts() ) : the_post(); get_template_part( 'component/blog-list' );endwhile; ?>			
              <?php boxmoe_paging(); ?>
            </div>
          </div>
        </div>
      </div>
    <?php get_footer(); ?>


