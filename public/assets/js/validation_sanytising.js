"use strict";
/* document.addEventListener("DOMContentLoaded", () => { */
const $form = document.querySelector('.js-form');
const $firstNameInput = document.querySelector('.js-firstname-input');
const $lastNameInput = document.querySelector('.js-lastname-input');
const $mailInput = document.querySelector('.js-email-input');
const $passwordInput = document.querySelector('.js-password-input');
const highlightError = ($input, errorMessage) => {
    var _a, _b;
    (_a = $input.parentElement) === null || _a === void 0 ? void 0 : _a.classList.add("form__field--error");
    (_b = $input.nextElementSibling) === null || _b === void 0 ? void 0 : _b.textContent = errorMessage;
};
const validate = () => {
    const firstNameValue = $firstNameInput.value.trim();
    const lastNameValue = $lastNameInput.value.trim();
    const mailValue = $mailInput.value.trim();
    const passwordValue = $passwordInput.value.trim();
    console.log('validate', firstNameValue, lastNameValue, $firstNameInput, $lastNameInput);
    if (!firstNameValue) {
        highlightError($firstNameInput, "First Name can't be blank");
    }
    if (!lastNameValue) {
        highlightError($lastNameInput, "Last Name can't be blank");
    }
    if (!mailValue) {
        highlightError($mailInput, "Email can't be blank");
    }
    if (!passwordValue) {
        highlightError($passwordInput, "Password can't be blank");
    }
};
$form.addEventListener('submit', (event) => {
    event.preventDefault();
    validate();
});
/* }) */ 
