$( document ).ready( function(){
   //This will fire when page is fully loaded
   /*
    *This will hide the error messages
    */
   $( '#wrongPasswordOrUsername' ).hide();
   $( '.usernameBlank').hide();
   $( '.passwordBlank').hide();
  
   $('button').click(function(event){//This is the submit button. The event default is prevented so you will not be routed yet.
      
   $( '#wrongPasswordOrUsername' ).hide();
   $( '.usernameBlank').hide();
   $( '.passwordBlank').hide();
   
    var username = $('#username').val();
    var password = $('#password').val();


    
    if(password.length === 0 && username.length === 0){//if there is nothing in the password box or username box then error message will display
        $( '.passwordBlank').show();
        $( '.usernameBlank').show();
            event.preventDefault(); 
    }
    else if(username.length === 0){//If the username is blank then display correct error
        $( '.usernameBlank').show();
            event.preventDefault(); 
    }
    
    
    else if(password.length === 0) {// if there is nothing in the password box, display correct error message
        $( '.passwordBlank').show();
            event.preventDefault(); 
        

    }
    
    else{//else they filled in password and username slots
      
        $.post('./loginPost',//Sends this to the login page
               
               {
                
                    userInput : username,
                    passwordInput : password
                
               });
            
        
    }
    

    
   });
});