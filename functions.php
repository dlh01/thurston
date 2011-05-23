<?php

function add_pipe_to_reply_link( $link ) {
    return "| " . $link;
    }
    add_filter('comment_reply_link', 'add_pipe_to_reply_link')

?>
