<?php 
 session_start();

  if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])&& isset($_SESSION['user_level']) && $_SESSION['user_level'] == 1) { 
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Manage accounts</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="mgmtcss.css">
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>User <b>Management</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="index.php" class="btn btn-secondary"><i class="material-icons">&#xe88a;</i> <span>Home</span></a>
                        <a href="addUser.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>						
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>						
                        <th>Username</th>
                        <th>Email</th>
                        <th>Account Type</th>
                        <th>Status</th>
                        <th></th>


                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    $conn = mysqli_connect("localhost", "root", "admin", "atw");
                    if ($conn-> connect_error){
                        die("Connection failed:". $conn-> connect_error);
                    }

                    $sql= "SELECT * FROM `user`";
                    $result= $conn-> query($sql);
                    while ($row= $result-> fetch_assoc()){
                    ?>
                    <tr>
                    <td> <?php echo $row['id']; ?> </td>
                    <td> <?php echo $row['name'] .' ' . $row['surname']; ?> </td>
                    <td> <?php echo $row['username']; ?> </td>
                    <td> <?php echo $row['email']; ?> </td>
                    <td> <?php if ($row['user_level']=="1"){
                        echo "admin";} else {
                            echo "user";
                        } ?> </td>
                    <td> <?php if ($row['status']=="1"){
                        echo "active";} else {
                            echo "inactive";
                        } ?> </td>
        
                    <td>
                    <!-- Edit button -->
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons edit">&#xe3c9;</i></a>
                    
                    <!-- Delete button -->
                    <span data-toggle="modal" data-target="#modalApagar<?PHP echo $row ["id"]?>">
                        <a class="del" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                    </span>
                </td>

<!-- Modal -->

<div id="modalApagar<?PHP echo $row ["id"]?>" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><strong>Delete</strong></h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to permenantly delete <strong><?PHP echo $row ["name"] . " ". $row ["surname"]?></strong>'s account? </p>
      </div>
      <div class="modal-footer">
<div class="btn-group">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <a type="button" class="btn btn-danger" href="delete.php?id=<?PHP echo $row ["id"]?>">Yes</a>
</div>
      </div>
    </div>

  </div>
</div>


</tr>
<?php
}
$conn-> close();										 
?>
</tbody>
</table>
</div>
</div>
</div>     
</body>
</html>


<?php 
}else {
   header("location: login.php");
}

 ?>