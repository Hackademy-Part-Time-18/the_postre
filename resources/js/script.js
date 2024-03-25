let autoClickEnabled = true; // Autoclick abilitato di default

function simulateClick() {
    if (autoClickEnabled == true) {
        document.getElementById('header-btn-right').click();
    }
}

const intervalID = setInterval(simulateClick, 5000);

// Evento hover sul pulsante
document.getElementById('header-btn-right').addEventListener('mouseenter', function() {
    autoClickEnabled = false; // Disabilita l'autoclick quando il cursore è sopra al pulsante destro
});

// Evento mouseleave sul pulsante
document.getElementById('header-btn-right').addEventListener('mouseleave', function() {
    setTimeout(function() {
        autoClickEnabled = true;
    }, 10000);
});

// Evento hover sul pulsante
document.getElementById('header-btn-left').addEventListener('mouseenter', function() {
    autoClickEnabled = false; // Disabilita l'autoclick quando il cursore è sopra al pulsante sinistro
});

// Evento mouseleave sul pulsante
document.getElementById('header-btn-left').addEventListener('mouseleave', function() {
    setTimeout(function() {
        autoClickEnabled = true;
    }, 10000);
});