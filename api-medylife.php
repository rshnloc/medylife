<?php 
header("Access-Control-Allow-Origin: *");
// Cache headers
header("Expires: ".gmdate("D, d M Y H:i:s", time()+315360000)." GMT");
header("Cache-Control: max-age=315360000");
// Check if zlib is not forced, to avoid conflicts with gzip compression
if (extension_loaded('zlib') && ini_get("zlib.output_compression") == 0 && ini_get('output_handler') != 'ob_gzhandler' && !headers_sent()) {
// Check if the browser can accept gunzipped content
if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
{
  ob_end_clean();
  ob_start('ob_gzhandler');
}
}
// headers to tell that result is JSON
header('Content-type: application/json');

function get_the_twitter_excerpt(){
	$excerpt = get_the_content();
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$the_str = mb_substr($excerpt, 0, 120);
	return $the_str.' ';
}

define('WP_USE_THEMES', false);
include('wp-load.php');
/* Function to call blog posts over main site by Romil Sarna */
if($_GET['action']=='ajax-blog-post'){
	$posts =array();
	$data = array();	
    $result = array();
	// The Loop
	
	if(isset($_GET['type']) && $_GET['type'] == 'post'){
	$args = array('post_type' => 'scroller',  'posts_per_page' => 10 );
	$scroller = array();
	$loop = new WP_Query( $args );
	if($loop->have_posts()):
	while ( $loop->have_posts() ) : $loop->the_post();
	                   
	    $scroller[] = array(
		   'blog_url' => get_bloginfo('url'),
		   'post_type' => 'Scroller',
		   'post_link' =>  '',
		   'title'=> get_the_title(),
		   'excerpt' => get_the_content(),
		   'img_url' => ''
		   
		);
	endwhile;
	endif;	
 	  $result['scroller'] = $scroller;		
		
		
	$args = array('post_type' => 'beauty',  'posts_per_page' => 1 , 
            'order' => 'DESC','meta_query' => array(
			'relation' => 'OR',
			array(
				'key'     => '_medy_featured_post',
				'compare' => 'NOT EXISTS',
			),
			array(
				'key'     => '_medy_featured_post',
				'value'   => 'on',
				'compare' => '=',
			),
			
	),'orderby' => array( 'meta_value' => 'DESC', 'date' => 'DESC' ));
	
	$loop = new WP_Query( $args );
	if($loop->have_posts()):
	while ( $loop->have_posts() ) : $loop->the_post();
	                  $thumb_id   = get_post_thumbnail_id(); //get img ID
					  if($thumb_id){
						$img_url  = wp_get_attachment_image_src($thumb_id, 'home_thumb');
						$alt_text = get_post_meta($thumb_id , '_wp_attachment_image_alt', true); 
						$img_url  = $img_url[0];
if($img_url  ==""){
$img_url = get_bloginfo('template_url').'/images/def_250.jpg';	
}

					  }else{ 
					    $img_url = get_bloginfo('template_url').'/images/def_250.jpg';					  
					  }
	    $posts['beauty'] = array(
		   'blog_url' => get_bloginfo('url'),
		   'post_type' => 'Beauty',
		   'post_link' =>  get_the_permalink($post->ID),
		   'title'=> get_the_title(),
		   'excerpt' => get_the_twitter_excerpt(),
		   'img_url' => str_replace("https://www.medylife.com","//www.medylife.com",$img_url)
		   
		);
	endwhile;
	endif;
	// Reset Query
	wp_reset_query();
	$args = array('post_type' => 'fitness', 'posts_per_page' => 1,
            'order' => 'DESC','meta_query' => array(
			'relation' => 'OR',
			array(
				'key'     => '_medy_featured_post',
				'compare' => 'NOT EXISTS',
			),
			array(
				'key'     => '_medy_featured_post',
				'value'   => 'on',
				'compare' => '=',
			),
			
	),'orderby' => array( 'meta_value' => 'DESC', 'date' => 'DESC' ));
	$loop = new WP_Query( $args );
	if($loop->have_posts()):
	while ( $loop->have_posts() ) : $loop->the_post();	
	$thumb_id   = get_post_thumbnail_id(); //get img ID
					  if($thumb_id){
						$img_url  = wp_get_attachment_image_src($thumb_id, "home_thumb");
						$alt_text = get_post_meta($thumb_id , '_wp_attachment_image_alt', true); 
						$img_url  = $img_url[0];
if($img_url  ==""){
$img_url = get_bloginfo('template_url').'/images/def_250.jpg';	
}

					  }else{ 
					    $img_url = get_bloginfo('template_url').'/images/def_250.jpg';					  
					  }
	
	    $posts['fitness'] = array(
		   'blog_url' => get_bloginfo('url'),
		   'post_type' => 'Fitness',
		   'post_link' =>  get_the_permalink($post->ID),
		   'title'=> get_the_title(),
		   'excerpt' => get_the_twitter_excerpt(),
		   'img_url' => str_replace("https://www.medylife.com","//www.medylife.com",$img_url)
		);
	endwhile;
	endif;
	// Reset Query
	wp_reset_query();
	// The Loop
	$args = array('post_type' => 'health', 'posts_per_page' => 1, 
            'order' => 'DESC','meta_query' => array(
			'relation' => 'OR',
			array(
				'key'     => '_medy_featured_post',
				'compare' => 'NOT EXISTS',
			),
			array(
				'key'     => '_medy_featured_post',
				'value'   => 'on',
				'compare' => '=',
			),
			
	),'orderby' => array( 'meta_value' => 'DESC', 'date' => 'DESC' ));
	$loop = new WP_Query( $args );
	if($loop->have_posts()):
	while ( $loop->have_posts() ) : $loop->the_post();	
	$thumb_id   = get_post_thumbnail_id(); //get img ID
					  if($thumb_id){
						$img_url  = wp_get_attachment_image_src($thumb_id, "home_thumb");
						$alt_text = get_post_meta($thumb_id , '_wp_attachment_image_alt', true); 
						$img_url  = $img_url[0];
if($img_url  ==""){
$img_url = get_bloginfo('template_url').'/images/def_250.jpg';	
}

					  }else{ 
					    $img_url = get_bloginfo('template_url').'/images/def_250.jpg';					  
					  }
	
	    $posts['health'] = array(
		    'blog_url' => get_bloginfo('url'),
		   'post_type' => 'Health',
		   'post_link' =>  get_the_permalink($post->ID),
		   'title'=> get_the_title(),
		   'excerpt' => get_the_twitter_excerpt(),
		   'img_url' => str_replace("https://www.medylife.com","//www.medylife.com",$img_url)
		);
	endwhile;
	endif;
	// Reset Query
	wp_reset_query();
	// The Loop
	$args = array('post_type' => 'parenting', 'posts_per_page' => 1, 
            'order' => 'DESC','meta_query' => array(
			'relation' => 'OR',
			array(
				'key'     => '_medy_featured_post',
				'compare' => 'NOT EXISTS',
			),
			array(
				'key'     => '_medy_featured_post',
				'value'   => 'on',
				'compare' => '=',
			),
			
	),'orderby' => array( 'meta_value' => 'DESC', 'date' => 'DESC' ));
	$loop = new WP_Query( $args );
	if($loop->have_posts()):
	while ( $loop->have_posts() ) : $loop->the_post();
	$thumb_id   = get_post_thumbnail_id(); //get img ID
					  if($thumb_id){
						$img_url  = wp_get_attachment_image_src($thumb_id, "home_thumb");
						$alt_text = get_post_meta($thumb_id , '_wp_attachment_image_alt', true); 
						$img_url  = $img_url[0];
if($img_url  ==""){
$img_url = get_bloginfo('template_url').'/images/def_250.jpg';	
}

					  }else{ 
					    $img_url = get_bloginfo('template_url').'/images/def_250.jpg';					  
					  }
	
	    $posts['parenting'] = array(
		   'blog_url' => get_bloginfo('url'),
		   'post_type' => 'Parenting',
		   'post_link' =>  get_the_permalink($post->ID),
		   'title'=> get_the_title(),
		   'excerpt' => get_the_twitter_excerpt(),
		   'img_url' => str_replace("https://www.medylife.com","//www.medylife.com",$img_url)
		);
	endwhile;
	endif;
	// Reset Query
	wp_reset_query();
	$result['ok'] = true;
	$result['good-reads'] =  $posts;	
	// The Loop
	$trending = array();
	$args = array('post_type' => 'trending', 'posts_per_page' => 5 );
	$loop = new WP_Query( $args );
	if($loop->have_posts()):
	while ( $loop->have_posts() ) : $loop->the_post();
	$thumb_id   = get_post_thumbnail_id(); //get img ID
					  if($thumb_id){
						$img_url  = wp_get_attachment_image_src($thumb_id, "home_thumb");
						$alt_text = get_post_meta($thumb_id , '_wp_attachment_image_alt', true); 
						$img_url  = $img_url[0];
if($img_url  ==""){
$img_url = get_bloginfo('template_url').'/images/def_250.jpg';	
}

					  }else{ 
					    $img_url = get_bloginfo('template_url').'/images/def_250.jpg';					  
					  }
	
	    $trending[] = array(
		   'post_link' =>  get_the_permalink($post->ID),
		   'title'=> get_the_title(),
		   'excerpt' => get_the_twitter_excerpt(),
		   'img_url' => str_replace("https://www.medylife.com","//www.medylife.com",$img_url)
		);
	endwhile;
	endif;
	$result['trending'] =  $trending;
	}
	
	
	if(isset($_GET['type']) && $_GET['type'] == 'advisory-board'){
		// The Loop
		$advisoryBoard = array();
		$args = array('post_type' => 'advisory-board', 'posts_per_page' => 100, 'orderby'=>'ID', 'order'=>'ASC' );
		$loop = new WP_Query( $args );
		if($loop->have_posts()):
		while ( $loop->have_posts() ) : $loop->the_post();
		$thumb_id   = get_post_thumbnail_id(); //get img ID
						
					if($thumb_id){
					  $img_url  = wp_get_attachment_image_src($thumb_id, "thumbnail");
					  $alt_text = get_post_meta($thumb_id , '_wp_attachment_image_alt', true); 
					  $img_url  = $img_url[0];
					}else{ 
					  $img_url = get_bloginfo('template_url').'/images/def_250.jpg';					  
					}
		
			$advisoryBoard[] = array(
			   'post_link' =>  get_the_permalink($post->ID),
			   'title'=> get_the_title(),
			   'designation' => get_post_meta( $post->ID, 'designation', true ),
			   'excerpt' => get_the_content(),
			   'img_url' => str_replace("https://www.medylife.com","//www.medylife.com",$img_url)
			);
		endwhile;
		endif;
		$result['advisory-board'] =  $advisoryBoard;
	}
	
	if(isset($_GET['type']) && $_GET['type'] == 'emergency'){
	$re = array();
	if(isset($_GET['name']) && $_GET['name'] != ''){	
	$args = array(
		  'name'        => $_GET['name'],
		  'post_type'   => $_GET['type'],
		  'post_status' => 'publish',
		  'numberposts' => 1
		);
		$my_posts = get_posts($args);
		
		if( $my_posts ):
		 $re['status'] =true; 
		// setup_postdata($post)
		 $re['id']= $my_posts[0]->ID;
		 $re['title']= $my_posts[0]->post_title;
		 $re['content']= $my_posts[0]->post_content;
		else:
		  $re['status'] =false;
		endif;
	}else{$re['status'] =false;}
	   $result['emergency'] =  $re;
	}
	echo json_encode($result);
}
/*echo '<pre>';
var_dump($result);
echo '</pre>';*/
?>