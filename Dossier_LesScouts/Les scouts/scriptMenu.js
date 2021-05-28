var content = document.querySelector('#hamburger-content');
var sidebarBody = document.querySelector('#hamburger-sidebar-body');
var button = document.querySelector('#hamburger-button');
var buttonContainer = document.querySelector('#button-container');
var overlay = document.querySelector('#hamburger-overlay');
var activatedClass = 'hamburger-activated';

sidebarBody.innerHTML = content.innerHTML;

button.addEventListener('click', function(e){
    e.preventDefault();
    console.log(this.parentNode);

    buttonContainer.parentNode.classList.add(activatedClass);
});

button.addEventListener('keydown', function(e){
    if(buttonContainer.parentNode.classList.contains(activatedClass)){
        if(e.repeat === false && e.which === 27){
            buttonContainer.parentNode.classList.remove(activatedClass);
        }
    }
});

overlay.addEventListener('click', function(e){
    e.preventDefault();

    this.parentNode.classList.remove(activatedClass);
});