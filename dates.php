<?php
  // номер текущего дня недели (1 = понедельник, 7 = воскресенье)
  $day = date("N");



  if ($day == 1 || $day == 3 || $day == 5) {
    $johnSchedule = "8:00 - 12:00";
  } else {
    $johnSchedule = "Нерабочий день";
  }

  if ($day == 2 || $day == 4 || $day == 6) {
    $janeSchedule = "12:00 - 16:00";
  } else {
    $janeSchedule = "Нерабочий день";
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>График работы</title>
    <style>
        table {
            border-collapse: collapse;
            width: 400px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
  </head>
  <body>

    <h2>Расписание на сегодня</h2>

    <table>
      <tr>
        <th>№</th>
        <th>Фамилия Имя</th>
        <th>График работы</th>
      </tr>
      <tr>
        <td>1</td>
        <td>John Styles</td>
        <td><?php echo $johnSchedule; ?></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Jane Doe</td>
        <td><?php echo $janeSchedule; ?></td>
      </tr>
    </table>

  </body>
</html>
