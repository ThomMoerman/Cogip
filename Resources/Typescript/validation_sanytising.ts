/* document.addEventListener("DOMContentLoaded", () => { */
   
const $form = document.querySelector('.js-form') as HTMLFormElement
const $firstNameInput = document.querySelector('.js-firstname-input') as HTMLInputElement
const $lastNameInput = document.querySelector('.js-lastname-input') as HTMLInputElement
const $mailInput = document.querySelector('.js-email-input') as HTMLInputElement
const $passwordInput = document.querySelector('.js-password-input') as HTMLInputElement


 const highlightError = ($input: HTMLInputElement, errorMessage: string) => {
    $input.parentElement?.classList.add("form__field--error")
    $input.nextElementSibling?.textContent = errorMessage
} 

const validate = () => {
    const firstNameValue = $firstNameInput.value.trim()
    const lastNameValue = $lastNameInput.value.trim()
    const mailValue = $mailInput.value.trim()
    const passwordValue = $passwordInput.value.trim()

    console.log('validate',firstNameValue,lastNameValue,$firstNameInput,$lastNameInput)

   if (!firstNameValue) {
    highlightError($firstNameInput,"First Name can't be blank")
   }
   if (!lastNameValue) {
    highlightError($lastNameInput,"Last Name can't be blank")
   }
   if (!mailValue) {
    highlightError($mailInput,"Email can't be blank")
   }
   if (!passwordValue) {
    highlightError($passwordInput,"Password can't be blank")
   }
}

$form.addEventListener('submit',(event) =>{
    event.preventDefault();
    validate()
}) 
/* }) */