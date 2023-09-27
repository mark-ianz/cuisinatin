const openEyeImage = document.querySelector ('.js-open-eye');
const closeEyeImage = document.querySelector ('.js-close-eye');
const passwordInput = document.querySelector ('.js-password');
const usernameInput = document.querySelector ('.js-username');
const usernameWarning = document.querySelector ('.js-username-warning')
const passwordWarning = document.querySelector ('.js-password-warning')
const userPlaceholder = document.querySelector ('.js-user-placeholder')
const passwordPlaceholder = document.querySelector ('.js-password-placeholder')

function togglePassword () {
  if (passwordInput.type === 'password') {
    openEyeImage.style.display = "none";
    closeEyeImage.style.display = "block";
    passwordInput.type = 'text';
  }
  else if (passwordInput.type === 'text') {
    closeEyeImage.style.display = "none";
    openEyeImage.style.display = "block";
    passwordInput.type = 'password';
  }
}

function login () {
  if (usernameInput.value === '' && passwordInput.value === '') {
    usernameWarning.style.display = 'block';
    passwordWarning.style.display = 'block';
    console.log ('BOTH NONE')
    return
  }
  else if (usernameInput.value !== '' && passwordInput.value === '') {
    passwordWarning.style.display = 'block';
    console.log ('PASSWORD NONE')
    return
  }
  else if (passwordInput.value !== '' && usernameInput.value === '') {
    usernameWarning.style.display = 'block';
    console.log ('USERNAME NONE');
    return
  }
  location.href = "../index.html"
}

function keyListener (event) {
  if (event.key === 'Enter') {
    login ();
  }
}

function checkForWarning (event, input) {
  if (event.key && event.key !=='Shift' && event.key !=='Tab' && input === 'user') {
    usernameWarning.style.display = 'none';
  }
  else if (event.key && event.key !=='Shift' && event.key !=='Tab' && input === 'password') {
    passwordWarning.style.display = 'none';
  }
}