<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/flex.css">
    <title>Order Progress</title>
    <style>
        .box-icon{
            height: 150px;
            width: 150px;
        }
        .prog{
            border-radius: 0px 10px 10px 10px;
            width: 50%;
        }
        .details  ul li{
            text-align: left;
        }
        .progress-container{
            background-color: rgba(0, 0, 0, 0.038);
        }
        .prog-pending{
            background-color: rgb(255, 193, 78);
            width: 50%;
        }
        .prog-done{
            background-color: rgb(128, 236, 116);
            width: 50%;
        }
        .order-box{
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        
        <div class="order-box s-shadow s-border">
            <div class="content flex-start">
                <div class="box-icon flex-center">
                    <i class="fab fa-apple fa-5x"></i>
                </div>
                <div class="details">
                    <h1>Computer</h1>
                    <ul>
                        <li><b>Owner:</b> Nkiko Hertier</li>
                        <li class="mt-2"><b>Progress</b> <span class="badge-warning s-white s-border s-padd">Pending</span></li>
                    </ul>
                </div>
            </div>
            <div class="progress-container">
                <div class="prog-done prog s-padd" width="50%"></div>
            </div>
        </div>
        
        <div class="order-box s-shadow s-border">
            <div class="content flex-start">
                <div class="box-icon flex-center">
                    <i class="fab fa-apple fa-5x"></i>
                </div>
                <div class="details">
                    <h1>Computer</h1>
                    <ul>
                        <li><b>Owner:</b> Nkiko Hertier</li>
                        <li class="mt-2"><b>Progress</b> <span class="badge-warning s-white s-border s-padd">Pending</span></li>
                    </ul>
                </div>
            </div>
            <div class="progress-container">
                <div class="prog-done prog s-padd" width="50%"></div>
            </div>
        </div>
        
        <div class="order-box s-shadow s-border">
            <div class="content flex-start">
                <div class="box-icon flex-center">
                    <i class="fab fa-apple fa-5x"></i>
                </div>
                <div class="details">
                    <h1>Computer</h1>
                    <ul>
                        <li><b>Owner:</b> Nkiko Hertier</li>
                        <li class="mt-2"><b>Progress</b> <span class="badge-warning s-white s-border s-padd">Pending</span></li>
                    </ul>
                </div>
            </div>
            <div class="progress-container">
                <div class="prog-done prog s-padd" width="50%"></div>
            </div>
        </div>
    </div>
</body>
</html>