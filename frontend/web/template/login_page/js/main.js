$(function () {
    $('.wrapper input').focus(function () {
        $(this)
            .parent()
            .addClass('active')
            .parent()
            .siblings()
            .children('.wrapper')
            .removeClass('active');
    });
    $('.check').click(function () {
        $('.wrapper').removeClass('active');
    });
});
window.onload = function () {
    let prl = document.getElementById('preloader');
    prl.style.display = 'none';
    var tl = gsap.timeline();
    tl.from('.nav', {duration: 0.4, y: -100});
    tl.from('.nav .logo', {
        duration: 0.3,
        x: -50,
        opacity: 0,
    });
    tl.from('.phone', {
        duration: 0.3,
        x: 50,
        opacity: 0,
    });
    tl.from('.login form', {
        duration: 0.3,
        x: 200,
        opacity: 0,
    });
    tl.from('.login form .login-top h3', {
        duration: 0.3,
        y: -50,
        opacity: 0,
    });
    tl.from('.login form .login-main .wrapper', {
        duration: 0.6,
        x: 150,
        opacity: 0,
        stagger: 0.2,
    });
    tl.from('.login form .login-main .form-btn', {
        duration: 0.3,
        y: 50,
        opacity: 0,
    });
};
new BackgroundVideo({
    video: [
        {
            file: '/template/login_page/media/video/bg.mp4',
            formats: ['webm', 'ogv'],
        },
        {
            file: '/template/login_page/media/video/bg.mp4',
        },
    ],
    mobileImg: '/template/login_page/img/png/bg.png',
    overlay: '/template/login_page/img/png/bg.png',
});
