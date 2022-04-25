<?php 
 session_start();
 
  if (isset($_SESSION['user_email']) && isset($_SESSION['user_username']) && isset($_SESSION['user_level']) && $_SESSION['user_level'] == 1) { 
    $db = mysqli_connect('localhost', 'root', 'admin', 'atw');

    if (isset($_POST['update'])) {
        $parent = $_POST['parent'];
        $child = $_POST['child'];

        $sql="SELECT parent,child FROM relations WHERE parent = $child AND child = $parent";
        $result=$db->query($sql);

        $sql="SELECT parent,child FROM relations WHERE parent = $parent AND child = $child";
        $exist=$db->query($sql);

        if($result->num_rows>0){
            echo "<center>The selected parent term is a child and cannot be a parent</center>";
        }else if($exist->num_rows>0){
            echo "<center>The selected terms are already related</center>";
        }else{
            $sql="INSERT INTO relations (parent,child) VALUES ($parent,$child)";
            $result=$db->query($sql);

            if($result==TRUE){
                echo "<center>Data has been updated succesfully.</center>";
            } else {
                echo "Error: ". $sql . "<br>" . $db->error;
            }
        }
        echo "<center><br><a href='index.php'><button>Home page</button></a>
        <a href='javascript:history.back()'><button>Go Back</button></a></center>";
        
    }else {
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Manage relatioships</title>
</head>
  
<body>
    <center>
        <h1>Manage the relationships between terms:</h1>
  
        <form action="" method="post">
        <label for="parent">Parent term</label>               
        <select name="parent" value="parent">
            <?php
            $sql="SELECT id,title FROM terms";
            $result=$db->query($sql);

            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $id = $row['id'];
                    $title = $row['title'];  
                    ?>
                    <option value=<?php echo $id;?>><?php echo $title;?></option>
                <?php }
            }?>
        </select>

        <label for="child">child term</label>               
        <select name="child" value="child">
            <?php
            $sql="SELECT id,title FROM terms";
            $result=$db->query($sql);

            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $id = $row['id'];
                    $title = $row['title'];  
                    ?>
                    <option value=<?php echo $id;?>><?php echo $title;?></option>
                <?php }
            }?>
        </select>
        <br><br>
        <input type="submit" value="Update" name="update">   
        </form>
        <br>
        <a href="javascript:history.back()">
            <button>Go Back</button>
        </a>  
        <a href="javascript:history.back()">
            <button>relationship manager</button>
        </a>  

    </center>
</body>
  
</html>


<?php 
    }
}else {
   header("location: index.php");
}
 ?>
