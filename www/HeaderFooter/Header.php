<header class="fixed">
    <link rel="stylesheet" href="/www/HeaderFooter/HeaderFooter.css">
    <div class="container-navbar container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light d-sm-flex" >
          <div class="container-fluid d-flex justify-content-end clear-padding-right">
            <?php if (isset($_SESSION["loggedIn"])) : ?>
              <form class="d-flex me-3 search-bar">
                <input class="form-control me-2 d-inline" type="search" placeholder="Type something here..." aria-label="Search">
                <button class="btn btn-outline-warning d-inline" type="submit">Search</button>
              </form>
            <?php endif?>
            <a class="brand" href="#">
              <img src="/www/HeaderFooter/icons8-love-64.png" alt="logo" class="d-inline-block align-text-top logo">
              <h1 class="websiteName d-inline">InstaKilogram</h1>
            </a>
          </div>
        </nav>
    </div>
</header>