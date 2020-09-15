<?php
//connection
$servername = "localhost";
$username = "id14796987_root";
$password = "Hritikmunde@2000";
$database = "id14796987_registration";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Sorry unable to connect, We regret for inconvinenece");
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Registration - CRUD</title>


</head>

<body>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">You can Edit Name here</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="insert.php" method="POST" class="needs-validation">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group col-4">
                            <label>Book Name</label>
                            <input required type="text" name="editbookname" class="form-control" id="editbookname">
                            <?php
                            if (isset($bookname_error)) { ?>
                                <h6><?php echo $bookname_error ?></h6>
                            <?php } ?>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Updated</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">iReg</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container mt-5" style="background-image: url();">

        <h2>Order Book</h2>
        <form action="valid.php" method="POST" class="needs-validation">
            <div class="form-group col-4">
                <label for="validationCustom01">Full Name</label>
                <input required type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
                <?php
                if (isset($name_error)) { ?>
                    <h6><?php echo $name_error ?></h6>
                <?php } ?>
                <label>Email Address</label>
                <input required type="emai" name="email" class="form-control" id="email">
                <?php
                if (isset($email_error)) { ?>
                    <h6><?php echo $email_error ?></h6>
                <?php } ?>
                <label>Mobile No.</label>
                <input required type="text" name="mobile" class="form-control" id="mobile">
                <?php
                if (isset($mobile_error)) { ?>
                    <h6> <?php echo $mobile_error ?></h6>
                <?php } ?>
                <label>Book Name</label>
                <input required type="text" name="bookname" class="form-control" id="bookname">
                <?php
                if (isset($bookname_error)) { ?>
                    <h6><?php echo $bookname_error ?></h6>
                <?php } ?>
                <label>Description</label>
                <textarea cols="45" rows="10" name="describe" class="form-control" id="describe"></textarea>

            </div>
            <button type="submit" class="btn btn-success mb-3">Submit</button>
        </form>

        <a href='index.php?this=true' style="text-decoration:none ;background-color: #007bff;color: white;padding:5px;border-radius: 5px;">Display Data</a>
    </div>

    <div class="container">
        <table class="table mt-3">

            <?php
            if (isset($_GET['this'])) {
                showfunction();
            }
            function showfunction()
            {
                global $conn;

                $sql = "SELECT * FROM `detail`";
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                echo "
                <thead class='thead-dark'>
                <tr>
                    <th scope='col'>S.no</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>Email</th>
                    <th scope='col'>bookname</th>
                    <th scope='col'>Order timestamp</th>
                    <th scope='col'>Workspace</th>
                </tr>
            </thead>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    echo "<tr>
                      <th scope=row>" . $sno . "</th>" .
                        "<td>" . $row['name'] . "</td>" .
                        "<td>" . $row['email'] . "</td>" .
                        "<td>" . $row['bookname'] . "</td>" .
                        "<td>" . $row['timestamp'] . "</td>
                        <td><button class='edit btn btn-sm btn-primary' id=" . $row['sno'] . ">Edit</button> 
                        <button class='delete btn btn-sm btn-primary' id=d" . $row['sno'] . ">Delete</button></td>
                        </tr>";
                }
            }


            ?>
        </table>



    </div>
	
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
    <script>
        $(document).ready(function() {

            edits = document.getElementsByClassName('edit');
            Array.from(edits).forEach((element) => {
                element.addEventListener("click", (e) => {
                    console.log("edit", );
                    tr = e.target.parentNode.parentNode;
                    bookname = tr.getElementsByTagName("td")[2].innerText;
                    console.log(bookname);
                    editbookname.value = bookname;
                    snoEdit.value = e.target.id;
                    console.log(e.target.id);
                    $('#editModal').modal('toggle');
                })

            })
            deletes = document.getElementsByClassName('delete');
            Array.from(deletes).forEach((element) => {
                element.addEventListener("click", (e) => {
                    console.log("edit", );
                    sno = e.target.id.substr(1,)

                    if (confirm("Are you sure you want to delete your order")) {
                        console.log('yes');
                        window.location = `insert.php?delete=${sno}`;
                        console.log(sno);
                    } else {
                        console.log('no');
                    }
                })

            })
        })
    </script>
	
</body>

</html>