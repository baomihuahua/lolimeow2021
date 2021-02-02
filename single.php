<?php get_header(); ?>
      <div class="container">
        <div class="section-head">
          <span>Single</span></div>
      </div>
      <div class="boxmoe-blog-page mb30">
        <div class="container">	  
          <div class="row">
            <div class="col-md-12 col-lg-12 ml-auto mr-auto">
			<?php while (have_posts()) : the_post(); ?>
              <div class="post-single">
                <h3 class="post-title <?php boxmoe_wow_set( )?>"><?php the_title(); echo get_the_subtitle(); ?></h3>
                <div class="post-meta">
                  <div class="post-auther-avatar">
				  <?php echo get_avatar(get_the_author_meta( 'user_email' ),60, '', '',array( 'class'=>array('img-fluid'))); ?></div>
                  <div class="post-meta-info">
                    <span class="post-date">
                      <i class="fa fa-clock-o"></i>Post on <?php echo get_the_time( 'Y-m-d'); ?></span>
                    <span class="post-view">
                      <i class="fa fa-street-view"></i><?php setPostViews(get_the_ID()); ?><?php echo getPostViews(get_the_ID()); ?></span>
                    <span class="post-comment">
                      <i class="fa fa-comments-o"></i><?php echo get_comments_number( '0', '1', '%') ?></span>
                    <span class="category-meta">
                      <a href="https://new.luoli.pub/category/uncategorized" title="查看《未分类》下的所有文章 " rel="category tag">
                        <i class="fa fa-folder-o"></i>未分类</a>
                    </span><?php edit_post_link( '['.__( '<span>编辑仅作者可见</span>', 'meowdata'). ']'); ?>
                  </div>
                </div>
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
			  <?php if (get_boxmoe('open_author_info')){?>	  
              <div class="block_auther_post mt10">
                <div class="row">
                  <div class="col-lg-7">
                    <div class="media">
					  <?php echo get_avatar( get_the_author_meta( 'user_email' ), 80, '', '',array( 'class'=>array('img_person'))); ?> 
                      <div class="media-body">
                        <div class="txt">
                          <h4><?php the_author(); ?></h4>
                          <p><?php echo get_boxmoe( 'authorinfo'); ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 my-auto ml-auto text-lg-right"><?php if(get_boxmoe('boxmoe_qq')){?>
                    <a href="https://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo get_boxmoe('social_qq');?>&amp;site=qq&amp;menu=yes" target="_blank" class="btn-social color-qq border-0  mr-2">
                      <i class="fa fa-qq"></i>
                    </a><?php } ?><?php if(get_boxmoe('boxmoe_wechat')){?>
                    <a href="#modal-weixin " data-toggle="modal" data-target="#modal-weixin" class="btn-social color-weixin border-0 mr-2">
                      <i class="fa fa-weixin"></i>
                    </a><?php } ?><?php if(get_boxmoe('boxmoe_github')){?>
                    <a href="<?php echo get_boxmoe('social_github');?>" target="_blank" class="btn-social color-github border-0  mr-2">
                      <i class="fa fa-github"></i>
                    </a><?php } ?>
                  </div>
                </div>
              </div>
			  <?php }?>
			  <?php $categories=get_the_category();$categoryIDS=array();foreach ($categories as $category) { array_push($categoryIDS, $category->term_id);}$categoryIDS = implode(",", $categoryIDS);?>
              <nav class="post-navigation thw-sept">
                <div class="row no-gutters">
                  <div class="col-12 col-md-6">
                    <div class="post-previous">
                      <?php if (get_next_post($categoryIDS)) { next_post_link('%link','<span><i class="fa fa-angle-left"></i> Previous Post</span><h4>%title</h4>',true);} else { echo '<span><i class="fa fa-angle-left"></i> Previous Post </span><h4>本文分类下已经是最后一篇文章了哦！';} ?>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="post-next">
                     <?php if (get_previous_post($categoryIDS)) { previous_post_link( '%link', '<span>Next Post <i class="fa fa-angle-right"></i></span> <h4>%title</h4>',true);}else { echo '<span>Next Post <i class="fa fa-angle-right"></i></span> <h4>本文分类下已经是最新一篇文章了哦！</h4>';} ?>
                    </div>
                  </div>
                </div>
              </nav>			  
            <?php endwhile; ?>			  
			  
            </div>
          </div>
        </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 ml-auto mr-auto">
<?php if (get_boxmoe('comments_off')==''):?><?php comments_template( '', true); ?><?php endif; ?> 
		  </div>
        </div>
      </div>		
      </div>			  

      <?php get_footer(); ?>