//change event of elements
$(document).on("change", "#type", function(){ 
   if($(this).val() == '3')
   {
       $("#custom_div").css('display','block');
   }
   else{
    $("#custom_div").css('display','none');
    $("#custome_value").val("");
   }

});
//add element
$(document).on("click", "#add_element", function(e){  
  
    if($("#label").val() !="" && $("#type").val() !="")
    {
        e.preventDefault();
        // count of no of fields
         count = parseFloat($("#count").val());
        //increment count by one
         num = count +1;
        $("#count").val(num);

       var label = $("#label").val();
       var type = $("#type").val();
       var html;
       if(type == '1')
       {
         html ='<div class="mt-4"  id="div_'+num+'"><label>'+label+'</label><input type="hidden" name="label[]" value="'+label+'"/><input  class="block mt-1 w-full" type="text" name="text"/><input type="hidden" name="element[]" value="'+type+'"/><input type="hidden" name="custom_value[]" value=""/><span data-id="'+num+'" class="remove underline text-sm text-red-600 hover:text-red-900">delete</span></div>';
       }
       else if(type == '2')
       {
        html ='<div class="mt-4"  id="div_'+num+'"><label>'+label+'</label><input type="hidden" name="label[]" value="'+label+'"/><input  class="block mt-1 w-full" type="number" name="text"/><input type="hidden" name="element[]" value="'+type+'"/><input type="hidden" name="custom_value[]" value=""/><span data-id="'+num+'" class="remove underline text-sm text-red-600 hover:text-red-900">delete</span></div>';
    
       }
       else if(type == '3'){
        var custome_values = $("#custome_value").val();
        if(custome_values !="")
        {
            const selectArray = custome_values.split(",");
           // console.log(selectArray);
            var select ='<select class="block mt-1 w-full"><option value="">Select</option>';
            $.each( selectArray, function( key, value ) {
               // console.log( key + ": " + value );
                select =select+'<option>'+value+'</option>';
              });
              select =select+'</select>';
              html ='<div class="mt-4" id="div_'+num+'"><label>'+label+'</label>'+select+'<input type="hidden" name="label[]" value="'+label+'"/><input type="hidden" name="element[]" value="'+type+'"/><input type="hidden" name="custom_value[]" value="'+selectArray+'"/><span data-id="'+num+'" class="remove underline text-sm text-red-600 hover:text-red-900">delete</span></div>';
    
        }
        else{
            alert("Add custom values for dropdown");
        }
       }
       $("#append_form").append(html);
       
       //reset add elemt form
       $("#label").val("");
       $("#type").val("");
       $("#custome_value").val("");
       $("#custom_div").css('display','none');
    }
   

 });

//remove input from add form

$(document).on("click", ".remove", function(e){  
    var id = $(this).data('id');
    $("#div_"+id).remove();

});
//save form
// $(document).on("click", "#save", function(e){  
//     e.preventDefault(); 

// });
$("#saveForm" ).on("submit", function(event) {
    event.preventDefault();
    var form = $('#saveForm')[0];
    $.ajax({
        type: "post",
       dataType: "json",
       url: base_path+"saveForm",
       data: $(form).serialize(),
       success: function (response) {
        
           if(response.status == true)
           {
            alert(response.msg);
            $(location).attr('href', base_path+'dashboard');   
               
           }
           else  if(response.status == false)
           {
  
            alert(response.msg);
           }
          
       }
   });
    
  });

  //remove input from edit form

$(document).on("click", ".eremove", function(e){  
    var id = $(this).data('id');
    $("#div_"+id).remove();

});
//update form
$("#updateForm" ).on("submit", function(event) {
    event.preventDefault();
    var form = $('#updateForm')[0];
    $.ajax({
        type: "post",
       dataType: "json",
       url: base_path+"updateForm",
       data: $(form).serialize(),
       success: function (response) {
        
           if(response.status == true)
           {
            alert(response.msg);
            $(location).attr('href', base_path+'dashboard');   
               
           }
           else  if(response.status == false)
           {
  
            alert(response.msg);
           }
          
       }
   });
    
  });
  
jQuery(document).ready(function() { 
    var token = $('meta[name="csrf-token"]').attr('content'); 
    $('#form_table').DataTable({
        processing: true,
        serverSide: true,
        columnDefs:[
        {
         visible:true,
        }
    ],      
        ajax: {
            url: base_path+"ajaxForm"+'?_token='+token,
            type: 'POST',               
        },
        columns: [
            {data: 'DT_RowIndex',name : 'Id'},         
            {data: 'name' ,name : 'Form name'},
            {data: 'Actions',name : 'Actions', responsivePriority: -1},
        ],

    });

});