$(document).ready(function() {

//this function right here is gonna get values from my html table from the processpayment.php
function getvaluex(){

 var TableData =  new Array();
 $('#dataTable tr').each(function(row, tr) {
TableData[row] ={
        // "id" : $(tr).find('td:eq(0)').text(),  
        "staffid" : $(tr).find('td:eq(2)').text(),  
        "staffname" : $(tr).find('td:eq(3)').text(),  
        "bankname" : $(tr).find('td:eq(4)').text(),  
        "accountnumber" : $(tr).find('td:eq(5)').text(),   
        "salary" : $(tr).find('td:eq(6)').text(),   
        "tax" : $(tr).find('td:eq(7)').text(),   
        "pension" : $(tr).find('td:eq(8)').text(),   
        "other" : $(tr).find('td:eq(9)').text(),   
        "takehome" : $(tr).find('td:eq(10)').text()  
      
     }
});
  TableData.shift();
  TableData.shift();
  return TableData;
}




//the button done is click it will call the function getvalues and convert the data to json
$(document).on('click', '.done', function(event) {
var myvalues = getvaluex();
var myJsonData = JSON.stringify(myvalues);
var tokenx = $('#token').val();

//console.log(myJsonData);
//then send the converted json to the database through a controller
$.post('/payroll/history', {tabledata: myJsonData,_token : tokenx}, function(data) {  
               // this line is to reload the table.
              // $('#datatable').load(location.href + '  #datatable');
           console.log(data);
           window.location.href = '/dashboard/paymenthistory';
             });

});



















//this function right here is gonna get values from my html table from the payroll.blade
function getvalues(){

 var TableData =  new Array();
 $('#dataTable tr').each(function(row, tr) {
TableData[row] ={
        // "id" : $(tr).find('td:eq(0)').text(),  
        "staffid" : $(tr).find('td:eq(1)').text(),  
        "staffname" : $(tr).find('td:eq(2)').text(),  
        "bankname" : $(tr).find('td:eq(3)').text(),  
        "accountnumber" : $(tr).find('td:eq(4)').text(),   
        "salary" : $(tr).find('td:eq(5)').text(),   
        "tax" : $(tr).find('td:eq(6)').text(),   
        "pension" : $(tr).find('td:eq(7)').text(),   
        "other" : $(tr).find('td:eq(8)').text(),   
        "takehome" : $(tr).find('td:eq(9)').text()  
      
     }
});
  TableData.shift();
  TableData.shift();
  return TableData;
}




//the button generate is click it will call the function getvalues and convert the data to json
$(document).on('click', '.generate', function(event) {
var myvalues = getvalues();
var myJsonData = JSON.stringify(myvalues);
var tokenx = $('#token').val();
//console.log(myJsonData);
//then send the converted json to the database through a controller
$.post('/payroll/generate', {tabledata: myJsonData,_token : tokenx}, function(data) {  
               // this line is to reload the table.
              // $('#datatable').load(location.href + '  #datatable');
           console.log(data);
           window.location.href = '/dashboard/payroll/processpayment';
             });

});












































// THis is for proration and the update of the poration table

$(document).on('click', '#proratex', function(event) {
  event.preventDefault();
  var staffid = $(this).closest('tr').find('td:eq(2)').text();
  $('#prorate').find("#staffid").val(staffid);

});





// (deduction)this line below triggers when the save changes button is pressed inside the modal
$(document).on('click', '.proratebtn', function(event) {

var staffid = $('#prorate').find("#staffid").val();
var present = $('#prorate').find("#present").val();
var absent = $('#prorate').find("#absent").val();
var tokenx = $('#token').val();


 $.post('/debitstaff', {staffid: staffid, present: present, absent: absent,  _token : tokenx}, function(data) {
             
               $('#datatable').load(location.href + '  #datatable');
               alert(data);
              
             })
 
});







































// This below function is use to populate the department edit modal


$(document).on('click', '.editdptmt', function(event) {
  event.preventDefault();

  var department = $(this).closest('tr').find('td:eq(1)').text();

  var id = $(this).closest('td').find("#id").val();


  $('#edit-item').find("#department").val(department);

  $('#edit-item').find("#id").val(id);

});




















// (staff) this line below is for deleting a staff
$(document).on('click', '.deletestaff', function(event) {
  event.preventDefault();
  var id =  $(this).closest('tr').find('td:eq(1)').text();
  var tokenx = $('#token').val();
  $.post('/deletestaff', {id: id,_token : tokenx}, function(data) {  
               // this line is to reload the table.
               $('#datatable').load(location.href + '  #datatable');
             });

});
















































//the below function is use to change the modal for add new
$(document).on('click', '.addnewbr', function(event) {
  event.preventDefault();
  $('.branchsubmit').show('400');
  $('.branchaddnew').show('400');
  $ ('#edit-branch').find("#branch").val('');
  var title = "Add New Branch";
  $('#tit').text(title);
  $('.branchsubmit').hide();

});


// (branch) This below function is use to populate the branch edit modal
$(document).on('click', '.editbranch', function(event) {

  event.preventDefault();

  var branch = $(this).closest('tr').find('td:eq(1)').text();

  var id =  $(this).closest('tr').find('td:eq(2)').text();
  $('.branchsubmit').show('400');
  $('.branchaddnew').hide();
  var title = "Update Branch";
  $('#tit').text(title);

  $('#edit-branch').find("#branch").val(branch);

  $('#edit-branch').find("#id").val(id);

});


// (branch) this line below triggers when the addnew button is pressed inside the modal
$('.branchaddnew').on('click',  function(event) {
         //event.preventDefault();
         var branchx = $('#edit-branch').find("#branch").val();
         var tokenx = $('#token').val();
         $.post('/create', {branch: branchx,_token : tokenx}, function(data) {
               // optional stuff to do after success 
               $('#datatable').load(location.href + '  #datatable');
             });


         /* Act on the event */
       });

// (branch)this line below triggers when the save changes button is pressed inside the modal
$('.branchsubmit').on('click',  function(event) {
 var branchx = $('#edit-branch').find("#branch").val();
 var tokenx = $('#token').val();
 var id = $('#id').val();
 $.post('/edit', {branch: branchx,id: id,_token : tokenx}, function(data) {
               // optional stuff to do after success 
               //$('#header').find('p').text(data);  
               $('#datatable').load(location.href + '  #datatable');
             });
 
});



// (branch) this line below is for deleting branch
$(document).on('click', '.delete', function(event) {
  event.preventDefault();
  var id =  $(this).closest('tr').find('td:eq(2)').text();
  var tokenx = $('#token').val();

  $.post('/deletebranch', {id: id,_token : tokenx}, function(data) {  
               // this line is to reload the table.
               $('#datatable').load(location.href + '  #datatable');
             });

});































































///////////////this line here is for deduction edit and update
// (branch) This below function is use to populate the branch edit modal
$(document).on('click', '.editdeduction', function(event) {

  event.preventDefault();

  var tit = $(this).closest('tr').find('td:eq(1)').text();
  var rate = $(this).closest('tr').find('td:eq(2)').text();
  var id =  $(this).closest('tr').find('td:eq(3)').text();
  // id = trim('id');
  // tit = trim('tit');
  // rate = trim('rate');

  $('#edit-deduction').find("#title").text(tit);

  $('#edit-deduction').find("#rate").val(rate);

  $('#edit-deduction').find("#id").val(id);

});





// (deduction)this line below triggers when the save changes button is pressed inside the modal
$('.deductionbtn').on('click',  function(event) {
 var titx = $('#edit-deduction').find("#title").text();
 var ratex = $('#edit-deduction').find("#rate").val();
 var idx = $('#edit-deduction').find("#id").val();
 var tokenx = $('#token').val();
 var id = $('#id').val();
 $.post('/editdeduction', {title: titx,rate: ratex,id: idx,_token : tokenx}, function(data) {
               // optional stuff to do after success 
               //$('#header').find('p').text(data);  
               $('#datatable').load(location.href + '  #datatable');
             });
 
});


































































////////////////////////////DEPARTMENT SESSION/////////////////////////////////////////






//the below function is use to change the modal for add new department
$(document).on('click', '.addnew', function(event) {
  event.preventDefault();
  var title = "Add New Department";
  $('#tit').text(title);
  $('.departmentaddnew').show('400');
  $ ('#edit-item').find("#department").val('');
  $('.departmentedit').hide();

});


// (department) This below function is use to populate the branch edit modal
$(document).on('click', '.editdpt', function(event) {

  event.preventDefault();

  var department = $(this).closest('tr').find('td:eq(1)').text();

  var id =  $(this).closest('tr').find('td:eq(2)').text();
  $('.departmentedit').show('400');
  $('.departmentaddnew').hide();
  var title = "Update Department";
  $('#tit').text(title);

  $('#edit-item').find("#department").val(department);

  $('#edit-item').find("#id").val(id);

});


// (department) this line below triggers when the addnew button is pressed inside the modal
$('.departmentaddnew').on('click',  function(event) {
         //event.preventDefault();
         var departx = $('#edit-item').find("#department").val();
         var tokenx = $('#token').val();
         $.post('/create', {department: departx,_token : tokenx}, function(data) {
               // optional stuff to do after success 
               $('#datatable').load(location.href + '  #datatable');
             });


         /* Act on the event */
       });

// (branch)this line below triggers when the save changes button is pressed inside the modal
$('.departmentedit').on('click',  function(event) {
 var departx = $('#edit-item').find("#department").val();
 var tokenx = $('#token').val();
 var id = $('#id').val();
 $.post('/edit', {department: departx,id: id,_token : tokenx}, function(data) {
               // optional stuff to do after success 
               //$('#header').find('p').text(data);  
               $('#datatable').load(location.href + '  #datatable');
             });
 
});








// (branch) this line below is for deleting department
$(document).on('click', '.delete', function(event) {
  event.preventDefault();
  var id =  $(this).closest('tr').find('td:eq(2)').text();
  var tokenx = $('#token').val();

  $.post('/deletedepartment', {id: id,_token : tokenx}, function(data) {  
               // this line is to reload the table.
               $('#datatable').load(location.href + '  #datatable');
             });

});































































// This below function is use to populate the position edit modal

$(".editposition").on("click", function (event) {

  event.preventDefault();

  var position = $(this).closest('tr').find('td:eq(2)').text();

  var depart = $(this).closest('tr').find('td:eq(1)').text();



  var id = $(this).closest('td').find("#id").val();

  $('#edit-position').find("#position").val(position);

  $('#edit-position').find("#id").val(id);



});



















































// this is for the FAQ

var answer = $('.answer');
var faq = $('.faq')
$(document).on('click','.answerbtn',function(){
 var ansdiv = $(this).closest(faq);
 ansdiv.find(answer).toggle();


});







































//this line is use to populate dropdown dynamically base on what is selected in the department
$('#departmentx').on('change', function () {
  $('#position').empty();
  var department = $('#departmentx').val();
  $('#position').html('<option selected="selected" value="">Loading...</option>');
  var url = '/dashboard/addnewstaff/get-position/' + department;
        // console.log(url);
        $.ajax({
          url: url,
          type: "GET",
          dataType: "json",
          success: function (data) {
                        //console.log(data);
                        $('#position').html('<option selected="selected" value="">Select Position</option>');
                        $.each(data, function (key, value) {
                          $('#position').append('<option value="' + value['position'] + '">' + value['position'] + '</option>');
                        });

                      }
                    });
      });



});









































































$.ajaxSetup({

  headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

  }

});
