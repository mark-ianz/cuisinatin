const sidebarElement = document.querySelector ('.sidebar-container');
const menuElement = document.querySelector ('.hamburger-menu-container');
const closeImage = document.querySelector('.sidebar-close-button-container');
const sidebarModalElement = document.querySelector ('.modal-background');

function toggleSidebar () {
  if (sidebarElement.classList.contains ('sidebar-slide')) {
    sidebarElement.classList.add ('sidebar-hide');
    sidebarModalElement.style.display = 'none';
  }
  else {
    sidebarElement.classList.add ('sidebar-slide');
    sidebarElement.classList.remove ('sidebar-hide');
    sidebarModalElement.style.display = 'block';
  }
  setTimeout (checkSidebar, 500);
}

function checkSidebar () {
  if (sidebarElement.matches (".sidebar-slide.sidebar-hide") ) {
    sidebarElement.classList.remove ('sidebar-slide');
    sidebarElement.classList.remove ('sidebar-hide');
  }
}

function keyListener (event) {
  if (event.key === 'Enter') {
    location.href = "./webpages/error-page.html"
  }
}

/* ADD RECIPE */
const ADD_RECIPE_FORM = document.querySelector ('.main-container');
const ADD_RECIPE_INPUT = document.querySelector ('.add-recipe-input');
const RECIPE_LIST_CONTAINER = document.querySelector ('.recipe-list');
const ADD_RECIPE_BUTTON = document.querySelector ('.add-recipe');

let recipeList = [];

function addRecipe () {
  if (ADD_RECIPE_INPUT.value === '') {
    RECIPE_LIST_CONTAINER.innerHTML = `<p>Please input a recipe.</p>`;
    return
  }
  else {
    recipeList.push (ADD_RECIPE_INPUT.value);
  
    renderList ();
  
    ADD_RECIPE_INPUT.value = '';
  }
};

function renderList () {
  RECIPE_LIST_CONTAINER.innerHTML = '';
  RECIPE_LIST_CONTAINER.innerHTML = '<p style="font-weight:bold;">Recipes:</p><br>';
  recipeList.forEach ((value) => {
    let html =
    `
      <li>
        <p class="recipe">
          • ${value}
        </p>
        <input type="button" value="X" class="remove-recipe">
      </li>
    `;
    RECIPE_LIST_CONTAINER.innerHTML += html;
  });
  document.querySelectorAll ('.remove-recipe').forEach ((value,index) => {
    value.addEventListener ('click', () => {
      recipeList.splice (index, 1);
      RECIPE_LIST_CONTAINER.innerHTML = '';
      renderList ();
      if (recipeList.length === 0) {
        RECIPE_LIST_CONTAINER.innerHTML = '';
      }
    });
  });
}


ADD_RECIPE_BUTTON.addEventListener ('click', addRecipe);
/* ----------------- */


/* ADD PROCEDURE */
const ADD_PROCEDURE_INPUT = document.querySelector ('.add-procedure-input');
const PROCEDURE_LIST_CONTAINER = document.querySelector ('.procedure-list');
const ADD_PROCEDURE_BUTTON = document.querySelector ('.add-procedure');

let procedureList = [];

function addProcedure () {
  if (ADD_PROCEDURE_INPUT.value === '') {
    PROCEDURE_LIST_CONTAINER.innerHTML = `<p>Please input a PROCEDURE.</p>`;
    return
  }
  else {
    procedureList.push (ADD_PROCEDURE_INPUT.value);
  
    renderProcedure ();
  
    ADD_PROCEDURE_INPUT.value = '';
  }
};

function renderProcedure () {
  PROCEDURE_LIST_CONTAINER.innerHTML = '';
  PROCEDURE_LIST_CONTAINER.innerHTML = '<p style="font-weight:bold;">Procedures:</p>';
  procedureList.forEach ((value,index) => {
    let html =
    `
      <li>
        <p class="procedure">
          ${index+1}. ${value}
        </p>
        <input type="button" value="X" class="remove-procedure">
      </li>
    `;
    PROCEDURE_LIST_CONTAINER.innerHTML += html;
  });
  document.querySelectorAll ('.remove-procedure').forEach ((value,index) => {
    value.addEventListener ('click', () => {
      procedureList.splice (index, 1);
      PROCEDURE_LIST_CONTAINER.innerHTML = '';
      renderProcedure ();
      if (procedureList.length === 0) {
        PROCEDURE_LIST_CONTAINER.innerHTML = '';
      }
    });
  });
};


ADD_PROCEDURE_BUTTON.addEventListener ('click', addProcedure);
/* ----------------- */

const CLOSE_POST_BUTTON = document.querySelector ('.close-button');

CLOSE_POST_BUTTON.addEventListener ('click', history.back());