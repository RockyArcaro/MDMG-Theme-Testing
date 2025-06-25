document.addEventListener("DOMContentLoaded", function () {
    // 简化的汉堡菜单功能
    const hamburger = document.querySelector(".hamburger-menu");
    const navMenu = document.querySelector(".navbar-collapse");

    if (hamburger && navMenu) {
        hamburger.addEventListener("click", function(e) {
            e.preventDefault();
            
            // 切换active类
            hamburger.classList.toggle("active");
            
            // 切换show类
            navMenu.classList.toggle("show");
        });

        // 点击菜单项关闭菜单
        const menuItems = navMenu.querySelectorAll("a");
        menuItems.forEach(function(item) {
            item.addEventListener("click", function() {
                if (window.innerWidth <= 768) {
                    hamburger.classList.remove("active");
                    navMenu.classList.remove("show");
                }
            });
        });

        // 窗口大小改变时关闭菜单
        window.addEventListener("resize", function() {
            if (window.innerWidth > 768) {
                hamburger.classList.remove("active");
                navMenu.classList.remove("show");
            }
        });
    }
}); 