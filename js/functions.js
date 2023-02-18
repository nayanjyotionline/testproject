$('#unassignSchool').on('submit', function(e) {
    e.preventDefault();
    
    var alert_txt = 'Are you sure you want to remove this school from the user';
    
    if (confirm(alert_txt)) {
        $.ajax({
            type: "POST",
            url: "/unassign.php",
            dataType: 'json',
            data: $(this).serialize(),
            success: function(response){
                if(response.Status)
                {
                    $.fancybox.close();
                    $('#userSchool_'+response.ID).remove();
                    toastr.success('School is succesfully removed', 'Success', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
                }
            }
        });
    }
});

$('#assignSchool').on('submit', function(e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "/assign.php",
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response){
            if(response.Status)
            {
                $.fancybox.close();
                var master = '';
                var contact = '';
                if(response.master_flag){
                    var master = '<img src="/image/icon_m.png" width="12" height="12" alt="Master User" title="Master User" class="usericon"/>';
                }
                if(response.contact_flag){
                    var contact = '<img src="/image/icon_c.png" width="12" height="12" alt="Primary Contact" title="Primary Contact" class="usericon"/>';
                }
                
                $('#listingSchool').append('<li id="userSchool_'+response.user_id+'"><a href="/training/profile/users/unassign?id='+response.id+'" class="fancy" title="Remove from this School"><img src="/image/icon_delete.gif" width="24" height="24" alt="Remove from this School" class="licon"/></a>'+response.School+''+master+''+contact+'</li>');
                toastr.success('School assigned succesfully', 'Success', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            } else {
                $.fancybox.close();
                toastr.error(response.Error, 'Error', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            }
        }
    });
});

$('#lockUser').on('submit', function(e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "/lock.php",
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response){
            if(response.Status)
            {
                $.fancybox.close();
                if(response.record_status == "L"){
                    $('#lockImg_'+response.user_id).attr('src','/image/icon_unlock.gif');
                } else {
                    $('#lockImg_'+response.user_id).attr('src','/image/icon_lock.gif');
                }
                toastr.success('User has been locked succesfully', 'Success', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            } else {
                $.fancybox.close();
                toastr.error(response.Error, 'Error', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            }
        }
    });
});

$('#resendEmail').on('submit', function(e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "/resend.php",
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response){
            if(response.Status)
            {
                $.fancybox.close();
                toastr.success('Verification Email has been send succesfully', 'Success', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            } else {
                $.fancybox.close();
                toastr.error(response.Error, 'Error', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            }
        }
    });
});


$('#deleteUser').on('submit', function(e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "/delete_user.php",
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response){
            if(response.Status)
            {
                $.fancybox.close();
                if(response.record_status == "D"){
                    $('#deleteImg_'+response.user_id).attr('src','/image/icon_check.gif');
                } else {
                    $('#deleteImg_'+response.user_id).attr('src','/image/icon_delete.gif');
                }
                toastr.success('User has been deleted succesfully', 'Success', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            } else {
                $.fancybox.close();
                toastr.error(response.Error, 'Error', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            }
        }
    });
});


$('#deleteProduct').on('submit', function(e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "/delete_product.php",
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response){
            if(response.Status)
            {
                $.fancybox.close();
                if(response.record_status == "D"){
                    $('#deletePro_'+response.user_id).remove();
                } else {
                    $('#deletePro_'+response.user_id).remove();
                }
                toastr.success('Product has been deleted succesfully', 'Success', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            } else {
                $.fancybox.close();
                toastr.error(response.Error, 'Error', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            }
        }
    });
});


$('#fileDelete').on('submit', function(e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "/delete_file.php",
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response){
            if(response.Status)
            {
                $.fancybox.close();
                $('#file_'+response.file_id).remove();
                toastr.success('File has been deleted succesfully', 'Success', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            } else {
                $.fancybox.close();
                toastr.error(response.Error, 'Error', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            }
        }
    });
});

$('#fileEdit').on('submit', function(e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "/edit_file.php",
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response){
            if(response.Status)
            {
                $.fancybox.close();
                toastr.success('File has been updated succesfully', 'Success', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            } else {
                $.fancybox.close();
                toastr.error(response.Error, 'Error', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            }
        }
    });
});


$('#fileAdd2').on('submit', function(e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "/add_file.php",
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response){
            if(response.Status)
            {
                $.fancybox.close();
                toastr.success('File has been added succesfully', 'Success', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            } else {
                $.fancybox.close();
                toastr.error(response.Error, 'Error', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            }
        }
    });
});


$('#deleteSchool').on('submit', function(e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "/delete_school.php",
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response){
            if(response.Status)
            {
                $.fancybox.close();
                if(response.record_status == "D"){
                    $('#deleteSchool_'+response.school_id).attr('src','/image/icon_check.gif');
                } else {
                    $('#deleteSchool_'+response.school_id).attr('src','/image/icon_delete.gif');
                }
                toastr.success('School has been deleted succesfully', 'Success', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            } else {
                $.fancybox.close();
                toastr.error(response.Error, 'Error', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            }
        }
    });
});

$('#deleteTransaction').on('submit', function(e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "/remove_product_access.php",
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response){
            if(response.Status)
            {
                $.fancybox.close();
                if(response.record_status == "D"){
                    $('#deleteTran_'+response.transaction_id).remove();
                } else {
                    $('#deleteTran_'+response.transaction_id).remove();
                }
                toastr.success('Transaction has been deleted succesfully', 'Success', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            } else {
                $.fancybox.close();
                toastr.error(response.Error, 'Error', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            }
        }
    });
});

$('#addProductAccess').on('submit', function(e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "/add_product_access.php",
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response){
            if(response.Status)
            {
                $.fancybox.close();
                
                toastr.success('Product has been added succesfully', 'Success', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
                
                
                setTimeout(function() {
                    location.reload();
                }, 3000);
                
            } else {
                $.fancybox.close();
                toastr.error(response.Error, 'Error', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            }
        }
    });
});

$('#master_flag').on('click', function(e) {
    //e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "/change_status.php",
        dataType: 'json',
        data: 'data='+$(this).val()+'&type=master',
        success: function(response){
            if(response.Status)
            {
                $.fancybox.close();
                
                toastr.success('Status has been added succesfully', 'Success', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
                
                /*
                setTimeout(function() {
                    location.reload();
                }, 3000);
                */
                
            } else {
                $.fancybox.close();
                toastr.error(response.Error, 'Error', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            }
        }
    });
});

$('#contact_flag').on('click', function(e) {
    //e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "/change_status.php",
        dataType: 'json',
        data: 'data='+$(this).val()+'&type=contact',
        success: function(response){
            if(response.Status)
            {
                $.fancybox.close();
                
                toastr.success('Status has been added succesfully', 'Success', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
                
                /*
                setTimeout(function() {
                    location.reload();
                }, 3000);
                */
                
            } else {
                $.fancybox.close();
                toastr.error(response.Error, 'Error', {positionClass: "toast-top-right",extendedTimeOut: 3000,progressBar:true});
            }
        }
    });
});

