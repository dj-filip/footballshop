let nightMode = localStorage.getItem('nightMode');

let nightModeButton = document.getElementById('switch');


function darkModeOn() {
    document.body.classList.add('dark-mode');
    localStorage.setItem('nightMode', true);
}

function darkModeOff() {
    document.body.classList.remove('dark-mode');
    localStorage.setItem('nightMode', false);
}

if (JSON.parse(nightMode) !== false) {
    nightModeButton.checked = true;
    darkModeOn();
}

nightModeButton.addEventListener('click', function() {
    nightMode = localStorage.getItem('nightMode');
    console.log(JSON.parse(nightMode));
    if (JSON.parse(nightMode) == false) {
        darkModeOn();
        console.log(nightMode);
    } else {
        darkModeOff();
        console.log(nightMode);
    }
});