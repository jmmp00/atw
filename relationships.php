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
                        <h2>Terms Relationships <b>Management</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="index.php" class="btn btn-secondary"><i class="material-icons">&#xe88a;</i> <span>Home</span></a>
                        <a href="AddRelationships.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New Relationship</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Parent</th>						
                        <th>Child</th>
                        <th></th>


                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    $conn = mysqli_connect("localhost", "root", "admin", "atw");
                    if ($conn-> connect_error){
                        die("Connection failed:". $conn-> connect_error);
                    }

                    $sql= "SELECT t.title as 'parent' from terms as t inner join relations as r on t.id = r.parent";
                    $result= $conn-> query($sql);
                    $parents = array();
                    $childs = array();
                    while ($row= $result-> fetch_assoc()){
                        array_push($parents,$row['parent']);
                    }
                    $sql= "SELECT t.title as 'child' from terms as t inner join relations as r on t.id = r.child";
                    $result= $conn-> query($sql);
                    while ($row= $result-> fetch_assoc()){
                        array_push($childs,$row['child']);
                    }
                    for ($x = 0; $x < count($parents); $x++) {
                        echo "<tr><td>".$parents[$x]."</td>";
                        echo "<td>".$childs[$x]."</td>";
                        $sql= "SELECT id from terms where title = '$parents[$x]'";
                        $result= $conn-> query($sql);
                        $row= $result-> fetch_assoc();
                        $parentID = $row['id'];
                        
                        $sql= "SELECT id from terms where title = '$childs[$x]'";
                        $result= $conn-> query($sql);
                        $row= $result-> fetch_assoc();
                        $childID = $row['id'];                         
                    ?>

<td><span data-toggle="modal" data-target="#modalApagar<?PHP echo $x?>">
<a class="del" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></span></td>
        
<div id="modalApagar<?PHP echo $x?>" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><strong>Delete</strong></h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to permenantly delete the selected relationship?</p>
      </div>
      <div class="modal-footer">
<div class="btn-group">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <a type="button" class="btn btn-danger" href="deleteR.php?parent=<?PHP echo $parentID;?>&child=<?PHP echo $childID;?>">Yes</a>
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
   header("location: index.php");
}

 ?>