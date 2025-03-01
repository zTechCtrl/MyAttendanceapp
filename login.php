<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/loader.css">
    <title>LoginPage</title>
</head>
<body>

    <dssiv class="loginform">
             <div class="inputgroup ">
                    <input  type="text" id="txtUsername" placeholder="Enter Username..." required>
                    <label for="username" id="lblUsername">USERNAME</label>
             </div>s

             <div class="inputgroup topmargin">
                    <input type="password" id="txtPassword" placeholder="Your Password..." required>
             <img class="eye" src="eye-slash-fill.svg" alt="eyes" id="eyeicon">
                    <label for="password" id="lblPassword">PASSWORD</label>
             </div>
             <div class="divcallforaction topmarginlarge">
                <button class="btnlogin inactivecolor" id="btnLogin">LOGIN</button>
             </div>  

             <div class="diverror" id="diverror">
              <label class="errormessage" id="errormessage"></label>
             </div>

       <div class="rgt-zone">
        <p>Not Registered yet <a href="Registration.php" class="rgt-link">Register here</a></p>
        </div>

    </dssiv>

    <div class="lockscreen" id="lockscreen">
       <div class="spinner" id="spinner"></div>
         <label class="lblwait topmargin" id="lblwait">PLEASE WAIT</label> 
    </div>


         <script src="js/jquery.js"></script>
        <script src="js/login.js"></script>
</body>
</html>