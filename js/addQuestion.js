$(document).ready(function()
{
    console.log("Waiting to add input");
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e)
    { //on add input button click
        e.preventDefault();
        if(x < max_fields)
        { //max input box allowed
            x++; //text box increment
            $(wrapper).append('<textarea rows="3" cols="50" class="form-control" name="naa[]" id="naa" placeholder="Enter a question here" style="font-size: 14px"></textarea><a href="#" class="remove_field">Remove</a>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e)
    { //user click on remove text
        console.log($('#naa').val());
        console.log('hello');
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
});