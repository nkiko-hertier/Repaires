<?php
session_start();
include 'php/conn.php';
include 'php/autho.php';
$filter_query = '';
if ($_SESSION['type'] == 1) {
    $filter_query = "WHERE `tech_id`='{$_SESSION['uid']}'";
}
    $users = mysqli_query($conn, "SELECT * FROM `users`");
    mysqli_data_seek($users, 0);
    $sql = "SELECT * FROM `orders` " . $filter_query;
    $orders = mysqli_query($conn, $sql);
    mysqli_data_seek($orders, 0);
?>
<?php
error_reporting(0);
if ($_GET['order']) {
    $id = $_GET['order'];
    $query = mysqli_query($conn, "SELECT * FROM `orders` WHERE `id`='$id'");
    mysqli_data_seek($orders, 0);
    $Torder = mysqli_fetch_assoc($query);
} else if ($_GET['user']) {
    $id = $_GET['user'];
    $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `id`='$id'");
    mysqli_data_seek($orders, 0);
    $user = mysqli_fetch_assoc($query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="../libs/bootstrap/bootstrap.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../libs/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../libs/nicepage/main.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/flex.css">
</head>
<style>
    body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    overflow: hidden;
}
html{
    overflow: hidden;
}

.container-fluid {
    flex: 1;
    display: flex;
}

.row {
    flex: 1;
}
.dash-main{
    overflow-y: hidden;
    min-height: 50vh;
    max-height: 100vh;
}
.dash-main .section{
    height: 90vh;
    padding-top: 50px;
    padding-bottom: 50px;
    overflow-y: auto;
}
/* codes to hide .sidebar at 700px screnn */
@media (max-width: 999px) {
    .sidebar{display: none;}
    /* sidebar*/
}
.home-cover{
    min-height: 400px;
}
</style>
<body>
    <!--Header-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    
    <!--Body-->
    <div width="100%">
        <div class="row">
            <!--Sidebar-->
            <nav class="col-md-2 bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a onclick="DashScroll('.dash-main #home')" class="nav-link active" href="#">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="DashScroll('.dash-main #orders')" href="#">
                                <span data-feather="file"></span>
                                Orders
                            </a>
                        </li>
                        <li class="nav-item" onclick="DashScroll('.dash-main #users')">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span>
                                Users
                            </a>
                        </li>
                        <li class="nav-item" onclick="DashScroll('.dash-main #about')">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                About
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!--Main Content-->
            <main role="main" class="dash-main col-12 ml-sm-auto col-lg-10 px-4">
                <div id="home" class="section">
                    <div class="home-cover flex-center column-flex h1 align-center container s-border" style="background-image: linear-gradient(#ffffffa6,#ffffffa6),url(../assets/img/dash-home.jpg); background-size: cover;">
                        <h2>Dashboard</h2>
                        <p>
                            Welcome to the dashboard. Here you can view your recent orders, manage your products, view your customers and manage your reports.
                        </p>
                    </div>
                </div>
                <!-- Add your dashboard content here -->
                <!-- Manage users-->
                <div id="addusers" class="section container">
                    <h2>Manage Users</h2>
                    <form action="../classes/user.php" method="POST">
                        <div class="form-group">
                            <label for="id">ID:</label>
                            <input type="text" class="form-control" name="id" placeholder="Enter ID" readonly value="<?=(isset($user))? $user['id'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" value="<?=(isset($user))? $user['firstname'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" value="<?=(isset($user))? $user['lastname'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="uname">Username:</label>
                            <input type="text" class="form-control" name="uname" placeholder="Enter Username"  value="<?=(isset($user))? $user['uname'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?=(isset($user))? $user['email'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number:</label>
                            <input type="text" class="form-control" name="phonenumber" placeholder="Enter Phone Number" value="<?=(isset($user))? $user['number'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password" value="">
                        </div>
                        <div class="form-group">
                            <label for="type">Role:</label>
                            <select class="form-control" name="type">
                                <option value="1">Admin</option>
                                <option value="1">Editor</option>
                                <option value="1">Viewer</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- End of manage user -->
                <!-- Manage Products -->
                <div id="orders" class="section container">
                    <h2>Manage Products</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Order Code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Customer</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($product = mysqli_fetch_assoc($orders)) : ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><?= $product['uid'] ?></td>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['customer_id'] ?></td>
                                <td><?= $product['status'] ?></td>
                                <td>
                                    <a class="btn btn-dark" href="home.php?order=<?=$product['id'] ?>"><i class="fa fa-pen mr-2"></i>Edit</a>
                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <!-- End of manage products -->
                <!--Order Midfier-->
                
            <div id="ModifyOrder" class="section container">
                <h4 class="text-center">Bootstrap ProgressBar Form</h4>
                <form action="../classes/orders.php" method="POST">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input name="id" type="text" value="<?=(isset($Torder))? $Torder['id'] : '' ?>" class="form-control" id="id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?=(isset($Torder))? $Torder['name'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" name="type" value="<?=(isset($Torder))? $Torder['type'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="tech_id">Tech ID</label>
                        <input type="text" class="form-control" id="tech_id" name="tech_id" value="<?=(isset($Torder))? $Torder['tech_id'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="customer_id">Customer ID</label>
                        <input type="text" class="form-control" id="customer_id" name="customer_id" value="<?=(isset($Torder))? $Torder['customer_id'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        
                        <input type="range" class="form-control custom-range" id="status" name="status" value="<?=(isset($Torder))? $Torder['status'] : '' ?>">
                        <div class="progress" hidden>
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                0%
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
                <!--Order Midfier END-->
                <!-- Manage users-->
                <div id="users" class="section container">
                    <h2>Manage Users</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($user = mysqli_fetch_assoc($users)) : ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['uname'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['type'] ?></td>
                                <td>
                                    <a href="home.php?user=<?= $user['id'] ?>" class="btn btn-dark"><i class="fa fa-pen mr-2"></i>Edit</a>
                                    <a href onclick="ConfirmAction('link.php', 'user')" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
                                </td>
                           </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <div id="about" class="section container">
                    <div class="container mt-4">
                        <h1>About This Dashboard</h1>
                    </div>
                </div>

            </main>
        </div>
    </div>
    <script>
        function ConfirmAction(link, type) {
            if(confirm('Are You sure you want to delete this '+'type'+' permanently?')) 
                {
                    console.log('Done'); 
                }
        }
        function DashScroll(element) {
            document.querySelector(element).scrollIntoView();
            scrollTo(0,0);
        }
        document.querySelector('formh').addEventListener('submit', function(event) {
            event.preventDefault();
    
            const id = document.getElementById('id').value;
            const firstname = document.getElementById('firstname').value;
            const lastname = document.getElementById('lastname').value;
            const uname = document.getElementById('uname').value;
            const email = document.getElementById('email').value;
            const phone_number = document.getElementById('phone_number').value;
            const password = document.getElementById('password').value;
            const type = document.getElementById('type').value;
    
            fetch('/api/users', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id, firstname, lastname, uname, email, phone_number, password, type })
            })
            .then(response => response.json())
            .then(data => console.log('Success:', data))
            .catch((error) => console.error('Error:', error));
        });
    </script>
    <?php
    if ($_GET['order']) {
        echo "<script>DashScroll('.dash-main #ModifyOrder');</script>";
    } elseif ($_GET['user']) {
        echo "<script>DashScroll('.dash-main #addusers');</script>";
    }
    ?>
    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
