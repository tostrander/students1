<?php

require("/home/tostrand/config.php");

function connect()
{
    try {
        //Instantiate a database object
        $dbh = new PDO(DB_DSN, DB_USERNAME,
            DB_PASSWORD);
        echo "Connected to database!!!";
        return $dbh;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return;
    }
}

function getStudents()
{
    global $dbh;

    //1. define the query
    $sql = "SELECT * FROM student ORDER BY last, first";

    //2. prepare the statement
    $statement = $dbh->prepare($sql);

    //3. bind parameters

    //4. execute the statement
    $statement->execute();

    //5. return the result
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($result);
    return $result;
}