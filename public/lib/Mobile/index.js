// 瀏覽器高度
$(document).ready(function () {
        let vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
        window.addEventListener('resize', () => {
            let vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
        });
    }
);

window.onscroll = function () {
    // if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
    //     document.getElementById("scroll").style.top = "0";
    // } else {
    //     document.getElementById("scroll").style.top = "-200px";
    //     document.getElementById("scroll").style.padding = "0";
    // }
};

// 搜尋動態
$(function() {
    $(".search_bar ").click(function() {
        $(".search").focus();
    });
});

// 選單收合
function openNav() {
    document.getElementById("openSidebar").style.width = "200px";
}

function closeNav() {
    document.getElementById("openSidebar").style.width = "0";
}


