<?php
/**
 * The moms embroidery functions and definitions 
 */
// Register custom navigation walker
require_once('inc/wp_bootstrap_navwalker.php');
if ( ! function_exists( 'themomsembroidery_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own themomsembroidery_setup() function to override in a child theme.
 *
 * @since The Moms Embroidery 1.0
 */
function themomsembroidery_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	 	 
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'post-thumbnails', 750, 400, true );
	
	
    add_image_size( 'thumb-home', 230, 140, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Main Menu', 'themomsembroidery' ),
		'footer'  => __( 'Footer Menu', 'themomsembroidery' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	
}
endif; // themomsembroidery_setup
add_action( 'after_setup_theme', 'themomsembroidery_setup' );


/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since The Moms Embroidery 1.0
 */
function themomsembroidery_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'themomsembroidery' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'themomsembroidery' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => __( 'Footer widgets', 'themomsembroidery' ),
		'id'            => 'footerwidgets',
		'description'   => __( 'Add widgets here to appear in your Footer.', 'themomsembroidery' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'themomsembroidery_widgets_init' );

/**
 * Enqueues scripts and styles.
 *
 * @since The Moms Embroidery 1.0
 */
function themomsembroidery_scripts() {
	// Theme stylesheet.
	wp_enqueue_style( 'themomsembroidery-style', get_stylesheet_uri() );
    
    //bootstrap css
	wp_enqueue_style( 'themomsembroidery-bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.css', array( 'themomsembroidery-style' ), '20150930' );
	
	// Load the bootstrap js.
	wp_enqueue_script( 'themomsembroidery-bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '3.7.3' );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'themomsembroidery_scripts' );

if ( ! function_exists( 'themomsembroidery_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * Create your own themomsembroidery_entry_meta() function to override in a child theme.
 *
 * @since The Moms Embroidery 1.0
 */
function themomsembroidery_entry_meta() {
	if ( 'post' === get_post_type() ) {
		$author_avatar_size = apply_filters( 'themomsembroidery_author_avatar_size', 49 );
		printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
			get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
			_x( 'Author', 'Used before post author name.', 'themomsembroidery' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		themomsembroidery_entry_date();
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'themomsembroidery' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( 'post' === get_post_type() ) {
		themomsembroidery_entry_taxonomies();
	}

	if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'themomsembroidery' ), get_the_title() ) );
		echo '</span>';
	}
}
endif;
if ( ! function_exists( 'themomsembroidery_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own themomsembroidery_entry_date() function to override in a child theme.
 *
 * @since The Moms Embroidery 1.0
 */
function themomsembroidery_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		_x( 'Posted on', 'Used before publish date.', 'themomsembroidery' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

if ( ! function_exists( 'themomsembroidery_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own themomsembroidery_entry_taxonomies() function to override in a child theme.
 *
 * @since The Moms Embroidery 1.0
 */
function themomsembroidery_entry_taxonomies() {
	$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'themomsembroidery' ) );
	if ( $categories_list && themomsembroidery_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Categories', 'Used before category names.', 'themomsembroidery' ),
			$categories_list
		);
	}

	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'themomsembroidery' ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'themomsembroidery' ),
			$tags_list
		);
	}
}
endif;
function themomsembroidery_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'themomsembroidery_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'themomsembroidery_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so themomsembroidery_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so themomsembroidery_categorized_blog should return false.
		return false;
	}
}