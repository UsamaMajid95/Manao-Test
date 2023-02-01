$(document).ready(function(){
    $("#submit").on("click",function(e){
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
    
    });            

});
