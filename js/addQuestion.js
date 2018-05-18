$(document).ready(function()
{
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".question_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_questions_button"); //Add button ID
    //var submit_button      = $("#submit_button"); //Add button ID
    
    var x = 0; //initlal text box count
    $(add_button).click(function(e)
    { //on add input button click
        e.preventDefault();
        if(x < max_fields)
        {
            //max input box allowed is 10
            var item = $('<div class="row new_question"> '+
                               '<div class="col-sm-11">'+
                                   '<textarea rows="3" cols="50" class="form-control" name="questions[]" id="questions" placeholder="Enter a question here" style="font-size: 14px"></textarea>'+
                               '</div>'+
                               '<div class="col-sm-1 text-center">'+
                                    '<br>'+
                                    '<a href="#" class="remove_field">'+
                                        '<span aria-hidden="true"><h1>&times;</h1></span>'+
                                    '</a>'+
                               '</div>'+
                         '</div>'+
                         '<br>');
            $(wrapper).append(item); //add input box
            x++; //text box increment
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e)
    { //user click on remove text
        e.preventDefault();
        $('.new_question').remove(); x--;
    });
    //$(submit_button).click(function()
    //{
    //    console.log("submitting form");
    //    
    //    $('textarea[name^="questions"]').each(function() {
    //        console.log($(this).val());
    //    });
    //    
    //});
});