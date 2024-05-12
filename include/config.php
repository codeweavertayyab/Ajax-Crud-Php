<?php

$conn = mysqli_connect("localhost", "root", "", "crud_ajax");

function addData()
{
    $conn = mysqli_connect("localhost", "root", "", "crud_ajax");
    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST['pass'])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $query = mysqli_query($conn, "INSERT INTO `tbl_students`( `std_name`, `std_email`, `std_pass`) VALUES ('$name','$email','$pass')");
        if ($query) {
            echo 'Data Inserted Successfully';
        }
    }
}
function showData()
{
    $conn = mysqli_connect("localhost", "root", "", "crud_ajax");
    $query = mysqli_query($conn, "SELECT * FROM tbl_students");
    if ($query) {
        if (mysqli_num_rows($query) > 0) {
            $count = 1;
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $row['std_name'] ?></td>
                    <td><?php echo $row['std_email'] ?></td>
                    <td><?php echo $row['std_pass'] ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editData(<?php echo $row['id'] ?>)">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteData(<?php echo $row['id'] ?>)">Delete</button>
                    </td>
                </tr>
                <?php
            }
        }
    }
}

function deleteData($id)
{
    $conn = mysqli_connect("localhost", "root", "", "crud_ajax");
    $query = mysqli_query($conn, "DELETE FROM tbl_students WHERE id=$id");
    if ($query) {
        echo "Data Deleted";
    }

}

function editData($id)
{
    $conn = mysqli_connect("localhost", "root", "", "crud_ajax");
    $query = mysqli_query($conn, "SELECT * FROM tbl_students WHERE id=$id");
    if ($query) {
        foreach($query as $std){
            ?>
            {"std_name" : "<?php echo $std['std_name']?>", "std_email" : "<?php echo $std['std_email']?>", "std_pass" : "<?php echo $std['std_pass']?>" }
            <?php
        }
    }


}

function updateData($id){
    $conn = mysqli_connect("localhost", "root", "", "crud_ajax");
    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST['pass'])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $query = mysqli_query($conn,"UPDATE `tbl_students` SET `std_name`='$name',`std_email`='$email',`std_pass`='$pass' WHERE id=$id");
        if ($query) {
            echo 'Data Updated Successfully';
        }
    }
   
}

if (isset($_GET["status"])) {
    $status = $_GET["status"];
    if ($status == "add") {
        addData();
    }
    else if ($status == "show") {
        showData();
    }
    else if ($status == "delete") {
        if (isset($_GET['id'])) {
            deleteData($_GET['id']);
        }
    }
    else if ($status == "edit") {
        if (isset($_GET['id'])) {
            editData($_GET['id']);
        }
    }
    else if($status == "update"){
        if (isset($_GET['id'])) {
            updateData($_GET['id']);
        }
    }
}


?>