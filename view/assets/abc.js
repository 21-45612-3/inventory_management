// registration validation form
function validate_registration() {
    let name = document.getElementById("Regname").value;
    let email = document.getElementById("Regemail").value;
    let password = document.getElementById("Regpw").value;
    let Confirm = document.getElementById("Regconfirm").value;

    
    
    /*if (name == ""  && email == "" && password == "" && Confirm == "") {
      document.getElementById("RegnameError").innerHTML = "Name can not be empty";
      document.getElementById("RegemailError").innerHTML = "Email can not be empty";
      document.getElementById("RegpwError").innerHTML = "Password can not be empty";
      document.getElementById("RegconfirmError").innerHTML = "Confirm Password can not be empty";
      return false;
  
    }
    else*/ if (name == ""  ) {
        document.getElementById("RegnameError").innerHTML = "Name can not be empty";
      
        return false;
    
      }
      else if(!alphabetic(name)){

        document.getElementById("RegnameError").innerHTML = "Name must be letters only without spase";
        return false;
               }

    else if ( email == "") {
       
        document.getElementById("RegemailError").innerHTML = "Email can not be empty";
        
        return false;
    
      }

      else if ( password == "" ) {
      
        document.getElementById("RegpwError").innerHTML = "Password can not be empty";
    
        return false;
    
        
      }

      else if(password.length < 8){

        document.getElementById("RegpwError").innerHTML = "Pasword must be at least 8 character";
        return false;
      }

      else if ( Confirm == "") {
        document.getElementById("RegconfirmError").innerHTML = "Confirm Password can not be empty";
        return false;
    
      }
     
      else if (password != Confirm) {
        document.getElementById("RegconfirmError").innerHTML =
          "Password and Confirm Password must be same";
        return false;
      } 
    
    }

    function alphabetic(input) {
      for (let i = 0; i < input.length; i++) {
          let char = input[i];
          if (!( (char >= 'a' && char <= 'z') || (char >= 'A' && char <= 'Z') )) {
              return false;
          }
      }
      return true;
  }

  
  