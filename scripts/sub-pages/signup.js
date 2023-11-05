import { accounts } from "../../data/account.js";

const SIGNUP_FORM = document.querySelector ('.js-signup-form');
const FIRST_NAME_INPUT = document.querySelector ('.js-first-name-input');
const LAST_NAME_INPUT = document.querySelector ('.js-last-name-input');
const PASSWORD_INPUT = document.querySelector ('.js-password');
const CONFIRM_PASSWORD_INPUT = document.querySelector ('.js-confirm-password');
const EMAIL_INPUT = document.querySelector ('.js-email-input');
const QUESTION_1 = document.querySelector ('.js-question-1');
const QUESTION_2 = document.querySelector ('.js-question-2');
const QUESTION_3 = document.querySelector ('.js-question-3');
const ANSWER_1 = document.querySelector ('.js-answer-1');
const ANSWER_2 = document.querySelector ('.js-answer-2');
const ANSWER_3 = document.querySelector ('.js-answer-3');
const ERROR_MESSAGE = document.querySelector ('.js-error-message');

SIGNUP_FORM.addEventListener ('submit', (event)=> {
  confirmPassword ();
  checkSecurityQuestion ();
  if (confirmPassword () === true && checkSecurityQuestion () === true && checkEmail () === true) {
    pushData ();
  }
  else {
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

function checkSecurityQuestion () {
  if (QUESTION_1.value === QUESTION_2.value || QUESTION_1.value === QUESTION_3.value || QUESTION_2.value === QUESTION_3.value) {
    ERROR_MESSAGE.innerText = 'Duplicate security question are not allowed';
    setTimeout (() => {
      ERROR_MESSAGE.innerText = '';
    }, 3000);
    return false
  }
  else {
    return true
  };
};

function checkEmail () {
  let matchEmail = false;

  accounts.forEach ((account)=> {
    if (account.email === EMAIL_INPUT.value) {
      matchEmail = true;
    }
    else {
      matchEmail = false;
    }
  });

  if (matchEmail === true) {
    ERROR_MESSAGE.innerText = 'Email is already registered';
    setTimeout (() => {
      ERROR_MESSAGE.innerText = '';
    }, 3000);
    return false;
  }
  else {
    return true
  }
}

function pushData () {
  accounts.push ({
    id: accounts.length + 1,
    firstName: FIRST_NAME_INPUT.value,
    lastName: LAST_NAME_INPUT.value,
    email: EMAIL_INPUT.value,
    password: PASSWORD_INPUT.value,
    secQ1: QUESTION_1.value,
    secQ2: QUESTION_2.value,
    secQ3: QUESTION_3.value,
    secA1: ANSWER_1.value,
    secA2: ANSWER_2.value,
    secA3: ANSWER_3.value,
    dateCreated: {
      month: new Date ().getMonth (),
      day: new Date ().getDate (),
      year: new Date ().getFullYear ()
    }
  });
  localStorage.setItem ('accounts', JSON.stringify (accounts));
};


