// --- Handle when user upload image
function handlePreview() {
  hideImgError();
  if (isImgValid()) {
    hideImgInstruction();
    displayImgPreview();
  } else {
    hideImgBox();
    showImgInstruction();
    displayImgError();
  }
}

// preview image before share
function displayImgPreview() {
  var fr = document.getElementById("frame");
  fr.style.display = "initial";
  fr.src = URL.createObjectURL(event.target.files[0]);
}

function hideImgInstruction() {
  const inf = document.getElementById("inf");
  inf.style.display = "none";
}

document
  .querySelector("#form-image-upload")
  .addEventListener("change", handlePreview);

// delete preview image
function showImgInstruction() {
  const inf = document.getElementById("inf");
  inf.style.display = "initial";
}

function hideImgBox() {
  var fr = document.getElementById("frame");
  fr.src = "";
  fr.style.display = "none";
}

// --- Handle when user submit form

//img
function isImgValid() {
  const img = document.body.querySelector('input[type="file"]');
  const isValid = img.files[0] && img.files[0].type.includes("image");

  return isValid;
}

function displayImgError() {
  const imgErr = document.querySelector("#img-error");
  imgErr.innerHTML = "Your upload is not an image.";
}

function hideImgError() {
  const imgErr = document.querySelector("#img-error");
  imgErr.innerHTML = "";
}

//textarea
function isDescValid() {
  let isValid = true;
  const desc = document.querySelector("#description");
  if (!desc.value) {
    return !isValid;
  }

  return isValid;
}

function displayDescError() {
  const descError = document.querySelector("#desc-error");
  descError.innerHTML = "Your description must not be empty.";
}

function hideDescError() {
  const descError = document.querySelector("#desc-error");
  descError.innerHTML = "";
}

//Combo box
function isOptionValid() {
  let isValid = true;
  const sharingLevel = document.querySelector("#sharingLevel");
  if (sharingLevel.value == 0) return !isValid;

  return isValid;
}

function displayOptionError() {
  const levelError = document.querySelector("#level-error");
  levelError.innerHTML = "You must choose a sharing level.";
}

function hideOptionError() {
  const levelError = document.querySelector("#level-error");
  levelError.innerHTML = "";
}

//form
const form = document.querySelector("form");
form.addEventListener("submit", (e) => {
  if (isDescValid() && isImgValid() && isOptionValid()) {
    return;
  }
  e.preventDefault();
  if (!isImgValid()) displayImgError();
  else hideImgError;

  if (!isDescValid()) displayDescError();
  else hideDescError();
  if (!isOptionValid()) displayOptionError();
  else hideOptionError();
});
