<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
	$parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
	$theme        = wp_get_theme();
	wp_enqueue_style( $parenthandle,
		get_template_directory_uri() . '/style.css',
		array(),  // If the parent theme code has a dependency, copy it to here.
		$theme->parent()->get( 'Version' )
	);
	wp_enqueue_style( 'child-style',
		get_stylesheet_uri(),
		array( $parenthandle ),
		$theme->get( 'Version' ) // This only works if you have Version defined in the style header.
	);
}

function enqueue_custom_styles(){ 
    wp_enqueue_style('bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome_css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css	');
   // wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() .'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles' );

function enqueue_custom_scripts() {  
    wp_enqueue_script( 'bootstrap_jquery', '//code.jquery.com/jquery-3.2.1.min.js', array(), '3.2.1', true );
    wp_enqueue_script( 'bootstrap_popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', array(), '1.14.7', true );
    wp_enqueue_script( 'bootstrap_javascript', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js', array(), '4.3.1', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_scripts' );

function admin_add_restaurants(){
	global $wpdb;
	$uploadOk = 0;
	$upload_dir = 'C:/xampp/htdocs/Pesto/wp-content/uploads/restaurant_images/';
	if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
    if( isset( $_FILES['restaurant_image']['tmp_name'] ) && $_FILES['restaurant_image']['tmp_name'] != '' ) { 
        $file_tmpname = $_FILES['restaurant_image']['tmp_name'];
        $file_name = $_FILES['restaurant_image']['name'];
        $file_size = $_FILES['restaurant_image']['size'];
        $file_type=$_FILES['restaurant_image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['restaurant_image']['name'])));
      	$add_filepath = $upload_dir.$file_name;
      	print_r($add_filepath);
        $extensions= array("jpeg","jpg","png");
      
	    if(in_array($file_ext,$extensions)=== false){
	        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
	    }
      
      	if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      	}
	      
	    if(empty($errors)==true){
	        move_uploaded_file($file_tmpname,$add_filepath);
	        $uploadOk = 1;
	    }else{
	        print_r($errors);
	    }
    }

	if($uploadOk == 1){
		$data = array(
				'restaurant_name'=>$_POST['restaurant_name'],
				'restaurant_image_path'=>$file_name,
				'restaurants_rating'=>$_POST['restaurants_rating'],
			);
		$table_name = 'wp_add_restaurants';

		$result = $wpdb->insert($table_name, $data, $format = NULL);

		if($result == 1){
			echo '<script>alert("saved")</script>';
			header("Location: http://localhost/pesto/");
		}else{
			echo '<script>alert("not saved")</script>';
		}
	}
	
}

add_action( 'admin_post_add_restaurants', 'admin_add_restaurants' );


function show_all_restaurants(){
	global $wpdb;
	$results = $wpdb->get_results( "SELECT * FROM wp_add_restaurants"); 
	$content = '';	
	if(!empty($results))                        
	{         
		$content .='<div class="bg-white restaurants_block">';
	    foreach($results as $row){  
	    	$content .= '<a href="javascript:void(0)" onClick="detailViewBlock('.$row->id.')"><div class="restaurant_row"><img src="wp-content/uploads/restaurant_images/'.$row->restaurant_image_path.'"><div class="restaurant_details"><p class="res-title">'.$row->restaurant_name.'</p><p>South Indian</p><hr/><div class="restaurant_details_inner"><p><i class="fa fa-star"></i> '.$row->restaurants_rating.'</p><p><i class="fa fa-clock-o" aria-hidden="true"></i> 45mins</p><p><i class="fa fa-money" aria-hidden="true"></i> 199 for two</p></div></div></div></a>';
	    }
	    $content .="</div>";
	}else{
		$content .='<p style="font-size:14px;text-align:center">No restaurants found</p>';
	}

	return $content;
}

add_shortcode('show_all_restaurants', 'show_all_restaurants');

function show_restaurant_detail($id){
	global $wpdb;
	$results = $wpdb->get_results( "SELECT * FROM wp_add_restaurants WHERE id=".$id); 
	print_r($results);
}

function slider_restaurant_banner(){
	$html = '<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 h-200" src="wp-content/uploads/2023/01/16676250879pANxaSeDi.jpeg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-200" src="wp-content/uploads/2023/01/1667625182YPqlCDtcIR.jpeg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-200" src="wp-content/uploads/2023/01/1667625150Qwjol7TSE1.jpeg" alt="Third slide">
    </div>
  </div>
  </a>
</div>';
return $html;
}

add_shortcode('restaurants_banner', 'slider_restaurant_banner'); 