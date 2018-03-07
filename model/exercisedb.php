<?php

/*CREATE TABLE exercises
(
    exercise_id int NOT NULL AUTO_INCREMENT,
    unit_id int,
    exercise_name varchar (255),
    exercise_summary varchar (500),
    exercise_image varchar (500),
    exercise_video varchar(500),
    exercise_questions varchar (500),
    PRIMARY KEY(exercise_id)
);*/

    class ExerciseDB
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
                die( " Exercise Error!: " . $e->getMessage());
            }
        }
         
        /**
         * Adds a exercise to the collection of exercises in the db.
         */
        function addExercise($id, $exercise_name, $exercise_summary, $exercise_image, $exercise_video, $exercise_questions)
        {
            $insert =
            'INSERT INTO
            exercises
            (unit_id, exercise_name, exercise_summary, exercise_image, exercise_video, exercise_questions)
            VALUES
            (:id, :exercise_name, :exercise_summary, :exercise_image, :exercise_video, :exercise_questions)';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->bindValue(':exercise_name', $exercise_name, PDO::PARAM_STR);
            $statement->bindValue(':exercise_summary', $exercise_summary, PDO::PARAM_STR);
            $statement->bindValue(':exercise_image', $exercise_image, PDO::PARAM_STR);
            $statement->bindValue(':exercise_video', $exercise_video, PDO::PARAM_STR);
            $statement->bindValue(':exercise_questions', $exercise_questions, PDO::PARAM_STR);
            
            $statement->execute();
        }
        
        /**
         * Adds a exercise with only a name and hte corresponding unit to the collection of exercises in the db.
         */
        function addExerciseName($id, $exercise_name)
        {
            $insert =
            'INSERT INTO
            exercises
            (unit_id, exercise_name, exercise_summary, exercise_image, exercise_video, exercise_questions)
            VALUES
            (:id, :exercise_name, "Enter a summary here.", "https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg", "", "Enter in questions here.")';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->bindValue(':exercise_name', $exercise_name, PDO::PARAM_STR);
            
            $statement->execute();
        }
         
        /**
         * Edits a exercise to the collection of exercises in the db.
         */
        function editExercise($id, $exercise_name, $exercise_summary, $exercise_image, $exercise_video, $exercise_questions)
        {
            $insert =
            'UPDATE
            exercises
            SET
            exercise_name=:exercise_name,
            exercise_summary=:exercise_summary,
            exercise_image=:exercise_image,
            exercise_video=:exercise_video,
            exercise_questions=:exercise_questions
            WHERE
            exercise_id=:id';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->bindValue(':exercise_name', $exercise_name, PDO::PARAM_STR);
            $statement->bindValue(':exercise_summary', $exercise_summary, PDO::PARAM_STR);
            $statement->bindValue(':exercise_image', $exercise_image, PDO::PARAM_STR);
            $statement->bindValue(':exercise_video', $exercise_video, PDO::PARAM_STR);
            $statement->bindValue(':exercise_questions', $exercise_questions, PDO::PARAM_STR);
            
            $statement->execute();
        }
        
        /**
         *Edit exercise summary
         */
        function editExerciseSummary($id, $exercise_summary)
        {
            $insert =
            'UPDATE
            exercises
            SET
            exercise_summary=:exercise_summary
            WHERE
            exercise_id=:id';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->bindValue(':exercise_summary', $exercise_summary, PDO::PARAM_STR);
            
            $statement->execute();
        }
        
       
        
               /**
         *Edit exercise summary
         */
        function editExerciseImage($id, $exercise_image)
        {
            $insert =
            'UPDATE
            exercises
            SET
            exercise_image=:exercise_image
            WHERE
            exercise_id=:id';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->bindValue(':exercise_image', $exercise_image, PDO::PARAM_STR);
            
            $statement->execute();
        }
        
                  /**
         *Edit exercise summary
         */
        function editExerciseVideo($id, $exercise_video)
        {
            $insert =
            'UPDATE
            exercises
            SET
            exercise_video=:exercise_video
            WHERE
            exercise_id=:id';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->bindValue(':exercise_video', $exercise_video, PDO::PARAM_STR);
            
            $statement->execute();
        }
        
                      /**
         *Edit exercise summary
         */
        function editExerciseQuestion($id, $exercise_questions)
        {
            $insert =
            'UPDATE
            exercises
            SET
            exercise_questions=:exercise_questions
            WHERE
            exercise_id=:id';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->bindValue(':exercise_questions', $exercise_questions, PDO::PARAM_STR);
            
            $statement->execute();
        }
        
        
        
        
        /**
         * Edits a exercise to the collection of exercises in the db.
         */
        function editExerciseName($id, $exercise_name)
        {
            $insert =
            'UPDATE
            exercises
            SET
            exercise_name=:exercise_name
            WHERE
            exercise_id=:id';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->bindValue(':exercise_name', $exercise_name, PDO::PARAM_STR);
            
            $statement->execute();
        }
         
        /**
         * Grabs all exercises from a specific unit_id
         */
        function exercisesByUnit($unit_id)
        {

            $select = "SELECT exercise_id, unit_id, exercise_name
            FROM exercises WHERE unit_id = " . $unit_id . " ORDER BY exercise_name";
             
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each pet id to a row of data for that pet
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['exercise_id']] = $row;
            }
             
            return $resultsArray;
        }
        
        /**
         * grabs a exercise that has the given id.
         */
        function getExerciseByID($id)
        {
            $select = 'SELECT exercise_name, exercise_image, exercise_video, exercise_questions, exercise_summary FROM exercises WHERE exercise_id=:id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
        /**
         * deletes a exercise that has the given id.
         */
        function deleteExercise($id)
        {
            $select = 'DELETE FROM exercises WHERE exercise_id=:id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
        }
    }
?>