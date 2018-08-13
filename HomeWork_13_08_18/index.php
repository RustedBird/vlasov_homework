<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        p {
            display: table;
        }
        a {
            display: table-cell;
            vertical-align: middle;
            padding: 10px;
        }
    </style>
</head>
<div class="container">
    <form class="jumbotron text-center" id="myForm" action="books.php" method="post">
        <input class="btn-lg bg-light" type="submit" name="send" value="Get books list">
    </form>
    <div class="booksList"></div>
</div>



<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script>
    $('#myForm').on('submit', function (event) {
        event.preventDefault();
        var $this = $(this);
            $.ajax({
                url: $this.attr('action'),
                method: $this.attr('method'),
                data: '',
                dataType: 'json',
                beforeSend: function () {
                },
                success: function (response) {
                    $('.booksList').html(response)
                },
                error: function (response) {
                    console.log('error');
                    console.log(response);
                }
            });
        }
    )
</script>
</body>
</html>