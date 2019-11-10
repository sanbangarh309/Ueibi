@php($page = 'Upload')
@extends('app')
@section('css')
<link rel="stylesheet" href="/css/card.css">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" />
<style>
/* .datepicker {
      z-index: 1600 !important; /* has to be larger than 1050 */
} */
</style>
@stop
@section('content')
    <div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')
    <div class="row">
        <div class="col-md-12">
    <input type="file" id="csv_data_upload" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
    <div class="rating">
        <h2>Orders</h2>
    <div class="scrolltable">
    <table class="table custom_table">
      <thead class="thead-dark">
      <tr>
        <th><input type="checkbox" id="check_all" value="all"></th>
        <th>Order#</th>
        <th>Company Name</th>
        <th>Area</th>
        <th>City</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Industry</th>
        <th>Assigned Date</th>
        <th>Remarks</th>
        <!-- onclick="showaddCallModal('support');" -->
        {{-- <th><button><i class="fa fa-plus" aria-hidden="true"></i><input type="file" class="file"></button></th> --}}
      </tr>
    </thead>
    <tbody id="order_body">
    </tbody>
  </table>
    </div>
    </div>
    </div>
    <div class="col-lg-12 col-12 mb-4 mt-4" style="margin-top: 30px;">
      <div class="card">
        <div class="card-body text-center">
          <div class="row">
              <div class="col-lg-6">
                  <div class="form-group">
                      <select class="form-control selectpicker" id="sel1" name="presale_manager">
                        <option>Select Pre Sale Manager</option>
                        @foreach($users as $user)
                          <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                      </select>
                    </div> 
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                      <button type="button" class="btn btn-success" onclick="publishOrder();">Publish</button>
                   </div> 
              </div>
          </div>
        </div>
      </div>
    </div>
    </div>
@stop

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
  $(".selectpicker").select2({
        tags: false
  });
getOrders();
// let allCalls = San_Helpers.getCalls("{{route('calls.index')}}");
function getOrders(){
  axios.get("{{route('orders.index')}}").then((res) => {
    let orders = res.data.detail;
    let minifyHtml = '';
    $.each(orders, function( index, call ) {
      minifyHtml = '<tr id="order_'+call.id+'"><td><input type="checkbox" name="check_order" class="check_all_boxes" id="'+call.id+'" id="select_all"></td><td>'+call.orderno+'</td><td>'+call.area+'</td><td>'+call.city+'</td><td>'+call.company+'</td><td>'+call.address+'</td><td>'+call.contact+'</td><td>'+call.email+'</td><td>'+call.industry+'</td><td>'+call.assigned_date+'</td><td><button><i class="fa fa-pencil" aria-hidden="true"></i></button></td></tr>';
      $('#order_body').append(minifyHtml);
    });
    // $('#support_body').html(minifyHtml);
  });
}
$('#csv_data_upload').on('change',function(e){
  var file = e.target.files[0];
  let formData = new FormData();
  formData.append('csvFile', file); 
  axios.post("{{route('orders.store')}}",formData).then((response) => {
    let orders = response.data.detail;
    let minifyHtml = '';
    $.each(orders, function( index, order ) {
      minifyHtml = '<tr order_'+order.id+'><td><input type="checkbox" name="check_order" class="check_all_boxes" id="'+order.id+'" id="select_all"></td><td>'+order.orderno+'</td><td>'+order.area+'</td><td>'+order.city+'</td><td>'+order.company+'</td><td>'+order.address+'</td><td>'+order.contact+'</td><td>'+order.email+'</td><td>'+order.industry+'</td><td>'+order.assigned_date+'</td><td><button><i class="fa fa-pencil" aria-hidden="true"></i></button></td></tr>';
      $('#order_body').append(minifyHtml);
    });
    console.log(response);
  });
});

let checkedIds = [];
var CustomerIDArray=[];
$(document).on('click','.check_all_boxes',function(e){
    var arr=CustomerIDArray;
		var checkedId=$(this).attr('id');
		if($(this).prop('checked')){
			CustomerIDArray.push(checkedId);
			arr=CustomerIDArray;
		}
		else
		{
			jQuery.each(CustomerIDArray,function(i,item){
				if(arr[i] == checkedId) {
					arr.splice(i, 1);
				}
			});
			CustomerIDArray =arr;
		}
		var ids="";
			jQuery.each(CustomerIDArray,function(i,item){
				if(ids=="")
				{
					ids= CustomerIDArray[i];
				}
				else
				{
					ids= ids+ ","+   CustomerIDArray[i];
				}
			});
  console.log(CustomerIDArray);
});
$('#check_all').on('click',function(){
  CustomerIDArray = [];
  if ($(this).is(":checked")) {
    $( ".check_all_boxes" ).not(this).each(function( index ) {
      CustomerIDArray.push($( this ).attr('id'));
    });
    $('.check_all_boxes').not(this).prop('checked', true);
  } else {
    $('.check_all_boxes').not(this).prop('checked', false);
  }
  console.log(CustomerIDArray);
});
function publishOrder(){ 
  let assigned_to = $('select[name="presale_manager"] option:selected').val();
  jQuery.each(CustomerIDArray,function(i,item){
    console.log(item);
    $('#order_body tr#order_'+item).remove();
	});
  axios.post("{{url('admin/publish')}}",{order_ids:CustomerIDArray, assigned_by:userId, assigned_to:assigned_to}).then((response) => {
    toastr.success(response.data.msg);
  });
}
// $('#date_time_picker').datetimepicker();
</script>
@stop
