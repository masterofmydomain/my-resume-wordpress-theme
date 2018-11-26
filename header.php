<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="wrap">
 *
 * @package MY Resume
 * @since MY Resume 1.0
 */

$array_menu = wp_get_nav_menu_items('Main Menu');

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>
<body>

<div id="background"></div>

<button class="btn btn-outline-primary d-xs-block d-sm-none" id="mobileNavButton">menu</button>
<div id="mobileNav" class="h-100 d-xs-block d-sm-none">
  <button id="mobileNavClose" class="btn btn-outline-secondary float-right">close</button>
  <ul>
    <li>HOME</li>
    <?php foreach($array_menu as $menu_item) { ?>
    <li data-target="#collapseContent<?=$menu_item->menu_order?>"><?=$menu_item->title?></li>
    <?php } ?>
  </ul>
</div>

<header>
  <div class="col-10 offset-md-1 vCard">
    <div id="hi">Hi, I'm</div>
    <div id="fullName"><?=get_bloginfo( 'name' )?></div>
    <div id="jobTitle"><?=get_bloginfo( 'description' )?></div>

    <?php 
      if( get_theme_mod( 'objective_textarea') != "" ) {
        echo '<div id="objTitle">Objective:</div>';
        echo '<div id="objective">' . get_theme_mod( 'objective_textarea') . '</div>'; 
      } 
    ?>

    <button type="button" class="btn btn-outline-light" id="hireMe" data-toggle="modal" data-target="#hireMeModal">HIRE ME</button>
    <hr />
    <div id="download"><a href="<?=get_template_directory_uri() . '/files/MarvinYanResume.pdf'?>" title="Marvin Yan Resume" download>Download CV</a></div>
  </div>
</header>