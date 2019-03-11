<?php
//print_r($_POST);

//Connect to the database
require 'database.php';
$db = new Database();

$courseId = $_POST['courseId'];

$students = $db->getRoster($courseId);
$details = $db->getDetails($courseId);

echo "<hr><h3>".$details['abbrev']." - ".$details['title']."</h3>";

?>

<table>

<tr>
    <th>SID</th>
    <th>Name</th>
    <th>Grade</th>
</tr>

<?php

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
