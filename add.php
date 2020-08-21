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
	 <label for="Roll number">Roll number:</label>
	 <br />
	 <input type="text" name="rollno" required>
     <br   />
     <label for="department">Department:</label>
	 <br />
	 <input type="text" name="department" required>
     <br   />
     <br/>
	
     <input type="submit" value="add"  name="add">
     <input type="submit" value="delete"  name="delete">
     
   </form>
   <p>click here to <a href="update.php">update</a></p> 
   <p>click here to <a href="search.php">search </a></p>
   
</div>
</body>
</html>