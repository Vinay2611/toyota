<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Toyota Yaris</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
    width: 500px;
    padding: 0 0 0;
    margin: auto;
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
	transform: translate(-50%, -50%);
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 80px 45px;
  text-align: left;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 15px 0 0;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
  height:60px;
  font-size:20px
}
.form input[type=submit] {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px 0px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
 font-size:20px;
 text-decoration:none;
 display:inline-block;
 
}
.form a:hover,.form a:active,.form a:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #fff; /* fallback for old browsers */
	  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
.logo{ text-align:center; margin-bottom:22px}

form.cmxform label.error, label.error {
	color: red;
    font-style: normal;
    display: inline-block;
    text-align: left;
    margin-bottom: 0;
    font-size: 14px;
    margin-top: 6px;
    margin-left: 0;
    background: #ca0909;
    color: #fff;
    padding: 3px 6px;
    border-radius: 2px;
}
div.error { display: none; }
</style>
  
<script  src="js/jquery.min.js"></script>
<script  src="js/jquery.validate.min.js"></script>



</head>
<body>
<div class="login-page">
<div class="logo"><img src="images/logo2.jpg" /></div>	
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="Name" />
      <input type="password" placeholder="Password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    
    <form class="login-form" id="loginform" method="post">
      <input type="text" placeholder="Email" id="username" name="username"  autocomplete="off"/>
      <input type="password" placeholder="Password" id="password" name="password"/>
     <input type="submit" value="Login" name="submit" class="btn-success"/>
    </form>
  </div>
</div>

<script> 
    $(function(){
	jQuery.validator.addMethod("emailcode", function(value, element) 
{
return this.optional(element) || /^[a-z0-9]+[a-z0-9\._]*@[a-z0-9\.]+\.[a-z]{2,3}$/i.test(value);
}, "Please enter correct email address");


$("#loginform").validate({
	
                rules: {
                
				username:{
				required: true,
                emailcode: true
				},
				password: {
					required: true,
					minlength: 6
				},
            },
			
        submitHandler: submitForm
		
    });

 function submitForm()
    {		
    $.post("ajaxcall/login_process.php", $("#loginform").serialize(), function(data) {
	//alert(data);
	//return false;
	var obj = jQuery.parseJSON(data); 
	if(obj['logged'] == true) {
		 window.location.href='feedback.php';		 
		 } else if(obj['logged'] == false) { 
		    alert("Wrong credentials");			   
		 }
	 
	});
}
	


})



    </script>
</body>
</html>