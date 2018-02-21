<?php

/*CREATE TABLE units
(
    unit_id int NOT NULL AUTO_INCREMENT,
    cateogry_id int,
    unit_name varchar (255),
    PRIMARY KEY(unit_id)
);*/

    class UnitDB
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
                die( " Unit Error!: " . $e->getMessage());
            }
        }
        
        /**
         * Adds a exercise to the collection of exercises in the db.
         * INSERT INTO `units` (`category_id`, `unit_name`) VALUES
            (1, 'Mass 101'),
            (1, 'Mass over 9000'),
            (2, 'Electronics: How do they work?'),
            (2, '+ to + right?'),
            (3, 'What is Pneumatics?'),
            (3, 'Ok, but what is Pneumatics'),
            (4, 'Hydraulics, put it... put it on my car'),
            (4, 'Hydraulic toilets and you'),
            (5, 'Mechanical is everything'),
            (5, 'Mechanical 485');
         */
        function addUnit($unit_name, $id)
        {
            $insert =
            'INSERT INTO
            units
            (category_id, unit_name)
            VALUES
            (:id, :unit_name)';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->bindValue(':unit_name', $unit_name, PDO::PARAM_STR);
            
            $statement->execute();
        }
         
        /**
         * Edits a exercise to the collection of exercises in the db.
         */
        function editUnit($unit_name, $id)
        {
            $insert =
            'UPDATE
            units
            SET
            unit_name=:unit_name
            WHERE
            unit_id=:id';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->bindValue(':unit_name', $unit_name, PDO::PARAM_STR);
            
            $statement->execute();
        }
         
        /**
         * Grabs all exercises from a specific unit_id
         */
        function unitsByCategory($category_id)
        {

            $select = "SELECT unit_id, category_id, unit_name
            FROM units WHERE category_id = ".$category_id." ORDER BY unit_name";
             
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each pet id to a row of data for that pet
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['unit_id']] = $row;
            }
             
            return $resultsArray;
        }
        
        /**
         * grabs a unit that has the given id.
         */
        function getUnitByID($id)
        {
            $select = 'SELECT category_id, unit_id, unit_name FROM units WHERE unit_id=:id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
        /**
         * deletes a unit that has the given id.
         */
        function deleteUnit($id)
        {
            $select = 'DELETE FROM units WHERE unit_id=:id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
        }
    }
?>