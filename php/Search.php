<?php
    include_once "conn.php";
    if (isset($_POST['q']) && !empty($_POST['q'])) {
        $customer_number = mysqli_real_escape_string($conn, $_POST['q']);
        $query = mysqli_query($conn, "SELECT * FROM `tbl_customer` WHERE `Contact`='$customer_number'");
        if(mysqli_num_rows($query)>0){
            $row = mysqli_fetch_assoc($query);
            $customer_id = $row['customer_id'];
        } else {
            exit();
        }

        $query2 = mysqli_query($conn, "SELECT * FROM `orders` WHERE `customer_id`=$customer_id ORDER BY `c_date` ASC");
        $row2 = mysqli_fetch_assoc($query2);
        mysqli_data_seek($query2, 0);
        while ($row2 = mysqli_fetch_assoc($query2)) {
            ?>
            <div class="order-box border s-border mt-1 mb-1">
                <div class="content flex-start">
                    <div class="box-icon flex-center">
                        <i class="fab fa-apple fa-5x"></i>
                    </div>
                    <div class="details">
                        <h1><?=$row2['type']?></h1>
                        <ul>
                            <li><b>Name:</b><?=$row2['name']?></li>
                            <li class="mt-2"><b>Engeneer:</b> <span class="badge-warning btn-warning s-white s-border s-padd"><?=($row2['status'])? 'pending' : 'complete'?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="progress-container">
                    <div class="prog-done prog s-padd" width="<?=($row2['status'])? '50%' : '100%'?>"></div>
                </div>
            </div>
            <?php
        }
    }
?>