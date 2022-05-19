<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/www/util/db.php');
    $mg = "";
    $read_db = readInfo($_SERVER['DOCUMENT_ROOT']."/www/profileImgRepo/profilePicture.db", "r");
    if (isset($_SESSION["email"])){
    foreach ($read_db as $line) {
        $email_temp = $line[0];
        if ($_SESSION["email"] == $email_temp) {
            $img = $line[1];
            break;
        }
    }
    } 
    $repo = "/www/";
?>
<link rel="stylesheet" href="/www/HeaderFooter/HeaderFooter.css">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<?php if (isset($_SESSION["loggedIn"])) : ?>
    <aside class="sidebar">
        <div class="logoName">
        <i class='bx bxl-instagram-alt'></i>        
        <div class="webName">InstaKilogram</div>
        </div>
        <i class="bx bx-menu" id="btn"></i>
        <ul class="nav_list">
            <li>
                <a href="<?php echo $repo?>myAccount/myAccount.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">My Account</span>
                </a>
                <span class="tooltip">My Account</span>
            </li>
            <div class="lineSpace"></div>
            <li>
                <a href="<?php echo $repo?>shareImages/shareImages.php">
                    <i class='bx bx-image-add'></i>
                    <span class="link_name">Share Image</span>
                </a>
                <span class="tooltip">Share Image</span>
            </li>
            <div class="lineSpace"></div>
            <li>
                <a href="<?php echo $repo?>viewImages/viewImages.php">
                    <i class='bx bx-image-alt'></i>
                    <span class="link_name">View Images</span>
                </a>
                <span class="tooltip">View Images</span>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <img src="/www/profileImgRepo/<?php echo $img?>" alt="">
                    <div class="name">
                        <?php echo $_SESSION["fname"] . " " . $_SESSION["lname"]?>
                    </div>
                </div>
                <a href="<?php echo $repo;?>index.php?logout=true">
                <i class='bx bx-log-out' id="logout" href="<?php echo $repo;?>index.php?logout=true"></i>
                </a>
                <?php
                if (isset($_GET["logout"])) {
                    session_destroy();
                    header("Location: index.php");    
                }
                ?>
            </div>
        </div>
    </aside>
<?php endif ?>
<?php if (!isset($_SESSION["loggedIn"])) : ?>
    <div class="container-box">
        <div class="text">
        You need to login first to access our page. 
        <a href="login/login.php">Login here!</a>
        </div>
    </div>
<?php endif ?>
<script src="/www/HeaderFooter/Sidebar.js"></script>