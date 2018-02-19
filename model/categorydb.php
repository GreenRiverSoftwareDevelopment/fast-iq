<?php

/*CREATE TABLE categories
(
    category_id int NOT NULL AUTO_INCREMENT,
    cateogry_name varchar (255),
    category_image varchar (500),
    PRIMARY KEY(category_id)
);*/

    class CategoryDB
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
                die( " Category Error!: " . $e->getMessage());
            }
        }
        
         /**
         * Adds a exercise to the collection of exercises in the db.
         */
        function addCategory($category_name, $category_image)
        {
            $insert =
            'INSERT INTO
            categories
            (category_name, category_image)
            VALUES
            (:category_name, :category_image)';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':category_name', $category_name, PDO::PARAM_INT);
            $statement->bindValue(':category_image', $category_image, PDO::PARAM_STR);
            
            $statement->execute();
        }
         
        /**
         * Edits a exercise to the collection of exercises in the db.
         */
        function editCategory($category_name, $category_image, $category_id)
        {
            $insert =
            'UPDATE
            categories
            SET
            category_name=:category_name,
            category_image=:category_image
            WHERE
            category_id=:id';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':category_name', $category_name, PDO::PARAM_INT);
            $statement->bindValue(':category_image', $category_image, PDO::PARAM_STR);
            $statement->bindValue(':id', $category_id, PDO::PARAM_STR);
            
            $statement->execute();
        }
         
        /**
         * Returns all categories in the database.
         */
        function allCategories()
        {
            $select = 'SELECT category_id, category_name, category_image FROM categories ORDER BY category_name';
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each activity id to a row of data for that activity
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['category_id']] = $row;
            }
             
            return $resultsArray;
        }
        
        /**
         * grabs a category that has the given id.
         */
        function getCategoryByID($id)
        {
            $select = 'SELECT category_name, category_id FROM categories WHERE category_id=:id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
        /**
         * deletes a exercise that has the given id.
         */
        function deleteCategory($id)
        {
            $select = 'DELETE FROM categories WHERE category_id=:id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
        }
    }
?>