<?php
    /**
     * Provides access to students in our database
     * @author Brian Saylor <bsaylor3@mail.greenriver.edu>
     * @version 1.0
     *
     *CREATE TABLE students
        (
        student_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        exercise_id int NOT NULL,
        fName varchar(255),
        lName varchar(255),
        grade int
        );
     */
    
    //CONNECT
    class StudentDB
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
        /**
         * Adds a member to the collection of students in the db.
         *
         * @access public
         * @param string $exercise_id the id of the exercise the student will be graded in
         * @param string $fname the first name of the student
         * @param string $lname the last name of student
         * @param string $grade the grade of the student
         *
         * @return true if the insert was successful, otherwise false
         */
        function addStudent($exercise_id, $fName, $lName, $grade)
        {
            
            
            $insert = 'INSERT INTO students (exercise_id, fName, lName, grade) VALUES (:exercise_id, :fName, :lName, :grade)';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':exercise_id', $exercise_id, PDO::PARAM_STR);
            $statement->bindValue(':fName', $fName, PDO::PARAM_STR);
            $statement->bindValue(':lName', $lName, PDO::PARAM_STR);
            $statement->bindValue(':grade', $grade, PDO::PARAM_STR);
                    
            $statement->execute();
            return $this->_pdo->lastInsertId();
        }
        
        function updateStudent($student_id, $exercise_id, $grade)
        {
            $update = 'UPDATE
                        students
                        SET
                        grade = "'.$grade.'"
                        WHERE
                        student_id = '.$student_id.'
                        AND
                        exercise_id = .'$exercise_id.'';
                        
            $statement = $this->_pdo->prepare($update);
            
            $statement->execute();
        }
         
        //READ
        /**
         * Returns all students in the database collection.
         *
         * @access public
         *
         * @return an associative array of students indexed by id
         */
        function allStudents()
        {
            $select = 'SELECT student_id, exercise_id, fName, lName, grade FROM students ORDER BY student_id';
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each student id to a row of data for that student
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['student_id']] = $row;
            }
             
            return $resultsArray;
        }
         
        /**
         * Returns a student that has the given id.
         *
         * @access public
         * @param int $id the id of the student
         *
         * @return an associative array of student attributes, or false if
         * the student was not found
         */
        function studentById($student_id)
        {
            $select = 'SELECT student_id, exercise_id, fName, lName, grade FROM students WHERE student_id=:student_id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':student_id', $student_id, PDO::PARAM_INT);
            $statement->execute();
             
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
         /**
         * Deletes a student that has the given id.
         *
         * @access public
         * @param int $id the id of the student
         *
         * @return an associative array of student attributes, or false if
         * the student was not found
         */
        function deleteOneStudent($student_id)
        {
            $select = 'DELETE FROM students WHERE student_id=:student_id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':student_id', $student_id, PDO::PARAM_INT);
            $statement->execute();
        }
    }