const searchBtn = document.querySelector("#searchBtn");

searchBtn.addEventListener("click", (e) => {
  const searchInput = document.querySelector("#searchInput");

  location.href = "admin-index.php?page=1&search=" + searchInput.value;
});

const anchorPageLinks = document.querySelectorAll(".page-link");

const queryString = window.location.search;

const urlParams = new URLSearchParams(queryString);

const page = urlParams.get("page");

for (const pageLink of anchorPageLinks) {
  const queryFromAnchor = pageLink.href.split("?")[1];
  const urlParam = new URLSearchParams(queryFromAnchor);
  const pageQuery = urlParam.get("page");
  if (page == pageQuery) {
    pageLink.classList.add("focus");
  } else {
    pageLink.classList.remove("focus");
  }
}
