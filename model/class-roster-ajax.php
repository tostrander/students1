<table>

<tr>
    <th>SID</th>
    <th>Name</th>
    <th>Grade</th>
</tr>

<?php

//print_r($_POST);

require 'db-functions.php';
$dbh = connect();

$courseId = $_POST['courseId'];

$students = getRoster($courseId);
//print_r($students);

foreach($students as $student) {
    $sid = $student['sid'];
    $name = $student['last'].", ".$student['first'];
    $grade = $student['grade'];

    echo "<tr>";
    echo "<td>$sid</td>";
    echo "<td>$name</td>";
    echo "<td>$grade</td>";
    echo "</tr>";
}

?>

</table>
