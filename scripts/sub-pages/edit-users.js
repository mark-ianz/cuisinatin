const FORM = document.querySelector ('.js-form');
const SUBMIT_BUTTON = document.querySelector ('.js-submit');
const MODAL = document.querySelector ('.js-modal');
const CANCEL_BUTTON = document.querySelector ('.js-cancel');

function displayModal () {
  MODAL.style.display = "flex";
}

function removeModal () {
  MODAL.style.display = "none";
}

SUBMIT_BUTTON.addEventListener ('click', displayModal);
CANCEL_BUTTON.addEventListener ('click', removeModal);

function displayError (errorMessage) {
  const ERROR_DIV = document.querySelector ('.js-error-message');
  
  const html = `
    <p class="error-message">
      ${errorMessage}
    </p>
  `
  ERROR_DIV.innerHTML += html;
}