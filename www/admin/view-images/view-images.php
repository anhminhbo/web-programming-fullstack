<?php 
session_start();


if (isset($_GET['delete'])) {
    // Import utilities
    require_once('../../util/imageHandler.php');
    require_once('../../util/db.php');

    $newImges = [];

    $uploadImgDbRepoPath = "../../uploadImgRepo/uploadImgRepo.db";

    $uploadImages = readInfo($uploadImgDbRepoPath,'r');

    $deleteImgName = explode('/',$_GET['delete'])[count(explode('/',$_GET['delete'])) - 1 ];

    // delete in Db and delete img
    deleteContent($uploadImgDbRepoPath);

    unlink('../../uploadImgRepo/'.$deleteImgName);

    foreach ($uploadImages as $img) {
        if ($img[1] != $deleteImgName) {
            $newImges[] = $img;
        }
    }

    // Rewrite db without delete upload img info
    foreach ($newImges as $newImg) {
        storeInfo($uploadImgDbRepoPath, $newImg, "a");
    }
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Images</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <main>
    <link rel="stylesheet" href="view-images.css" />
    <a href="../admin-index.php">Back to Admin Homepage</a>
     <!-- Get all images -->
      <?php 
        require_once('../../util/db.php');
        require_once('../../util/imageHandler.php');
        require_once('../../util/timeHandler.php');
        //Get img from db

        $uploadImages = readInfo('../../uploadImgRepo/uploadImgRepo.db','r');
        $profileImages = readInfo('../../profileImgRepo/profilePicture.db','r');

        usort($uploadImages,'created_time_cmp');
      ?>

      <div class="container"> 
        <?php foreach($uploadImages as $img) : ?>
          <article class="post">
          <!-- POST HEADER -->
          <section class="post__header header">
            <section class="header__left">
            <?php $profileImage = getProfileImgByEmail($profileImages,$img[0]) ?>
              <img
                <?php echo "src=../../profileImgRepo/" . $profileImage[1]?>
                alt="profile Img here"
                class="post__user_profileImg"
              />
              <div class="post__user user">
                <span class="user__name"> <?php echo $img[5].' '.$img[6]?> </span>
                <button
                  type="button"
                  class="close delete-option"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <span class="post__date"> <?php echo $img[4]?> </span>
            </section>
          </section>
        
          <!-- POST CONTENT -->
          <section class="post__content content">
            <div class="content__paragraph">
              <?php echo $img[2]?>
            </div>
            <img
              src=<?php echo "../../uploadImgRepo/" . $img[1]?>
              alt="upload Image here"
              class="content__image"
            />
          </section>
        </article>

      <?php endforeach; ?>
        </div>

    </main>
    <script src="view-images.js"> </script>
  </body>
</html>
