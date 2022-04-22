<?php
session_start();
if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { 

$db = mysqli_connect('localhost', 'root', 'admin', 'atw');

if (isset($_POST['update'])) {

    
    $id=$_POST['id'];
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $email=$_POST['email'];
    $user_level=$_POST['user_level'];
    $status=$_POST['status'];

    if ($status==$enabled){
        $_SESSION['enabled']==TRUE;
        }else {
            $_SESSION['enabled']==FALSE;
        }
    

    $sql="UPDATE user SET name='$name', surname='$surname', email='$email', user_level='$user_level', status='$status' WHERE id='$id'";

    $result=$db->query($sql);

    if($result==TRUE){
        echo "Data has been updated succesfully.";
    } else {
        echo "Error: ". $sql . "<br>" . $db->error;
    }
}

if (isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="SELECT * FROM user WHERE id='$id'";

    $result=$db->query($sql);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $name=$row['name'];
                $id=$row['id'];
                $surname=$row['surname'];
                $email=$row['email'];
                $user_level=$row['user_level'];
                $status=$row['status'];
                $enabled=$row['enabled'];

            }

            ?>
            <h2> User Update Form </h2>
            <form action="" method="POST">
                <fieldset>
                    <legend>Personal Information:</legend>
                    First Name: <br>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <br>
                    Last Name: <br>
                    <input type="text" name="surname" value="<?php echo $surname; ?>">
                    <br>
                    Email: <br>
                    <input type="email" name="email" value="<?php echo $email; ?>">
                    <br><br>
                    <label for="user_level">Account Type:</label>
                    <select name="userl_level" value="<?php echo $user_level; ?>">
                    <option value="none" selected disabled hidden><?php if ($user_level=='0'){echo "User";}else {echo "Admin";} ?></option>
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                    </select>
                    <br><br>
                    <label for="status">Status:</label>
                    <select name="status" value="<?php echo $status; ?>">
                    <option value="none" selected disabled hidden><?php if ($status=='0'){echo "Inactive";}else {echo "Active";} ?></option>
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                    </select>

            
                    <br><br>
                    <input type="submit" value="Update" name="update">            
                </fieldset> 
            </form>
            <a href="index.php"><button>Home page</button></a>
            <a href="mgmt.php"><button>Manage Users page</button></a>   
        </body>
        </html>
<?php
        }
}

// fechar a liga��o � base de dados
mysqli_close ($db);

} else {
  header ('Location: login.php');
} 
?>