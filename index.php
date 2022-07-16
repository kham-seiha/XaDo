<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP CRUD APPLICATION</title>
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

    <div class="container">
        <?php
        if(isset($_GET['msg']))
        {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" row="alert">
                    '.$msg.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                  </div>';    
        }
        ?>
        <a href="add_new.php" class="btn btn-primary mb-3">Add New User</a>

        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Telegram</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
    </div>
        <tbody class="table-light">
            <?php
            include  "db_conn.php";

            $sql = "SELECT * FROM `crud`";
            $result = mysqli_query($conn, $sql);
            $i = 1;
            while ($row = mysqli_fetch_assoc($result))
            {
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['name_or_phone'] ?></td>
                <td><?php echo $row['department'] ?></td>
                <td><?php echo $row['designation'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['password'] ?></td>
                <td><?php echo $row['telegram'] ?></td>
                <td><?php echo $row['role'] ?></td>
                <td><a href="edit.php?id=<?php echo $row['id']  ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                    <a href="delete.php?id=<?php echo $row['id']  ?>" class="link-dark"><i class="fa-solid fa-trash fs-5 me-3"></i></a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php
            }
            ?>
        </tbody>
        </table>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>