<?php

/*CREATE TABLE units
(
    unit_id int NOT NULL AUTO_INCREMENT,
    cateogry_id int,
    unit_name varchar (255),
    PRIMARY KEY(unit_id)
);*/

    class UnitsDB
    {
        private $_pdo;
        
        function __construct()
        {
            //Require configuration file
            require_once("../config_fast-iq.php");
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
         * Adds a member to the collection of activities in the db.
         *
         * @access public
         * @param string $activityName the name of the activity
         * @param string $camperLimit the number of kids that can be in the activity
         *
         * @return true if the insert was successful, otherwise false
         */
        function addActivity($activity, $camperLimit)
        {
            $insert = 'INSERT INTO activities (activity, camper_limit) VALUES (:activity, :camperLimit)';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':activity', $activity, PDO::PARAM_STR);
            $statement->bindValue(':camperLimit', $camperLimit, PDO::PARAM_STR);
            
            $statement->execute();
            
            //Return ID of inserted row
            return $this->_pdo->lastInsertId();
        }
        
        //Edit
         
        /**
         * edits a activity in the collection of activities in the db.
         *
         * @access public
         * @param string $activityName the name of the activity
         * @param string $camperLimit the number of kids that can be in the activity
         *
         */
        function editActivity($id, $activity, $camperLimit)
        {
            $insert = 'UPDATE activities SET activity=:activity, camper_limit=:camperLimit WHERE activity_id=:id';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->bindValue(':activity', $activity, PDO::PARAM_STR);
            $statement->bindValue(':camperLimit', $camperLimit, PDO::PARAM_STR);
            
            $statement->execute();
        }
         
        //READ
        /**
         * Returns all activities in the database collection.
         *
         * @access public
         *
         * @return an associative array of activities indexed by id
         */
        function allActivities()
        {
            $select = 'SELECT activity_id, activity, camper_limit, count FROM activities ORDER BY activity';
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each activity id to a row of data for that activity
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['activity_id']] = $row;
            }
             
            return $resultsArray;
        }
        
        //READ
        /**
         * Returns all activities in the database collection.
         *
         * @access public
         *
         * @return an associative array of activities indexed by id
         */
        function activities()
        {
            $select = 'SELECT activity, camper_limit FROM activities ORDER BY activity';
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each activity id to a row of data for that activity
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['activity']] = $row;
            }
             
            return $resultsArray;
        }
        
        //READ
        /**
         * Returns all activities in the database collection.
         *
         * @access public
         *
         * @return an associative array of activities indexed by id
         */
        function allActivitiesByName()
        {
            $select = 'SELECT activity FROM activities ORDER BY activity';
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each activity id to a row of data for that activity
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['activity_id']] = $row;
            }
             
            return $resultsArray;
        }
        
        //READ
        /**
         * Returns all activities in the database collection.
         *
         * @access public
         *
         * @return an associative array of activities indexed by id
         */
        function disabledActivities()
        {
            $select = 'SELECT activity_id, activity, camper_limit, count FROM activities WHERE active = 0 ORDER BY activity';
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each activity id to a row of data for that activity
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['activity_id']] = $row;
            }
             
            return $resultsArray;
        }
        
        //READ
        /**
         * Returns all activities in the database collection.
         *
         * @access public
         *
         * @return an associative array of activities indexed by id
         */
        function activeActivities()
        {
            $select = 'SELECT activity_id, activity, camper_limit, count FROM activities WHERE active = 1 ORDER BY activity';
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each activity id to a row of data for that activity
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['activity_id']] = $row;
            }
             
            return $resultsArray;
        }
        
        //READ
        /**
         * Returns all activities in the database collection.
         *
         * @access public
         *
         * @return an associative array of activities indexed by id
         */
        function allActivitiesSortByName()
        {
            $select = 'SELECT activity_id, activity, camper_limit FROM activities ORDER BY activity';
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each activity id to a row of data for that activity
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['activity_id']] = $row;
            }
             
            return $resultsArray;
        }
        
        /**
         * deletes activities that has the given id.
         *
         * @access public
         * @param int $id the id of the activity
         *
         * @return an associative array of member attributes, or false if
         * the member was not found
         */
        function deleteActivity($id)
        {
            $select = 'DELETE FROM activities WHERE activity_id=:id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
             
            //return $this->_pdo->lastInsertId();
        }
        
        /**
         * Returns a camper_limit that has the given activity name.
         *
         * @access public
         * @param string $activity the name of the activity
         *
         * @return an row that matches the activity parameter
         */
        function activityLimit($activity)
        {
            $select = "SELECT camper_limit FROM activities WHERE activity = :activity ORDER By activity";
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':activity', $activity, PDO::PARAM_INT);
            $statement->execute();
            
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
        /**
         * disables activities that has the given id.
         *
         * @access public
         * @param int $id the id of the activity
         *
         * @return an associative array of member attributes, or false if
         * the member was not found
         */
        function disableActivity($id)
        {
            $select = 'UPDATE activities SET active = 0 WHERE activity_id=:id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
             
            //return $this->_pdo->lastInsertId();
        }
        
        /**
         * activate activities that has the given id.
         *
         * @access public
         * @param int $id the id of the activity
         *
         * @return an associative array of member attributes, or false if
         * the member was not found
         */
        function activateActivity($id)
        {
            $select = 'UPDATE activities SET active = 1 WHERE activity_id=:id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
             
            //return $this->_pdo->lastInsertId();
        }
        
        /**
         * Clears the count for the activities table
         */
        function deleteCounter()
        {
            $select = 'UPDATE activities SET count = 0';
             
            $statement = $this->_pdo->prepare($select);
            $statement->execute();
        }
         
    }

?>