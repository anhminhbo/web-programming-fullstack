<?php require("shareImages-ss.php") ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <link rel="stylesheet" href="shareImages.css" />
    <title>Share image</title>
  </head>
  <body>
    <form
      enctype="multipart/form-data"
      method="post"
      class="
        container-sm
        mt-5
        d-flex
        align-items-center align-self-center
        flex-column
        rounded
        shadow-lg
      "
      id="shareForm"
    >
      <h1 class="mt-3 mb-3 p-3 fw-bolder">Share Images</h1>

      <section class="mb-2 row" id="share-image-section">
        <label class="col" for="form-image-upload">Share your image</label>
      </section>

      <section class="mb-3 row">
        <input
          class="form-control col"
          type="file"
          id="form-image-upload"
          name="imgUpload"
        />
        <button class="btn btn-primary col-3" id="form-image-delete">
          Delete
        </button>
      </section>

      <section
        id="inf"
        class="alert alert-primary text-center fw-lighter fst-italic ms-5 me-5"
      >
        Your image will be displayed here.
      </section>

      <img id="frame" src="" class="img-fluid rounded img-thumbnail" />
      <span id="img-error" class="error"></span>

      <section class="form-floating mb-3 mt-3">
        <textarea
          type="text"
          class="form-control"
          name="description"
          id="description"
        ></textarea
        ><label for="description">Description</label>
      </section>

      <span id="desc-error" class="error mb-3"></span>

      <select
        class="form-select form-select-sm mb-2"
        aria-label=".form-select-sm example"
        name="sharingLevel"
        id="sharingLevel"
      >
        <option value="0" selected>Sharing level</option>
        <option value="1">Public</option>
        <option value="2">Internal</option>
        <option value="3">Private</option>
      </select>

      <span id="level-error" class="error mb-3"></span>

      <section class="mb-3">
        <button type="submit" name="shareImgSubmit" class="btn btn-primary ml-1">Sharing now</button>
      </section>

      <?php require("error.php") ?>
    </form>
    <script src="shareImages.js"></script>
  </body>
</html>
