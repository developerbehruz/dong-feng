let navBars = document.querySelector('.nav-bars'),
    navigation = document.querySelector('.navigation'),
    testDriveBtn = document.querySelector('.testDriveBtn'),
    driveModal = document.querySelector('.drive-modal'),
    modalClose = document.querySelector('.modalClose');

navBars.addEventListener('click', () => {
    navigation.classList.toggle('active');
});

function getLocation(text) {
    navigator.clipboard.writeText(text);
    console.log(navigator) 
}

testDriveBtn.addEventListener('click', () => {
    driveModal.classList.add('active')
    document.body.classList.add('drive-modal-open')
})

modalClose.addEventListener('click', (e) => {
    e.preventDefault()
    driveModal.classList.remove('active')
    document.body.classList.remove('drive-modal-open')
})

let map = document.querySelector('.map'),
    mapBtns = document.querySelectorAll('.filial h4');

function changeMap(url) {
    map.innerHTML = url;
    mapBtns.forEach(item => {
        item.classList.remove('active')
    })
}
mapBtns.forEach(item => {
    item.addEventListener('click', () => {
        item.classList.add('active')
    })
})