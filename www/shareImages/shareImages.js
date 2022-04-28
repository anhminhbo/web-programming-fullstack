const inf = document.getElementById("inf");

// preview image before share
function preview() {
  var fr = document.getElementById("frame");
  fr.style.display = "initial";
  frame.src = URL.createObjectURL(event.target.files[0]);
  inf.style.display = "none";
}

document
  .querySelector("#form-image-upload")
  .addEventListener("change", preview);

// delete preview image
document
  .querySelector("#form-image-delete")
  .addEventListener("click", (event) => {
    event.preventDefault();
    document.getElementById("form-image-upload").value = null;
    frame.src = "";
    inf.style.display = "initial";
  });

  

