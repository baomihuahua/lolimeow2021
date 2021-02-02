<?php
/**
 *Used for index/archive/search/author/catgory/tag.
 *boxmoe.com
 *
 */
?>
              <div class="post-list-view-2 card card-blog card-background <?php boxmoe_wow_set( )?>" data-animation="zooming">
              <div class="full-background" style="background-image: url('<?php echo _get_post_thumbnail() ?>')"></div>
              <a <?php echo _post_target_blank() ?> href="<?php echo get_permalink() ?>" title="<?php echo get_the_title().get_the_subtitle(false).boxmoe_connector().get_bloginfo('name')?>" ></a>
              <div class="card-body mb-4">
              <a <?php echo _post_target_blank() ?> href="<?php echo get_permalink() ?>" title="<?php echo get_the_title().get_the_subtitle(false).boxmoe_connector().get_bloginfo('name')?>" >
              <h2 class="card-title"><?php echo get_the_title().get_the_subtitle() ?>
              </h2>
              <p class="card-description text-white"><?php echo _get_excerpt() ?></p>
              <div class="author">
			  <?php echo get_avatar(get_the_author_meta( 'user_email' ),60,'','',array('class'=>array('avatar'))); ?>
              <span class="text-white"><?php the_author(); ?>
              </span>
              </div>
			  </a>
              </div>
              </div>
