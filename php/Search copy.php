<?php
    include_once "conn.php";
    if (isset($_POST['q']) && !empty($_POST['q'])) {
    $customer_id = $_POST['q'];
    $query = mysqli_query($conn, "SELECT * FROM `orders` WHERE `customer_id`=$customer_id ORDER BY `c_date` ASC");
    $row = mysqli_fetch_assoc($query);
    mysqli_data_seek($query, 0);
    while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <div class="order-box border s-border mt-1 mb-1">
            <div class="content flex-start">
                <div class="box-icon flex-center">
                    <i class="fab fa-apple fa-5x"></i>
                </div>
                <div class="details">
                    <h1><?=$row['type']?></h1>
                    <ul>
                        <li><b>Name:</b><?=$row['name']?></li>
                        <li class="mt-2"><b>Engeneer:</b> <span class="badge-warning btn-warning  s-white s-border s-padd"><?=($row['status'])? 'pending' : 'complete'?></span></li>
                    </ul>
                </div>
            </div>
            <div class="progress-container">
                <div class="prog-done prog s-padd" width="<?=($row['status'])? '50%' : '100%'?>"></div>
            </div>
        </div>
        <?php
    }
    }
?>
hello 'q' is customers' phone number, I need to first select number from tbl_customers in `number`
and then get the id from tbl_customers, extract data from orders