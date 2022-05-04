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
    <link rel="stylesheet" href="viewImages.css" />

      <!-- Handle Logged in view -->
    <?php if (isset($_SESSION["loggedIn"])) : ?>
      <div class="container">
        <article class="post">
          <!-- POST HEADER -->
          <section class="post__header header">
            <section class="header__left">
              <img
                src="../profileImgRepo/img1.jpeg"
                alt="profile Img here"
                class="post__user_profileImg"
              />
              <div class="post__user user">
                <span class="user__name"> MinhPoRo </span>
                <button
                  type="button"
                  class="close delete_option"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <span class="post__date"> 00:08:56 05-05-2022 </span>
            </section>
          </section>

          <!-- POST CONTENT -->
          <section class="post__content content">
            <p class="content__paragraph">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
              autem dolorum numquam error doloribus, suscipit laudantium alias
              voluptatibus animi possimus quia ex minus incidunt libero quis
              amet exercitationem placeat doloremque. Quia magni vel, esse harum
              debitis ipsam voluptates cumque commodi dolorem tenetur
              necessitatibus totam voluptate perspiciatis error quas assumenda
              deleniti libero ipsa asperiores omnis nobis in praesentium?
              Voluptatibus, fugit harum.
            </p>
            <img
              src="../uploadImgRepo/img0.jpg"
              alt="upload Image here"
              class="content__image"
            />
          </section>
        </article>
      </div>
      <?php endif ?>

      <!-- Handle Other View -->
      <?php if (!isset($_SESSION["loggedIn"])) : ?>
     
        <?php endif ?>
    </main>
  </body>
</html>
