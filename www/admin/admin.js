const searchBtn = document.querySelector("#searchBtn");

searchBtn.addEventListener("click", (e) => {
  const searchInput = document.querySelector("#searchInput");

  location.href = "admin-index.php?page=1&search=" + searchInput.value;
});

// Highlight current page user are at
const anchorPageLinks = document.querySelectorAll(".page-link");

const queryString = window.location.search;

const urlParams = new URLSearchParams(queryString);

const page = urlParams.get("page");

for (let i = 0; i < anchorPageLinks.length; i++) {
  const queryFromAnchor = anchorPageLinks[i].href.split("?")[1];
  const urlParam = new URLSearchParams(queryFromAnchor);
  const pageQuery = urlParam.get("page");



  if (page == pageQuery) {
    anchorPageLinks[i].classList.add("focus");
  } else {
    anchorPageLinks[i].classList.remove("focus");
  }

  if (i == 0 || i == anchorPageLinks.length -1) {
    anchorPageLinks[i].classList.remove("focus");
  }
}
