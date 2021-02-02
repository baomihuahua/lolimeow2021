<?php
/**
 *Used for index/archive/search/author/catgory/tag.
 *boxmoe.com
 *
 */
?>
              <div class="post-list-view view3 <?php  echo boxmoe_border() ?> <?php boxmoe_wow_set( )?>">
                <div class="post-list-content">
                  <div class="post-list-header">                    
                    <h2 class="post-list-title">
                      <a href="<?php echo get_permalink() ?>"><?php echo get_the_title().get_the_subtitle() ?></a></h2>
                  </div>
				  <div class="post-list-text"><?php echo _get_excerpt() ?></div>
				  <div class="author">
				  <?php echo get_avatar(get_the_author_meta( 'user_email' ),60,'','',array('class'=>array('avatar img-raised'))); ?>
                  <span><?php the_author(); ?> | <?php echo get_the_time('Y-m-d') ?> | <?php $category = get_the_category();if($category[0]){ echo '
                      <a href="'.get_category_link($category[0]->term_id ).'" title="查看《'.$category[0]->cat_name.'》下的所有文章 " rel="category tag" '. _post_target_blank().'>
                        <i class="fa fa-folder-o"></i>'.$category[0]->cat_name.'</a>'; };?></span>
                  </div>				  
				  </div>
              </div>
