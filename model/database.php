<?php

require("/home/tostrand/config.php");

class Database
{
    private $dbh;

    function __construct()
    {
        $this->connect();
    }

    function connect()
    {
        try {
            //Instantiate a database object
            $this->dbh = new PDO(DB_DSN, DB_USERNAME,
                DB_PASSWORD);
            //echo "Connected to database!!!";
            return $this->dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }

    //*** Get all classes ***
    function getClasses()
    {
        $sql = "SELECT * FROM class ORDER BY abbrev";
        $statement = $this->dbh->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //*** Get class abbreviation and title ***
    function getDetails($classId)
    {
        $sql = "SELECT abbrev, title  
                FROM class 
                WHERE classid = :classId";
        $statement = $this->dbh->prepare($sql);
        $statement->bindParam(':classId', $classId, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    //*** Get students and grades for selected Class ID ***
    function getRoster($classId)
    {
        $sql = "SELECT student.sid, last, first, grade  
                FROM student, grade 
                WHERE student.sid = grade.sid
                AND grade.classid = :classId
                ORDER BY last, first";
        $statement = $this->dbh->prepare($sql);
        $statement->bindParam(':classId', $classId, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getStudents()
    {
        //1. define the query
        $sql = "SELECT * FROM student ORDER BY last, first";

        //2. prepare the statement
        $statement = $this->dbh->prepare($sql);

        //3. bind parameters

        //4. execute the statement
        $statement->execute();

        //5. return the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        //print_r($result);
        return $result;
    }

    function addStudent($sid, $last, $first, $birthdate, $gpa, $advisor)
    {
        //1. define the query
        $sql = "INSERT INTO student
                VALUES (:sid, :last, :first, :birthdate, :gpa, :advisor)";

        //2. prepare the statement
        $statement = $this->dbh->prepare($sql);

        //3. bind parameters
        $statement->bindParam(':sid', $sid, PDO::PARAM_STR);
        $statement->bindParam(':last', $last, PDO::PARAM_STR);
        $statement->bindParam(':first', $first, PDO::PARAM_STR);
        $statement->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
        $statement->bindParam(':gpa', $gpa, PDO::PARAM_STR);
        $statement->bindParam(':advisor', $advisor, PDO::PARAM_STR);

        //4. execute the statement
        $success = $statement->execute();

        //5. return the result
        return $success;
    }
}