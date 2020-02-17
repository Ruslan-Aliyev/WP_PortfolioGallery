<?php
// Add custom Theme Functions here

function render_layout($layout, $displayData = array())
{
	$layout = str_replace('.', '/', $layout);
	$layout = __DIR__."/layouts/".$layout.".php";

	include($layout);
}

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 
// Creating the widget 
class wpb_widget extends WP_Widget 
{
	function __construct() 
	{
		parent::__construct(
			 
			// Base ID of your widget
			'wpb_widget', 
			 
			// Widget name will appear in UI
			__('Works Widget', 'wpb_widget_domain'), 
			 
			// Widget description
			array(
				'description' => __('Work Posts Widget', 'wpb_widget_domain'),
			) 
		);
	}
	 
	// Creating widget frontend
	public function widget($args, $instance) 
	{
		$title = apply_filters('widget_title', $instance['title']);
	 
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		if (!empty($title))
		{
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// This is where you run the code and display the output
		echo __( 'See also', 'wpb_widget_domain' );

		echo $args['after_widget'];

		$this->makeWidgetContent();
	}

	protected function makeWidgetContent()
	{
	    global $wp_query;

	    //$postId = $wp_query->queried_object->ID;
		$postId = get_the_ID();

		if (empty($postId))
		{
			return;
		}

		$postCats   = get_the_terms($postId, 'category');
		$postCatIds = array();

		foreach ($postCats as $postCat)
		{
			$postCatIds[] = array(
				'taxonomy' => 'category',
				'field'    => 'term_id',
				'terms'    => $postCat->term_id
			);
		}

		$postCatIds['relation'] = 'OR';

	    $args = array(
	    	'post_type'      => 'post',
	    	'posts_per_page' => 5,
			'tax_query'      => $postCatIds
	    );

	    $wp_query = new WP_Query($args);

	    if ($wp_query->have_posts())
	    {
	    	while($wp_query->have_posts())
	    	{
	    		$wp_query->the_post();

		        $displayData = array(
		            'link'         => get_the_permalink(),
		            'img_url'      => get_the_post_thumbnail_url(),
		            'category'     => get_the_terms($wp_query->ID, 'category'),
		            'title'        => get_the_title(),
		            'varying_info' => array(
		                'author'  => get_the_author(),
		                'created' => get_the_date()
		            )
		        );

				echo render_layout('work.post', $displayData);
	    	}
	    }

	    wp_reset_postdata();
	}
         
	// Widget Backend 
	public function form($instance) 
	{
		if (isset($instance['title'])) 
		{
			$title = $instance['title'];
		}
		else 
		{
			$title = __('Works', 'wpb_widget_domain');
		}

		// Widget admin form
		$fieldId   = $this->get_field_id('title');
		$fieldName = $this->get_field_name('title');
		
		?>

		<p>
			<label for="<?php echo $fieldId; ?>"><?php _e('Title:'); ?></label> 
			<input class="widefat" id="<?php echo $fieldId; ?>" name="<?php echo $fieldName; ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

		<?php 
	}
	     
	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance) 
	{
		$instance          = array();
		$instance['title'] = !empty($new_instance['title'])
						   ? strip_tags($new_instance['title'])
						   : '';
		
		return $instance;
	}

}

// Creating the widget area
function customWidgetInit()
{
    register_sidebar(
        array(
            'name' => 'Works Sidebar',
            'id'   => 'works-sidebar'
        )
    );
}
add_action('widgets_init', 'customWidgetInit');
