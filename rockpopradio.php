<?php
/*  Copyright 2013 ROCK AND POP RADIO  (email : studio@rockpopradio.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php
/*
Plugin Name: Rock & Pop Radio
Plugin URI: http://rockpopradio.com
Description: Non-stop hits from rockpopradio.com - Rock & Pop Radio! The Webs #1 Hit Radio Station. Streaming to you via the English Lake District.
Author: Sean Duffy
Version: 1.00
Author URI: http://seanduffy.me

*/


// We're putting the plugin's functions inside the init function to ensure the
// required Sidebar Widget functions are available.
  
  function widget_rockpopradio_init() 
	  {
	  /* Your custom code starts here */
	  /* ---------------------------- */
	  
	  /* Your Function */
	  function rockpopradio()
	  {
		  
		  /* Your Code ----------------- */ 
		  
		  echo '<iframe src="http://rockpopradio.com/widget/player/index.html" width="200" height="70" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" /></iframe>';
		  
		  /* End of Your Code ---------- */
		  
	  }
	  
	  /* -------------------------- */
	  /* Your custom code ends here */
	  
	  function widget_rockpopradio($args) 
	  {
	  
	  	  // Collect our widget's options, or define their defaults.
		  $options = get_option('widget_rockpopradio');
		  $title = empty($options['title']) ? __('Rock & Pop Radio') : $options['title'];
			
		  extract($args);
		  echo $before_widget;
		  echo $before_title;
		  echo $title;
		  echo $after_title;
		  rockpopradio();
		  echo $after_widget;
	  }  
	  
	  // This is the function that outputs the form to let users edit
	  // the widget's title. It's an optional feature, but were're doing 
	  // it all for you so why not!
	  
	  function widget_rockpopradio_control()
	  {
	  
		// Collect our widget options.
		$options = $newoptions = get_option('widget_rockpopradio');
		
		// This is for handing the control form submission.
		if ( $_POST['widget_rockpopradio-submit'] ) 
		{
			// Clean up control form submission options
			$newoptions['title'] = strip_tags(stripslashes($_POST['widget_rockpopradio-title']));
		}
				
		// If original widget options do not match control form
		// submission options, update them.
		if ( $options != $newoptions ) 
		{
			$options = $newoptions;
			update_option('widget_rockpopradio', $options);
		}
						
		$title = attribute_escape($options['title']);

		echo '<p><label for="rockpopradio-title">';
		echo 'Title: <input style="width: 250px;" id="widget_rockpopradio-title" name="widget_rockpopradio-title" type="text" value="';
		echo $title;
		echo '" />';
		echo '</label></p>';
		echo '<input type="hidden" id="widget_rockpopradio-submit" name="widget_rockpopradio-submit" value="1" />';
	  }
	  
	  
	// This registers the widget.
    register_sidebar_widget('Rock & Pop Radio', 'widget_rockpopradio');
	
	// This registers the (optional!) widget control form.
    register_widget_control('Rock & Pop Radio', 'widget_rockpopradio_control');
	
  }
    
  add_action('plugins_loaded', 'widget_rockpopradio_init');

?>