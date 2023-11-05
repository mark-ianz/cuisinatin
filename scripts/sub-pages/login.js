import { accounts } from "../../data/account.js";

const PASSWORD_INPUT = document.querySelector ('.js-password');
const CONFIRM_PASSWORD_INPUT = document.querySelector ('.js-confirm-password');
const SHOW_PASSWORD_CHECKBOX = document.querySelector ('.js-show-password-checkbox');
const SHOW_PASSWORD_LABEL = document.querySelector ('.js-show-password-label');

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