<?
include 'components/db.php';

//Получаю данные формы
$name = $_POST['name'];
$age = $_POST['age'];
$university_id = $_POST['university_id'];

//Задаю начальные положительные значения нашему ответу
$response['result'] = true;
$response['message'] = 'Successfully added';

$dbConnection = getConnection();

if (mb_strlen($name, 'UTF-8') >= 15) { //Проверка имени
    $response['result'] = false;
    $response['message'] = 'name is to long';

} else if ($age < '18' || $age > '100') { //Проверка возраста
    $response['result'] = false;
    $response['message'] = 'age is incorrect';
}

if ($response['result']) { //Если все ОК, соединяемся с базой и пишем туда нашего студента

    $sth = $dbConnection->prepare('INSERT INTO student
    (name, age, university_id)
     VALUES (:name, :age, :university_id)');

    $result = $sth->execute([
            'name' => $name,
            'age' => $age,
            'university_id' => $university_id,
        ]
    );
}

//Выводим студентов
if ($_POST['student_print'] == 'true') {

    $stmt = $dbConnection->query('SELECT * FROM student');
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

echo json_encode($response);
?>