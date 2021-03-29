//========================================================================
// This is a Custom Query that displays posts related to the current post
// and filters them by date and limits to 2
// Documentation https://developer.wordpress.org/reference/classes/wp_query/
//========================================================================

<?php
$today = date('Ymd'); // sets a variable called today that we can compare to so old events are filtered out
$relatedEvents = new WP_Query(array( // custom query called relatedEvents with settings in an array
  'posts_per_page' => '2', // how many posts to display
  'post_type' => 'event', // type of post to display this example is using an Event type post
  'meta_key' => 'event_date', // which field of the post type to filter on
  'orderby' => 'meta_value', // what to sort by in this example meta_value refers to a meta_query declared later
  'order' => 'ASC', // sort order ASC ascending DESC descending which is the default
  'meta_query' => array( // this creates a the actual filters. the filters are arrays and you can have multiple filters
    array(
      'key' => 'event_date', // field to filter on
      'compare' => '>=', // logic to use this is greater than or equal to
      'value' => $today, // what to compare with here we are using today
      'type' => 'numeric' // the type of variable being compared
    ),
    array(
      'key' => 'related_programs', // custom field we are comparing
      'compare' => 'LIKE', // how we are comparing LIKE is the same as Contains so does the related_program contain and event with the ID
      'value' => '"' . get_the_id() . '"' // here we get the ID this is wrapped in " (dbl quotes)
    )
  )
));
if ($relatedEvents->have_posts()) { // if there are relatedEvents display them
  echo '<hr class="section-break">';
  echo '<h2 class="headline headline--medium">Upcoming ' . get_the_title() . ' Event(s)</h2>';
  while ($relatedEvents->have_posts()) { // while loop to loop through the related events for each event display the following html
    $relatedEvents->the_post(); ?> 
    <!-- html -->
    <div class="event-summary">
      <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
        <span class="event-summary__month"><?php 
          $eventDate = new DateTime(get_field('event_date'));
          echo $eventDate->format('M')
        ?></span>
        <span class="event-summary__day"><?php 
          $eventDate = new DateTime(get_field('event_date'));
          echo $eventDate->format('d')
        ?></span>
      </a>
      <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <p><?php if (has_excerpt()) {
          echo get_the_excerpt();
        } else {
          echo wp_trim_words(get_the_content(), 15);
        } ?> <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
      </div>
    </div>
<?php }
?>