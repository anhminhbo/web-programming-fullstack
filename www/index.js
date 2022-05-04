let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");

closeBtn.addEventListener("click", function(e){
    sidebar.classList.toggle("active");
    menuBtnChange();
});

function menuBtnChange() {
    if(sidebar.classList.contains("active")){
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    }
    else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
}