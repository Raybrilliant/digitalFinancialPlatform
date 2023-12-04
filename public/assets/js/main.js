const URL = "http://127.0.0.1:8000/";

/* ========= AJAX ======== */
$("#pay-button").click(function () {
    const id = $(this).data("id");
    $.ajax({
        url: URL + "api/getPay",
        data: { id: id },
        method: "Post",
        dataType: "json",
    }).done(function (data) {
        sessionStorage.clear();
        window.snap.pay(data.token);
    });
});

/* ========= DataTable ======== */
new DataTable("#dataTables",{
    order:[[3,'asc']]
});
new DataTable("#dataTables_disabled",{
    info:false,
    order:[[1,'desc']]
});

(function () {
    /* ========= Preloader ======== */
    const preloader = document.querySelectorAll("#preloader");

    window.addEventListener("load", function () {
        if (preloader.length) {
            this.document.getElementById("preloader").style.display = "none";
        }
    });

    /* ========= Add Box Shadow in Header on Scroll ======== */
    window.addEventListener("scroll", function () {
        const header = document.querySelector(".header");
        if (window.scrollY > 0) {
            header.style.boxShadow =
                "0px 0px 30px 0px rgba(200, 208, 216, 0.30)";
        } else {
            header.style.boxShadow = "none";
        }
    });

    /* ========= sidebar toggle ======== */
    const sidebarNavWrapper = document.querySelector(".sidebar-nav-wrapper");
    const mainWrapper = document.querySelector(".main-wrapper");
    const menuToggleButton = document.querySelector("#menu-toggle");
    const menuToggleButtonIcon = document.querySelector("#menu-toggle i");
    const overlay = document.querySelector(".overlay");

    menuToggleButton.addEventListener("click", () => {
        sidebarNavWrapper.classList.toggle("active");
        overlay.classList.add("active");
        mainWrapper.classList.toggle("active");

        if (document.body.clientWidth > 1200) {
            if (menuToggleButtonIcon.classList.contains("lni-chevron-left")) {
                menuToggleButtonIcon.classList.remove("lni-chevron-left");
                menuToggleButtonIcon.classList.add("lni-menu");
            } else {
                menuToggleButtonIcon.classList.remove("lni-menu");
                menuToggleButtonIcon.classList.add("lni-chevron-left");
            }
        } else {
            if (menuToggleButtonIcon.classList.contains("lni-chevron-left")) {
                menuToggleButtonIcon.classList.remove("lni-chevron-left");
                menuToggleButtonIcon.classList.add("lni-menu");
            }
        }
    });
    overlay.addEventListener("click", () => {
        sidebarNavWrapper.classList.remove("active");
        overlay.classList.remove("active");
        mainWrapper.classList.remove("active");
    });
})();
