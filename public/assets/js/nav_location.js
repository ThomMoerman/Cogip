"use strict";
const links = document.querySelectorAll('.nav a');
// JavaScript function to add a black border to the active link
function addBorderToActiveLink() {
    const links = document.querySelectorAll('.nav a');
    links.forEach(link => {
        if (link.href === window.location.href) {
            link.style.border = '1px solid black';
        }
    });
}
// Call the function once the DOM has loaded
document.addEventListener('DOMContentLoaded', addBorderToActiveLink);
