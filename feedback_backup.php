<?php
include('config/db.php');
include('function.php');
$userId = fetchUserId();
$locationId = fetchLocationId();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Toyota Yaris</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
 <script  src="js/jquery.min.js"></script>
<script  src="js/jquery.validate.min.js"></script>
<script  src="admin/javascript/javascript.js"></script>

<script src="js/bootstrap.min.js"></script>



<style>
*{ margin:0; padding:0}
body{ font-family:Verdana, Geneva, sans-serif; font-size:14px}
.container {
    max-width: 100%;
    margin: 0 auto;
}
.container {
    width: 100%;
    padding: 00;
}    
label.error {
    color: #ff0000;
    font-size: 12px;
    margin-top: 5px;
    display: inline-block;
}
#age-error, #r21-error, #r1-error, #r2-error, #r0-error, #agree-error{display: block}    
#state{ display: flex}    
#mobileno-error{display: block;}    
#state-error, #city-error{ display: block}    
#gender-error{ display: block}    
.form-area{ padding:30px}
.form-group {
    margin-bottom: 13px;
	position: relative;
    clear: both
}
div#demoForm .form-group {
    clear: none;
}    
label.blue-bg {
    background: #ec5964;
    width: 17%;
    display: inline-block;
    padding: 2px 0;
    color: #fff;
    float: left;
    padding: 12px 0 12px 6px;
    margin: 0;
    /* float: left; */
}
#brand1-error, #carmodelid1-error, #yr1-error{    margin-left: 41px;}    
input.form-field {
    background: #eaeaea;
    border: none;
    width: 81%;
    height: 44px;
	color:#545454;
    padding-left: 5px;
    /* float: right; */
}
select {
    background: #eaeaea;
    width: 155px;
    border: none;
    height: 44px !important;
	color:#545454;
	font-size:14px;
}
.modal-dialog {
      margin: 100px auto;
}    
.action {
    text-align: center;
    margin-top: 32px;
}
button.blue-bg {
    background: #C42124;
    border: none;
    padding: 13px 33px;
    color: #fff;
	font-size:18px;
} 

button.blue-bg:hover {
    background:#ec5964;
    border: none;
    padding: 13px 33px;
    color: #fff;
	font-size:18px;
}
span.req {
    color: red;
    position: absolute;
    left: -17px;
    top: 12px;
}
.page-footer {
    position: relative;
    margin-top: 30px;

}
.page-footer  .left {
    float: left;
}
.page-footer  .right {
    float: right;
	
}
#current-own{
    display: flex;
    align-items: flex-start;
    }    
.brand-block {
    margin-bottom: 10px;
}
.brand-block .remove {
    display: none;
}    
.brand-block + .brand-block .remove {
    display: inline-block !important;
    background: #e43e3e;
    padding: 10px 12px;
    color: #fff;
    border-radius: 3px;
    cursor: pointer;
    margin-left: 10px;
}
.add, label{cursor: pointer;}       
.otp-box{
    text-align: center;
    margin: 0 auto;
}
input.form-field {
    background: #eaeaea;
    border: none;
    width: 31%;
    height: 44px;
    /* float: right; */
    padding-left: 5px;
    box-sizing: border-box;
    color: #545454;
    font-size: 14px;
    margin-bottom: 0px;
}
select {
    background: #eaeaea;
    width: 155px;
    border: none;
    height: 44px;
	color:#545454;
	font-size:14px
}
.otp-action {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 20px;
    display: block
}
.form-group strong {
    margin-bottom: 0;
    display: block;
}
button.blue-bg {
    background: #ec5964;
    border: none;
    padding: 13px 33px;
    color: #fff;
}
span.req {
    color: red;
    position: absolute;
    left: -17px;
    top: 12px;
}
.page-footer {
    position: relative;
    margin-top: 30px;
}
.page-footer  .left {
    float: left;
}
.page-footer  .right {
    float: right;
}
hr {
    margin: 20px auto;
    border-color: #fff !important;
}
#otp-error {
    color: #ff0000;
    display: block;
    margin-top: 11px;
    font-size: 12px;
} 
.text-left{ text-align:left}
#name-error, #mobile-error, #email-error, #address-error, #pincode-error, #select1-error, #select2-error{ display: block}
    #select2-error{margin-left: 40px}
table.table.table-bordered.table-striped input {
    border: none;
    background: transparent;
}
.modal-body  input[type=button]{
    background: #94bcce;
    border: none;
    padding: 10px 20px;
    color: #fff;
    }    
    </style>

</head>

<body>

<div class="header" style="height: 80px;padding: 20px 0px; ">
    <div style="float: left;margin-left: 30px;">
        <img src="images/Toyota.jpg" alt=""  height="40">
    </div>
    <div style="float: right;margin-right: 30px;">
        <img src="images/Yaris.jpg" height="40" alt="">
    </div>
</div>

<form class="cmxform" id="commentForm" method="post" enctype="multipart/form-data">
<div class="container">
<div class="image">

</div>
<div style="text-align:center">
    <h2 style="font-size: 16px;">REGISTRATION FORM</h2>
    <small style="margin-top:20px; margin-left:20px; text-transfor:uppercase"><strong><?=$_SESSION['location_name'];?></strong></small>
</div>	
<div class="form-area">
<div class="form-group">
<span class="req">*</span><label class="blue-bg">Name:</label><input class="form-field" name="name" id="username" onKeyPress="edValueKeyPress()" onKeyUp="edValueKeyPress()" style="width:83%" />
</div>
<div class="form-group">
<span class="req">*</span><label class="blue-bg">Mobile No.:</label>
<input class="form-field" name="mobile" style="width:50%"  id="mobileno"   onKeyPress="edValueKeyPress()" onKeyUp="edValueKeyPress()"/>
<small style="margin-top: 5px;color: #696565;position: absolute;left: 68%;top: 7px;"></small>
</div>
<div class="form-group">
<span class="req">*</span><label class="blue-bg">Email ID:</label><input class="form-field" name="email" id="email" onKeyPress="edValueKeyPress()" onKeyUp="edValueKeyPress()" style="width:83%"/>
</div>
<div class="form-group">
<span class="req">*</span><label class="blue-bg">Age:</label>
<select name="age" class="18-70 valid" aria-invalid="false" id="age" onChange="edValueKeyPress()" style="width:50%; height:44px">

<option value="">Select age</option> 
 	 <option value="19">19</option>
								 <option value="20">20</option>
								 <option value="21">21</option>
								 <option value="22">22</option>
								 <option value="23">23</option>
								 <option value="24">24</option>
								 <option value="25">25</option>
								 <option value="26">26</option>
								 <option value="27">27</option>
								 <option value="28">28</option>
								 <option value="29">29</option>
								 <option value="30">30</option>
								 <option value="31">31</option>
								 <option value="32">32</option>
								 <option value="33">33</option>
								 <option value="34">34</option>
								 <option value="35">35</option>
								 <option value="36">36</option>
								 <option value="37">37</option>
								 <option value="38">38</option>
								 <option value="39">39</option>
								 <option value="40">40</option>
								 <option value="41">41</option>
								 <option value="42">42</option>
								 <option value="43">43</option>
								 <option value="44">44</option>
								 <option value="45">45</option>
								 <option value="46">46</option>
								 <option value="47">47</option>
								 <option value="48">48</option>
								 <option value="49">49</option>
								 <option value="50">50</option>
								 <option value="51">51</option>
								 <option value="52">52</option>
								 <option value="53">53</option>
								 <option value="54">54</option>
								 <option value="55">55</option>
								 <option value="56">56</option>
								 <option value="57">57</option>
								 <option value="58">58</option>
								 <option value="59">59</option>
								 <option value="60">60</option>
								 <option value="61">61</option>
								 <option value="62">62</option>
								 <option value="63">63</option>
								 <option value="64">64</option>
								 <option value="65">65</option>
								 <option value="66">66</option>
								 <option value="67">67</option>
								 <option value="68">68</option>
								 <option value="69">69</option>
								 <option value="70">70</option>
								 <option value="71">71</option>
								 <option value="72">72</option>
								 <option value="73">73</option>
								 <option value="74">74</option>
								 <option value="75">75</option>
								 <option value="76">76</option>
								 <option value="77">77</option>
								 <option value="78">78</option>
								 <option value="79">79</option>
								 <option value="80">80</option>
								 <option value="81">81</option>
								 <option value="82">82</option>
								 <option value="83">83</option>
								 <option value="84">84</option>
								 <option value="85">85</option>
								 <option value="86">86</option>
								 <option value="87">87</option>
								 <option value="88">88</option>
								 <option value="89">89</option>
								 <option value="90">90</option>
								 <option value="91">91</option>
								 <option value="92">92</option>
								 <option value="93">93</option>
								 <option value="94">94</option>
								 <option value="95">95</option>
								 <option value="96">96</option>
								 <option value="97">97</option>
								 <option value="98">98</option>
								 <option value="99">99</option>
							                       
</select>


</div>
<div class="form-group">
<span class="req">*</span><label class="blue-bg">Gender:</label>
<label style="margin-left: 20px;margin-top: 15px;margin-right: 20px;font-size: 18px;font-weight: lighter;"><input type="radio" name="gender" id="gender" value="Male" onClick="edValueKeyPress()"/> Male</label> 
<label style="margin-left: 20px;margin-top: 15px;margin-right: 20px;font-size: 18px;font-weight: lighter;"><input type="radio" name="gender" id="gender" value="Female" onClick="edValueKeyPress()"/> Female</label> 
</div>
<div class="form-group" id="state" style="float:left">
<span><span class="req">*</span>
    
<!--    <span>City</span>&nbsp;-->
    <select name="state" style="margin-right:15px" id="select1" onChange="getcitywithstate(this.value) ">
    <option value="">City</option>
								 <option value="1">BANGALORE</option>
							                       
    </select></span>
<input type="hidden" name="statehid" id="statehid">
<input type="hidden" name="cityhid" id="cityhid">


</div>

    <div class="form-group" style="display: inline-block;margin-left: 25px;">
        <span class="req">*</span><label class="blue-bg" style="    width: 50%; margin-left: 0;">Pin Code:</label>
<input class="form-field" name="pincode" onKeyPress="edValueKeyPress()" style="    width: 50%;" onKeyUp="edValueKeyPress()" id="pincodenew"/>
        
    </div>


<!--
<div class="action">
<button class="blue-bg" onclick="window.location.href='index2.html'">NEXT</button>
</div>
-->




    <div class="form-group">
   <span class="req" style="top:12px">*</span> <label class="blue-bg"  style="width:25%"> Occupation:</label> 
         <label style="margin-left: 20px;margin-top: 15px;margin-right: 20px;font-size: 18px;font-weight: lighter;"><input type="radio" name="occupation" id="occupation" value="Business" onClick="edValueKeyPress()"/> Business</label> 
        <label style="margin-left: 20px;margin-top: 15px;margin-right: 20px;font-size: 18px;font-weight: lighter;"><input type="radio" name="occupation" id="occupation" value="Service" onClick="edValueKeyPress()"/> Service</label> 
        <label style="margin-left: 20px;margin-top: 15px;margin-right: 20px;font-size: 18px;font-weight: lighter;"><input type="radio" name="occupation" id="occupation" value="Others" onClick="edValueKeyPress()"/> Others</label> 
    
    </div>
    
    <div class="form-group" style="margin-bottom:20px" id="own-car">
<span class="req" style="top:12px">*</span> <label class="blue-bg"  style="width:25%"> Do you own a car?:</label> 
 <label style="margin-left: 20px;margin-top: 15px;margin-right: 20px;font-size: 18px;font-weight: lighter;"><input type="radio" name="r21" id="r21" value="yes" onClick="edValueKeyPress()"/> Yes</label> 
 <label style="font-size: 18px;font-weight: lighter;"><input type="radio"  name="r21" id="r21" value="no" onClick="edValueKeyPress()" /> No</label>
</div>  
    <div class="detail-box" style="display: none">
    <div class="form-group" id="current-own">
    <label class="blue-bg" style="margin-right:30px; float: left">Current Car owned:</label>  
       <div class="brand-wrapper" >
           <div class="brand-block">
           
   <div id="demoForm"  style="display:flex">
         <div class="form-group" style="width: 200px;float: left;"><span class="req" style="position: relative;top: 2px;margin-left: 30px;left: -10px;">*</span>
             <select name="brand1" id="brand1" onChange="getcarmodels1(this.value)">
              <option value="">Brand</option>
                                    <option value="1">Aston Martin</option>
                                                           <option value="5">Audi</option>
                                                           <option value="6">BMW</option>
                                                           <option value="7">Datsun</option>
                                                           <option value="8">Fiat</option>
                                                           <option value="9">Ford</option>
                                                           <option value="10">Force</option>
                                                           <option value="11">Honda</option>
                                                           <option value="12">Hyundai</option>
                                                           <option value="13">Isuzu</option>
                                                           <option value="14">Jaguar</option>
                                                           <option value="15">Jeep</option>
                                                           <option value="16">Land Rover</option>
                                                           <option value="17">Lexus</option>
                                                           <option value="18">Mahindra</option>
                                                           <option value="19">Maruti</option>
                                                           <option value="20">Mercedes-Benz</option>
                                                           <option value="21">MINI</option>
                                                           <option value="22">Mitsubishi</option>
                                                           <option value="23">Nissan</option>
                                                           <option value="25">Renault</option>
                                                           <option value="26">Skoda</option>
                                                           <option value="27">Tata</option>
                                                           <option value="28">Toyota</option>
                                                           <option value="29">Volkswagen</option>
                                                           <option value="30">Volvo</option>
                                                                    
             </select>
                     
                     <input type="hidden" name="brandid1" id="brandid1" value="">
                     <input type="hidden" name="modelid1" id="modelid1" value="">
             <input type="hidden" name="brandid2" id="brandid2" value="">
                     <input type="hidden" name="modelid2" id="modelid2" value="">
             <input type="hidden" name="brandid3" id="brandid3" value="">
                     <input type="hidden" name="modelid3" id="modelid3" value="">
                     </div>
        
        <div class="form-group" style="width: 200px;float: left;">
              <span class="req" style="position: relative;top: 2px;margin-left: 30px;left: -10px;">*</span>
                     <span id="carmodel1"> 
                     <select name="carmodelid1" id="carmodelid1" onChange="setcarmodelid1(this.value)">
                    
                 
                  <option value="">Car Model</option>
                                         
                           
             </select>
                    </span>
         </div>
    
               <div class="form-group" style="width: 200px;float: left;">
                   <span class="req" style="position: relative;top: 2px;margin-left: 30px;left: -10px;">*</span>
                    <select name="yr1" id="yr1" onChange="edValueKeyPress()">
                                 <option value="">How old is your vehicle</option>
                                 
                                               
                                                     <option value="0 - 1  year old">0 - 1  year old</option>
                                                                       <option value="1 - 3  years old">1 - 3  years old</option>
                                                                       <option value="3 - 5  years old">3 - 5  years old</option>
                                                                       <option value="5 +  years old">5 +  years old</option>
                                                                          
                                 </select> <span class="remove">Remove</span>
               </div>
              
              </div>
               </div>
               
               <div class="brand-block" style="display:none">
           
   <div id="demoForm" style="display:flex">
        <div class="form-group">
              <span class="req" style="position: relative;top: 2px;margin-left: 30px;left: -10px;opacity: 0">*</span>
             <select name="brand2" id="brand2" onChange="getcarmodels2(this.value)">
              <option value="">Brand</option>
                                    <option value="4">Aston Martin</option>
                                                           <option value="5">Audi</option>
                                                           <option value="6">BMW</option>
                                                           <option value="7">Datsun</option>
                                                           <option value="8">Fiat</option>
                                                           <option value="9">Ford</option>
                                                           <option value="10">Force</option>
                                                           <option value="11">Honda</option>
                                                           <option value="12">Hyundai</option>
                                                           <option value="13">Isuzu</option>
                                                           <option value="14">Jaguar</option>
                                                           <option value="15">Jeep</option>
                                                           <option value="16">Land Rover</option>
                                                           <option value="17">Lexus</option>
                                                           <option value="18">Mahindra</option>
                                                           <option value="19">Maruti</option>
                                                           <option value="20">Mercedes-Benz</option>
                                                           <option value="21">MINI</option>
                                                           <option value="22">Mitsubishi</option>
                                                           <option value="23">Nissan</option>
                                                           <option value="25">Renault</option>
                                                           <option value="26">Skoda</option>
                                                           <option value="27">Tata</option>
                                                           <option value="28">Toyota</option>
                                                           <option value="29">Volkswagen</option>
                                                           <option value="30">Volvo</option>
                                                                    
             </select>
         </div>
        
        <div class="form-group"> <span class="req" style="position: relative;top: 2px;margin-left: 30px;left: -10px; opacity: 0">*</span>
                    
                     <span id="carmodel2"> 
                     <select name="carmodelid2" id="carmodelid2" onChange="setcarmodelid2(this.value)">
                    
                       <option value="">Car Model</option>
                           
             </select>
                    </span>
                 </div>
              <div class="form-group">
                    <span class="req" style="position: relative;top: 2px;margin-left: 30px;left: -10px; opacity: 0">*</span>  <select name="yr2" id="yr2">
                                 <option value="">Year of purchase </option>
                                 
                                                     <option value="0 - 1  year old">0 - 1  year old</option>
                                                                       <option value="1 - 3  years old">1 - 3  years old</option>
                                                                       <option value="3 - 5  years old">3 - 5  years old</option>
                                                                       <option value="5 +  years old">5 +  years old</option>
                                                                          
                                 </select>
               </div>
              
              </div>
               </div>
               
               <div class="brand-block" style="display:none" >
           
   <div id="demoForm" style="display:flex">
         <div class="form-group">
             <span class="req" style="position: relative;top: 2px;margin-left: 30px;left: -10px;opacity: 0">*</span>
             <select name="brand3" id="brand3" onChange="getcarmodels3(this.value)">
              <option value="">Brand</option>
                           
                                    <option value="4">Aston Martin</option>
                                                           <option value="5">Audi</option>
                                                           <option value="6">BMW</option>
                                                           <option value="7">Datsun</option>
                                                           <option value="8">Fiat</option>
                                                           <option value="9">Ford</option>
                                                           <option value="10">Force</option>
                                                           <option value="11">Honda</option>
                                                           <option value="12">Hyundai</option>
                                                           <option value="13">Isuzu</option>
                                                           <option value="14">Jaguar</option>
                                                           <option value="15">Jeep</option>
                                                           <option value="16">Land Rover</option>
                                                           <option value="17">Lexus</option>
                                                           <option value="18">Mahindra</option>
                                                           <option value="19">Maruti</option>
                                                           <option value="20">Mercedes-Benz</option>
                                                           <option value="21">MINI</option>
                                                           <option value="22">Mitsubishi</option>
                                                           <option value="23">Nissan</option>
                                                           <option value="25">Renault</option>
                                                           <option value="26">Skoda</option>
                                                           <option value="27">Tata</option>
                                                           <option value="28">Toyota</option>
                                                           <option value="29">Volkswagen</option>
                                                           <option value="30">Volvo</option>
                                                                    
             </select>
         </div>
        
       <div class="form-group">
               <span class="req" style="position: relative;top: 2px;margin-left: 30px;left: -10px; opacity: 0">*</span>
                     <span id="carmodel3"> 
                     
                     <select name="carmodelid3" id="carmodelid3" onChange="setcarmodelid3(this.value)">
                     <option value="">Car Model</option>
                           
                                     <option value="1">Vitara Brezza</option>
                                                           <option value="2">Celerio</option>
                                                           <option value="6">Baleno</option>
                                                                    
             </select>
         </div>
       </span>
    
               <div class="form-group">
                   <span class="req" style="position: relative;top: 2px;margin-left: 30px;left: -10px; opacity: 0">*</span> 
                                 <select name="yr3" id="yr3" onChange="edValueKeyPress()">
                                 <option value="">How old is your vehicle</option>
                                
                                                     <option value="0 - 1  year old">0 - 1  year old</option>
                                                                       <option value="1 - 3  years old">1 - 3  years old</option>
                                                                       <option value="3 - 5  years old">3 - 5  years old</option>
                                                                       <option value="5 +  years old">5 +  years old</option>
                                                                          
                                 </select>
               </div>
              
              </div>
               </div>
               
               
<!--
          <div class="action text-left" style="padding-left: 10px;">
    <button class="blue-bg add">Add +</button>
    </div>
-->
       </div>
       
    </div>
    
   
    
   
    
    
    


        </div>
        
 <div class="form-group" style="margin-bottom:20px" id="interestDiv">
<span class="req" style="top:12px">*</span> <label class="blue-bg"  style="width:25%"> Would you be interested in test drive?:</label> 
 <label style="margin-left: 20px;margin-top: 15px;margin-right: 20px;font-size: 18px;font-weight: lighter;"><input type="radio" name="testDrive" id="testDrive" value="yes" onClick="edValueKeyPress()"/> Yes</label> 
 <label style="font-size: 18px;font-weight: lighter;"><input type="radio"  name="testDrive" id="testDrive" value="no" onClick="edValueKeyPress()" /> No</label>

<div id="test-driveDiv" style="display: none;">
<div class="form-group" id="current-own">
<label class="blue-bg" style="margin-right:30px; float: left">Driving Licence No:</label>
<div class="brand-wrapper" >
<div class="brand-block">
<div id="demoForm"  style="display:flex">
<div class="form-group" style="width: 200px;float: left;"><!--<span class="req" style="position: relative;top: 2px;margin-left: 30px;left: -10px;">*</span>--><input type="text" name="dl_no" id="dl_no" value="">
</div>
<div class="form-group" style="width: 200px;float: left;"> <!--<span class="req" style="position: relative;top: 2px;margin-left: 30px;left: -10px;">*</span> --><span id="carmodel1"><input type="file" name="image" accept="image/*" capture="environment"></span> </div>
</div>
</div>
</div>
</div>
</div>
  </div>  
    
<div class="form-group" style="margin-bottom:20px">
<span class="req" style="top:4px">*</span> <strong style="font-size: 22px; margin-bottom:10px">Next  car  purchase plan:</strong> 

 <label style="font-size: 18px;font-weight: lighter; margin-right:20px;  white-space:nowrap"><input type="radio"  name="r0" id="1" value="Within 3 months" onClick="edValueKeyPress()"/> Within 3 months</label>
    <label style="font-size: 18px;font-weight: lighter; margin-right:20px;  white-space:nowrap"><input type="radio"  name="r0" id="2" value="3 - 6 months" onClick="edValueKeyPress()"/> 3 - 6 months</label>
    <label style="font-size: 18px;font-weight: lighter; margin-right:20px;  white-space:nowrap"><input type="radio"  name="r0" id="3" value="6 months to 1 year" onClick="edValueKeyPress()"/> 6 months to 1 year</label>
    <label style="font-size: 18px;font-weight: lighter; margin-right:20px;  white-space:nowrap"><input type="radio"  name="r0" id="4" value="No current plan" onClick="edValueKeyPress()"/> No current plan</label>
    </div>
<div class="form-group" style="margin-top:20px" ><span class="req">*</span>
    <label class="blue-bg" style="width:25%">Nearest Dealership</label> 
    <span id="citytd" style="width:70%">
    <select name="city" id="city">
    <option value="">Select</option>

    </select>
    </span>
    </div>
    
    <div class="form-group">
<span class="req" style="top:2px">*</span> <label>
<input type="checkbox" name="agree" /> I Agree to the</label> <a href="terms-and-conditions.php" target="_new">Terms & Conditions</a>


</div>

<div class="action">
<button class="blue-bg" type="submit">Submit</button>
</div>


</div>









</div>

    </div>
    </form>
    
    
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <a href="#" style="float: right;" data-dismiss="modal" class="btn btn-sm btn-default">Edit <i class="fa fa-pencil" style="    margin-left: 6px;margin-top: 2px;"></i></a>
          <h4 class="modal-title">Preview</h4>
        </div>
         <form id="mainformtable" method="post" name="mainformtable">
        <div class="modal-body">
       
          <table class="table table-bordered table-striped">
              <tbody>
                  
                      <tr>
                          <th>Name </th>   
                          <td > <input type="text" name="uname" id="uname" readonly></td>
                          
                      </tr>
                       <tr>
                          <th>Mobile No.</th>
                          <td id=""><input type="text" name="mno" id="mno" readonly></td>
                      </tr>
                     <tr>
                          <th>Email ID</th>
                      <td id="" style="width:100%;"> <textarea style="
    width:  100%;
    border:  none;
    resize:  none;
    background:  none;
" name="emmail" id="emmail" readonly></textarea></td>
                      </tr>
                         <tr>
                          <th>Age</th>
                          <td id=""> <input type="text" name="aage" id="aage" readonly></td>
                      </tr>
                       <tr>
                          <th>Gender</th>
                          <td id=""> <input type="text" name="ggender" id="ggender" readonly>   </td>
                      </tr>
                       <tr>
                          <th>City</th>
                          <td id=""> <input type="text" name="sstate" id="sstate" readonly>   </td>
                      </tr>
                       
                       
                         <tr>
                          <th>Pincode</th>
                          <td id="">  <input type="text" name="ppincodenew" id="ppincodenew" readonly></td>
                      </tr>
                       <tr>
                          <th>Occupation</th>
                          <td id="">  <input type="text" name="ooccupation" id="ooccupation" readonly> </td>
                      </tr>
                       <tr>
                          <th>Do you own a car?</th>
                      <td id="nocar" style="display:none">No</td>
                          <td id="yescar" style="display:none">
                     <table style="table-layout: fixed;" class="table table-bordered">
                      <tr><td id=""> <input type="text" name="brand11" id="brand11" readonly></td>
                      <td id=""> <input type="text" name="car11" id="car11" readonly></td>
                      
                      <td id=""><input type="text" name="yr11" id="yr11" readonly></td></tr>
                      
                      <tr id="td12" style="display:none">
                      <td id=""><input type="text" name="brand12" id="brand12" readonly></td>
                      <td id=""><input type="text" name="car12" id="car12" readonly></td>
                      <td id=""><input type="text" name="yr12" id="yr12" readonly></td>
                      </tr>
                      
                      <tr id="td13" style="display:none">
                      <td id=""><input type="text" name="brand13" id="brand13" readonly></td>
                      <td id=""><input type="text" name="car13" id="car13" readonly></td>
                      <td id=""><input type="text" name="yr13" id="yr13" readonly></td></tr>
                      
                      </table></td>
                      
                      </tr>
                      
                      
                       <tr>
                          <th>Next car purchase plan</th>
                          <td id=""><input type="text" name="rr0" id="rr0" readonly></td>
                      </tr>
                      <tr>
                          <th>Dealer</th>
                          <td id="" style="width:100%;"><input type="text" name="ccity" id="ccity" readonly style="width:100%;">    </td>
                      </tr>
                       
                        
                  <input type="hidden" name="useridnew" id="useridnew" value="<?php echo $userId;?>" >
                  <input type="hidden" name="locationnew" id="locationnew" value="<?php echo $locationId;?>">
              </tbody>
          </table>
          <div class=" text-center">
          <input type="button" name="formsubmitbutton" id="formsubmitbutton" value="Submit" onClick="formsubmit()">
         <!-- <button type="button" class="btn btn-success btn-lg" data-dismiss="modal" data-toggle="modal" data-target="#otp-modal">Submit</button>-->
        </div>
        </div>
         </form>
      </div>
      
    </div>
  </div>
     
   
   <div class="modal fade" id="otp-modal" role="dialog" data-backdrop="static" data-keyboard="false">
    <form  id="commentFormnew" method="post" name="commentFormnew">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body">
    <div class="otp-box">

    <p style="margin-bottom: 20px; font-size:20px">A verification code has been sent to </p><p style="font-size:17px" id="mobilenostr"><strong >+91 9876543210</strong></p>
    <hr>
    <label>Enter OTP</label> <input class="form-field" name="otp" id="otp">

 <div id="otpsreseenddone" style="display:none;text-align:center"> Otp again sent successfully to your mobile</div> 
 <div id="seondtimer" style="display:none;text-align:center">Resend button will get  active in <span id="countdowntimer">30</span> Seconds</div> 
 

<br>

<div class="otp-action">
<input type="button" style="
    padding: 10px 20px;
    background: #fff;
    border: none;
    color: #222;
    border:1px solid #ccc;
" value="Resend" id="resendotp" name="resendotp">



 <input style="
    padding: 10px 20px;
    background: #94bcce;
    border: none;
    color: #fff;
    border:1px solid transparent;" type="button" value="Submit" name="submitotp" id="submitotp" >
</div>	
 		
</div>
        </div>
       
      </div>
      
    </div>
    </form>
  </div>     
    
    
  <div class="modal fade" id="thankyou" role="dialog">
    
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body">

<h1 style="text-align: center; padding:55px 0">Thank You</h1>
<div class="otp-action">
 <button style="
    padding: 10px 20px;
    background: #94bcce;
    border: none;
    color: #fff;
    border:1px solid transparent;" type="button" data-dismiss="modal">Close</button>
</div>	
 		

        </div>
       
      </div>
      
    </div>
    
  </div>      



<script>
$(document).ready(function(){
  $('#interestDiv #testDrive').click(function(){
  var inte = $(this).val();
  if(inte == 'yes') {
	$("#interestDiv #test-driveDiv").css('display','block');
  } else {
   $("#interestDiv #test-driveDiv").css('display','none');
  }
  }) 
 })	

function edValueKeyPress()

    {
        var edValue = document.getElementById("username");
     	document.getElementById('uname').value=edValue.value;  
    
        
		 var edValue1 = document.getElementById("mobileno");
      	document.getElementById('mno').value=edValue1.value;  
		
		
		document.getElementById('mobilenostr').innerHTML=edValue1.value;
		
		var edValue2 = document.getElementById("email");
        document.getElementById('emmail').value=edValue2.value;  
		
		
		var edValue3 = document.getElementById("age");
       	document.getElementById('aage').value=edValue3.value;  
		
		
			
	var radios = document.getElementsByName('gender');

for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {
        // do whatever you want with the checked radio
      var edValue4 =radios[i].value;

        // only one radio can be logically checked, don't check the rest
        break;
    }
}
    
    document.getElementById('ggender').value=edValue4; 
		
		
	
		
		
		var newvalue = document.getElementById("pincodenew").value;
		
        document.getElementById('ppincodenew').value=newvalue;
		
		
	var radios = document.getElementsByName('occupation');

for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {
        // do whatever you want with the checked radio
      var edValue7 =radios[i].value;

        // only one radio can be logically checked, don't check the rest
        break;
    }
}
    
    document.getElementById('ooccupation').value=edValue7; 
		
		
       
		
		var radios = document.getElementsByName('r21');

for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {
        // do whatever you want with the checked radio
      var s13 =radios[i].value;

        // only one radio can be logically checked, don't check the rest
        break;
    }
}
	
if(s13=='yes')


{
			document.getElementById('nocar').style.display="none";

			document.getElementById('yescar').style.display="block";
	
	
	
		var t = document.getElementById("brand1");
		var statetext = t.options[t.selectedIndex].text;
	 	document.getElementById('brand11').value=statetext; 
	
		var a = document.getElementById("carmodelid1");	
		var cartext = a.options[a.selectedIndex].text;
		document.getElementById('car11').value= cartext; 
		
		var c = document.getElementById("yr1");
		var yrtext = c.options[c.selectedIndex].text;
		document.getElementById('yr11').value= yrtext; 
		
		
		var d = document.getElementById("brand2");
var statetext2 = d.options[t.selectedIndex].text;
var e = document.getElementById("carmodelid2");
var cartext2 = e.options[e.selectedIndex].text;

	var f = document.getElementById("yr2");
var yrtext2 = f.options[f.selectedIndex].text;

var carr=document.getElementById("carmodelid2").selectedIndex;
var yrrr=document.getElementById("yr2").selectedIndex;

if(((statetext2!='')&&(carr!=''))&&(yrrr!=''))

{
	document.getElementById('td12').style.display="block";
	

		
        document.getElementById('brand12').value=statetext2; 
		 document.getElementById('car12').value=cartext2; 
	   document.getElementById('yr12').value=yrtext2; 
       
	}	
		
		
		var g = document.getElementById("brand3");
var statetext3 = g.options[t.selectedIndex].text;
var h = document.getElementById("carmodelid3");
var cartext3 = h.options[h.selectedIndex].text;

var i = document.getElementById("yr3");
var yrtext3 = i.options[i.selectedIndex].text;

var carrrr=document.getElementById("carmodelid3").selectedIndex;
var yrrrrr=document.getElementById("yr3").selectedIndex;

if(((statetext3!='')&&(carrrr!=''))&&(yrrrrr!=''))

{
	document.getElementById('td13').style.display="block";
	
		 document.getElementById('brand13').value=statetext3; 
		 document.getElementById('car13').value=cartext3; 
	   document.getElementById('yr13').value=yrtext3; 
	 
		 
		}
	
	}
	else{
		
		 var elements1 = document.getElementById("brand1").selectedOptions;

    for(var a = 0; a < elements1.length; a++){
      elements1[a].selected = false;
    }
	
	 var elements2 = document.getElementById("carmodelid1").selectedOptions;

    for(var b = 0; b < elements2.length; b++){
      elements2[b].selected = false;
    }
	
	 var elements3 = document.getElementById("yr1").selectedOptions;

    for(var c = 0; c < elements3.length; c++){
      elements3[c].selected = false;
	  
    }
	  document.getElementById('brand11').value=''; 
	   document.getElementById('car11').value=''; 
	   document.getElementById('yr11').value=''; 
		document.getElementById('yescar').style.display="none";
		document.getElementById('nocar').style.display="block";
		document.getElementById('td12').style.display="none";
		document.getElementById('td13').style.display="none";
	
		}		
			var radios = document.getElementsByName('r0');

for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {
        // do whatever you want with the checked radio
      var s8 =radios[i].value;

        // only one radio can be logically checked, don't check the rest
        break;
    }
}
    
    document.getElementById('rr0').value=s8; 
		
		
		
		
	
        
		
		
		
		var t = document.getElementById("select1");
	
var statetext = t.options[t.selectedIndex].text;
		

		document.getElementById('sstate').value=statetext; 
		
		var tnew = document.getElementById("city");
		//alert("Tnew : "+tnew);
	    var citytext = tnew.options[tnew.selectedIndex].text;
		//alert(citytext);
		document.getElementById('ccity').value=citytext; 
		
		
		  }

</script>

<script>


jQuery.validator.addMethod("addresspat", function(value, element)
{
return this.optional(element) || /^[-a-zA-Z-0-9()_@.#&+-v]+(\s+[-a-zA-Z-0-9()_@.#&+-v]+)*$/i.test(value);
}, "Accepts letters,digits and special characters only");
jQuery.validator.addMethod("mobilenumber", function(value, element) 
{
return this.optional(element) || /^[6789]\d{9}$/i.test(value);
}, "Please enter correct mobile number");

jQuery.validator.addMethod("emailcode", function(value, element) 
{
return this.optional(element) || /^[a-z0-9]+[a-z0-9\._]*@[a-z0-9\.]+\.[a-z]{2,3}$/i.test(value);
}, "Please enter correct email address");

$(function(){ 
   
    
$("#commentForm").validate({
    rules: {
            name: {
                required: true,
				addresspat:true,
            },
            mobile: {
                required: true,
				number:true,
                mobilenumber: true,
            },
            email:{
                required: true,
                emailcode:true
            },
            age: {
                    required: true,
					
                },
            gender: {
                required: true,
            },
            state: {
                required: true,
            },
            city: {
                required: true,
            },
           
            pincode: {
                required: true,
                maxlength: 6,
                minlength:6,
				number:true,
                
                
            },
			occupation: {
                
				addresspat:true,
            },
            r21: {
                required: true,
            },
            r0: {
                required: true,
            },
            
            agree: {
                required: true,
            },
        
        brand1:
			{
				required: '#r21[value="yes"]:checked'},
        
		carmodelid1:
			{
				required: '#r21[value="yes"]:checked'},
      
		yr1:
			{
				required: '#r21[value="yes"]:checked'},
        
		 },
    messages:{
        name:"Please enter your name",
        mobile: {
                required: "Please enter your mobile no.",
                
                
            },
        email:"Please enter valid email id",
        age:"Please select your age",
        gender:"Please select gender",
        state:"Please select city",
        city:"Please select a dealer",
        address:"Please enter complete address",
        pincode: {
                required: "Please enter your pincode",
                maxlength:"Please enter valid pincode",
                minlength:"Please enter valid pincode",
                number: "Please enter valid pincode"
                
            },
        r21: {
                required: "Please select an option"
            },
        r0: {
                required: "Please select an option",
            },
	brand1:{
        required: "Please select an option",},
		carmodelid1:{
        required: "Please select an option",},
		
		yr1:{
        required: "Please select an option",},
		
		
		
    },
    
     errorPlacement: function(error, element) 
        {
            if ( element.is(":radio, :checkbox") ) 
            {
                error.appendTo( element.parents('.form-group') );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
         },
    
    submitHandler: function () {
                  $('#myModal').modal() 
                          }
						  
						  
						  
});

$("#commentFormnew").validate({
	//alert(cal);
                rules: {
                
				otp:{
				required: true,      
				number: true,
				minlength:6,
				
                },
				
				messages:{
       
        otp: {
                required: "Please enter otp.",
				
                
                
            },
      
       
		
		
		
    },
	
						  
				
					        },
			
   
			
	})
	

    })
	function isNumberKey(evt)
      {
		  
		 var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
         
		 { 
		   return false;}
else{
         
		 return true;
		 
}}


function formsubmit()
    {
	  //alert("formsubmit");
     $("#formsubmitbutton").attr("disabled", "disabled");
    //var data = $("#mainformtable").serialize();
	$.post("feedback_process.php", $("#mainformtable").serialize(), function(data) {
	//alert(data);
	var obj = jQuery.parseJSON(data); 
	if(obj['status'] == 1) {
		  $('#myModal').modal('hide');    
          $('#otp-modal').modal('show');		 
		 } else if(obj['logged'] == false) { 
		  $('#formsubmitbutton').removeAttr('disabled');
           alert('Something went wrong1');			   
		 }
	 
	});
	
	/*uname=$("#uname").val();
	mno=$("#mno").val();
	emmail=$("#emmail").val();
	aage=$("#aage").val();
	ggender=$("#ggender").val();
	sstate=$("#sstate").val();
	ccity=$("#ccity").val();
	
	ppincodenew=$("#ppincodenew").val();
	ooccupation=$("#ooccupation").val();
	
	brand11=$("#brand11").val();
	car11=$("#car11").val();
	yr11=$("#yr11").val();
	brand12=$("#brand12").val();
	car12=$("#car12").val();
	yr12=$("#yr12").val();
	brand13=$("#brand13").val();
	car13=$("#car13").val();
	yr13=$("#yr13").val();
	rr0=$("#rr0").val();
	useridnew=$("#useridnew").val();
	locationnew=$("#locationnew").val();
	
	$.ajax({
        type: "POST",
		dataType:'json',
        url: "feedback_process.php",
        data: { 
           
           uname:uname,
	mno:mno,
	emmail:emmail,
	aage:aage,
		ggender:ggender,
	sstate:sstate,
	ccity:ccity,
	
	ppincodenew:ppincodenew,
	ooccupation:ooccupation,
	brand11:brand11,
	car11:car11,
	yr11:yr11,
	brand12:brand12,
	car12:car12,
	yr12:yr12,
	brand13:brand13,
	car13:car13,
	yr13:yr13,
	rr0:rr0,
	locationnew:locationnew,
	
	useridnew:useridnew
        },
		
        success: function(result) {
		//alert(result.status);	
 	    if(result.status==1)
		 {
		  $('#myModal').modal('hide');    
          $('#otp-modal').modal('show');
		 }
		 
        },
        error: function(result) {
			  $('#formsubmitbutton').removeAttr('disabled');
           alert('Something went wrong1');	 
        }
    });*/
}

  $(function(){
        $('#own-car input').change(function(){
            var k = $(this).val();
            if(k=='yes'){
                $('.detail-box').show()
            } else{
                $('.detail-box').hide()
            }
        })
        
        $('.add').click(function(){
            $('.brand-block').last().clone(true).prependTo('.brand-wrapper')
        })
        
        $('.remove').click(function(){
            $(this).parents('.brand-block').remove();
        })
        
    })

 
	


$(function(){
    
        
  
    
    
  
    $options1 = $select4.find( 'option' );
    
$select3.on( 'change', function() {
	$select4.html( $options1.filter( '[value="' + this.value + '"]' ) );
} ).trigger( 'change' );
    
    
     //Reference: https://jsfiddle.net/fwv18zo1/
        
	
    
    $options2 = $select6.find( 'option' );
    
$select5.on( 'change', function() {
	$select6.html( $options2.filter( '[value="' + this.value + '"]' ) );
} ).trigger( 'change' );
    
    
    $options3 = $select8.find( 'option' );
    
$select7.on( 'change', function() {
	$select8.html( $options3.filter( '[value="' + this.value + '"]' ) );
} ).trigger( 'change' );    
    
 
    
    })
	
    function getcitywithstate(id){
		//alert(id);
	
	edValueKeyPress();
 var xmlHttpReq = false;
    if (window.XMLHttpRequest)

	 {
        xmlHttpReq = new XMLHttpRequest();

    }
    else if (window.ActiveXObject)
	 {
        xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");

    }
	xmlHttpReq.onreadystatechange = function()
      {
		 if (xmlHttpReq.readyState == 4)
	   {    
			response=xmlHttpReq.responseText;
			//alert(response)
			
			document.getElementById('statehid').value=id;
			
			document.getElementById('citytd').innerHTML=response;
				document.getElementById('cityhid').value=''; 
				 
			}else{
		document.getElementById('city').length=2
		document.getElementById('city').options[0].text="Loading..."
		   }
		}
	 xmlHttpReq.open('GET','ajaxcall/getcitylist.php?id='+id, true);
	 xmlHttpReq.send(null); 	
}

function setcityvalue(id)
{
	document.getElementById('cityhid').value=id;	
	}
    
	function getcarmodels2(id){
	
	edValueKeyPress();
 var xmlHttpReq = false;
    if (window.XMLHttpRequest)

	 {
        xmlHttpReq = new XMLHttpRequest();

    }
    else if (window.ActiveXObject)
	 {
        xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");

    }
	xmlHttpReq.onreadystatechange = function()
      {
		 if (xmlHttpReq.readyState == 4)
	   {    
			response=xmlHttpReq.responseText;
			//alert(response)
			
			document.getElementById('brandid2').value=id;
			
			document.getElementById('carmodel2').innerHTML=response;
				document.getElementById('modelid2').value=''; 
				 
			}else{
		document.getElementById('carmodelid2').length=2
		document.getElementById('carmodelid2').options[0].text="Loading..."
		   }
		}
	 xmlHttpReq.open('GET','admin/ajaxCallToPhp/getcarmodelid1.php?id='+id, true);
	 xmlHttpReq.send(null); 	
}

function setcarmodelid2(id)
{edValueKeyPress();
	document.getElementById('modelid2').value=id;	
	}
	
	
	
	
		
	function getcarmodels3(id){
	
	edValueKeyPress();
 var xmlHttpReq = false;
    if (window.XMLHttpRequest)

	 {
        xmlHttpReq = new XMLHttpRequest();

    }
    else if (window.ActiveXObject)
	 {
        xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");

    }
	xmlHttpReq.onreadystatechange = function()
      {
		 if (xmlHttpReq.readyState == 4)
	   {    
			response=xmlHttpReq.responseText;
			//alert(response)
			
			document.getElementById('brandid3').value=id;
			
			document.getElementById('carmodel3').innerHTML=response;
				document.getElementById('modelid3').value=''; 
				 
			}else{
		document.getElementById('carmodelid3').length=2
		document.getElementById('carmodelid3').options[0].text="Loading..."
		   }
		}
	 xmlHttpReq.open('GET','admin/ajaxCallToPhp/getcarmodelid2.php?id='+id, true);
	 xmlHttpReq.send(null); 	
}

function setcarmodelid3(id)
{edValueKeyPress();
	document.getElementById('modelid3').value=id;	
	}
	
	
	
	
	
	
	
	
	

	function getcarmodels1(id){
	edValueKeyPress();
	
   var xmlHttpReq = false;
    if (window.XMLHttpRequest)

	 {
        xmlHttpReq = new XMLHttpRequest();

    }
    else if (window.ActiveXObject)
	 {
        xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");

    }
	xmlHttpReq.onreadystatechange = function()
      {
		 if (xmlHttpReq.readyState == 4)
	   {    
			response=xmlHttpReq.responseText;
			//alert(response)
			
			document.getElementById('brandid1').value=id;
			
			document.getElementById('carmodel1').innerHTML=response;
				document.getElementById('modelid1').value=''; 
				 
			}else{
		document.getElementById('carmodelid1').length=2
		document.getElementById('carmodelid1').options[0].text="Loading..."
		   }
		}
	 xmlHttpReq.open('GET','ajaxcall/getcarmodelid.php?id='+id, true);
	 xmlHttpReq.send(null); 	
}

function setcarmodelid1(id)
{edValueKeyPress();
	document.getElementById('modelid1').value=id;	
	}
	


function otpverify()
    {
		
    var data = $("#commentFormnew").serialize();
	
	
	mno=$("#mno").val();
	otp=$("#otp").val();
	
	
	$.ajax({
        type: "POST",
		dataType:'json',
        url: "verfifyfirst.php",
        data: { 
           
           mno:mno,
	otp:otp,
	
	
        },
		
        success: function(result) {
			
		if(result.status==1)
		 {
			 
			 $('#otp-modal').modal('hide');
		$('#thankyou').modal('show');
		 }
		 if(result.status==0)
		 {
		alert('Wrong Otp');
		 }
		 
        },
        error: function(result) {
           alert('error');	 
        }
    });
}

	$('#submitotp').on('click', function(){

  var validornot12 =$("#commentFormnew").valid();
  
  if(validornot12==true){
	otpverify();
  };

	});
	
	$('#resendotp').on('click', function(){


	resendeotp();

	});

	
function resendeotp()
    {
		
		
    var data = $("#commentFormnew").serialize();
	
	
	mno=$("#mno").val();
	otp=$("#otp").val();
	
	
	$.ajax({
        type: "POST",
		dataType:'json',
        url: "sendsecond.php",
        data: { 
           
           mno:mno,
	otp:otp,
	
	
        },
		
        success: function(result) {
			
		if(result.status==1)
		 {
			 
	 document.getElementById('otpsreseenddone').style.display='block';
	
        $("#resendotp").attr("disabled", "disabled");
       
		 document.getElementById('seondtimer').style.display='block'; 
		 
		  var timeleft = 30;
    var downloadTimer = setInterval(function(){
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft < 0){
        clearInterval(downloadTimer);
     document.getElementById('seondtimer').style.display='none';
      $('#resendotp').removeAttr('disabled');
      $('#countdowntimer').text('30');
    }
    },1000);
  
  
}
		
		 
        },
        error: function(result) {
           alert('error');	 
        }
    });
}
	
/** show test drive box**/

</script>
<script>
$('#thankyou').on('hidden.bs.modal', function () {
   location.reload();
})
</script>


</body>
</html>
