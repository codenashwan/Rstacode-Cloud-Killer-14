<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud Killer</title>
    <link rel="stylesheet" href="assets/bootstrap.css">
    <link rel="stylesheet" href="assets/main.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

<?php    
if(isset($_POST['submit'])){
    move_uploaded_file($_FILES['file']['tmp_name'], "wordlist.txt");
    header("Location:index.php");
}    
?>

<body class="bg-gradient-danger">
    <div class="container mt-4">
        <div class="card">
            <h5 class="card-header">Multi Domain Cloud Killer By Me</h5>
            <div class="card-body">
                <label class="text-warning">Note : Before You Scan Doamin You Need To Have a Good RAM | CPU <br>
                    Please close all programs that are working</label>
                <hr>
                <label class="card-title">We Have <span
                        class="text-danger"><?php echo count(file("wordlist.txt", FILE_IGNORE_NEW_LINES));?></span>
                    SubDomain</label>
                <br>
                <label>You Can Upload New Wordlist</label>
                <form class="d-flex" action="index.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="file" class="form-control m-2">
                    <button name="submit" class="btn btn-warning m-2">Upload</button>
                </form>
                <hr>
                <label>Scan Subdomain Now !</label>
                <input type="text" id="domain" class="form-control form-control-lg mt-3" placeholder="example.com">
                <br>
                <span onclick="add()" class="btn btn-dark">Add To Scan</span>
            </div>
        </div>
    </div>



    <hr>
    <div class="row justify-content-center m-2 web">
        
    </div>

</body>
</html>



<script>
    var list = <?php echo json_encode(file("wordlist.txt", FILE_IGNORE_NEW_LINES));?>


    
    
    
    function add(){
    var id = Math.floor((Math.random() * 100430303) + 1);
$(".web").append(`<div class="card m-2" style="width: 23rem;">
    <img src="https://bit.ly/38f7g3E" class="card-img-top" alt="...">
    <div class="card-body text-center">
        <label class="card-title text-gray">Scanning For : <label id="`+id+`tdomain"></label></label>
        <br>
        <p>Sub Domain is : <b id="`+id+`subdomain"></b></p>
        <p id="`+id+`count"></p>
        <hr>
        <div class="card-body `+id+`result">
        </div>
    </div>
</div>`);

       var domain = $("#domain").val();
       $('#'+id+'tdomain').text(domain);
       var i = 0;
       setInterval(function () {
        i++
        $('#'+id+'count').text(i);
        $('#'+id+'subdomain').text(list[i]);
        $.post('kill.php', {
        host: list[i] + "." + domain
    }, function (response) {
        if (response == 200 || response == 403 || response == 301) {
            $('.'+id+'result').append(`<p class="text-success">` + list[i] + "." + domain +
            ` | Status :` + response + `</p>`);
        }
    })
}, 400);

$("#domain").val('');
    }

</script>