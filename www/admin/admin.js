const searchBtn = document.querySelector("#searchBtn");

searchBtn.addEventListener("click", (e) => {
  const searchInput = document.querySelector("#searchInput");

  location.href = "admin-index.php?page=1&search=" + searchInput.value;
});