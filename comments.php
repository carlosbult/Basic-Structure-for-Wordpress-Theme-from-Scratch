<!-- Get only the approved comments -->
<?php
$args = array(
    'status' => 'approve'
);
// The comment Query 
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query($args); ?>

<!-- Comment Loop -->
<?php
if ($comments) {
    foreach ($comments as $comment) {
        echo '<p>' . $comment->comment_content . '</p>';
    }
} else {
    echo 'No comments found.';
} ?>