// Reusable form validation function
const validateForm = (form: HTMLFormElement) => {
    const inputs = form.querySelectorAll("input")
  
    const isEmail = (email: string) => {
      return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)
    };
  
    const isName = (name: string) => {
      return /^[a-zA-Z -]+$/.test(name)
    };
  
    const highlightError = ($input: HTMLInputElement, errorMessage: string) => {
      $input.parentElement?.classList.add("form__field--error")
      $input.nextElementSibling?.innerText = errorMessage
    };
  
    const clearError = ($input: HTMLInputElement) => {
      $input.parentElement?.classList.remove("form__field--error")
      $input.nextElementSibling?.innerText = ""
    }
  
    const validateInput = ($input: HTMLInputElement) => {
      const inputValue = $input.value.trim()
      clearError($input)
  
      switch ($input.type) {
        case "text":
          if (!inputValue) {
            highlightError($input, `${$input.name} can't be blank`)
          } else if (!isName(inputValue)) {
            highlightError($input, `${$input.name} can't contain special characters or numbers`)
          }
          break;
        case "email":
          if (!inputValue) {
            highlightError($input, `${$input.name} can't be blank`);
          } else if (!isEmail(inputValue)) {
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
  
    inputs.forEach((input) => validateInput(input as HTMLInputElement));
  };
  
  document.addEventListener("DOMContentLoaded", () => {
    const $form = document.querySelector(".js-form") as HTMLFormElement;
  
    $form.addEventListener("submit", (event) => {
      event.preventDefault();
      validateForm($form);
    });
  });