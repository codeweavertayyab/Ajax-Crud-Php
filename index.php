<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">

    <title>AJAX CRUD</title>
</head>

<body>
    <div class="container p-5">
        <h1 class="display-2">
            Add Student
        </h1>
        <form id="formData">
            <input type="hidden" id="id">
            <label for="name" class="mt-2">Name:</label>
            <input type="text" class="form-control" placeholder="Enter your name" id="name" name="name">

            <label for="email" class="mt-2">Email:</label>
            <input type="email" class="form-control" placeholder="Enter your email" id="email" name="email">

            <label for="pass" class="mt-2">Password:</label>
            <input type="password" class="form-control" placeholder="Enter your password" id="pass" name="pass">

            <button class="btn btn-primary mt-3" id="btnadd" onclick="addData()">Add</button>
            <div class="d-none mt-4" id="updatebuttons">
                <button class="btn btn-primary" onclick="updateData()">Update</button>
                <button type="button" class="btn btn-danger" onclick="cancelData()">Cancel</button>

            </div>
        </form>

        <h1 class="mt-4">
            Students
        </h1>
        <table class="table table-hovered table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tabledata">

            </tbody>
        </table>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>