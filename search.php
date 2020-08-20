<?php include("server.php"); ?>
<html>
<head>
    <title>search bar</title>
    <style>
    body{
            background-color:lightgrey;
            
        }
       </style> 
</head>    
<body>

   <input type="text" id="myinput" onkeyup="myfunction()"   required >    
   <input type="submit" value="search"  onclick="myfunction()"  name="search">

 
<table id="mytable" border='1' text-align='center'>
    <tr>
       <th>Name</th>
       <th>Roll number</th>
       <th>Department</th>

    </tr>
    <?php 
       $que="SELECT * FROM info";
       $result=mysqli_query($db,$que);
       while($row=mysqli_fetch_array($result)) 
       {
          $name=$row['name'];
          $rollno=$row['rollno'];
          $department=$row['department'];
          echo "<tr><td>".$row['name']."</td><td>".$row['rollno']."</td><td>".$row['department']."</td>";

          
       }		 
    
    
    ?>

</table>  
<script>
  function myfunction(){
      var input=document.getElementById("myinput");
      var filter=input.value.toUpperCase();
      var table=document.getElementById("mytable");
      var tr=table.getElementsByTagName("tr");
      for(var i=0;i<tr.length;i++)
      {
        var td=tr[i].getElementsByTagName("td")[0];
        var t=tr[i].getElementsByTagName("td")[1];
        if(td)
        {
             var txtvalue=td.textContent ;
             if(txtvalue.toUpperCase().indexOf(filter)>-1)
              tr[i].style.display="";
             else
               tr[i].style.display="none"; 

               
        }
        if(t &&  tr[i].style.display=="none")
        {     
            var txt=t.textContent ;
             if(txt.toUpperCase().indexOf(filter)>-1)
              tr[i].style.display="";
             else
               tr[i].style.display="none"; 


        }
      } 
    }

</script>

</body>
</html>
