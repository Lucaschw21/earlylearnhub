<div class="comment">
    <p class="timestamp">
        Posted <?php echo date('F j Y \a\t g:i A', strtotime($data['Forum_Timestamp'])); ?>
        by <strong><?php echo $data['User_Username']; ?></strong>
    </p>
    <h4><?php echo $data['Forum_Title']; ?></h4>
    <p><?php echo $data['Forum_Description']; ?></p>

    <?php $comment_id = $data['Forum_ID']; ?>

    <button class="reply" onclick="reply(<?php echo $comment_id; ?>, '<?php echo $data['Forum_Title']; ?>');">Reply</button>

    <?php
    $comment_replies = mysqli_query($conn, "SELECT forum.*, user.User_Username FROM forum JOIN user ON forum.User_ID = user.User_ID WHERE reply_id = $comment_id");

    if (mysqli_num_rows($comment_replies) > 0) {
        foreach ($comment_replies as $reply_data) {
            require 'reply.php';
        }
    }
    ?>
</div>
