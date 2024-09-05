const SIGNUP_FORM = document.querySelector ('.js-signup-form');
const PASSWORD_INPUT = document.querySelector ('.js-password');
const CONFIRM_PASSWORD_INPUT = document.querySelector ('.js-confirm-password');
const QUESTION_1 = document.querySelector ('.js-question-1');
const QUESTION_2 = document.querySelector ('.js-question-2');
const QUESTION_3 = document.querySelector ('.js-question-3');

const ERROR_MESSAGE = document.querySelector ('.js-error-message');
const SHOW_PASSWORD_CHECKBOX = document.querySelector ('.js-show-password-checkbox');
const SHOW_PASSWORD_LABEL = document.querySelector ('.js-show-password-label');


SIGNUP_FORM.addEventListener ('submit', (event)=> {
  confirmPassword ();
  if (!confirmPassword ()) {
    event.preventDefault ();
  }
});


function confirmPassword () {
  if (PASSWORD_INPUT.value !== CONFIRM_PASSWORD_INPUT.value) {
    ERROR_MESSAGE.innerText = 'Password doesn\'t match';
    setTimeout (() => {
      ERROR_MESSAGE.innerText = '';
    }, 3000);
    return false
  }
  else {
    return true
  };
};

function togglePassword () {
  if (SHOW_PASSWORD_CHECKBOX.checked === true) {
    PASSWORD_INPUT.type = 'text';
  }
  else {
    PASSWORD_INPUT.type = 'password';
  };
};

SHOW_PASSWORD_CHECKBOX.addEventListener ('click', togglePassword);

SHOW_PASSWORD_LABEL.addEventListener ('click', ()=> {
  if (SHOW_PASSWORD_CHECKBOX.checked === true) {
    SHOW_PASSWORD_CHECKBOX.checked = false;
    togglePassword ();
  }
  else {
    SHOW_PASSWORD_CHECKBOX.checked = true;
    togglePassword ();
  };
});

function displayError (errorMessage) {
  ERROR_MESSAGE.innerText = errorMessage;
}