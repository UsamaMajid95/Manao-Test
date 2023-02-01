$(document).ready(function(){
    $("#submit").on("click",function(e){
        if(checkloginfield()==false){
            alert("please fill all fields");
        }else{    
            e.preventDefault();
            $.ajax({
                method:"POST",
                dataType:"json",
                url:"login2.php",
                data:{login:$('#login').val(),
                password:$('#password').val()},

                success:function(data,status,xhr){
                    if(data['text'] == 1){
                        alert("login successfully");
                        window.location.assign('home.php');
                    }else if(data['text'] == 10){
                        console.log(status);
                        console.log(xhr);
                        alert('wrong password'); 
                        
                    }else if(data['text'] == 100){
                        
                        alert('user dosenot registered'); 
                    
                    }
                }
            });    
        }
    });            

});

function checkloginfield(){
    if($("#login").val() == "" & $("#password").val() == "" ){
        return false;
    }else if
        ($("#login").val() == "" || $("#password").val() == "" ){
        return false;
        
    }else{
        return true;
    } 
}