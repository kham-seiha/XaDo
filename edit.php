<?php
include "db_conn.php";
$id = $_GET['id'];


if(isset($_POST['submit']))
{
    $name = $_POST['name_or_phone'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telegram = $_POST['telegram'];
    $role = $_POST['role'];

    $sql = "UPDATE `crud` SET `name_or_phone`='$name', `department`='$department',`designation`='$designation',`username`='$username',`password`='$password',`telegram`='$telegram',`role`='$role' WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        header("location:index.php?msg=User's Data Updated successfully");
    }
    else
    {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EDIT USER INFORMATION</title>
    <style>
        body{
            background-image:url(nekobg.jpg);
            background-size:contain;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #A6E84F; color:white;" >
        <img class="img-logo " src="neko.png" alt="Neko Meow" style="width:100px">
        Bee Vision
    </nav>
    <!-- Container -->
    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New User</h3>
            <p class="text-muted">CLick Update after changing user information</p>            
        </div>
        <?php
        $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>    
        <div class="container">
            <form action="" method="post">
            <div class="row col-mid">
                <div class="col-md-4">
                    <label class="form-label"><i class="uil uil-user-circle"></i>Display Name</label>
                    <input type="text" class="form-control" name="name_or_phone" value="<?php echo $row['name_or_phone'] ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label"><i class="uil uil-building"></i>Department</label>
                    <input type="text" class="form-control" name="department" value="<?php echo $row['department'] ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label"><i class="uil uil-users-alt"></i>Designation</label>
                    <input type="text" class="form-control" name="designation" value="<?php echo $row['designation'] ?>">
                </div>
            </div>
            <div class="row col-mid">
                <div class="col-md-4">
                    <label class="form-label"><i class="uil uil-user icon"></i>Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>">
                </div>
                <div class="col-md-4">
                    <label for="floatingPassword" class="form-label"><i class="uil uil-lock"></i>Password</label>
                    <input type="password" class="form-control" name="password" value="<?php echo $row['password'] ?>">
                </div>
                <div class="col-md-4">
                        <label class="form-label"><i class="uil uil-lock"></i>Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" >
                    </div>
            </div>
            <div class="row col-mid">
                <div class="col-md-4">
                    <label class="form-label"><i class="uil uil-telegram"></i>Telegram Username</label>
                    <input type="text" class="form-control" name="telegram" value="<?php echo $row['telegram'] ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label"><i class="uil uil-list-ul"></i>Role</label>
                        <select class="form-select" name="role" value="<?php echo $row['role'] ?>">
                          <option value="">Select your role</option>
                          <option>Manager</option>
                          <option>IT</option>
                          <option>Operation</option>
                          <option>Stock</option>
                        </select>
                    </div>    
                </div>
                <div class="card-footern mt-3">
                    <button class="btn btn-primary" name="submit" type="submit">UPDATE</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
    </div>
    </form> 
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>