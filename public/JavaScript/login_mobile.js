const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const mainContainer = document.getElementById('main-container');

signUpButton.addEventListener('click', () =>
    mainContainer.classList.add('right-panel-active')
);
signInButton.addEventListener('click', () =>
    mainContainer.classList.remove('right-panel-active')
);

$(document).ready(function () {
    $('#signUp').click(function () {
        $('#main-container').add('right-panel-active')
    });
    $('#signIn').click(function () {
        $('#main-container').remove('right-panel-active')
    });
});

var x = document.getElementById('signUp-container');
var y = document.getElementById('signIn-container');
var z = document.getElementById('btn');

function signUp() {
    console.count('Signup');
    x.style.left = "0";
    y.style.left = "-100%";
    z.style.left = "50%";
    z.style.opacity = "0";
}
function signIn() {
    console.count('SignIn');
    y.style.left = "0%";
    x.style.left = "-100%";
    z.style.left = "0px";
    z.style.opacity = "1";
}

