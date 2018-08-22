<?php
/*
Plugin Name:       Knoppys Elegant Floating Contact
Plugin URI:        https://www.knoppys.co.uk
Description:       This plugin adds a floating contact tab to the right of the screen. Hidden on mobile. 
Version:           1
Author:            Knoppys Digital Limited
License:           GNU General Public License v2
License URI:       http://www.gnu.org/licenses/gpl-2.0.html
*/
//Floating contact Tab
function knoppys_contact_core(){ ob_start(); ?>

  <style type="text/css">
  	.contact-float-container {
      position: fixed;
      right: 0;
      background: #5287a6;
      z-index: 9999999999;
      top: 25%;
      padding: 25px 2px;
      border-radius: 4px;
  }

  .contact-float-container .box {
      display: block;
      padding: 10px 15px;
      color: #fff;
      font-size: 20px;
  }

  .contact-float-container .box i {
      display: block;
      text-align: center;
      color: #fff;
      font-size: 32px;
  }
  .notext span {
      display: none !important;      
  }
  .contact-float-container * {
      color: #fff;
  }
  @media all and (max-width: 768px){
    .contact-float-container {
      display: none !important;
    }
  }
  </style>
  <div class="contact-float-container">
    <div class="box">
      <a href="<?php echo get_site_url(); ?>/contact">
        <i class="fa fa-envelope"></i>
        <span>Enquire</span>
      </a>
    </div>
    <div class="box">
    <?php
    if (wp_is_mobile()) {
      $url = 'tel:+441244629963';
    } else {
      $url = get_site_url().'/contact';
    }
    ?>
      <a href="<?php echo $url; ?>">
        <i class="fa fa-phone"></i>
        <span>Call Us</span>
      </a>
    </div>
  </div>
  <script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery(window).scroll(function() {    
          var scroll = jQuery(window).scrollTop();
          if (scroll >= 100) {
              jQuery(".contact-float-container").addClass("notext");
          } else {
              jQuery(".contact-float-container").removeClass("notext");
          }
      });
      jQuery('.contact-float-container').hover(function(){
        jQuery(this).removeClass("notext");
      });
    });
  </script>

<?php $content = ob_get_clean();
echo $content;
}
add_action('wp_footer','knoppys_contact_core',50);