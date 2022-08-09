'use strict'

const output = document.querySelector('#output');
const message = document.querySelector('#message');
const userlist = document.querySelector('#userlist');

function emoji(entity) {
    message.value = message.value + entity; // Emoji hinzufügen
}

function updateUserList() {

    let instance = new XMLHttpRequest();
    instance.open('get', 'class/class_UserList.inc.php');

    instance.onreadystatechange = function() {
        if (instance.readyState == 4 && instance.status == 200) {
            userlist.innerHTML = instance.responseText;
        }
    }
    instance.send();
}

function updateMessage() {

    let instance = new XMLHttpRequest(); // AJAX
    instance.open('get', 'autoloader.php?update=true');

    instance.onreadystatechange = function() {
        // Daten liegen beim Client vor / Daten wurden vom Server gesendet
        if (instance.readyState == 4 && instance.status == 200) { // Response
            output.innerHTML = instance.responseText; // Text vom Server
            output.scrollTop = output.scrollHeight; // maximale Höhe Ausgabe
        }
    }
    instance.send(); // alles ausführen
}

updateMessage(); // schnelles Laden
updateUserList();

window.setInterval('updateMessage()', 2000); // nach 2 sec, alle 2 sec
window.setInterval('updateUserList()', 2000);