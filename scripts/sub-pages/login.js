const openEyeImage = document.querySelector ('.js-open-eye');
const closeEyeImage = document.querySelector ('.js-close-eye');
const passwordInput = document.querySelector ('.js-password');
const usernameInput = document.querySelector ('.js-username');
const usernameWarning = document.querySelector ('.js-username-warning')
const passwordWarning = document.querySelector ('.js-password-warning')

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

