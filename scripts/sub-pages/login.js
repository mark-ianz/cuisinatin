import { accounts } from "../../data/account.js";

/* HIDE/SHOW PASSWORD SCRIPT */

const PASSWORD_INPUT = document.querySelector ('.js-password');
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


/* LOGIN SCRIPT */

const EMAIL_ELEMENT = document.querySelector ('.js-email');
const PASSWORD_ELEMENT = document.querySelector ('.js-password');
const LOGIN_BUTTON = document.querySelector ('.js-login-button');
const LOGIN_FORM = document.querySelector ('.js-login-form');
const ERROR_MESSAGE = document.querySelector ('.js-error-message');

LOGIN_BUTTON.addEventListener ('click', checkValidity);

function checkValidity () {
  let matchAccount = false;
  accounts.forEach ((account)=> {
    if (account.email === EMAIL_ELEMENT.value && account.password === PASSWORD_ELEMENT.value) {
      matchAccount = true;
    }
    else {
      return
    }
  });
    if (matchAccount === false) {
      LOGIN_FORM.addEventListener ('submit', ((event)=> {
        ERROR_MESSAGE.innerText = 'Incorrect email or password.';
        setTimeout (() => {
          ERROR_MESSAGE.innerText = '';
        }, 3000);
        event.preventDefault ();
      }));
    }
    else {
      return true
    }
};