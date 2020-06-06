<?php
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Система коментариев</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<div  class="container" >
<br>
<br>
<br>
    <form id="coment" action="action.php" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1"></label>
            <input type="text" class="form-control w-75" id="exampleFormControlInput1" placeholder="Введите ваше имя" name="author" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1"></label>
            <textarea class="form-control w-75" placeholder="Ваш коментарий" id="exampleFormControlTextarea1" name="data" rows="5"></textarea>
        </div>
        <input type="hidden" name="hid" id="temp" value="-1">
        <button type="submit" id="knopka" class="btn btn-primary mb-2">Оставить коментарий </button>
    </form>
    <br>
    <h1> Коментарии </h1>
</div>
<script>
    $( document ).ready(function() {
        $( "#coment" ).submit(function( event ) {
            //alert( "Handler for .submit() called." );
            event.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(result) {
                  //  alert(result);
                    location.href=location.href;
                },
            });
        });
    });

    function x(id) {

        //document.getElementById("temp").value = 1;
        temp = document.getElementById("temp");
        // alert(id)
        temp.value = id;
        // alert(temp.value);
        $("#knopka").click();
    }
</script>
<?php
echo '<div class="container">';
$handle = fopen("file.txt", "r"); //файл в режиме чтения
$i=0;
while (!feof($handle)) {


    $buffer = fgets($handle, 4096);
    if($buffer=='') exit();
$arr = explode('|',$buffer);
echo "<div class='card w-75 bg-light'>";

//echo "<div  class=\"card-header\" <div class=\"container\">
//<div class = \"row\"> <div class = 'col-sm'>от: " . $arr[0] . "</div></div><div class = 'col-sm' ><small><a href='#'>удалить<a/></small></div></div>";

    echo "<div class = 'card-header'> <div class=\"container\">
  <div class=\"row\">
    <div class=\"col-sm-11\">
      от: $arr[0]
    </div>
    <div class=\"col-sm-1\">
     <small> <a id='$i' href='' onclick='x(id)'>delete</a></small>
    </div>
  </div></div></div>";
    echo " <div class=\"card-body\">";
    echo "<p class=\"card-text\" > $arr[1]</p>";
    echo "</div></div><br>";
    $i++;
}
fclose($handle);
echo "</div>";
?>
</body>
</html>
