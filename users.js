const searchBar = document.getElementById("searchInput"),
userid = document.getElementById("myInput"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");

// searchIcon.onclick = ()=>{
//   searchBar.classList.toggle("show");
//   searchIcon.classList.toggle("active");
//   searchBar.focus();
//   if(searchBar.classList.contains("active")){
//     searchBar.value = "";
//     searchBar.classList.remove("active");
//   }
// }

searchBar.onkeydown = ()=>{
  let searchTerm = searchBar.value;
  let inputTerm = userid.value;
//   if(searchTerm != ""){
//     searchBar.classList.add("active");
//   }else{
//     searchBar.classList.remove("active");
//   }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
  xhr.send("inputTerm=" + inputTerm);
}

// setInterval(() =>{
//   let xhr = new XMLHttpRequest();
//   xhr.open("GET", "showusers.php", true);
//   xhr.onload = ()=>{
//     if(xhr.readyState === XMLHttpRequest.DONE){
//         if(xhr.status === 200){
//           let data = xhr.response;
//           if(!searchBar.classList.contains("active")){
//             usersList.innerHTML = data;
//           }
//         }
//     }
//   }
//   xhr.send();
// }, 500);

