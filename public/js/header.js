const slider = document.querySelector('.slider');

function activate(e) {
  const items = document.querySelectorAll('.item');
  e.target.matches('.next') && slider.append(items[0])
  e.target.matches('.prev') && slider.prepend(items[items.length-1]);
}

document.addEventListener('click',activate,false);

let autoClickEnabled = true; // Autoclick abilitato di default

function simulateClick() {
    if (autoClickEnabled == true) {
        document.getElementById('header-btn-right').click();
    }
}

const intervalID = setInterval(simulateClick, 5000);

document.getElementById('header-btn-right').addEventListener('mouseenter', function() {
    autoClickEnabled = false;
});

document.getElementById('header-btn-right').addEventListener('mouseleave', function() {
    setTimeout(function() {
        autoClickEnabled = true;
    }, 10000);
});

document.getElementById('header-btn-left').addEventListener('mouseenter', function() {
    autoClickEnabled = false;
});

document.getElementById('header-btn-left').addEventListener('mouseleave', function() {
    setTimeout(function() {
        autoClickEnabled = true;
    }, 10000);
});