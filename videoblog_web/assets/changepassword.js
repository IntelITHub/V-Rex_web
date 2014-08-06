$(document).ready(function(){
    $("#btn-save").click(function(){
        var pwd=$("#vPassword").val();
        var confirmpwd=$("#confirmpwd").val();
    
        if(pwd.trim() == ''){
            $(".modal-body").html( "<p>Please enter password</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(confirmpwd.trim() == ''){
            $(".modal-body").html( "<p>Please enter confirm password</p>" );
            $("#myalert").modal('show');
            return false;
        }
        else if(pwd.trim() != confirmpwd.trim()){
            $(".modal-body").html( "<p>Please enter same confirm password</p>" );
            $("#myalert").modal('show');
            return false;
        }
        document.changepwd.submit();
    });
});

function returnme(){
	window.location.href = base_url+'home';
}