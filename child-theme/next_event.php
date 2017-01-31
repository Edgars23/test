<?php
global $wpdb;
$results = $wpdb->get_results("SELECT * FROM wp_em_events", ARRAY_A);
?>
<div class="event-pop-up">
    <div class="event-pop-content">
        <div class="close-x"><a class="close-b" href="#">X</a></div>
<?php foreach ( $results as $title ) : ?>
    <?php
    $home_url = get_home_url();
    $link_event = $title['event_slug'];
    $action_link = $home_url .'/'. $link_event . '/';
    $title_event = $title['event_name'];
    $content_event = $title['post_content'];
    $event_start_date = $title['event_start_date'];
    $event_end_date = $title['event_end_date'];
    ?>

        <h2><a href="<?php echo $action_link; ?>"><?php echo $title_event; ?></a></h2>
        <div><span><?php echo $event_start_date; ?></span> - <span><?php echo $event_end_date; ?></span></div>
<?php endforeach; ?>
    </div>
</div>
