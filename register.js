function validateForm() {
    let x = document.forms["myform"]["fname"].value;
    if (x == "") {
      alert("First Name must be filled out");
      return false;
    }
    let y = document.forms["myform"]["lname"].value;
    if (y == "") {
      alert("Last Name must be filled out");
      return false;
    }
    let z = document.forms["myform"]["email"].value;
    if (z == "") {
      alert("Name must be filled out");
      return false;
    }
    let a = document.forms["myform"]["city"].value;
    if (x == "") {
      alert("Name must be filled out");
      return false;
    }
    let b = document.forms["myform"]["pword"].value;
    if (b == "") {
      alert("Name must be filled out");
      return false;
    }
}