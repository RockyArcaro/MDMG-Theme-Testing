document.addEventListener("DOMContentLoaded", function () {
    const hamburgerMenu = document.querySelector(".hamburger-menu");
    const navbarCollapse = document.querySelector(".navbar-collapse");

    if (hamburgerMenu && navbarCollapse) {
        // 汉堡菜单点击事件
        hamburgerMenu.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();
            
            // 切换汉堡菜单动画
            hamburgerMenu.classList.toggle("active");
            
            // 切换菜单显示状态
            navbarCollapse.classList.toggle("show");
        });

        // 点击菜单项后自动关闭移动菜单
        const menuLinks = navbarCollapse.querySelectorAll("a");
        menuLinks.forEach(function(link) {
            link.addEventListener("click", function() {
                if (window.innerWidth <= 768 && navbarCollapse.classList.contains("show")) {
                    navbarCollapse.classList.remove("show");
                    hamburgerMenu.classList.remove("active");
                }
            });
        });

        // 点击外部区域关闭菜单（仅在移动端）
        document.addEventListener("click", function(event) {
            if (window.innerWidth <= 768 && 
                navbarCollapse.classList.contains("show") &&
                !navbarCollapse.contains(event.target) && 
                !hamburgerMenu.contains(event.target)) {
                navbarCollapse.classList.remove("show");
                hamburgerMenu.classList.remove("active");
            }
        });
    }

    // 窗口大小改变时的处理
    window.addEventListener("resize", function () {
        if (window.innerWidth > 768) {
            // 桌面端时确保菜单状态正确
            if (navbarCollapse) {
                navbarCollapse.classList.remove("show");
            }
            if (hamburgerMenu) {
                hamburgerMenu.classList.remove("active");
            }
        }
    });
}); 