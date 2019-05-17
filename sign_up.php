<!DOCTYPE html>
<html>
<style>
/* Full-width input fields */

body{
 margin: 0 auto;
 background-repeat: no-repeat;
 background-size: 100% 720px;
  background-image: url("./images/ag.png");
 
}

.h2{
    margin-right: 20px;
}
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.signupbtn {
    float: left;
    width: 50%;
}

/* Add padding to container elements */
.container_sign{
    padding: 16px;
    width: 500px;
 height: 450px;
 /*text-align: center;*/ 
 margin: 0 auto;
 background-color: rgba(44, 62, 80,0.7);
 

}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}

@media(max-width: 667px){
    
        }
</style>
<body>

<h2 style="text-align:center;">Signup Form</h2>

<form action="" enctype="">
  <div class="container_sign">
     <label><b>First Name</b></label>
    <input type="text" placeholder="Enter first Name " name="fname" required>

    <label><b>Second  Name</b></label>
    <input type="text" placeholder="Enter Second Name " name="sname" required>

   <label><b>Username</b></label>
    <input type="text" placeholder="User name" name="username" required>

    <label><b>Email</b></label>
    <input type="text" placeholder="e.g @gmail" name="email" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pword" required>

    <label><b>Confirm Password</b></label>
    <input type="password" placeholder="Verify Password" name="pwordconfirm" required>
    <p>By creating an account you agree to our <a href="terms.html">Terms & Privacy</a></p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>