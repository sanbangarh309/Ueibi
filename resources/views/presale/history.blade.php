@php($page = 'History')
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
    <div class="rating">
        <h2>Orders History</h2>
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
        <th>Status</th>
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
    </div>
@stop

@section('javascript')
<script>
getOrders();
// let allCalls = San_Helpers.getCalls("{{route('calls.index')}}");
function getOrders(){
  axios.get("{{route('orders.published')}}").then((res) => {
    let orders = res.data.detail;
    let minifyHtml = '';
    $.each(orders, function( index, call ) {
      minifyHtml = '<tr id="order_'+call.id+'"><td><input type="checkbox" name="check_order" class="check_all_boxes" id="'+call.id+'" id="select_all"></td><td>'+call.orderno+'</td><td>'+call.area+'</td><td>'+call.city+'</td><td>'+call.company+'</td><td>'+call.address+'</td><td>'+call.contact+'</td><td>'+call.email+'</td><td>'+call.industry+'</td><td>'+call.assigned_date+'</td><td>Published</td><td><button><i class="fa fa-pencil" aria-hidden="true"></i></button></td></tr>';
      $('#order_body').append(minifyHtml);
    });
  });
}

</script>
@stop
