<?php if (count($errors) > 0) : ?>
 
        <?php foreach($errors as $error) : ?>
            <span id="server-error" class="error mb-3">   <?php echo $error; ?></span>
        <?php endforeach ?>
<?php endif ?>