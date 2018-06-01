$(document).ready(function()
{
    
    $('.0').hide();
    
    
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".video_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_videos_button"); //Add button ID
    //var submit_button      = $("#submit_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e)
    { //on add input button click
        e.preventDefault();
        if(x < max_fields)
        { //max input box allowed
            var item = $('<div class="row dynamic_input"> '+
                               '<div class="col-sm-11">'+
                                   '<textarea rows="3" cols="50" class="form-control" name="videoLink[]" id="videoLink" placeholder="Enter a link here" style="font-size: 14px"></textarea>'+
                               '</div>'+
                               '<div class="col-sm-1 text-center">'+
                                    '<br>'+
                                    '<a href="#" class="remove_field">'+
                                        '<span class="text-center remove_icon glyphicon glyphicon-remove aria-hidden="true"></span>'+
                                    '</a>'+
                               '</div>'+
                         '</div>');
            $(wrapper).append(item); //add input box
            x++; //text box increment
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e)
    {
        //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    });
    
    $(wrapper).on("click",".view_video", function()
    {   
        //user clicks to have video appear in Iframe
        var id = this.id;
        var pickup = $("#"+id).val();
        $("#"+id).val($('#0').val());
        $('#0').val(pickup);
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