<?php
    /**
     * Provides access to students grades in our database
     * @author Brian Saylor <bsaylor3@mail.greenriver.edu>
     * @version 1.0
     *
     *CREATE TABLE grades
        (
        grade_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        student_id int NOT NULL,
        exercise_id int NOT NULL,
        grade int
        );
     */
    
    //SELECT students.fName, students.lName, exercises.exercise_name, grades.grade FROM grades INNER JOIN students ON grades.student_id = students.student_id INNER JOIN exercises ON grades.exercise_id = exercises.exercise_id ORDER BY grades.student_id
    
    //CONNECT
    class GradesDB
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
        function addGrade($exercise_id, $grade)
        {
            $insert = 'INSERT INTO grades (exercise_id, grade) VALUES (:exercise_id, :grade)';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':exercise_id', $exercise_id, PDO::PARAM_STR);
            $statement->bindValue(':grade', $grade, PDO::PARAM_STR);
                    
            $statement->execute();
            return $this->_pdo->lastInsertId();
        }
        
        function getGradeID($student_id, $exercise_id)
        {
            $insert = 'SELECT grade_id FROM `grades` WHERE student_id = :student_id AND exercise_id = :exercise_id';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':student_id', $student_id, PDO::PARAM_INT);
            $statement->bindValue(':exercise_id', $exercise_id, PDO::PARAM_INT);
                    
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
        //UPDATE
        function updateGrade($student_id, $exercise_id, $grade)
        {
            $update = 
                'INSERT INTO grades
                (grade_id, student_id, exercise_id, grade)
                VALUES
                (:grade_id, :student_id, :exercise_id, :grade) 
                ON DUPLICATE KEY
                UPDATE 
                grade = :grade';
                        
            $statement = $this->_pdo->prepare($update);
            
            $grade_id = $this->getGradeID($student_id, $exercise_id);
            if(!empty($grade_id))
            {
                $grade_id = array_pop($grade_id);
                $statement->bindValue(':grade_id', $grade_id, PDO::PARAM_INT);
            }
            else
            {
                $grade_id = 1;
                $statement->bindValue(':grade_id', $grade_id, PDO::PARAM_INT);
            }
            
            
            $statement->bindValue(':student_id', $student_id, PDO::PARAM_INT);
            $statement->bindValue(':exercise_id', $exercise_id, PDO::PARAM_INT);
            $statement->bindValue(':grade', $grade, PDO::PARAM_INT);
            
            $statement->execute();
        }
         
        ////READ
        //function allGrades()
        //{
        //    $select = 'SELECT * FROM grades ORDER BY student_id';
        //    $results = $this->_pdo->query($select);
        //     
        //    $resultsArray = array();
        //     
        //    //map each student id to a row of data for that student
        //    while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
        //        $resultsArray[$row['student_id']] = $row;
        //    }
        //     
        //    return $resultsArray;
        //}
        
        //READ
        function allGrades()
        {
            $select =
            'SELECT
            grades.grade_id, grades.student_id, students.fName, students.lName, exercises.exercise_name, grades.grade
            FROM
            grades
            INNER JOIN
            students
            ON
            grades.student_id = students.student_id
            INNER JOIN
            exercises
            ON
            grades.exercise_id = exercises.exercise_id
            ORDER BY
            grades.student_id';
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each student id to a row of data for that student
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['grade_id']] = $row;
            }
             
            return $resultsArray;
        }
         
        function gradesByStudentId($student_id)
        {
            $select = 'SELECT * FROM grades WHERE student_id = :student_id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':student_id', $student_id, PDO::PARAM_INT);
            $statement->execute();
             
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
    }
