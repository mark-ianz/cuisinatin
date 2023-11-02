const passwordInput = document.querySelector ('.js-password');
const showPasswordCheckbox = document.querySelector ('.js-show-password-checkbox');
const showPasswordLabel = document.querySelector ('.js-show-password-label');
const ew = document.querySelector ('.login');


function togglePassword () {
  if (showPasswordCheckbox.checked === true) {
    passwordInput.type = 'text';
  }
  else {
    passwordInput.type = 'password';
  }
};

showPasswordCheckbox.addEventListener ('click', togglePassword);

showPasswordLabel.addEventListener ('click', ()=> {
  if (showPasswordCheckbox.checked === true) {
    showPasswordCheckbox.checked = false;
    togglePassword ();
  }
  else {
    showPasswordCheckbox.checked = true;
    togglePassword ();
  }
})