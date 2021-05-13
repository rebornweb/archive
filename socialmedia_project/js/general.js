//alert('wang');
function checkForm() {
    var form = document.forms["commentForm"];
     
 if(form.comment.value == "") {
      alert("Your comment appears to be blank");
      form.comment.focus();
      return false;
    }
    
  // validation was successful
    return true;
}

