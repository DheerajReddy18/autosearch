
<html>
<head>
    <title>search bar</title>
    <style type="text/css">
   
     ul{
           float:left;
           list-style:none;
           padding-right:30 px;
           padding:0 px; 
           border:1px solid black;
           margin-left:0px;
           margin-top:0px;
           width:256px;
       }   
      li{
         margin-left:-40px;
         margin-right:40px;
         padding-right:30 px;
      
        } 
      input{
           width:300px;
        }
      li:hover{
                background:grey;
                color:white;
        
              }


       </style> 
</head>    
<body>
<div>
<input type="text" placeholder="search.." id="txt_search">
</div>
<ul id="searchresult"></ul>

<div id="userdetail"></div>



<script
  src="http://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous">
</script>
<script>
 $(document).ready(function(){
  $("#txt_search").keyup(function(){
   var search=$(this).val();
   if(search!=""){
     $.ajax(
      {
         url:'search.php',
         type:'post',
         data:{
                search:search,
                  

              },
          dataType:'json',    
         success:function(response){
           
           var len=response.length;
           $("#searchresult").empty();
           for(var i=0;i<len;i++)
            {
               var name=response[i]['name'];
               var rollno=response[i]['rollno'];
               var department=response[i]['department'];
               $("#searchresult").append("<li>"+name+"</li>");
            }
            $("searchresult li").bind("click",function(){
              
              var value=$(this).text();
              $("#txt_search").val(value);
              $("#searchresult").empty();
              for(var i=0;i<len;i++)
             {
              $("#userdetail").append("name:"+name+"<br/>");
              $("#userdetail").append("rollno:"+rollno+"<br/>");
              $("#userdetail").append("department:"+department+"<br/>");

             }
            });
         }
       

      }
     
      );

   }
  
   
});
});

</script>
</body>
</html>
<?php
$errors=array();
$db=mysqli_connect('127.0.0.1','root','');
mysqli_query($db ,"CREATE DATABASE stud");
mysqli_select_db($db,'stud');
$table1="CREATE TABLE info ( serialnumber INT(11) AUTO_INCREMENT PRIMARY KEY,name VARCHAR(255),rollno VARCHAR(255),department VARCHAR(255))";
mysqli_query($db,$table1);



if(isset($_POST['add']))
  {
  
    $name=mysqli_real_escape_string($db,$_POST['fname']);	  
    $rollno=mysqli_real_escape_string($db,$_POST['rollno']);	  
    $department=mysqli_real_escape_string($db,$_POST['department']);	
    $info_check_query="SELECT * FROM info WHERE name = '$name' or rollno='$rollno' LIMIT 1";  
    $result=mysqli_query($db,$info_check_query);
    $n=mysqli_fetch_assoc($result);
    if($n)
    {
    if($n['rollno']==$rollno)
      array_push($errors,"Roll number already exists");
    }  
    if(count($errors)==0) 
    {
        $query="INSERT INTO info(name,rollno,department) VALUES ('$name','$rollno','$department')";  
        if(mysqli_query($db,$query))
        echo "<script>alert('record added successfully')</script>";
        else
        echo "<script>alert('ERROR,Try again')</script>";

    }
    header("refresh:0;url=add.php");

  }

  if(count($errors)!=0)
  {
  
   foreach($errors as $error)
   {
     echo "<script>alert('roll number already exists')</script>" ;
 
   }
  }   
      



if(isset($_POST['search'])) 
{
  $searchtext=$_POST['search'];
  $arr=array();
  $info_check_query="SELECT * FROM info WHERE name LIKE '%$searchtext%'";  
  $result=mysqli_query($db,$info_check_query);	
  if(mysqli_num_rows($result)>0)
  {
      
       while($data=mysqli_fetch_assoc($result))
       {
         
          $name=$data['name'];
          $rollno=$data['rollno'];
          $department=$data['department'];
          $arr[]=array("name"=>$name,"rollno"=>$rollno,"department"=>$department);
       }
       
      echo json_encode($arr);
  }
} 
  




?>