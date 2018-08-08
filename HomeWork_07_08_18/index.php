<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson9</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <form class="jumbotron" id="myForm" action="process.php" method="post">
        <input class="my-2 px-2 col-md-4 offset-md-4" type="text" name="name" placeholder="Name" required>
        <input class="my-2 px-2 col-md-4 offset-md-4" type="number" name="age" placeholder="age" required>
        <select class="my-2 px-2 col-md-4 offset-md-4" name="university_id">
            <option value="1">DGMA</option>
            <option value="2">DITM</option>
            <option value="3">SLAVPED</option>
            <option value="4">OXFORD</option>
        </select>
        <input class="my-2 px-2 col-md-2 offset-md-5" name="send" type="submit" value="send">
        <h5 class="result text-center"></h5>
    </form>
    <button>Print students</button>
    <div id="students"></div>
</div>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script>
    $('#myForm').on('submit', function (event) {
        event.preventDefault();
        var $this = $(this),
            $name = $('input[name="name"]').val(),
            $age = $('input[name="age"]').val(),
            $result = $('.result');

        //Проверка имени через регулярное выражение
        var nameCheck = /[a-zа-яё]{2,15}$/.test($name);

        if (!nameCheck) {
            $result.html('Имя введено неверно'); //Если проверка не прошла, выводим ошибку
        } else if (!/^[0-9]*$/.test($age)) { //Проверяем, чтобы введены только цифры
            $result.html('возраст должен содержать только цифры');
        }/* else if ($age < 18 || $age > 100) { //Границы возраста
            $result.html('возраст должен быть от 18 до 100');
        } */ else { //Если все путем, отправляем на запрос
            $.ajax({
                url: $this.attr('action'),
                method: $this.attr('method'),
                data: $this.serialize(),
                dataType: 'json',
                beforeSend: function () {

                },
                success: function (response) {
                    $result.html(response.message);
                    console.log(response);
                },
                error: function (response) {
                    $result.html('Unexpected error, please try again');
                    console.log(response);
                }
            });
        }
    });

    $('button').on('click', function () {
        event.preventDefault();
        var $students = $('#students');
        $.ajax({
            url: 'process.php',
            method: 'post',
            data: {'student_print': true},
            dataType: 'json',
            beforeSend: function () {
            },
            success: function (response) {
                var text = '';
                for (var i = 0; i < response.length; i++) {
                    var student = response[i];
                        text += '<p>';
                    for (j in student) {
                        text += j + ': ' + student[j] + ', ';
                    }
                    text += '</p>'
                }
                $students.html(text);
            },
            error: function (response) {
                $students.html('fail to load the students, please try again')
                console.log(response);
            }
        });
    });

</script>
</body>
</html>