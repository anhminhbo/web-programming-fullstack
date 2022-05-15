const deleteBtns = document.querySelectorAll(".close.delete-option");
const uploadImges = document.querySelectorAll(".content__image");
const uploadPosts = document.querySelectorAll(".post");

for (let i = 0; i < deleteBtns.length; i++) {
  deleteBtns[i].addEventListener("click", (e) => {
    location.href = "view-images.php?delete=" + uploadImges[i].src;
    uploadPosts[i].style.display = "none";
  });
}

