<?php
  $errors=array();
  $db=mysqli_connect('127.0.0.1','root','');
  mysqli_query($db ,"CREATE DATABASE student");
  mysqli_select_db($db,'student');
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
    header("refresh:1;url=add.php");

  }

  if(isset($_POST['delete']))
  {
     $name=mysqli_real_escape_string($db,$_POST['fname']);	 
     $department=mysqli_real_escape_string($db,$_POST['department']);	
     $rollno=mysqli_real_escape_string($db,$_POST['rollno']);
     $info_check_query="SELECT * FROM info WHERE name = '$name' or rollno='$rollno' LIMIT 1";  
     $result=mysqli_query($db,$info_check_query);
     $n=mysqli_fetch_assoc($result);
     if($n)
     {
     if($n['rollno']==$rollno && $n['department']==$department && $n['name']==$name)
     {
       $que="DELETE FROM info WHERE rollno=$rollno";
       if(mysqli_query($db,$que))
         echo "<script>alert('record deleted successfully')</script>";
       else 
        echo "<script>alert('ERROR,Try again')</script>";

     }
     else 
       echo "<script>alert('ERROR,Try again')</script>";
     
    }
    header("refresh:1;url=add.php");
  }
  
  if(isset($_POST['update']))
  {
    $name=mysqli_real_escape_string($db,$_POST['fname']);
    $uname=mysqli_real_escape_string($db,$_POST['uname']);	 
    $department=mysqli_real_escape_string($db,$_POST['department']);	
    $udepartment=mysqli_real_escape_string($db,$_POST['udepartment']);	
    $rollno=mysqli_real_escape_string($db,$_POST['rollno']);
    $urollno=mysqli_real_escape_string($db,$_POST['urollno']);
    $info_check_query="SELECT * FROM info WHERE name = '$name' or rollno='$rollno' LIMIT 1";  
    $result=mysqli_query($db,$info_check_query);
    $n=mysqli_fetch_assoc($result);
    if($n)
    {
    if($n['rollno']==$rollno && $n['department']==$department && $n['name']==$name)
    {
        $que="UPDATE info SET name='$uname',department='$udepartment',rollno='$urollno' WHERE rollno='$rollno' ";
        if(mysqli_query($db,$que))
        echo "<script>alert('record UPDATED successfully')</script>";
      else 
       echo "<script>alert('ERROR,Try again')</script>";

    }
    else 
    echo "<script>alert('ERROR,Try again')</script>";
  
   
    } 
    header("refresh:1;url=add.php");

  }


  
    if(count($errors)!=0)
    {
    
     foreach($errors as $error)
     {
       echo $error ;
       echo "<br>";
     }
    }   
        

?>