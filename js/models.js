let modelsNavigation = document.querySelectorAll('.models-navigation p'),
    modelExterior = document.querySelectorAll('.modelExterior'),
    modelSett = document.querySelectorAll('.modelSett');

function changeHover(element) {
    modelsNavigation.forEach(item => {
        item.classList.remove('active')
    });
    let select = document.querySelector('.'+element);
    select.classList.add('active');
    if (element == 'parameters') {
        modelExterior.forEach(item => {
            item.classList.add('hidden');
            item.classList.remove('active');
        })
        modelSett.forEach(item => {
            item.classList.add('active');
            item.classList.remove('hidden');
        })
        // modelSett.style.display = 'flex !ipmortant'
    }else if (element == 'exterior') {
        modelExterior.forEach(item => {
            item.classList.remove('hidden');
            item.classList.add('active');
        })
        modelSett.forEach(item => {
            item.classList.add('hidden');
            item.classList.remove('active');
        })
    }
}