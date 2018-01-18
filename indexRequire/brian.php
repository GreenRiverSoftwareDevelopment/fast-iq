<?php

            $f3->route('GET /deleteMember/@id', function($f3, $params) {

                        $_SESSION['id'] = $params['id'];

                        $memberDB = $GLOBALS['memberDB']->deleteMember($_SESSION['id']);

                    $f3->reroute('/activities');
                });

            $f3->route('GET /deleteWeek', function($f3) {

                    $usernameCheck = $_SESSION['username'];
                    $passwordCheck = $_SESSION['password'];
                    if($usernameCheck == null || $passwordCheck == null){
                        $f3->reroute('/login');
                    }
                $members = $GLOBALS['memberDB']->deleteWeek();

                // Removed profile off the path
                $f3->reroute('/displaymembers');
            });
            
            $f3->route('GET /deleteCounter', function($f3) {

                    $usernameCheck = $_SESSION['username'];
                    $passwordCheck = $_SESSION['password'];
                    if($usernameCheck == null || $passwordCheck == null){
                        $f3->reroute('/login');
                    }
                $activities = $GLOBALS['activityDB']->deleteCounter();

                // Removed profile off the path
                $f3->reroute('/activities');
            });

            // this method reroutes here ----->echo Template::instance()->render('pages/sortGroups.html');
            //Groups are sorted here
            
            $f3->route('GET /sortGroups', function($f3) {
        
                    $usernameCheck = $_SESSION['username'];
                    $passwordCheck = $_SESSION['password'];
                    if($usernameCheck == null || $passwordCheck == null)
                    {
                        $f3->reroute('/login');
                    }
                    
                    $members = $GLOBALS['memberDB']->deleteWeek();
                //variables created to be used in the nested for each loops
                $activityArray = array();

                $activities =  $GLOBALS['activityDB']->allActivities();
                
                            $activityArrayOne = $GLOBALS['memberDB']->activityOne();
                            $activityArrayTwo = $GLOBALS['memberDB']->activityTwo();
                            $mergeOne = array_merge($activityArrayOne, $activityArrayTwo);
                            
                            $activityArrayThree = $GLOBALS['memberDB']->activityThree();
                            $activityArrayFour = $GLOBALS['memberDB']->activityFour();
                            $mergeTwo = array_merge($activityArrayThree, $activityArrayFour);
                            
                                    $firstInnerMerge = array_merge($mergeOne, $mergeTwo);
                            
                            $activityArrayFive = $GLOBALS['memberDB']->activityFive();
                            $activityArraySix = $GLOBALS['memberDB']->activitySix();
                            $mergeThree = array_merge($activityArrayFive, $activityArraySix);
                            
                            $activityArraySeven = $GLOBALS['memberDB']->activitySeven();
                            $activityArrayEight = $GLOBALS['memberDB']->activityEight();
                            $mergeFour = array_merge($activityArraySeven, $activityArrayEight);
                            
                                    $secondInnerMerge = array_merge($mergeThree, $mergeFour);
                                    
                                    $secondToLastMerge = array_merge($firstInnerMerge, $secondInnerMerge);
                                    
                            $activityArrayNine = $GLOBALS['memberDB']->activityNine();
                            $activityArrayTen = $GLOBALS['memberDB']->activityTen();
                            $mergeFive = array_merge($activityArrayNine, $activityArrayTen);
                            
                            $lastMerge = array_merge($secondToLastMerge, $mergeFive);
                            
                            $activityArray = $lastMerge;

                 $arrayWithKeyValueGlobal  = array();
                 
                function lookUpLimit()
                {
                        
                        
                        $count = 0;
                        $current = 0;
                        $itemCounter = 1;
                        $activities =  $GLOBALS['activityDB']->activities();
                        $limitArray = array();
                        $activityNameArray = array();
                        $arrayWithKeyValues  = array();
                        
                        
                        
                                foreach($activities as $value)
                                {
                                            foreach($value as $activity)
                                            {
                                                        if($itemCounter == 1)
                                                        {
                                                                    array_push($activityNameArray, $activity);
                                                                    $itemCounter++;
                                                        }
                                                        else if($itemCounter == 2)
                                                        {
                                                                    array_push($limitArray, $activity);
                                                                    $itemCounter = 1;
                                                        }
                                            }
                                }
                                
                               
                                            
                                for($i = 0; $i < count($activityNameArray); $i++)
                                {
                                            $arrayWithKeyValues[$activityNameArray[$i]]=$limitArray[$i];       
                                }         
                               
                                $GLOBALS['arrayWithKeyValueGlobal'] = $arrayWithKeyValues;
                                //print_r($activityNameArray);
                                //echo "<br>";
                                //echo "Here";
                               // var_dump($arrayWithKeyValues);
                               // print_r($arrayWithKeyValues);
                }
                
                lookUpLimit();
                
                //these need to be reset before the nested for each
                
                $current = 0;
                $memberCount = 1;
                $itemCounter = 1;
                //counts down everytime a activity is added to the queue
                
                $memberID = "";
                $memberName = "";
                $memberActivity = "";
                $memberArray = array();
                $memberQueueArray = array();
                
                
                
                $membersInDatabase = $GLOBALS['memberDB']->allMembersNoDays();
                $KeyToValueFromGlobal = $GLOBALS['arrayWithKeyValueGlobal'];
                
            //this nested for each stores the members in a queue
            foreach($membersInDatabase as $memberList)
            {
                        $count = 0;
                        $priority = 10;
                        $memberQueue = new PriorityQueue();
                        foreach($memberList as $member)
                        {
                                    
                                    
                                    if($count == 0)
                                    {
                                                //echo "member id: $member";
                                                $memberInformation = new Member();
                                                $memberInformation->setID($member);
                                                //echo "<br>";        
                                    }
                                    else if($count == 1)
                                    {
                                                //echo "member first name: $member";
                                                $memberInformation->setFName($member);
                                                //echo "<br>";        
                                    }
                                    else if($count == 2)
                                    {
                                                //echo "member last name: $member";
                                                $memberInformation->setLName($member);
                                                array_push($memberArray, $memberInformation);
                                                //echo "<br>";        
                                    }
                                    else if($count == 3)
                                    {
                                                //echo "member counselor: $member";
                                                //echo "<br>";        
                                    }
                                    else if($count > 3)
                                    {
                                                //echo "member activity: $member";
                                                $memberQueue->insert($member, $priority);
                                                $priority--;
                                                //echo "<br>";
                                                if($count == 13)
                                                {
                                                            $count = 0;
                                                            array_push($memberQueueArray, $memberQueue);
                                                }
                                    }
                                    $count++;
                                    
                                    
                        }//This is where a new member cycles through the foreach loop
                        
            }//This is where a new activity cycles through the foreach loop
                
                
            $limitCounter = 0;
            $camperCounter = 0;
            $day = 0;
            $done = 0;
            $membersInDatabase = $GLOBALS['memberDB']->allMembers();
            $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
            for($dayCount = 0; $dayCount < count($days); $dayCount++)
            {
                        //resets limits for camper activities
                        unset($KeyToValueFromGlobal);
                        lookUpLimit();
                        $KeyToValueFromGlobal = $GLOBALS['arrayWithKeyValueGlobal'];
                        for($i = 0; $i < count($memberQueueArray); $i++)
                        {
                                    //stores all member's queues
                                    $tempQueue = $memberQueueArray[$i];
                                    //stores all members ID's
                                    $tempMember = $memberArray[$i]->getID();
                                    //echo $tempMember;
                                    $queueHolder = new PriorityQueue();
                                    $tempQueue->setExtractFlags(PriorityQueue::EXTR_DATA);
                                    $queueHolder->setExtractFlags(PriorityQueue::EXTR_DATA);
                                    
                                                if($tempQueue->valid() && ($KeyToValueFromGlobal[$tempQueue->current()] != 0))
                                                { 
                                                            //print_r($tempQueue->current());
                                                            //echo "First Test";
                                                            $memberUpdate = $GLOBALS['memberDB']->updateMembersDays($days[$dayCount], $tempQueue->current(), $tempMember);
                                                            $KeyToValueFromGlobal[$tempQueue->current()]--;
                                                            //echo "<br>";
                                                            //echo "Camper with ID " . $tempMember . " was added to " . $tempQueue->current();
                                                            //echo "<BR>"; 
                                                            $tempQueue->next();
                                                }
                                                else if($tempQueue->valid() &&  ($KeyToValueFromGlobal[$tempQueue->current()] == 0))
                                                {
                                                            //echo "<br>";
                                                            //echo "Camper was skipped since the limit for the activity has been reached";
                                                            while($tempQueue->valid() && $KeyToValueFromGlobal[$tempQueue->current()] == 0 && ($done == 0))
                                                            {
                                                                        $tempQueue->next();
                                                                        //ifthe activity is not full for the member, add the member on that day for that activity
                                                                        if($KeyToValueFromGlobal[$tempQueue->current()] != 0)
                                                                        {
                                                                                    //echo "<br>";
                                                                                    //echo "******************************Camper with ID " . $tempMember . " was added to " . $tempQueue->current();
                                                                                    //echo "Second Test";
                                                                                    $memberUpdate = $GLOBALS['memberDB']->updateMembersDays($days[$dayCount], $tempQueue->current(), $tempMember);
                                                                                    $KeyToValueFromGlobal[$tempQueue->current()]--;
                                                                                    $done++;
                                                                        }
                                                                        //Queue is empty
                                                                        //else if(!$tempQueue->valid())
                                                                        //{
                                                                        //            $memberUpdate = $GLOBALS['memberDB']->updateMembersDays($days[$dayCount], "No activity open.", $tempMember);
                                                                        //}
                                                                        //put the activity back in the queue
                                                                        else if($KeyToValueFromGlobal[$tempQueue->current()] == 0)
                                                                        {
                                                                                    $queueHolder->insert($tempQueue->current(), $tempQueue->count() + 1);
                                                                        }
                                                            }
                                                            if(!$tempQueue->valid())
                                                            {
                                                                        $memberUpdate = $GLOBALS['memberDB']->updateMembersDays($days[$dayCount], "No activity open.", $tempMember);
                                                            }
                                                            $priorityCounter = 10;
                                                            while($queueHolder->valid())
                                                            {
                                                                        $queueHolder->next();
                                                                        $tempQueue->insert($queueHolder->current(), $priorityCounter);
                                                                        $priorityCounter--;
                                                                        
                                                            }
                                                            $done = 0;
                                                            //skip it, next day will pull it
                                                }
                                                else if (!$tempQueue->valid())
                                                {
                                                            $memberUpdate = $GLOBALS['memberDB']->updateMembersDays($days[$dayCount], "No activity open.", $tempMember);
                                                }
                                                $camperCounter++;
                        }
                        //echo "<br>";
                        //echo "next day starts here.";
                        unset($KeyToValueFromGlobal);
                        lookUpLimit();
            }
                
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                

            //Assign the variables to an f3 variable
            //var_dump($GLOBALS['arrayWithKeyValueGlobal']);
            //$f3->set('activity', $activity);
            $members = $GLOBALS['memberDB']->allMembers();
            $f3->set('members', $members);
            //echo "Count for members: " . count($members);
            //var_dump($memberArray);
                
            //$queue = new PriorityQueue();
            //    
            //$queue->insert('A',3); 
            //$queue->insert('B',6); 
            //$queue->insert('C',1); 
            //$queue->insert('D',2);
            //
            //echo "COUNT->".$queue->count()."<BR>"; 
            //
            ////mode of extraction 
            //$queue->setExtractFlags(PriorityQueue::EXTR_BOTH); 
            //
            ////Go to TOP 
            //$queue->top(); 
            //
            //while($queue->valid())
            //{ 
            //            print_r($queue->current()); 
            //            echo "<BR>"; 
            //            $queue->next(); 
            //} 
                
            echo Template::instance()->render('pages/sortGroups.html');
            });
            
            
            /*if($day == 0)//Do Monday
                                            {
                                                if($KeyToValueFromGlobal[$memberActivity] == 0)
                                                {
                                                    //put them in the backlog
                                                    //echo "limit for " . $memberActivity . " has been reached.";
                                                    //echo "<br>";
                                                    $backFillArray[$memberID] = $memberActivity;
                                                    array_push($blankSpaceArray, $memberID);
                                                    //array_push($backFillArray, $memberID, $memberActivity);
                                                }
                                                else if(count($membersInDatabase) < $memberCount)
                                                {
                                                    //move to tuesday 
                                                    echo "The limit for the day has been reached MONDAY";
                                                    echo "<br>";
                                                    lookUpLimit();
                                                    $day++; 
                                                }
                                                else
                                                {
                                                    //place them on that day
                                                    
                                                    echo "UPDATED MONDAY";
                                                    echo "<br>";                                                    
                                                    $memberUpdate = $GLOBALS['memberDB']->updateMembersDays("Monday", $memberActivity, $memberID);
                                                    $KeyToValueFromGlobal[$memberActivity]--;
                                                }
                                                                                                    
                                            }

                                            else if($day == 1)//Do Tuesday
                                            {
                                                if($KeyToValueFromGlobal[$memberActivity] == 0)
                                                {
                                                    //put them in the backlog
                                                    //echo "limit for " . $memberActivity . " has been reached.";
                                                    //echo "<br>";
                                                    $backFillArray[$memberID] = $memberActivity;
                                                    array_push($blankSpaceArray, $memberID);
                                                    //array_push($backFillArray, $memberID, $memberActivity);
                                                }
                                                else if((count($membersInDatabase) * 2) < $memberCount )
                                                {
                                                    //move to tuesday 
                                                    echo "The limit for the day has been reached TUESDAY";
                                                    echo "<br>";
                                                    lookUpLimit();
                                                    $day++; 
                                                }
                                                else
                                                {
                                                            foreach($blankSpaceArray as $item)
                                                            {
                                                                        if($memberID == $item)
                                                                        {
                                                                                    //if the $item equals the members ID add that member to the day before to fill in the blanks
                                                                                    $memberUpdate = $GLOBALS['memberDB']->updateMembersDays("Monday", $memberActivity, $memberID);
                                                                                    echo "A Blank Member was added";
                                                                                    echo "member id: $memberID";
                                                                                    echo "<br>";
                                                                                    
                                                                                    echo "member activity: $memberActivity";
                                                                                    echo "<br>";
                                                                        }       
                                                            }
                                                            if(count($backFillArray) != 0)
                                                            {
                                                                        //start acting the backFillArray to the database for that day
                                                                        $memberUpdate = $GLOBALS['memberDB']->updateMembersDays("Tuesday", $memberActivity, $memberID);
                                                                        echo "Back Fill has added a member";
                                                                        echo "member id: $memberID";
                                                                        echo "<br>";
                                                                                    
                                                                        echo "member activity: $memberActivity";
                                                                        echo "<br>";
                                                            }
                                                            else
                                                            {
                                                                        //place them on that day
                                                                        echo "UPDATED TUESDAY";
                                                                        echo "<br>";                                                    
                                                                        $memberUpdate = $GLOBALS['memberDB']->updateMembersDays("Tuesday", $memberActivity, $memberID);
                                                                        $KeyToValueFromGlobal[$memberActivity]--;
                                                            }
                                                    //place them on that day
                                                    echo "UPDATED TUESDAY";
                                                    echo "<br>";                                                    
                                                    $memberUpdate = $GLOBALS['memberDB']->updateMembersDays("Tuesday", $memberActivity, $memberID);
                                                    $KeyToValueFromGlobal[$memberActivity]--;
                                                }
                                                                                                    
                                            }
                                            
                                            else if($day == 2)//Do Wednesday
                                            {
                                                if($KeyToValueFromGlobal[$memberActivity] == 0)
                                                {
                                                    //put them in the backlog
                                                    //echo "limit for " . $memberActivity . " has been reached.";
                                                    //echo "<br>";
                                                    $backFillArray[$memberID] = $memberActivity;
                                                    array_push($blankSpaceArray, $memberID);
                                                    //array_push($backFillArray, $memberID, $memberActivity);
                                                }
                                                else if((count($membersInDatabase) * 3) < $memberCount)
                                                {
                                                    //move to tuesday 
                                                    echo "The limit for the day has been reached WEDNESDAY";
                                                    echo "<br>";
                                                    lookUpLimit();
                                                    $day++; 
                                                }
                                                else
                                                {
                                                    //place them on that day
                                                    echo "UPDATED WEDNESDAY";
                                                    echo "<br>";
                                                    $memberUpdate = $GLOBALS['memberDB']->updateMembersDays("Wednesday", $memberActivity, $memberID);
                                                    $KeyToValueFromGlobal[$memberActivity]--;
                                                }
                                                                                                    
                                            }
                                            
                                            
                                            else if($day == 3)//Do Thursday
                                            {
                                                if($KeyToValueFromGlobal[$memberActivity] == 0)
                                                {
                                                    //put them in the backlog
                                                    //echo "limit for " . $memberActivity . " has been reached.";
                                                    //echo "<br>";
                                                    $backFillArray[$memberID] = $memberActivity;
                                                    array_push($blankSpaceArray, $memberID);
                                                    //array_push($backFillArray, $memberID, $memberActivity);
                                                }
                                                else if((count($membersInDatabase) * 4) < $memberCount)
                                                {
                                                    //move to tuesday 
                                                    echo "The limit for the day has been reached THURSDAY";
                                                    echo "<br>";
                                                    lookUpLimit();
                                                    $day++;
                                                    
                                                }
                                                else
                                                {
                                                            
                                                    echo "UPDATED THURSDAY";
                                                    echo "<br>";                                                            
                                                    //place them on that day
                                                    $memberUpdate = $GLOBALS['memberDB']->updateMembersDays("Thursday", $memberActivity, $memberID);
                                                    $KeyToValueFromGlobal[$memberActivity]--;
                                                }
                                                                                                    
                                            }
                                            
                                            
                                            else if($day == 4)//Do Friday
                                            {
                                                if($KeyToValueFromGlobal[$memberActivity] == 0)
                                                {
                                                    //put them in the backlog
                                                    //echo "limit for " . $memberActivity . " has been reached.";
                                                    //echo "<br>";
                                                    $backFillArray[$memberID] = $memberActivity;
                                                    array_push($blankSpaceArray, $memberID);
                                                    //array_push($backFillArray, $memberID, $memberActivity);
                                                }
                                                else if((count($membersInDatabase) * 5) < $memberCount)
                                                {
                                                    //move to tuesday 
                                                    echo "The limit for the day has been reached FRIDAY";
                                                    echo "<br>";
                                                   lookUpLimit();
                                                   $day++; 
                                                }
                                                else
                                                {
                                                            
                                                    echo "UPDATED FRIDAY";
                                                    echo "<br>";                                                            
                                                    //place them on that day
                                                    $memberUpdate = $GLOBALS['memberDB']->updateMembersDays("Friday", $memberActivity, $memberID);
                                                    $KeyToValueFromGlobal[$memberActivity]--;
                                                }
                                                                                                    
                                            } */