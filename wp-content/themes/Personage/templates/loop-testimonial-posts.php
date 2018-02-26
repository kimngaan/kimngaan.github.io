<?php
//Build post query
$queryArgs = array(
	'post_type'      => 'testimonial',
	'posts_per_page' => -1
);

$query = new WP_Query($queryArgs);

if ( $query->have_posts() ){
	while ($query->have_posts()) { 
		
		$query->the_post();
		$id = get_the_ID();
        $image = get_post_meta($id, 'testimonial-item-image', true);
		$title = get_post_meta($id, 'testimonial-item-title', true);
		$subtitle = get_post_meta($id, 'testimonial-item-subtitle', true);
		$description = get_post_meta($id, 'testimonial-item-description', true);
		?>

        <div class="description">
            <p class="text"><?php echo $description ?></p>
            <span class="talker"><?php echo $title ?> / <?php echo $subtitle ?></span>
        </div>

<?php }}
wp_reset_query();
?>