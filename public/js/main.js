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
            setInterval('location.reload()', 1000);
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
            setInterval('location.reload()', 1000);
          }, error: function (error) {
                Msg.fire({
                    type: 'info'
                    , icon: 'error'
                    , title: 'Something went wrong!'
                })
            }
        });
    });


    //----------- Withdraw --------------------

    $(document).on('click', '.withdraw', function(){
        event.preventDefault();
        
        let id = $('.withdraw').attr('id');
        console.log(id);
        $.ajax({
          url: "/withdrawModal/"+id,
          dataType:"json",
               success:function(withdrawModal){
                $('#percentage_charge').html(withdrawModal.charge);
                $('#processing_time').val(withdrawModal.processing_time);
                $('#gateway_id').val(withdrawModal.id);
                $('#sendWithdrawRequest').modal('show');
               }
          })
    });
  
    $('#withdrawRequest').on('submit',function(event){
        event.preventDefault();
        
        let withdraw_amount = $('#withdraw_amount').val();
        let processing_time = $('#processing_time').val();
        let gateway_id = $('#gateway_id').val();
        let charge = $('#charge').val();
        let current_balance = $('#current_balance').val();

        
        $.ajax({
          url: "/WithdrawRequest",
          type:"POST",
          data:{
                withdraw_amount : withdraw_amount,
                processing_time : processing_time,
                gateway_id : gateway_id,
                charge : charge,
                current_balance : current_balance,
          },
               success:function(data){
                $('.send_withdraw_request').modal('hide');
                
                
                Msg.fire({
                    type: 'success'
                    , icon: 'success'
                    , title: 'Withdraw Request Sent Successfully !'
                })
                setInterval('location.reload()', 1000);
               }, error: function (error) {
                 
                    Msg.fire({
                        type: 'info'
                        , icon: 'error'
                        , title: 'Something went wrong!'
                    })
                }
          })
    });
    

});




    
