<?php

$fields = [
  'author' => '<div class="d-flex justify-content-between"><div class="comment-form-author flex-grow-1"><div class="form-group">'.
    '<input placeholder="'.__('お名前', 'domainreference').($req ? '*' : '').'" id="author" class="form-control" name="author" type="text" value="'.esc_attr($commenter['comment_author']).
    '" '.$aria_req.' /></div></div>',

  'email' => '<div class="comment-form-email flex-grow-1 ml-3"><div class="form-group">'.
    '<input placeholder="'.__('Email', 'domainreference').($req ? '*' : '').'" id="email" name="email" class="form-control" type="text" value="'.esc_attr($commenter['comment_author_email']).
    '" '.$aria_req.' /></div></div>',

  'url' => '<p class="comment-form-url"><div class="form-group flex-grow-1 ml-3">'.
    '<input placeholder="'.__('ウェブサイト', 'domainreference').'" id="url" name="url" class="form-control" type="text" value="'.esc_attr($commenter['comment_author_url']).
    '"   /></p></div></div>',
];
$comments_args = [
    // change "Leave a Reply" to "Comment"
    'title_reply' => 'コメントを残す',
    'fields' => apply_filters('comment_form_default_fields', $fields),
    'comment_field' => '<p class="comment-form-comment"><div class="form-group"><textarea placeholder="'._x('Comment', 'noun').'" id="comment" name="comment" class="form-control"  rows="8" aria-required="true">'.
        '</textarea></div></p>',
          'comment_notes_after' => ' ', ];

comment_form($comments_args);
?>
<div class='comment_wrap'>
    <?php wp_list_comments('callback=mytheme_comment'); ?>
</div>