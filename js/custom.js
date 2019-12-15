!(function () {
    var nav = document.getElementById('navbar');
    var toggle = document.getElementById('toggle');
    var message = document.getElementById('message');
    var nav_group = document.getElementById('nav-group');
    var nav_links = document.querySelectorAll('#nav-link');
    var nav_overlay = document.getElementById('nav-overlay');

    var jet = new jetpack({ duration: 'medium' });
    jet.hookAnchors();

    message.addEventListener('input', auto_resize);

    window.addEventListener('scroll', scroll_background);

    toggle.addEventListener("click", toggle_menu);

    for (var i = 0; i < nav_links.length; i++) {
        nav_links[i].addEventListener("click", function () {
            if (toggle.classList.contains("open")) {
                toggle_menu();
            }
        });
    }

    nav_overlay.addEventListener("click", function () {
        if (!nav_group.classList.contains("hidden")) {
            toggle_menu();
        }
    });

    function toggle_menu() {
        toggle.classList.toggle("open");
        nav.style.backgroundColor = "white";
        nav_group.classList.toggle("hidden");
        nav_overlay.classList.toggle("hidden");
        scroll_background();
    }

    function scroll_background() {
        if (document.documentElement.scrollTop || document.body.scrollTop > window.innerHeight || toggle.classList.contains("open")) {
            nav.style.backgroundColor = "white";
            nav.style.boxShadow = "0px 10px 10px -5px rgba(0, 0, 0, 0.1)";
        } else {
            nav.style.backgroundColor = "transparent";
            nav.style.boxShadow = "none";
        }
    }

    function auto_resize() {
        this.style.height = "2em";
        this.style.height = (this.scrollHeight) + "px";
    }
})();