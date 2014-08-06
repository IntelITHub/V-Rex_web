$(document).ready(function(){
    $("#btn-save").click(function() {
         if($("#iMemberId" ).val() == ''){
            $(".modal-body").html( "<p>Please select member</p>" );
            $("#myalert").modal('show');
            return false;
        }
        
        if($("#tPost" ).val() == ''){
            $(".modal-body").html( "<p>Please enter post title</p>" );
            $("#myalert").modal('show');
            return false;
        }
        
        if($("#iCategoryId option:selected").length == 0){
            $(".modal-body").html( "<p>Please select atleast one category</p>" );
            $("#myalert").modal('show');
            return false;
        }
        
        if($( "#iCountryId" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Country</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#eFileTypes" ).val() ==''){
            var type = $( "#eFileTypes" ).val();
            $(".modal-body").html( "<p>Please select atleast one filetype</p>" );
            $("#myalert").modal('show');
            return false;
        }
        else
        {
           // var logo = $( "#eFileType" ).val();
           // var ext = logo.substring(logo.lastIndexOf('.') + 1);
           
            /*if($( "#eFileType" ).val()=='Video'){
                if(ext != "3gp" && ext != "MPG" && ext != "mp4" && ext != "avi" && ext != "x-flv" && ext != "wmv" && ext != "mpg" && ext != "3gpp" && ext != "x-ms-wmv" && ext != "mpeg" && ext != "3gpp" && ext != "MP4" && ext != "flv")
                {
                    $(".modal-body").html( "<p>Please Upload Only Video</p>" );
                    $("#myalert").modal('show');
                    return false;
                }
            }*/
        }
        if($( "#vCity" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter City</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
    $( "#iCountryId" ).change(function() {
        iCountryId = $('#iCountryId').val(); 
        url = base_url+"post/get_all_states/"+iCountryId;
          $.post(url,
                function(data) {
                    var lang_data = $.parseJSON(data);
                    $('#iStateId').html(lang_data);                    
                });
    });

    $("#video").hide();
    $("#image").hide();
    $("#eFileType").change(function(){
        if ($("#eFileType").val() =='Image')
        {
            $("#image").show();
            $("#video").hide();
        }
        if ($("#eFileType").val() =='Video')
        {
            $("#image").hide();            
            $("#video").show();
        }
        if ($("#eFileType").val() =='')
        {
            $("#video").hide();
            $("#image").hide();
        }
    });

    $("#btn-delete-comment").click(function() {
        $("#action-comment").val("Delete");
        var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
        if(atLeastOneIsChecked == false){
            $(".modal-body").html( "<p>Please select atleast one record </p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
    $("#btn-delete-like").click(function() {
        $("#action-like").val("Delete");
        var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
        if(atLeastOneIsChecked == false){
            $(".modal-body").html( "<p>Please select atleast one record </p>" );
            $("#myalert").modal('show');
            return false;
        }
    });         

    $("#btn-approve-comment").click(function() {
        $("#action-comment").val("Approve");
        var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
        if(atLeastOneIsChecked == false){
            $(".modal-body").html( "<p>Please select atleast one record </p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
 

});
function returnme()
{
    window.location.href = base_url+'post';
}
function hideShowDivs(val)
{
    if (val=='') {
        $("#GLogo").hide();
        $("#SiteUrl").hide();
    }
    if (val=='Logo') {
        $("#GLogo").show();
        $("#SiteUrl").hide();
    }
    if (val=='GStore' || val=='iTuneStore') {
        $("#GLogo").hide();
        $("#SiteUrl").show();         
    }
} 

 