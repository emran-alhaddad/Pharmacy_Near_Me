<script src="<?=site_url('assets_admin_admin_admin_admin_admin_admin_admin_admin_admin_admin_admin/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?=site_url('assets_admin_admin_admin_admin_admin_admin_admin_admin_admin_admin_admin/js/jquery-3.6.0.min.js')?>"></script>

<script>




const txn_data = {
    user_mobile_no:null,
    amount:null,
}

const obj = {
 url:'<?=site_url('assets_admin_admin_admin_admin_admin_admin_admin_admin_admin_admin_admin/php/ajax.php?sendmoney')?>',
 method:'post',
 dataType:"json",
 data:txn_data,
 success:(response)=>{
if(response.txn_status){
    $("#e_msg").hide();
    $("#s_msg").text(response.msg);
    $("#s_msg").show();
    $("#loading").hide();
$("#send_money").attr("disabled",false);
$("#user_mobile_no").val("");
$("#amount").val("");
location.reload();
}else{
    $("#s_msg").hide();
    $("#e_msg").text(response.msg);
    $("#e_msg").show();
    $("#loading").hide();
$("#send_money").attr("disabled",false);
}
 }
}

$("#send_money").click(()=>{
txn_data.user_mobile_no = $("#user_mobile_no").val();
txn_data.amount = $("#amount").val();

if(!txn_data.user_mobile_no || !txn_data.amount){
alert("enter user mobile and amount to send money");
return 0;
}

$("#loading").show();
$("#send_money").attr("disabled",true);
$.ajax(obj);
});



</script>



</body>
</html>