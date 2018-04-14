<?php
    /**
     * Provides access to members in our database
     * @author Brian Saylor <bsaylor3@mail.greenriver.edu>
     * @version 1.0
     *
     * CREATE TABLE members
        (
        member_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        fName varchar(255),
        lName varchar(255),
        counselor varchar(255),
        activities varchar(500)
        );
     */
    
    //CONNECT
    class MemberDB
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
         * Adds a member to the collection of members in the db.
         *
         * @access public
         * @param string $fnamename the name of the pet
         * @param string $lname the type of pet (giraffe, turtle, bear, ...)
         * @param string $counselor the color of the animal
         * @param string $activities the name of the pet
         *
         * @return true if the insert was successful, otherwise false
         */
        function addMember($username, $password)
        {
            
            
            $insert = 'INSERT INTO users (username, password) VALUES (:username, :password)';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            $statement->bindValue(':password', $password, PDO::PARAM_STR);
                    
            $statement->execute();
            return $this->_pdo->lastInsertId();
        }
        
        function updateMember($id, $fname, $lname, $counselor, $activityOne, $activityTwo, $activityThree, $activityFour, $activityFive, $activitySix, $activitySeven, $activityEight, $activityNine, $activityTen)
        {
            
            
            $update = 'UPDATE members
                        SET fname = "'.$fname.'",
                        lname = "'.$lname.'",
                        counselor = "'.$counselor.'",
                        activityOne = "'.$activityOne.'",
                        activityTwo = "'.$activityTwo.'",
                        activityThree = "'.$activityThree.'",
                        activityFour = "'.$activityFour.'",
                        activityFive = "'.$activityFive.'",
                        activitySix = "'.$activitySix.'",
                        activitySeven = "'.$activitySeven.'",
                        activityEight = "'.$activityEight.'",
                        activityNine = "'.$activityNine.'",
                        activityTen = "'.$activityTen.'"
                        WHERE member_id = '.$id.'';
                        
            $statement = $this->_pdo->prepare($update);
            
            
            $statement->execute();
        }
         
        //READ
        /**
         * Returns all members in the database collection.
         *
         * @access public
         *
         * @return an associative array of members indexed by id
         */
        function allMembers()
        {
            $select = 'SELECT member_id, fname, lname, counselor, activityOne, activityTwo, activityThree, activityFour, activityFive, activitySix, activitySeven, activityEight, activityNine, activityTen, monday, tuesday, wednesday, thursday, friday FROM members ORDER BY member_id';
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each pet id to a row of data for that pet
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['member_id']] = $row;
            }
             
            return $resultsArray;
        }
        
        //READ
        /**
         * Returns all members in the database collection.
         *
         * @access public
         *
         * @return an associative array of members indexed by id
         */
        function allMembersNoDays()
        {
            $select = 'SELECT member_id, fname, lname, counselor, activityOne, activityTwo, activityThree, activityFour, activityFive, activitySix, activitySeven, activityEight, activityNine, activityTen FROM members ORDER BY member_id';
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each pet id to a row of data for that pet
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['member_id']] = $row;
            }
             
            return $resultsArray;
        }
         
        /**
         * Returns a member that has the given id.
         *
         * @access public
         * @param int $id the id of the member
         *
         * @return an associative array of member attributes, or false if
         * the member was not found
         */
        function memberById($id)
        {
            $select = 'SELECT member_id, fname, lname, counselor, activityOne, activityTwo, activityThree, activityFour, activityFive, activitySix, activitySeven, activityEight, activityNine, activityTen FROM members WHERE member_id=:id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
             
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
        /**
         *Returns a members name from the search
         *
         *
         */
        function getMemberName($search)
        {
            $display_name = "SELECT member_id, fname, lname, counselor, activityOne, activityTwo, activityThree,
            activityFour, activityFive, activitySix, activitySeven, activityEight, activityNine, activityTen FROM members WHERE fname LIKE '%$search%' OR lname LIKE '%$search%' OR counselor LIKE '%$search%'";
            //var_dump ($display_name);
            //exit();
            
            $statement = $this->_pdo->prepare($display_name);
            $statement->execute();
             
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        
         /**
         * Deletes a member that has the given id.
         *
         * @access public
         * @param int $id the id of the member
         *
         * @return an associative array of member attributes, or false if
         * the member was not found
         */
        function deleteOneMember($id)
        {
            $select = 'DELETE FROM members WHERE member_id=:id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
        }
        
        /**
         * Returns a member that has the given id.
         *
         * @access public
         * @param int $id the id of the member
         *
         * @return an associative array of member attributes, or false if
         * the member was not found
         */
        function deleteMembers()
        {
            $select = 'DELETE FROM members';
             
            $statement = $this->_pdo->prepare($select);
            $statement->execute();
        }
        

        

        
        /**
          * Checks if the member exists
          * @param ID: checks the id passed in to see if the member exists
          * 
          * @return Returns a row from the database that matches this. 
          */
        function memberExists($id, $day)
        {            
            $select = "SELECT " . $day . " FROM members WHERE member_id=:id";
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_STR);
            $statement->execute();
             
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
                /**
         * Returns true if the name is used by a pet in the database.
         *
         * @access public
         * @param string $name the name of the pet to look for
         *
         * @return true if the name already exists, otherwise false
         */   
        function adminNameExists($username, $password)
        {            
            $select = 'SELECT user_id, username, password FROM users WHERE username=:username AND password=:password';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            $statement->bindValue(':password', $password, PDO::PARAM_STR);            
            $statement->execute();
             
            $row = $statement->fetch(PDO::FETCH_ASSOC);
             
            return !empty($row);
        }
        
        
        function memberByUsername($username)
        {
            $select = 'SELECT user_id, username, password FROM users WHERE username=:username';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':username', $username, PDO::PARAM_INT);
            $statement->execute();
             
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
    }