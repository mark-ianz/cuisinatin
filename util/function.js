function redirect (path, miliseconds) {
  setTimeout (()=> {
    location.href = path;
  },miliseconds)
}