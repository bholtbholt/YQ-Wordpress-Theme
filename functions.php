<?php 
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');

// Customize the Admin Pages
add_action('admin_enqueue_scripts', 'my_admin_theme_style');
add_action('login_enqueue_scripts', 'my_admin_theme_style');
function my_admin_theme_style() {
  wp_enqueue_style('my-admin-theme', get_template_directory_uri() . '/css/wp-admin.css');
}

// enables wigitized sidebars
if ( function_exists('register_sidebar') )

// Sidebar Widget
// Location: the sidebar
register_sidebar(array('name'=>'Sidebar',
	'before_widget' => '<div class="widget-area widget-sidebar"><ul>',
	'after_widget' => '</ul></div>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
));

// post thumbnail support
add_theme_support( 'post-thumbnails' );

// custom menu support
add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) {
  	register_nav_menus(
  		array(
  			'header-menu' => 'Header Menu',
  		  'sidebar-menu' => 'Sidebar Menu',
  		  'footer-menu' => 'Footer Menu'
  		)
  	);
}

// removes detailed login error information for security
add_filter('login_errors',create_function('$a', "return null;"));

// custom excerpt ellipses for 2.9+
add_filter('excerpt_more', 'custom_excerpt_more');
function custom_excerpt_more($more) {
	return 'Read More &raquo;';
}

// no more jumping for read more link
add_filter('excerpt_more', 'no_more_jumping');
function no_more_jumping($post) {
  global $post;
	return '&nbsp;<a href="'.get_permalink($post->ID).'" class="read-more">'.'keep reading &rarr;'.'</a>';
}

// Use Bootstrap pager formatting for nav links
function bootstrap_get_posts_nav_link( $args = array() ) {
	global $wp_query;
	$return = '';

	if ( !is_singular() ) {
		$defaults = array(
			'prelabel' => __('&larr; Previous Page'),
			'nxtlabel' => __('Next Page &rarr;'),
		);
		$args = wp_parse_args( $args, $defaults );
		$max_num_pages = $wp_query->max_num_pages;
		$paged = get_query_var('paged');

		if ( $max_num_pages > 1 ) {
			$return = '<ul class="pager"><li class="previous">';
			$return .= get_previous_posts_link($args['prelabel']);
			$return .= '</li><li class="next">';
			$return .= get_next_posts_link($args['nxtlabel']);
			$return .= '</li></ul>';
		}
	}
	return $return;
}
function bootstrap_posts_nav_link( $prelabel = '', $nxtlabel = '' ) {
	$args = array_filter( compact('prelabel', 'nxtlabel') );
	echo bootstrap_get_posts_nav_link($args);
}

// get the slug
function the_slug($echo=true){
  global $post;
  $slug = $post->post_name;
  if( $echo ) echo $slug;
  return $slug;
}

//Check for last posts
function more_posts() {
  global $wp_query;
  return $wp_query->current_post + 1 < $wp_query->post_count;
}

// remove auto <p> from the_excerpt in pages
add_action('pre_get_posts', 'remove_p_from_excerpt');
function remove_p_from_excerpt() {
	if (is_page()) { remove_filter ('the_excerpt',  'wpautop'); }
}

// Remove <br> from wpautop
//Author: Simon Battersby http://www.simonbattersby.com/blog/plugin-to-stop-wordpress-adding-br-tags/
function better_wpautop($pee){
  return wpautop($pee,false);
}
remove_filter( 'the_content', 'wpautop');
add_filter( 'the_content', 'better_wpautop');
add_filter( 'the_content', 'shortcode_unautop', 12 );


//Add items to the end of the main nav - sign in, search
add_filter('wp_nav_menu_items','add_last_nav_item');
function add_last_nav_item($items) {
	$items .= '<li><a class="modal-link" data-page="sign-in" data-toggle="modal" data-target="#sign-in-modal" data-remote="'.get_bloginfo('template_url').'/snippets/modals/sign-in.html">Sign In</a></li>';
	$items .= '<li class="nav-searchform"><form role="search" method="get" id="nav-searchform" class="form-inline" action="'. home_url( '/' ) .'"><label class="sr-only" for="s">Search for:</label><input type="text" value="" name="s" id="s" class="form-control" placeholder="Search"/></form></li>';
	return $items .= '<li id="search-trigger" class="hidden-xs"><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>';
}

//Send Yoast to the bottom
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
function yoasttobottom() {
  return 'low';
}

//Add TinyMCI Editor Options
add_theme_support( 'editor_style' );
add_action( 'init', 'yq_editor_options' );
function yq_editor_options() {
    add_editor_style('css/editor-style.css');
}

// Shortcodes ////////////////////////////////////////////////////////
// Shortcodes - Bootstrap /////////////////////////////////////
// Bootstrap row
add_shortcode( 'row', 'bootstrap_row' );
function bootstrap_row( $atts, $content = null ) {
  return '<div class="row">'. do_shortcode($content) . '</div>';
}

// half_col column
add_shortcode( 'half_col', 'bootstrap_half_col' );
function bootstrap_half_col( $atts, $content = null ) {
  return '<div class="col-sm-6">'. do_shortcode($content) . '</div>';
}

// two_third_col column
add_shortcode( 'two_third_col', 'bootstrap_two_third_col' );
function bootstrap_two_third_col( $atts, $content = null ) {
  return '<div class="col-sm-8">'. do_shortcode($content) . '</div>';
}

// one_third column
add_shortcode( 'one_third_col', 'bootstrap_one_third_col' );
function bootstrap_one_third_col( $atts, $content = null ) {
  return '<div class="col-sm-4">'. do_shortcode($content) . '</div>';
}

// quarter_width column
add_shortcode( 'quarter_col', 'bootstrap_quarter_col' );
function bootstrap_quarter_col( $atts, $content = null ) {
  return '<div class="col-sm-3">'. do_shortcode($content) . '</div>';
}

// Bootstrap lead paragraph
add_shortcode( 'lead', 'bootstrap_lead_paragraph' );
function bootstrap_lead_paragraph( $atts, $content = null ) {
  return '<p class="lead">'. do_shortcode($content) . '</p>';
}

// Light Green span
add_shortcode( 'light_green', 'yq_light_green_span' );
function yq_light_green_span( $atts, $content = null ) {
  return '<span class="light-green">'. do_shortcode($content) . '</span>';
}

// FAQ Shortcode
add_shortcode('get_faqs', 'yq_get_faqs');
function yq_get_faqs(){        
  ob_start();
  include('snippets/faqs.php');
  $return = ob_get_contents();  
  ob_end_clean();  
  return $return;    
}

// Team Shortcode
add_shortcode('get_the_team', 'yq_get_the_team');
function yq_get_the_team(){
  ob_start();  
  include('snippets/team-members.php'); 
  $return = ob_get_contents();  
  ob_end_clean();  
  return $return;
}

// ROI Calculator Shortcode
add_shortcode('roi_calculator', 'yq_roi_calculator');
function yq_roi_calculator(){
  ob_start();
  include('snippets/roi-calculator-shortcode.php'); 
  $return = ob_get_contents();  
  ob_end_clean();  
  return $return;
}

// Media Box Shortcode
//[media_box link="" title="" description=""]
add_shortcode('media_box', 'yq_media_box');
function yq_media_box($atts){
  $args = shortcode_atts(array(
    'link' => '.pdf',
    'title' => ' ',
    'description' => ' '
    ), $atts);
  $extension = pathinfo($args['link'], PATHINFO_EXTENSION); // Get the extension type
  $return = '<a href="'.$args['link'].'" target="_blank" class="media-box-link">'; // Create the link
  $return .= '<div class="col-sm-6 media-box">';
  $return .= '<div class="col-sm-8 media-box-content">';  // Wrap the text
  $return .= '<h3>'.$args['title'].'</h3>';
  $return .= '<p>'.$args['description'].'</p>';
  $return .= '</div><div class="col-sm-4 media-box-icon" style="background: url('.get_template_directory_uri().'/images/icons/'.$extension.'-icon.svg) top center no-repeat"></div></div></a>';
  return $return;
}

// Masonry Wrapper
//[masonry]Content[/masonry]
add_shortcode( 'masonry', 'yq_masonry_wrapper' );
function yq_masonry_wrapper( $atts, $content = null ) {
  return '<div class="masonry-container">'. do_shortcode($content) . '</div><!-- close #masonry-container-->';
}

// Call to Action Phone Number Button
add_shortcode('phone_button', 'yq_phone_button');
function yq_phone_button($atts){
  $args = shortcode_atts(array(
    'top' => false), $atts);
  $class = ($args['top']) ? 'btn-top-banner' : 'btn-primary btn-lg';
  $phoneNumber = get_post_meta( get_page_by_title('Contact')->ID, 'contact_phone_number', true );
  return "<button class='btn ${class}'>${phoneNumber}</button>";
}

// Call to Action Email Button
add_shortcode('email_button', 'yq_email_button');
function yq_email_button($atts){
  $args = shortcode_atts(array(
    'top' => false), $atts);
  $class = ($args['top']) ? 'btn-top-banner' : 'btn-primary btn-lg';
  $email = get_post_meta( get_page_by_title('Contact')->ID, 'contact_email', true );
  return "<a href='mailto:${email}' class='btn ${class}'>Email</a>";
}

// Contact Form
add_shortcode('contact_form', 'yq_contact_form');
function yq_contact_form(){
  ob_start();  
  include('snippets/contact-form.php'); 
  $return = ob_get_contents();  
  ob_end_clean();  
  return $return;
}

// Start Custom Post Types //////////////////////////////////////////////
// FAQ Custom Posts
add_action( 'init', 'faq_custom_type' );
function faq_custom_type() {
  $labels = array(
    'name'               => 'FAQs',
    'singular_name'      => 'FAQ',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New FAQ',
    'edit_item'          => 'Edit FAQ',
    'new_item'           => 'New FAQ',
    'all_items'          => 'All FAQs',
    'view_item'          => 'View FAQs',
    'search_items'       => 'Search FAQs',
    'not_found'          => 'No FAQs found',
    'not_found_in_trash' => 'No FAQs found in the Trash',
    'menu_name'          => 'FAQs'
  );
  $args = array(
    'labels'        => $labels,
    'public'        => true,
    'menu_position' => 9,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
    //'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
    'query_var' => true,
    'has_archive'   => true
  );
  register_post_type( 'faqs', $args ); 
}

// Team Member Custom Posts
add_action( 'init', 'team_members_custom_type' );
function team_members_custom_type() {
  $labels = array(
    'name'               => 'Team members',
    'singular_name'      => 'Team member',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Team member',
    'edit_item'          => 'Edit Team member',
    'new_item'           => 'New Team member',
    'all_items'          => 'All Team members',
    'view_item'          => 'View Team member',
    'search_items'       => 'Search Team members',
    'not_found'          => 'No Team members found',
    'not_found_in_trash' => 'No Team members found in the Trash',
    'menu_name'          => 'Team members'
  );
  $args = array(
    'labels'        => $labels,
    'public'        => true,
    'menu_position' => 7,
    'supports'      => array( 'title', 'thumbnail', 'page-attributes' ),
    //'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
    'exclude_from_search' => true,
    'query_var' => true,
    'register_meta_box_cb' => 'team_members_meta_boxes',
    'has_archive'   => true
  );
  register_post_type( 'team_members', $args ); 
}
function team_members_meta_boxes() {
	custom_post_add_metabox('team_member','Team Member');
}

// Testimonial Custom Posts
add_action( 'init', 'testimonials_custom_type' );
function testimonials_custom_type() {
  $labels = array(
    'name'               => 'Testimonials',
    'singular_name'      => 'Testimonial',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Testimonial',
    'edit_item'          => 'Edit Testimonial',
    'new_item'           => 'New Testimonial',
    'all_items'          => 'All Testimonials',
    'view_item'          => 'View Testimonial',
    'search_items'       => 'Search Testimonials',
    'not_found'          => 'No Testimonials found',
    'not_found_in_trash' => 'No Testimonials found in the Trash',
    'menu_name'          => 'Testimonials'
  );
  $args = array(
    'labels'        => $labels,
    'public'        => true,
    'menu_position' => 8,
    'supports'      => array( 'title', 'thumbnail', 'page-attributes' ),
    //'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
    'exclude_from_search' => true,
    'query_var' => true,
    'register_meta_box_cb' => 'testimonials_meta_boxes',
    'has_archive'   => true
  );
  register_post_type( 'testimonials', $args ); 
}
function testimonials_meta_boxes() {
	custom_post_add_metabox('testimonial','Testimonial');
}

// Value Props Custom Posts
add_action( 'init', 'value_props_custom_type' );
function value_props_custom_type() {
  $labels = array(
    'name'               => 'Value Props',
    'singular_name'      => 'Value Prop',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Value Prop',
    'edit_item'          => 'Edit Value Prop',
    'new_item'           => 'New Value Prop',
    'all_items'          => 'All Value Props',
    'view_item'          => 'View Value Prop',
    'search_items'       => 'Search Value Props',
    'not_found'          => 'No Value Props found',
    'not_found_in_trash' => 'No Value Props found in the Trash',
    'menu_name'          => 'Value Props'
  );
  $args = array(
    'labels'        => $labels,
    'public'        => true,
    'menu_position' => 6,
    'supports'      => array( 'title', 'thumbnail', 'page-attributes' ),
    //'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
    'exclude_from_search' => true,
    'query_var' => true,
    'register_meta_box_cb' => 'value_props_meta_boxes',
    'has_archive'   => true
  );
  register_post_type( 'value_props', $args ); 
}
function value_props_meta_boxes() {
	custom_post_add_metabox('value_prop','Value Prop');
}


// Custom Post Saving functions /////////////////////////////////////
// Add Meta boxes to the custom post edit page
// Arguments take singular name: First with underscore, Second without
// Use: custom_post_add_metabox('team_member','Team Member'); 
function custom_post_add_metabox($metaSlug, $customTypeName){
	add_meta_box($metaSlug.'_meta_box', $customTypeName, 'custom_post_meta_box_view', $metaSlug.'s', 'advanced', 'default', array('metaSlug'=>$metaSlug));
}

// Format the Meta Boxes
function custom_post_meta_box_view($post, $metaSlug) {
	global $post;
	$metaSlug = $metaSlug['args']['metaSlug'];
  // Noncename needed to verify where the data originated
  echo '<div class="'.$metaSlug.'_meta_box"><input type="hidden" name="'.$metaSlug.'_meta_noncename" id="'.$metaSlug.'_meta_noncename" value="' .wp_create_nonce( plugin_basename(__FILE__) ) . '" />';  
  include('snippets/metaboxes/'.$metaSlug.'.php');
  echo '</div>';
}

// Save the Metabox Data
add_action('save_post', 'yq_save_meta_boxes', 1, 2); // save the custom fields
function yq_save_meta_boxes($post_id, $post) {
	// verify this came from the our screen and with proper authorization because save_post can be triggered at other times
  //if ( !wp_verify_nonce( $_POST['team_members_meta_noncename'], plugin_basename(__FILE__) )) { return $post->ID; }

  if ( !current_user_can( 'edit_post', $post->ID )) return $post->ID;   // Authenticate user

  // Check for Meta Value
	if (isset($_POST['team_member_name_title'])) {
	  $custom_type_meta_values['team_member_name_title'] = $_POST['team_member_name_title'];
	}
	if (isset($_POST['testimonial_name_title'])) {
	  $custom_type_meta_values['testimonial_name_title'] = $_POST['testimonial_name_title'];
	}
	if (isset($_POST['value_prop_position'])) {
	  $custom_type_meta_values['value_prop_position'] = $_POST['value_prop_position'];
	}
	if (isset($_POST['value_prop_featured'])) {
	  $custom_type_meta_values['value_prop_featured'] = $_POST['value_prop_featured'];
	} else {
		update_post_meta( $post_id, 'value_prop_featured', 0 ); // save unchecked check-boxes
	}
	if (isset($_POST['value_prop_graphic'])) {
	  $custom_type_meta_values['value_prop_graphic'] = $_POST['value_prop_graphic'];
	}

	// Finally ready to save the data
	if (isset($custom_type_meta_values)) {
		foreach ($custom_type_meta_values as $key => $value) {
	    if( $post->post_type == 'revision' ) return; // Don't store custom data twice
	    $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
	    if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
	      update_post_meta($post->ID, $key, $value);
	    } else { // If the custom field doesn't have a value
	      add_post_meta($post->ID, $key, $value);
	    }
	    if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	  }
	}
}


// Meta Check box for Pages ////////////////////////////
add_action( 'add_meta_boxes', 'yq_page_meta_checkboxes' );
function yq_page_meta_checkboxes() {
	add_meta_box('page_options_section_id', 'Youneeq Meta Sections', 'yq_page_meta_checkboxes_formatting', 'page', 'normal');
}

// Format the Page Meta Section Check Boxes
function yq_page_meta_checkboxes_formatting( $post ) {
  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'page_options_meta_box', 'page_options_meta_box_nonce' );

  // Get value from the database and use it for the form.
  $value = get_post_meta( $post->ID); ?>

  <p class="meta-box-title">Choose which sections will appear on the page:</p>
  <label class="page-meta-checkboxes"><input type="checkbox" name="page_elements[]" <? if (1==$value['roi_calculator'][0]) {echo "checked";}?>  value="roi_calculator">ROI Calculator</label>
  <label class="page-meta-checkboxes"><input type="checkbox" name="page_elements[]" <? if (1==$value['call_to_action'][0]) {echo "checked";}?>  value="call_to_action">Call to Action Section</label>
  <label class="page-meta-checkboxes"><input type="checkbox" name="page_elements[]" <? if (1==$value['testimonials'][0]) {echo "checked";}?>  value="testimonials">Testimonials</label>
  <input type="checkbox" style="display:none" checked name="page_elements[]"  value="other">

  <? // Open up PHP again
}

add_action('admin_head', 'yq_show_hide_page_meta_options');
function yq_show_hide_page_meta_options() {
  global $current_screen;
  if('page' != $current_screen->id) return;

  echo <<<HTML
    <script type="text/javascript">
    jQuery(document).ready( function($) {

      //Adjust visibility of the meta box at startup
      toggle_page_options_meta_box($('#page_template').val());

      // Live adjustment of the meta box visibility
      $('#page_template').live('change', function(){
        toggle_page_options_meta_box($(this).val());
      });

      function toggle_page_options_meta_box(switchCase) {
        switch(switchCase) {
          case 'page-landing.php':
            $('#page_options_section_id').show();
          break;
          case 'page-tree.php':
            $('#page_options_section_id').show();
          break;
          case 'page-top-feature.php':
            $('#page_options_section_id').show();
          break;
          case 'page-tabs.php':
            $('#page_options_section_id').show();
          break;
          default:
            $('#page_options_section_id').hide();
        }
      }                 
    });    
    </script>
HTML;
}

// Save Page Meta Section Check Box Data
add_action( 'save_post', 'yq_page_meta_checkboxes_save_data' );
function yq_page_meta_checkboxes_save_data( $post_id ) {
  // Check if our nonce is set.
  if ( !isset( $_POST['page_options_meta_box_nonce'] ) ) { return; }
  // Verify that the nonce is valid.
  if ( !wp_verify_nonce( $_POST['page_options_meta_box_nonce'], 'page_options_meta_box' ) ) { return; }
  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
  // Check the user's permissions.
  if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
	    if ( !current_user_can( 'edit_page', $post_id ) ) { return; }
  } else {
	    if ( !current_user_can( 'edit_post', $post_id ) ) { return; }
  }
  // Make sure that it is set.
  if ( !isset( $_POST['page_elements'] ) ) { return; }

	// Sanitize user input.
  $my_data = $_POST['page_elements'];

  $kill_array = array(
                  0 => "roi_calculator",
                  1 => "call_to_action",
                  2 => "testimonials"                  
  );

  $X = count($kill_array);
  for($i=0; $i < $X; $i++) {
    // Update the meta field in the database.
    update_post_meta( $post_id, $kill_array[$i],  0 );
  }

  $N = count($my_data);
  for($i=0; $i < $N; $i++) {
    // Update the meta field in the database.
    update_post_meta( $post_id, $my_data[$i],  1 );
  }
}

// Contact Information Meta Box /////////////////////
add_action('add_meta_boxes', 'yq_contact_info_meta_box');
function yq_contact_info_meta_box() {
  global $post;
  if ( $post->ID == get_page_by_title('Contact')->ID) {
    add_meta_box('contact_information_meta_box', 'Youneeq Contact Information', 'yq_contact_meta_box_formatting', 'page', 'normal');
  }
}

// Format the Contact Information Meta Box
function yq_contact_meta_box_formatting($post){
  // Add an nonce field so we can check for it later.
  wp_nonce_field('contact_information_meta_box', 'contact_information_meta_box_nonce');

  // Get value from the database and use it for the form.
  $value = get_post_meta( $post->ID); ?>

  <div class="meta-inline">
    <p class="meta-box-title">Phone Number:</p>
    <input type="text" class="meta-box-input" name="contact_phone_number" value="<?php echo get_post_meta( $post->ID, 'contact_phone_number', true ) ?>" />
  </div>
  <div class="meta-inline">
    <p class="meta-box-title">Email Address:</p>
    <input type="text" class="meta-box-input" name="contact_email" value="<?php echo get_post_meta( $post->ID, 'contact_email', true ) ?>" />
  </div>
  <div style="clear:both"></div>
  <p class="meta-box-title">Mailing Address:</p>
  <textarea class="meta-box-textarea" name="contact_address" id="contact_address" style="height:80px"><?php echo get_post_meta( $post->ID, 'contact_address', true ) ?></textarea>

  <?  // Open up PHP again 
}

// Save Contact Information Meta Box
add_action('save_post', 'yq_contact_info_meta_box_save_data');
function yq_contact_info_meta_box_save_data($post_id) {
  global $post;
  // Check if our nonce is set.
  if ( !isset( $_POST['contact_information_meta_box_nonce'] ) ) { return; }
  // Verify that the nonce is valid.
  if ( !wp_verify_nonce( $_POST['contact_information_meta_box_nonce'], 'contact_information_meta_box' ) ) { return; }
  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }

  if ( !current_user_can( 'edit_post', $post->ID )) return $post->ID;   // Authenticate user

  // Check for Meta Value
  if (isset($_POST['contact_phone_number'])) {
    $custom_type_meta_values['contact_phone_number'] = $_POST['contact_phone_number'];
  }
  if (isset($_POST['contact_email'])) {
    $custom_type_meta_values['contact_email'] = $_POST['contact_email'];
  }
  if (isset($_POST['contact_address'])) {
    $custom_type_meta_values['contact_address'] = $_POST['contact_address'];
  }

  // Finally ready to save the data
  if (isset($custom_type_meta_values)) {
    foreach ($custom_type_meta_values as $key => $value) {
      if( $post->post_type == 'revision' ) return; // Don't store custom data twice
      $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
      if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
        update_post_meta($post->ID, $key, $value);
      } else { // If the custom field doesn't have a value
        add_post_meta($post->ID, $key, $value);
      }
      if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
  }

}

// Load scripts ////////////////////////////////////
add_action('wp_enqueue_scripts','yq_scripts_init');
function yq_scripts_init() {
	wp_enqueue_script( 'jquery' );

  wp_register_script( 'ekko-lightbox', get_template_directory_uri() . '/js/ekko-lightbox.min.js', array( 'jquery' ), false, true);
  wp_enqueue_script( 'ekko-lightbox' );

  wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), false, true);
  wp_enqueue_script( 'bootstrap' );

  wp_register_script( 'masonry', get_template_directory_uri() . '/js/masonry.min.js', array( 'jquery' ), false, true);
  wp_enqueue_script( 'masonry' );

  wp_register_script( 'inview', get_template_directory_uri() . '/js/effects.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'inview' );

  wp_register_script( 'roicalc',  get_template_directory_uri() .  '/js/roicalc.js', array( 'jquery', 'inview' ), false, true );
  wp_enqueue_script( 'roicalc' );

  wp_register_script( 'modernizr', get_template_directory_uri() . '/js/webshim/modernizr-custom.js', array( 'jquery') );
  wp_enqueue_script( 'modernizr' );

  wp_register_script( 'webshim', get_template_directory_uri() . '/js/webshim/polyfiller.js', array( 'jquery', 'modernizr' ) );
  wp_enqueue_script( 'webshim' );

  wp_register_script( 'yq_scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), false, true);
  wp_enqueue_script('yq_scripts');

  wp_localize_script('yq_scripts', 'yq_scripts_vars', array(
      'template_path' => get_bloginfo('template_directory')
    )
  );
}

