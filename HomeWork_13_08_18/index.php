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
        .clear {
            display: inline-block;
            padding: .5rem 1rem;
            font-size: 1.25rem;
            line-height: 1.5;
            border-radius: .3rem;
            align-items: flex-start;
            text-align: center;
            cursor: default;
            color: buttontext;
            border-width: 2px;
            border-style: outset;
            border-color: buttonface;
            border-image: initial;
        }
    </style>
</head>
<div class="container">
    <form class="jumbotron text-center" id="myForm" action="books.php" method="post">
        <input class="btn-lg bg-light" type="submit" name="send" value="Get books list">
        <div class="btn-lg bg-light clear">Clear</div>
    </form>
    <div class="booksList"></div>
</div>



<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script>
    var $bookList = $('.booksList')
    $('#myForm').on('submit', function (event) {
        event.preventDefault();
        var $this = $(this);
            $.ajax({
                url: $this.attr('action'),
                method: $this.attr('method'),
                dataType: 'json',
                beforeSend: function () {
                },
                success: function (response) {
                    $bookList.html(response)
                },
                error: function (response) {
                    console.log('error');
                    console.log(response);
                }
            });
        }
    )
    $('.clear').on('click', function(){
        $bookList.empty();
    })
</script>
</body>
</html>