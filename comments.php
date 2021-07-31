<?php
   $args = array(
      'fields' => array(
         'author' => '<div class="form-group">
            <label for="author">Nazwa Autora</label>
            <input class="form-control" type="text" id="author" name="author" 
            placeholder="Nazwa Autora">
         </div>',
         'email' => '<div class="form-group">
            <label for="email">Adres Email</label>
            <input class="form-control" type="text" id="email" name="email" 
            placeholder="Adres Email">
         </div>',
         'url' => '',
      ),
      'comment_field' => '<div class="form-group">
         <label for="comment">Treść Komentarza</label>
         <textarea class="form-control" id="comment" name="comment" 
         rows="2" placeholder="Treść Komentarza"></textarea>
      </div>',
      'class_submit' => 'btn btn-outline-primary rounded-pill',
      'title_reply_before' => '<h3 class="my-2">',
      'title_reply_after' => '</h3>',
      'label_submit' => 'Opublikuj',
   );
   comment_form($args);
?>

<ol class="commentlist mb-3">
   <?php wp_list_comments( 
   array('avatar_size' => 50) ); ?>
</ol>
