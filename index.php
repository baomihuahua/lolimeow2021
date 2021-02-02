<?php if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * boxmoe.com
 */
?>
<?php get_header(); ?>
      <div class="container">
        <div class="section-head">
          <span><?php if(is_home()) {echo'Home';}else{echo'category';}  ?></span></div>
        <div class="site-main">
          <h1 class="main-title">
            <i class="fa fa-heartbeat" aria-hidden="true"></i>
            <span id="hitokoto">每个人的心里，都有一个忘不记，却无法拥抱珍惜的人。</span></h1>
        </div>
      </div>
      <script>$.get("https://v1.hitokoto.cn/?c=<?php echo get_boxmoe('hitokoto_text','b'); ?>", {},
        function(data) {
          document.getElementById("hitokoto").innerHTML = data.hitokoto;
        });</script>
      <div class="boxmoe-blog-content mb30">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-lg-10 ml-auto mr-auto">
            <?php while ( have_posts() ) : the_post(); 
			if( has_post_format('status')) { get_template_part( 'component/blog-list_4' );}
			else if(get_boxmoe('blog_list_style') == 'list_style_2' ){get_template_part( 'component/blog-list_2' );}
			else if(get_boxmoe('blog_list_style') == 'list_style_3' ){get_template_part( 'component/blog-list_3' );}			
			else{get_template_part( 'component/blog-list' );}
			endwhile; ?>			
              <?php boxmoe_paging(); ?>
            </div>
          </div>
        </div>
		  <?php if( get_boxmoe('indexlinks') ){ echo get_the_link_items_index();  } ?>  		
      </div>
    <?php get_footer(); ?>
