<?php get_header(); ?>
      <div class="container">
        <div class="section-head">
          <span>Page</span></div>
      </div>
      <div class="boxmoe-blog-page mb30">
        <div class="container">	  
          <div class="row">
            <div class="col-md-12 col-lg-12 ml-auto mr-auto">
			<?php while (have_posts()) : the_post(); ?>
              <div class="post-single">
                <h3 class="post-title <?php boxmoe_wow_set( )?>"><?php the_title(); echo get_the_subtitle(); ?></h3>
                <div class="post-content">
				<?php the_content(); ?>				  
                </div>
                <?php wp_link_pages(array('before' => '<div class="fenye pagination justify-content-center">', 'after' => '</div>', 'next_or_number' => 'number',
'link_before' =>'<span>', 'link_after'=>'</span>')); ?>   
                <div class="post-footer">
                  <div class="post-tags">
                    <div class="article-categories">
                      <?php the_tags( '', '', ''); ?></div>
                  </div>
                </div>	  
              </div>
<?php endwhile; ?>		
            </div>
          </div>
        </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 ml-auto mr-auto">
<?php comments_template('', true); ?>
		  </div>
        </div>
      </div>		
      </div>	
<?php get_footer(); ?>	  

