<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap5.min.css">
    <link rel="stylesheet" href="./css/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/flex.css">
    <title>Check progress</title><style>
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
            background: rgb(34, 255, 63);
            width: 50%;
            animation: load 3s 1;
        }
        @keyframes load {
            0%{
                width: 0%;
                background-color: rgb(65, 81, 255);
            }
        }
    </style>
</head>
<body>
    
    <div class="popup" id="popup" style="z-index: 1000;">
        <div class="popup-content container card" style="background-color: #fff;">
            <div class="header flex-btwn card-header">
                <span>Header</span>
                <span class="close" id="closePopup">&times;</span>
            </div>
            <div id="popup-content" style="display:flex;">
    
            </div>
        </div>
    </div>
    <div class="container card mt-3 shadow-lg">
        <form action="./php/Search.php" method="post" id="sorter">
            <div class="form-group mt-3">
                <h1>Check progress</h1>
            </div>
            <div class="form-group mb-4 mt-2">
                <div class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Enter your username">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container card mt-3 s-padd s-border shadow-lg">
        <h1 class="m-3">Result</h1>
        <div class="spinner flex-center p-5 " id="spinner">
            <div class="spinner-border"></div>
        </div>
        <div class="results" id="result">
            <div class="order-box border s-border mt-1 mb-1" hidden>
                <div class="content flex-start">
                    <div class="box-icon flex-center">
                        <i class="fab fa-apple fa-5x"></i>
                    </div>
                    <div class="details">
                        <h1>Computer</h1>
                        <ul>
                            <li><b>Owner:</b> Nkiko Hertier</li>
                            <li class="mt-2"><b>Engeneer:</b> <span class="badge-warning btn-warning  s-white s-border s-padd">Pending</span></li>
                        </ul>
                    </div>
                </div>
                <div class="progress-container">
                    <div class="prog-done prog s-padd" width="50%"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/Poper.js"></script>
    <script>
    function SendMe(ResDiv, formId){
    let form = document.getElementById(formId);
    let result= document.getElementById(ResDiv);
    
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const xhr = new XMLHttpRequest();
        xhr.open("POST", form.action, true);
        xhr.onload = () => {
            if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const data = xhr.response;
                if (data == '') {
                    result.innerHTML = "<h1 class='align-center mb-3'>0 Results found</h1>";
                    spinner.style.display = 'flex';
                } else {
                    result.innerHTML = data;
                    spinner.style.display = 'none';
                }
            }
            }
        }
        const formData = new FormData(form);
        xhr.send(formData);
    });
}
SendMe('result', 'sorter');
    </script>
</body>
</html>