<?php
/**
 * @file
 * Default theme implementation to wrap comments.
 *
 * Available variables:
 * - $content: All comments for a given page. Also contains sorting controls
 *   and comment forms if the site is configured for it.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default value has the following:
 *   - comment-wrapper: The current template type, i.e., "theming hook".
 *
 * The following variables are provided for contextual information.
 * - $node: Node object the comments are attached to.
 * The constants below the variables show the possible values and should be
 * used for comparison.
 * - $display_mode
 *   - COMMENT_MODE_FLAT_COLLAPSED
 *   - COMMENT_MODE_FLAT_EXPANDED
 *   - COMMENT_MODE_THREADED_COLLAPSED
 *   - COMMENT_MODE_THREADED_EXPANDED
 * - $display_order
 *   - COMMENT_ORDER_NEWEST_FIRST
 *   - COMMENT_ORDER_OLDEST_FIRST
 * - $comment_controls_state
 *   - COMMENT_CONTROLS_ABOVE
 *   - COMMENT_CONTROLS_BELOW
 *   - COMMENT_CONTROLS_ABOVE_BELOW
 *   - COMMENT_CONTROLS_HIDDEN
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess_comment_wrapper()
 */
?>
<div id="comments" class="<?php print $classes; ?>">
  <?php 
    if ($node->type != 'forum'): 
      $collapsible_content = '<h2 class="title">';
      if ($node->comment_count == 1):
        $collapsible_content .= t('One') . ' ' . t('Comment');
      else:
        $collapsible_content .= t('Comments') . ' (' . $node->comment_count . ')';
      endif;
      $collapsible_content .= '</h2>';
      print theme('ctools_collapsible', 
        $collapsible_content,
        $content, 
        TRUE);
    else: 
      print $content;
    endif;
  ?>
</div>
