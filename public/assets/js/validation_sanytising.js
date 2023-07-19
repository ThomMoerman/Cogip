"use strict";
// Reusable form validation function
const validateForm = (form) => {
    const inputs = form.querySelectorAll("input");
    const isEmail = (email) => {
        return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email);
    };
    const isName = (name) => {
        return /^[a-zA-Z -]+$/.test(name);
    };
    const highlightError = ($input, errorMessage) => {
        var _a, _b;
        (_a = $input.parentElement) === null || _a === void 0 ? void 0 : _a.classList.add("form__field--error");
        (_b = $input.nextElementSibling) === null || _b === void 0 ? void 0 : _b.innerText = errorMessage;
    };
    const clearError = ($input) => {
        var _a, _b;
        (_a = $input.parentElement) === null || _a === void 0 ? void 0 : _a.classList.remove("form__field--error");
        (_b = $input.nextElementSibling) === null || _b === void 0 ? void 0 : _b.innerText = "";
    };
    const validateInput = ($input) => {
        const inputValue = $input.value.trim();
        clearError($input);
        switch ($input.type) {
            case "text":
                if (!inputValue) {
                    highlightError($input, `${$input.name} can't be blank`);
                }
                else if (!isName(inputValue)) {
                    highlightError($input, `${$input.name} can't contain special characters or numbers`);
                }
                break;
            case "email":
                if (!inputValue) {
                    highlightError($input, `${$input.name} can't be blank`);
                }
                else if (!isEmail(inputValue)) {
                    highlightError($input, `${$input.name} is not valid`);
                }
                break;
            case "password":
                if (!inputValue) {
                    highlightError($input, `${$input.name} can't be blank`);
                }
                break;
            default:
                break;
        }
    };
    inputs.forEach((input) => validateInput(input));
};
document.addEventListener("DOMContentLoaded", () => {
    const $form = document.querySelector(".js-form");
    $form.addEventListener("submit", (event) => {
        event.preventDefault();
        validateForm($form);
    });
});
