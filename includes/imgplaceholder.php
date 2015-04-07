<?php
function my_filter_missing_uploaded_image_placeholder( $url, $args ) {
    $attachment = get_post( $args['attachment_id'] );
    $tags = join( ' ', array(
        $attachment->post_title,
        $attachment->post_excerpt,
        $attachment->post_content,
        $attachment->_wp_attachment_image_alt
    ) );
    $tags = strtolower( preg_replace( '#[^A-Za-z0-9]+#', ',', $tags ) );
    $tags = trim( $tags, ',' );
    $url = sprintf( 'http://placehold.it/%dx%d&text=%s', $args['width'], $args['height'], $tags );
    return $url;
}
add_filter( 'missing_uploaded_image_placeholder', 'my_filter_missing_uploaded_image_placeholder', 10, 2 );
