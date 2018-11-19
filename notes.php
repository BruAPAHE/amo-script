<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style/test3.css">
    <title>Document</title>
</head>
<body>
<div>
   <form action="add_notes.php" method="GET">
       <input type="text" name="element_id1" class="textbox" placeholder="Выберите сущность :1 or 2 or 3 or 12" required"></br>
       <input type="text" name="introduced_id1" class="textbox"  placeholder="Введите  id :" required="required"></br>
       <input type="text" name="text" class="textbox" placeholder="Текст :" required="required"></br>
       <input type="submit" name="buttom_1" class="button" value="Добавить обычное примечание ">
   </form>
</div>
</br>
</br>
</br>
<div>
    <form action="add_notes.php" method="GET">
        <input type="text" name="element_id2" class="textbox" placeholder="Выберите сущность : 1 or 2 or 3 or 12" required"></br>
        <input type="text" name="introduced_id2" class="textbox" placeholder="Введите  id :" required="required"></br>
        <input type="submit" name="buttom_2" class="button" value="Добавить звонок ">
    </form>
</div>

<div class="dota">
    <div class="dota2">
        <h2><a href="index.php">Назад</a></h2>
    </div>
</div>

</body>
</html>