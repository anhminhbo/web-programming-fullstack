<?php if (count($errors) > 0) : ?>
    <div id="alert" class="fw-bolder mt-2 alert alert-danger inform-box error-box">
    <svg class="bi flex-shrink-0 me-2" width="17" height="17" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <?php foreach($errors as $error) : ?>
                <?php echo $error; ?>
        <?php endforeach ?>
    </div>
<?php endif ?>
