function swalCall(title,message,type)
{
 swal({
  title: title,
  text: message,
  icon: type,
});
}

function checkMemberDetail()
{
    var type=$('input[name=mem_type]:checked').val();
    var id=$('#r_id').val();
    $.ajax({
        type: "ajax",
        method: "post",
        url:"member/get_ref.php",
        data: {'id':id,'member_type':type},
        dataType:'json',
        asycn:true,
        beforeSend: function () {
          $('#ref_id').show();
         
        },
        success: function (response) {
          $('#ref_id').hide();
          if(response.success)
          {
            $('#sponcer-div').show();
            $('#member-title').text(response.title);
            $('#member-name').text(response.name);
          }
          else
          {
            $('#sponcer-div').hide();
            swalCall('Member Registration',response.message,'error');
          }
        }
    });

}
