$(document.body).ready(function(){
    
        $('form.loginInput').on('submit', function()
        {
            var username = $('#username').val();
            var password = $('#password').val();
            
            var formElement = $(this);
            var url = formElement.attr('action');
            var type = formElement.attr('method');
            data = {};
            
            formElement.find('[name]').each(function(index, value)
            {
                var eachInput = $(this),
                    name = eachInput.attr('name');
                    value = eachInput.val();
                    data[name] = value;
            });
            
            $.ajax({
                
               url: url,
               type: type,
               data: data,
               success: function(data)
               {
                    var myObject = data;
                    if(myObject == 1)
                    {
                        window.location.replace("./categoryBackend");
                        return true;
                    }
                    else
                    {
                        $("#myModal").effect( "shake" );
                        $("#errorMessage").fadeIn();
                        return false;
                    }
                    
               }
            });
            
            return false;
        });
    });