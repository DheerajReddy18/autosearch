<html>
<head>
   <title> Login </title>
   <style>
      .container{
	     font-size:20px;
		 border-collapse:seperate;
		 border-spacing:5px;
	     position:absolute;
	     top:40%;
		 left:40%;
		 outline:3px solid black;
         outline-offset:20px;
         alignment
          
	  
	   }
	    body{
            background-color:lightgrey;
            
        }
   </style>
</head>
<body>
  <div class="container" >
     <h3 style="text-align:center">  NITT</h3>
   <form  action="search.php" method="post">
        
	 <label for="name">Name:</label>
	 <br />
	 <input type="text" name="fname" required >
     <br  />
     <label for="name"> NEW Name:</label>
	 <br />
	 <input type="text" name="uname" required >
	 <br  />
	 <label for="Roll number">Roll number:</label>
	 <br />
	 <input type="numbers" name="rollno" required>
     <br   />
     <label for="Roll number"> NEW Roll number:</label>
	 <br />
	 <input type="numbers" name="urollno" required>
     <br   />
     <label for="department">Department:</label>
	 <br />
	 <input type="text" name="department" required>
     <br   />
     <br/>
     <label for="department">NEW Department:</label>
	 <br />
	 <input type="text" name="udepartment" required>
     <br   />
     <br/>
	
    
     <input type="submit" value="update"  name="update">
     
   </form>
   <p>click here to <a href="add.php">go back</a></p> 
   <p>click here to <a href="search.php">search</a> </p>
   
</div>
</body>
</html>
