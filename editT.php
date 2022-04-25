<?php
session_start();
if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { 

$db = mysqli_connect('localhost', 'root', 'admin', 'atw');

if (isset($_POST['update'])) {
    $id=$_POST['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $verification=$_POST['verification'];
    
    $sql="UPDATE terms SET title='$title', description='$description', verification='$verification' WHERE id='$id'";

    $result=$db->query($sql);

    if($result==TRUE){
        echo "Data has been updated succesfully.";
    } else {
        echo "Error: ". $sql . "<br>" . $db->error;
    }
}

if (isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="SELECT * FROM terms WHERE id='$id'";

    $result=$db->query($sql);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $title=$row['title'];
                $id=$row['id'];
                $description=$row['description'];
                $verification=$row['verification'];
            }

            ?>
            <h2> Term Update Form </h2>
            <form action="" method="POST">
                <fieldset>
                    <legend>Personal Information:</legend>
                    Title: <br>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <br>
                    Description: <br>
                    <input type="text" name="description" value="<?php echo $description; ?>">
                    <br>
                    <label for="verification">Verification:</label>
                    <select name="verification">
                        <?php
                        if ($verification=='0'){
                            echo "<option value='0' selected >Not verified</option>";
                            echo "<option value='1'>Verified</option>";
                        }else{
                            echo "<option value='0'>Not verified</option>";
                            echo "<option value='1' selected>Verified</option>";
                        }
                        ?>
                    </select>
                    <br><br>
                    <input type="submit" value="Update" name="update">            
                </fieldset> 
            </form>
            <a href="index.php"><button>Home page</button></a>
            <a href="terms.php"><button>Terms page</button></a>   
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