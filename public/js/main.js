$(document).ready(function(){
    const Msg = Swal.mixin({
            toast: true
            , position: 'top-end'
            , icon: 'success'
            , showConfirmButton: false
            , timer: 1500
        })

 

 
     //---------------Clear Input Fields ------------------


    function clearData() {
        $('.clear').val('');
    }

    //--------------Add Campaign -----------------------
    

     
    $('#insertFundraiser').on('submit',function(event){
        event.preventDefault();

        $.ajax({
          url: "/insertFundraiser",
          type:"POST",
          data  : new FormData(this),
          contentType:false,
          processData:false,
          success:function(response){
            console.log(response);
            clearData();
            Msg.fire({
                type: 'success'
                , icon: 'success'
                , title: 'Campaign Added !'
            })
          }, error: function (error) {
                Msg.fire({
                    type: 'info'
                    , icon: 'error'
                    , title: 'Something went wrong!'
                })
            }
        });
    });


    //----------------------------Edit Campaign ----------------------------------


    $('#updateProfile').on('submit',function(event){
        event.preventDefault();
        let id = $('#user_id').val();
        $.ajax({
          url: "/updateProfile/"+id,
          type:"POST",
          data  : new FormData(this),
          contentType:false,
          processData:false,
          success:function(response){
            console.log(response);
            clearData();
            Msg.fire({
                type: 'success'
                , icon: 'success'
                , title: 'Profile Updated !'
            })
          }, error: function (error) {
                Msg.fire({
                    type: 'info'
                    , icon: 'error'
                    , title: 'Something went wrong!'
                })
            }
        });
    });


    //----------------------------Update Profile ----------------------------------


    $('#updateFundraiser').on('submit',function(event){
        event.preventDefault();
        let id = $('#campaign_id').val();
        $.ajax({
          url: "/updateFundraiser/"+id,
          type:"POST",
          data  : new FormData(this),
          contentType:false,
          processData:false,
          success:function(response){
            console.log(response);
            clearData();
            Msg.fire({
                type: 'success'
                , icon: 'success'
                , title: 'Campaign Updated !'
            })
          }, error: function (error) {
                Msg.fire({
                    type: 'info'
                    , icon: 'error'
                    , title: 'Something went wrong!'
                })
            }
        });
    });


    //----------- Delete A Campaign --------------------



    

});




    
