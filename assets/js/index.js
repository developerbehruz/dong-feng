let pauseBtn = document.querySelector('.pauseBtn'),
    playBtn = document.querySelector('.playBtn'),
    videoPlayBtn = document.querySelector('.videoPlayBtn'),
    videoPauseBtn = document.querySelector('.videoPauseBtn'),
    video = document.querySelector('#video-p video'),
    mySwiperModelsSlides = document.querySelectorAll('.mySwiperModels .swiper-slide');

let vdActive;
setInterval(() => {
    vdActive = document.querySelector('.vd-wrapper .swiper-slide-active video');
}, 500);

pauseBtn.addEventListener('click', () => {
    pauseBtn.style.display = 'none';
    playBtn.style.display = 'flex';
    vdActive.pause();
})
playBtn.addEventListener('click', () => {
    playBtn.style.display = 'none';
    pauseBtn.style.display = 'flex';
    vdActive.play();
})

videoPlayBtn.addEventListener('click', () => {
    videoPlayBtn.style.display = 'none';
    videoPauseBtn.style.display = 'block';
    video.play();
})
videoPauseBtn.addEventListener('click', () => {
    videoPauseBtn.style.display = 'none';
    videoPlayBtn.style.display = 'block';
    video.pause();
});

function changeCarImage(btns, seBtn) {
    let buttons = document.querySelectorAll('.'+btns);
    let selectBtn = document.querySelector('.'+seBtn);
    buttons.forEach(btn => {
        btn.classList.remove('active');
    });
    selectBtn.classList.add('active')

}

// mySwiperModelsSlides.forEach(slide => {
//     slide.addEventListener('mouseover', () => {
//         slide.classList.add('active');
//         let slideCard = document.querySelector(`.active .card-descr`);
//         slideCard.classList.add('active');
//     })
//     slide.addEventListener('mouseleave', () => {
//         let slideCard = document.querySelector(`.active .card-descr`);
//         slideCard.classList.remove('active');
//         slide.classList.remove('active');
//     })
// })