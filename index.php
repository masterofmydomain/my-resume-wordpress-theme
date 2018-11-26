<?php
/**
 *
 * This template is used to display a blog. The content is displayed in post formats.
 *
 * @package MY Resume
 * @since MY Resume 1.0
 */
$array_menu = wp_get_nav_menu_items('Main Menu');

get_header(); ?>

<?php $aboutPost = get_page_by_title("About"); ?>
<?php $resumePost = get_page_by_title("Resume"); ?>
<?php $contactPost = get_page_by_title("Contact"); ?>

<div class="col-right">
  <div class="container" id="collapseContent">
    <div class="row d-none d-sm-block" id="navContainer">
      <p id="nav">
        <?php
        foreach($array_menu as $menu_item) {
          $icon = "";
          if ($menu_item->classes) {
            $icon = implode(" ", $menu_item->classes);
          }
        ?>
          <button class="btn btn-secondary btn-outline-light" type="button" data-toggle="collapse" data-target="#collapseContent<?=$menu_item->menu_order?>" aria-expanded="false">
            <i class="<?=$icon?>"></i>
            <div class="title"><?=$menu_item->title?></div>
            <div class="plus">+</div>
          </button>
        <?php } ?>
      </p>
    </div>

    <div class="row clearfix"></div>

    <?php 
      foreach ($array_menu as $menu_item) { 
        $post = get_post($menu_item->object_id);
        $content = apply_filters('the_content', $post->post_content);
    ?>
      <div class="collapseContentRow">
        <div class="collapse" id="collapseContent<?=$menu_item->menu_order?>" data-parent="#collapseContent"> 
          <?=$content?>
        </div>
      </div>
    <?php } ?>

  </div>
</div>

<div class="hire-me--modal modal fade in" id="hireMeModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button class="btn btn-outline-light closeButton" data-dismiss="modal">close</button>
        
        <div class="modal-title">HAVE A PROJECT?</div>
        <p>I'm ready to help you. You just type in the details below.</p>
      </div>
      <div class="modal-body">
        <?php echo do_shortcode('[contact-form-7 id="2449" title="Hire Me"]'); ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
