<?php

class Student
{
    private $_sid;
    private $_last;
    private $_first;
    private $_birthdate;
    private $_gpa;
    private $_advisor;

    function __construct($sid, $last, $first, $birthdate, $gpa, $advisor)
    {
        $this->_sid = $sid;
        $this->_last = $last;
        $this->_first = $first;
        $this->_birthdate = $birthdate;
        $this->_gpa = $gpa;
        $this->_advisor = $advisor;
    }

    function toString()
    {
        return $this->_first . " " . $this->_last;
    }
}