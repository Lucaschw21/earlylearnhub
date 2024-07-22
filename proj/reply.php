<div class="reply">
    <p class="timestamp">
        Posted <?php echo date('F j Y \a\t g:i A', strtotime($reply_data['Forum_Timestamp'])); ?>
        by <strong><?php echo $reply_data['User_Username']; ?></strong>
    </p>
    <h4><?php echo $reply_data['Forum_Title']; ?></h4>
    <p><?php echo $reply_data['Forum_Description']; ?></p>

    <?php $nested_reply_id = $reply_data['Forum_ID']; ?>

    <?php
    $is_reply = isset($reply_data['reply_id']) && $reply_data['reply_id'] !== 0;
    if (!$is_reply) {
    ?>
        <button class="reply" onclick="reply(<?php echo $nested_reply_id; ?>, '<?php echo $reply_data['Forum_Title']; ?>');">Reply</button>
    <?php
    }

    // if (function_exists('displayNestedReplies')) {
    //     displayNestedReplies($nested_reply_id, $conn, $reply_data);
    // }
    ?>
</div>
