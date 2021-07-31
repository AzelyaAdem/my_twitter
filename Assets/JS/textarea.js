$(document).on("input", "textarea", function()
{
    $(this).prop('style').cssText = 'height:auto;';
    $(this).prop('style').cssText = 'height:' + $(this).prop('scrollHeight') + 'px';
});

$(document).ready(function(){
    var text = $("#message").val();
    console.log(text);
});