function getPage(page) {
    window.open(page, '_blank').focus();
    //document.getElementById("viewer").src = `${page}`;
    //document.getElementById("btn-download").href = `${page}`;
}
/*
function showLoading(){
   document.getElementById("loading").style = "visibility: visible";
}

function hideLoading(){
   document.getElementById("loading").style = "visibility: hidden";
}

$("#btnFileToUpload").click(function () {     
   //call show loading function here
   showLoading();
   $.ajax({
       type: "POST",
       url: "./php_modules/upload.php",
       enctype: 'multipart/form-data',
       data: {
           file: myfile
       },
       success: function () {
           //call hide function here
           hideLoading();
           alert("Data has been Uploaded: ");
       },
       error  : function (a) {//if an error occurs
           hideLoading();
           alert("An error occured while uploading data.\n error code : "+a.statusText);
       }
   });
});
*/