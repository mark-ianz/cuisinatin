function displayModal () {
  const MODAL_BG = document.querySelector ('.modal-bg');
  MODAL_BG.style.display = "flex";
  document.body.style.overflow = "hidden";
}


/* <---- COMMENT SECTION ----> */
const COMMENT_MODAL_ELEMENT = document.querySelector ('.comment-modal-bg');
const COMMENT_CB = document.querySelector ('.js-comment-cb');
const TOTAL_COMMENT = document.querySelector ('.js-total-comment');

/* WILL OPEN THE COMMENT SECTION */
function displayComments () {
  COMMENT_MODAL_ELEMENT.style.display ="flex";
  document.body.style.overflow = "hidden";
}
TOTAL_COMMENT.addEventListener ('click', ()=> {
  displayComments();
});

/* WILL CLOSE THE COMMENT SECTION */
function closeComment () {
  COMMENT_MODAL_ELEMENT.style.display ="none";
  document.body.style.overflow = "auto";
}

COMMENT_CB.addEventListener ('click', ()=> {
  closeComment ();
})



/* CHECK IF COMMENT IS EMPTY */
const ADD_COMMENT = document.querySelector ('.js-add-comment');
const ERROR_MESSAGE = document.querySelector ('.js-error-message');
function preventSubmit () {
  const COMMENT_INPUT = document.querySelector ('.js-comment-input');
  const comment = COMMENT_INPUT.value;

  if (comment.trim () === "") {
    event.preventDefault ();
    const ERROR_MESSAGE = document.querySelector ('.js-error-message');
    ERROR_MESSAGE.innerText = "Please input a valid comment.";
  }
}

ADD_COMMENT.addEventListener ('submit', ()=> {
  preventSubmit ();
})


const DISPLAY_MODAL = document.querySelectorAll ('.js-displayModal');
DISPLAY_MODAL.forEach ((button)=> {
  button.addEventListener ('click', displayModal);
})

/* VIEW CUISINE IMAGE */
const CUISINE_IMAGE_MODAL = document.querySelector ('.js-cuisine-image-modal-bg');
const CUISINE_IMAGE = document.querySelector ('.js-cuisine-image');
const IMAGE_CB = document.querySelector ('.js-image-cb');

CUISINE_IMAGE.addEventListener ('click',viewImage);
IMAGE_CB.addEventListener ('click',closeImage);


function viewImage () {
  CUISINE_IMAGE_MODAL.style.display = "flex";
}

function closeImage () {
  CUISINE_IMAGE_MODAL.style.display = "none";
}

const HISTORY_BACK = document.querySelectorAll ('.js-history-back');

HISTORY_BACK.forEach ((button)=> {
  button.addEventListener ('click', ()=> {
    history.back ();
  })
})

