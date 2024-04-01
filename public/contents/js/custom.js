setTimeout(function(){
    $('.alert_success').slideUp(1000);
},5000);

setTimeout(function(){
    $('.alert_error').slideUp(1000);
},10000);


//DELETE MODAL 

$(document).ready(function(){
    $(document).on("click", "#softDelete", function (){
        var deleteID = $(this).data('id');
        $(".modal_body #modal_id").val(deleteID); 
    });

    $(document).on("click", "#restore", function (){
        var restoreID = $(this).data('id');
        $(".modal_body #modal_id").val(restoreID); 
    });

    $(document).on("click", "#delete", function (){
        var deleteID = $(this).data('id');
        $(".modal_body #modal_id").val(deleteID); 
    });
});    

//Datatables

$(document).ready( function () {
    $('#myTable').DataTable();
} );

//Datepicker

$(function(){
    $('.datepicker').datepicker({
       format: 'yyyy-mm-dd',
       todayHighlight: 'true',
     });
 });