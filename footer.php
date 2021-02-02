<?php if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * boxmoe.com
 */
?>
    </main>
    <footer class="footer">
      <div class="container">
        <div class="row row-grid align-items-center">
          <div class="col-lg-12 text-lg-center btn-wrapper justify-content-center"><?php if(get_boxmoe('boxmoe_qq')){?>
            <a href="https://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo get_boxmoe('boxmoe_qq');?>&amp;site=qq&amp;menu=yes" target="_blank" class="btn-icon-only btn btn-qq " data-toggle="tooltip" data-original-title="博主QQ<?php echo get_boxmoe('boxmoe_qq');?>">
              <span class="btn-inner--icon">
                <i class="fa fa-qq"></i>
              </span>
            </a><?php } ?><?php if(get_boxmoe('boxmoe_github')){?>
            <a target="_blank" href="<?php echo get_boxmoe('boxmoe_github');?>" class="btn-icon-only btn btn-github" data-toggle="tooltip" data-original-title="Github">
              <span class="btn-inner--icon">
                <i class="fa fa-github"></i>
              </span>
            </a><?php } ?><?php if(get_boxmoe('boxmoe_weibo')){?>
            <a target="_blank" href="<?php echo get_boxmoe('boxmoe_weibo');?>" class="btn-icon-only btn btn-weibo" data-toggle="tooltip" data-original-title="微博">
              <span class="btn-inner--icon">
                <i class="fa fa-weibo"></i>
              </span>
            </a><?php } ?><?php if(get_boxmoe('boxmoe_wechat')){?>
            <button type="button" class="btn-icon-only btn btn-wechat" data-toggle="modal" data-target="#modal-weixin">
              <span class="btn-inner--icon">
                <i class="fa fa-wechat"></i>
              </span>
            </button>
            <div class="modal fade" id="modal-weixin" tabindex="-1" role="dialog" aria-labelledby="modal-weixin" aria-hidden="true">
              <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-danger">
                  <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">打开微信扫一扫二维码就可以啦</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span></button>
                  </div>
                  <div class="modal-body">
                    <div class="py-3 text-center">
                      <img class="img img-raised" src="<?php echo get_boxmoe('boxmoe_wechat') ;?>" width="200" height="200" alt="wechat"></div>
                  </div>
                </div>
              </div>
            </div><?php } ?><?php if(get_boxmoe('boxmoe_mail')){?>
            <a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=<?php echo get_boxmoe('boxmoe_mail');?>" target="_blank" class="btn-icon-only btn btn-mail" data-toggle="tooltip" data-original-title="Email：<?php echo get_boxmoe('boxmoe_mail');?>"><span class="btn-inner--icon"><i class="fa fa-envelope"></i></span></a><?php } ?>
          </div>
        </div>
        <hr class="hr-icon">
        <div class="row align-items-center justify-content-md-between">
          <div class="col-md-12 ">
            <?php echo get_boxmoe('footer_seo') ;?>	
          </div>
          <div class="col-md-12">
            <div class="copyright text-center">© <?php echo date('Y'); ?>
			  <a href="<?php echo home_url();?>" target="_blank" ><?php echo get_bloginfo( 'name' );?> </a> | Theme by <a href="https://www.boxmoe.com"  target="_blank" >LoLiMeow</a>&nbsp; <?php echo get_boxmoe('footer_info') ?>
              <div <?php if(get_boxmoe('trackcodehidden'))echo 'style="display:none;"'?>><?php echo get_boxmoe('trackcode') ?></div>
			  <?php if(get_boxmoe('boxmoedataquery') ){?><?php echo get_num_queries(); ?> queries in <?php timer_stop(3); ?> s <?php } ?>
			</div>
		  </div>
        </div>
      </div>
    </footer>
    <div id="search">
      <span class="close">X</span>
      <form role="search" id="searchform" method="get" action="<?php echo home_url( '/' ) ?>">
        <div class="search_form_inner  animate slideUp">
          <div class="search-bar">
            <i class="fa fa-search"></i>
            <input type="search" name="s" value="<?php echo htmlspecialchars($s) ?>" placeholder="输入搜索关键词..." /></div>
        </div>
      </form>
    </div><?php if (get_boxmoe('lolijump') ): ?> 
    <div id="lolijump" data-toggle="tooltip" data-original-title="<?php echo get_boxmoe('lolijumptext'); ?>">
      <img src="<?php echo boxmoe_load_style(); ?>/assets/images/top/<?php echo get_boxmoe('lolijumpsister'); ?>.gif"></div>
<?php endif; ?>
    <script src="<?php echo boxmoe_load_style();?>/assets/js/plugin.min.js"></script>    
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/comments.js"></script>
    <?php if(get_boxmoe('code_light_on')){?><script src="<?php echo boxmoe_load_style();?>/assets/js/prettify.js"></script><?php } ?>	
	<script src="<?php echo boxmoe_load_style();?>/assets/js/theme.js"></script>
	<?php wp_footer(); ?>
  </body>

</html>
