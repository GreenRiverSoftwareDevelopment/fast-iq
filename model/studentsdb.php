<?php
    /**
     * Provides access to students in our database
     * @author Brian Saylor <bsaylor3@mail.greenriver.edu>
     * @version 1.0
     *
     *CREATE TABLE students
        (
        student_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        fName varchar(255),
        lName varchar(255),
        daysMissed int
        );
     */
    
    //CONNECT
    class StudentsDB
    {
        private $_pdo;
        
        function __construct()
        {
            //Require configuration file
            require("../config_fast-iq.php");
            //require_once("../../../config.php");
            
            try {
                //Establish database connection
                $this->_pdo = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                
                //Keep the connection open for reuse to improve performance
                $this->_pdo->setAttribute( PDO::ATTR_PERSISTENT, true);
                
                //Throw an exception whenever a database error occurs
                $this->_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch (PDOException $e) {
                die( "Error!: " . $e->getMessage());
            }
        }
        
         
        //CREATE
        function addStudent($fName, $lName)
        {
            $insert = 'INSERT INTO students (fName, lName, daysMissed) VALUES (:fName ,:lName ,0)';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':fName', $fName, PDO::PARAM_INT);
            $statement->bindValue(':lName', $lName, PDO::PARAM_INT);
                    
            $statement->execute();
            return $this->_pdo->lastInsertId();
        }
        
        function updateStudent($student_id, $daysMissed)
        {
            $update = 'UPDATE
                        students
                        SET
                        daysMissed = daysMissed + :daysMissed
                        WHERE
                        student_id = :student_id';
                        
            $statement = $this->_pdo->prepare($update);$statement->bindValue(':daysMissed', $daysMissed, PDO::PARAM_INT);
            $statement->bindValue(':student_id', $student_id, PDO::PARAM_STR);
            $statement->execute();
        }
         
        //READ
        function allStudents()
        {
            $select = 'SELECT * FROM students ORDER BY student_id';
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each student id to a row of data for that student
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['student_id']] = $row;
            }
             
            return $resultsArray;
        }
         
        
        function studentById($student_id)
        {
            $select = 'SELECT * FROM students WHERE student_id = :student_id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':student_id', $student_id, PDO::PARAM_INT);
            $statement->execute();
             
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
        function deleteOneStudent($student_id)
        {
            $select = 'DELETE FROM students WHERE student_id = :student_id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':student_id', $student_id, PDO::PARAM_INT);
            $statement->execute();
        }
    }