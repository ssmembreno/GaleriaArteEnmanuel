let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let thumbnails = document.querySelectorAll('.thumbnail .item');

// config param
let countItem = items.length;
let itemActive = 0;

next.onclick = function () {
    itemActive = (itemActive + 1) % countItem;
    showSlider();
};

prev.onclick = function () {
    itemActive = (itemActive - 1 + countItem) % countItem;
    showSlider();
};

let refreshInterval = setInterval(() => {
    next.click();
}, 6000);

function showSlider() {

    let itemActiveOld = document.querySelector('.slider .list .item.active');
    let thumbnailActiveOld = document.querySelector('.thumbnail .item.active');
    itemActiveOld?.classList.remove('active');
    thumbnailActiveOld?.classList.remove('active');

    items[itemActive].classList.add('active');
    thumbnails[itemActive].classList.add('active');

    clearInterval(refreshInterval);
    refreshInterval = setInterval(() => {
        itemActive = (itemActive + 1) % countItem;
        showSlider();
    }, 50000);

    setTimeout(() => {
        isTransitioning = false;
    }, 1000);

}
