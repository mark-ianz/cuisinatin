<<<<<<< HEAD
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

function displayError (errorMessage) {
  const ERROR_DIV = document.querySelector ('.js-error-message');
  
  const html = `
    <p class="error-message">
      ${errorMessage}
    </p>
  `
  ERROR_DIV.innerHTML += html;
=======
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

function displayError (errorMessage) {
  const ERROR_DIV = document.querySelector ('.js-error-message');
  
  const html = `
    <p class="error-message">
      ${errorMessage}
    </p>
  `
  ERROR_DIV.innerHTML += html;
>>>>>>> origin/main
}