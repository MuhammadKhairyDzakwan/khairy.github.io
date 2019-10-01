<h2>.:: Login ::.</h2>
<form action="" method="post" enctype="multipart/form-data" >
 <table border="0">
   <tr>
    <td>Username</td>
    <td><input type="text" name="username" /></td>
   </tr>
   <tr>
    <td>Password</td>
    <td><input type="password" name="pass" /></td>
   </tr>
   <tr>
     <td/>
     <td><input type="submit" value="login"  name="login" />
   </tr>
 </table>
belum punya akun? <a href="buat_akun.php">Buat Akun</a>
</form>
<?php
include "koneksi.php";
//$sql="select * from user where username='$username'";
 if(isset($_POST["login"])){
  $username= $_POST["username"];
  $password=$_POST["pass"];
  $sql ="select* from user where username='$username'";
  $result=mysqli_query($kon,$sql);
  if(mysqli_num_rows($result)===1){
    $row=mysqli_fetch_assoc($result);
    if($password==$row["password"]){
      if($row["username"]=="admin"){
        header("Location: utama_admin.php");
        exit;
      }
      header("Location: alam_tampil.php");
      exit;
    }
    echo "Username tidak Ada atau Password Salah";
  }
 
 }
?>