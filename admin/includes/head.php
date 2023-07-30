<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Laboratory System</title>
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- some css for addbtn -->
<link rel="stylesheet" href="assets/css/addbtn.css">

<!-- some css for printbtn -->
<link rel="stylesheet" href="assets/css/print.css">

<style>
body {margin:0;}

.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  padding: 16px;
  margin-top: 115px;
  /*height: 1500px;  Used in this example to enable scrolling */
}
.admin{
  text-align: right;
  font-size: 17px;
  margin-right:10px;
}

/*Alerts css*/
div {
  margin-bottom: 15px;
  padding: 4px 12px;
}
.success {
  background-color: #ddffdd;
  border-left: 6px solid #04AA6D; 
}
.danger {
  background-color: #ffdddd;
  border-left: 6px solid #f44336;
}
.warning {
  background-color: #ffffcc;
  border-left: 6px solid #ffeb3b;
}
#check {
 color:#04AA6D;
}
#exc {
 color:#ffeb3b;
}
#window {
 color:#f44336;
}
/*Alerts css*/

/* pagination css */
input[type="button"] {
	transition: all .3s;
    border: 1px solid #ddd;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 5px;
	font-size: 15px;
}

input[type="button"]:not(.active) {
	background-color:transparent;
}

.active {
	background-color: whitesmooth;
	color :#000;
}

input[type="button"]:hover:not(.active) {
	background-color: #ddd;
}
/* pagination css */

/*css for production seach*/
  .myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
/*css for production seach*/
/* search css */
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
/* search css */
</style>
<link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>