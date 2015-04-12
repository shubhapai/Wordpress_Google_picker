<?php
/*
  Plugin Name: Google Picker new
  Description: Interface to pick google drive files
  Author: shubha pai
  License: GPL V3
 */


//add a button to the content editor, next to the media button
//this button will show a popup that contains inline content
add_action('media_buttons_context', 'add_my_custom_button');

add_action('init', 'googlepicker_plugin_init');

function googlepicker_plugin_init() {
    $apikey = 'AIzaSyD2MXMpx_c6H38-wk3z097UbVPgg-FakaU';
    $init = 'initPicker';
    $urltext = sprintf('https://www.google.com/jsapi?key=%s',$apikey,$apikey);        
    $urltextsecond = sprintf('https://apis.google.com/js/client.js?onload=%s',$init,$init);        
    //wp_register_script( 'filepicker', plugins_url( '/filepicker.js', __FILE__ ));   
    wp_register_script( 'filepicker', plugins_url( '/filepicker.js', __FILE__ ),array('jquery'));   
    wp_register_script( 'client', $urltextsecond );   
    wp_register_script( 'pickerscript', plugins_url( '/pickerscript.js', __FILE__ ) ); 
    wp_register_script( 'jsapi', $urltext ); 
    wp_enqueue_script( 'filepicker' );
    wp_enqueue_script( 'pickerscript' );
    wp_enqueue_script( 'client' );
    wp_enqueue_script( 'jsapi' );
    
}



//action to add a custom button to the content editor
function add_my_custom_button($context) {
  
  //path to my icon
  $img = plugins_url( 'media/logo.png' , __FILE__ );
  
  //the id of the container I want to show in the popup
  //$container_id = 'popup_container';
  
  //our popup's title
  $title = 'Google Drive Popup!';

  //append the icon
  $context .= "<a class='button' title='{$title}' 
    id = 'pick' style='padding-right: 2px; vertical-align: text-bottom;'
    href='javascript:initPicker();'>
    <img src='{$img}' />Google Drive</a>";
  
  return $context;
}
