<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style/test.css">
    <title>Document</title>
</head>
<body>
<div>
    <form action="add_task.php" method="GET">
        <input type="text" name="element_id"  class="textbox" placeholder=" Выберите сущность:1 or 2 or 3 or 12" required="required"></br>
        <input type="text" name="introduced_id"  class="textbox" placeholder="Введите  id:" required="required"></br>
        <input type="text" name="text_task"  class="textbox" placeholder="Текст задачи:" required="required"></br>
        <!--<span>Дата до которой необходимо завершить задачу :  </span><input type="date" name="time" required="required"></br>-->
        <input type="text"  name="admin_id"  class="textbox"  placeholder="ID ответственного пользователя:" required="required"></br>
        <input type="submit" name="buttom" class="button" value="Добавить задачу">
    </form>
</div>
<div>
    <form action="add_task.php" method="GET">
        <input type="text" name="id_task" class="textbox"  placeholder="Введите  id:">
        <input type="submit" name="buttom2" class="button" value="Завершить задачу">
    </form>
</div>
<div class="dota">
    <div class="dota2">
        <h2><a href="index.php">Назад</a></h2>
    </div>
</div>
</body>
</html>