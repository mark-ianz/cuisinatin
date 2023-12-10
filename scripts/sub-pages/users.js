const TEXT = document.querySelector ('.js-post-text');
const SHOW_POSTS = document.querySelector ('.js-show-posts');
const HIDE_POSTS = document.querySelector ('.js-hide-posts');
const VIEW_CONTENT = document.querySelector ('.js-view-content');
const CARD_CONTAINER = document.querySelector ('.js-card-container');
const ABOUT_CONTAINER = document.querySelector ('.js-about-cont');

SHOW_POSTS.addEventListener ('click', showPost);
HIDE_POSTS.addEventListener ('click', hidePost);


function showPost () {
  SHOW_POSTS.style.display = "none";
  HIDE_POSTS.style.display = "flex";
  TEXT.innerText = "Hide Posts";
  VIEW_CONTENT.style.display = "flex";
  ABOUT_CONTAINER.style.minHeight = "0";
  ABOUT_CONTAINER.style.maxHeight = "50px";
  CARD_CONTAINER.scrollLeft = 0;
}

function hidePost () {
  SHOW_POSTS.style.display = "flex";
  HIDE_POSTS.style.display = "none";
  TEXT.innerText = "Show Posts";
  VIEW_CONTENT.style.display = "none";
  ABOUT_CONTAINER.style.minHeight = "150px";
  ABOUT_CONTAINER.style.maxHeight = "250px";
}

const SCROLL_LEFT = document.querySelector ('.js-scroll-left');
const SCROLL_RIGHT = document.querySelector ('.js-scroll-right');


SCROLL_LEFT.addEventListener ('click', ()=> {
  CARD_CONTAINER.scrollLeft -= 420;
});

SCROLL_RIGHT.addEventListener ('click', ()=> {
  CARD_CONTAINER.scrollLeft += 420;

});