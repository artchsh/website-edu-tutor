function getPage(page) {
    window.open(page, '_blank').focus();
    //document.getElementById("viewer").src = `${page}`;
    //document.getElementById("btn-download").href = `${page}`;
}              

function userProfile(x) {
   switch(x){
      case(1):
         document.getElementById("myDropdown").classList.toggle("show");
         document.getElementById("myDropdown").classList.toggle("animate__fadein");
         break;
      case(2):
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
         var openDropdown = dropdowns[i];
         if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
         }
       } 
       break;
       }
}

