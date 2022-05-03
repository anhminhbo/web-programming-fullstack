<?php if (count($errors) > 0) : ?>
    <div id="alert" class="fw-bolder mt-2 alert alert-danger inform-box error-box">
        <?php foreach($errors as $error) : ?>
            <div class="margin-resize">
                <svg class="bi flex-shrink-0 me-2 marginBottomResize" width="17" height="17" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill"/>
                </svg>
                <?php echo $error; ?>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>
