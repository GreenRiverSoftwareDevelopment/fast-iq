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
        function addMember($fname, $lname, $counselor, $activityOne, $activityTwo, $activityThree, $activityFour, $activityFive, $activitySix, $activitySeven, $activityEight, $activityNine, $activityTen)
        {
            $select = "UPDATE activities
                        SET count = count + 1
                        WHERE activity = '" . $activityOne . "'";
             
            $statement1 = $this->_pdo->prepare($select);
            $statement1->execute();
            
            $select = "UPDATE activities
                        SET count = count + 1
                        WHERE activity = '" . $activityTwo . "'";
             
            $statement2 = $this->_pdo->prepare($select);
            $statement2->execute();
            
            $select = "UPDATE activities
                        SET count = count + 1
                        WHERE activity = '" . $activityThree . "'";
             
            $statement3 = $this->_pdo->prepare($select);
            $statement3->execute();
            
            $select = "UPDATE activities
                        SET count = count + 1
                        WHERE activity = '" . $activityFour . "'";
             
            $statement4 = $this->_pdo->prepare($select);
            $statement4->execute();
            
            $select = "UPDATE activities
                        SET count = count + 1
                        WHERE activity = '" . $activityFive . "'";
             
            $statement5 = $this->_pdo->prepare($select);
            $statement5->execute();
            
            $select = "UPDATE activities
                        SET count = count + 1
                        WHERE activity = '" . $activitySix . "'";
             
            $statement6 = $this->_pdo->prepare($select);
            $statement6->execute();
            
            
            $select = "UPDATE activities
                        SET count = count + 1
                        WHERE activity = '" . $activitySeven . "'";
             
            $statement7 = $this->_pdo->prepare($select);
            $statement7->execute();
            
            $select = "UPDATE activities
                        SET count = count + 1
                        WHERE activity = '" . $activityEight . "'";
             
            $statement8 = $this->_pdo->prepare($select);
            $statement8->execute();
            
            $select = "UPDATE activities
                        SET count = count + 1
                        WHERE activity = '" . $activityNine . "'";
             
            $statement9 = $this->_pdo->prepare($select);
            $statement9->execute();
            
            $select = "UPDATE activities
                        SET count = count + 1
                        WHERE activity = '" . $activityTen . "'";
             
            $statement10 = $this->_pdo->prepare($select);
            $statement10->execute();
            
            
            $insert = 'INSERT INTO members (fname, lname, counselor, activityOne, activityTwo, activityThree, activityFour, activityFive, activitySix, activitySeven, activityEight, activityNine, activityTen) VALUES (:fname, :lname, :counselor, :activityOne, :activityTwo, :activityThree, :activityFour, :activityFive, :activitySix, :activitySeven, :activityEight, :activityNine, :activityTen)';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':fname', $fname, PDO::PARAM_STR);
            $statement->bindValue(':lname', $lname, PDO::PARAM_STR);
            $statement->bindValue(':counselor', $counselor, PDO::PARAM_STR);
            $statement->bindValue(':activityOne', $activityOne, PDO::PARAM_STR);
            $statement->bindValue(':activityTwo', $activityTwo, PDO::PARAM_STR);
            $statement->bindValue(':activityThree', $activityThree, PDO::PARAM_STR);
            $statement->bindValue(':activityFour', $activityFour, PDO::PARAM_STR);
            $statement->bindValue(':activityFive', $activityFive, PDO::PARAM_STR);
            $statement->bindValue(':activitySix', $activitySix, PDO::PARAM_STR);
            $statement->bindValue(':activitySeven', $activitySeven, PDO::PARAM_STR);
            $statement->bindValue(':activityEight', $activityEight, PDO::PARAM_STR);
            $statement->bindValue(':activityNine', $activityNine, PDO::PARAM_STR);
            $statement->bindValue(':activityTen', $activityTen, PDO::PARAM_STR);
            
            
            $statement->execute();
            //UPDATE activities
            //SET count = count + 1
            //WHERE activity = :activity;
            
            
            
            //Return ID of inserted row
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
            $select = 'SELECT id, name, type, color FROM pets WHERE username=:username';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':name', $username, PDO::PARAM_STR);
            
            $statement->execute();
             
            $row = $statement->fetch(PDO::FETCH_ASSOC);
             
            return !empty($row);
        }
        

        
       
        
       
      
    }