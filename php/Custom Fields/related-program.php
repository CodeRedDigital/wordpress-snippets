<?php
    $relatedPrograms = get_field('related_programs');
    if ($relatedPrograms){
      echo '<hr class="section-break">';
      echo '<h2 class="headline headline--medium">Related Program(s)</h2>';
      echo '<ul class="link-list min-list">';
      foreach($relatedPrograms as $program) { ?>
        <li><a href="<?php the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
      <?php }
      echo '</ul>';
    }
?>