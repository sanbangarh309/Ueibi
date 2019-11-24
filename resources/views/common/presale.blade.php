@php($page='')
@extends('app')
@section('css')
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" />
<style>
.save_row i {
font-size: 30px;
color: black;
}
textarea {
  width: 106px;
}
</style>
@stop
@section('content')
       <div class="row">
          <div class="col-md-12">
          <div class="rating">
          <div class="scrolltable">
          <table class="table custom_table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Order#</th>
                <th scope="col">Company name</th>
                <th scope="col">Area</th>
                <th scope="col">City</th>
                <th scope="col">Contact</th>
                <th scope="col">Date & Time</th>
                <th scope="col">Gift</th>
                <th scope="col"></th>
                <th scope="col">Assigned by</th>
                <th scope="col">Assigned To</th>
                <th scope="col">Status</th>	 
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody id="assigned_table_body" class="table_body">
                @foreach($assigned_tickets as $asn_ticket)
                <tr id ="{{$asn_ticket->order->id}}" data-status="assigned">
                   <td>{{$asn_ticket->order->orderno}}</td>
                   <td>{{$asn_ticket->order->company}}</td>
                   <td>{{$asn_ticket->order->area}}</td>
                   <td>{{$asn_ticket->order->city}}</td>
                   <td>{{$asn_ticket->order->contact}}</td>
                   <td>{{$asn_ticket->created_at}}</td>
                   <td>{{$asn_ticket->gift}}</td>
                   <td><button class="wait btn" onclick="showForm('{{$asn_ticket->order->id}}');">Fill Form</button></td>
                   <td>{{\App\User::find($asn_ticket->assigned_by)->name}}</td>
                   <td id="select_{{$asn_ticket->order->id}}" data-id="{{$asn_ticket->order->id}}" style="display:none"><select class="form-control selectpicker" name="presale_employees"><option>Select Employee</option> @foreach($users as $user)<option value="{{$user->id}}">{{$user->name}}</option> @endforeach </select></td>
                   <td id="current_{{$asn_ticket->order->id}}" >{{\App\User::find($asn_ticket->assigned_to)->name}}<a href="javascript:void(0);" data-id="{{$asn_ticket->order->id}}" class="change_user"><i class="fa fa-pencil" aria-hidden="true" data-id="{{$asn_ticket->order->id}}"></i></a></td>
                   <td><span class="wait">{{$asn_ticket->status}}</span></td>
                   <td><a href="javascript:void(0);" data-id="{{$asn_ticket->order->id}}" class="save_row"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
                    <a data-toggle="collapse" href="#extrabox_{{$asn_ticket->order->id}}" class="save_row" data-id="{{$asn_ticket->order->id}}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a> 
                  </td>
                 </tr>
                 <tr class="panel-collapse collapse" id="extrabox_{{$asn_ticket->order->id}}">
                    <td>{{$asn_ticket->order->address}}</td>
                    <td>{{$asn_ticket->order->email}}<br>{{$asn_ticket->order->contact}}</td>
                    <td>Remarks: </td>
                    <td><input type="text" placeholder="Enter Remark" id="hr_remark_{{$asn_ticket->id}}"></td>
                    <td>Verification Remarks: </td>
                    <td><input type="text"  placeholder="Enter Remark" id="ver_remark_{{$asn_ticket->id}}"></td>
                    <td>Remarks: </td>
                    <td><input type="text"  placeholder="Enter Remark" id="remark_{{$asn_ticket->id}}"></td>
                </tr>
                @endforeach
              </tbody>
          </table>
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
let all_fields = ['orderno','company','address','area','city','email','industry','hr_name','hr_contact','hr_email','hr_website','emp_strength'];
function showForm(id){
    getOrders_(id);
}
function getOrders_(id) {
  axios.get("{{url('admin/orders')}}/" + id).then((res) => {
        let order = res.data.detail;
        console.log(id, order);
        $('#fill_form input[name="id"]').val(id);
        $.each( order, function( index, value ){
          console.log(index, value);
            if(all_fields.includes(index)){
              $('#fill_form input[name="'+index+'"]').val(value);
            }
        });
        $("#fill_form form").attr('action', '{{url("admin/orders")}}/');
        $('#fill_form').modal('show');
    });
}
// async function getOrders_(id) {
//     let promise = new Promise((res, rej) => {
//       axios.get("{{url('admin/orders')}}/" + id).then((res) => {
//         res(res.data.detail);
//       });
//     });

//     // wait until the promise returns us a value
//     let result = await promise; 
//   console.log(result);
// };
$("#fill_form form").on('submit',function(){
    let url = $("#fill_form form").attr('action');
    let formData = new FormData(this);
    axios.post(url,formData).then((response) => {
    //   let rkt = response.data.detail;
      $('#fill_form').modal('hide');
      toastr.success(response.data.msg);
    });
    return false;
});
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
$('.table_body').on('click','.change_user',function(e){
    e.stopPropagation();
    let id = $(e.target).attr('data-id');
    let selectField = '<select class="form-control selectpicker" name="presale_employees"><option>Select Pre Sale Employees</option> @foreach($users as $user)<option value="{{$user->id}}">{{$user->name}}</option> @endforeach </select>'
    // $(e.target).html(selectField);
    $('#current_' + id).hide();
    $('#select_' + id).show();
});
$('.table_body').on('click','.save_row',function(e){
    let id = $(e.target).attr('data-id');
    let remarks = $(e.target.parentElement.parentElement.parentElement).next().find('textarea');
    let ticket_status = $(e.target.parentElement.parentElement.parentElement).attr('data-status');
    // remarks.each(function( index ) {
    //   console.log($( this ).text());
    // });
    // return;
    
    let submitData = {ticket_id:id, status:'assigned', employee_id: employee_id};
    let employee_id = $('#select_' + id + ' select option:selected').val();
    $('#table_body tr#' + id).remove();
    axios.post("{{url('admin/saveRow')}}",submitData).then((response) => {
      let rkt = response.data.detail;
      let ticket = '<tr id ="'+rkt.id+'"><td>'+rkt.ticketno+'</td><td>'+rkt.company+'</td><td>'+rkt.area+'</td><td>'+rkt.emp+'</td><td>'+rkt.created_at+'</td><td>'+rkt.assigned_by.name+'</td><td id="select_'+rkt.id+'" data-id="'+rkt.id+'" style="display:none"><select class="form-control selectpicker" name="presale_employees"><option>Select Employee</option> @foreach($users as $user)<option value="{{$user->id}}">{{$user->name}}</option> @endforeach </select></td><td id="current_'+rkt.id+'" >'+rkt.assigned_to.name+'<a href="javascript:void(0);" data-id="'+rkt.id+'" class="change_user"><i class="fa fa-pencil" aria-hidden="true" data-id="'+rkt.id+'"></i></a></td><td><span class="wait">'+rkt.status+'</span></td><td><a href="javascript:void(0);" data-id="'+rkt.id+'" class="save_row"><i class="fa fa-floppy-o" aria-hidden="true"></i></a><a data-toggle="collapse" href="#extrabox_'+rkt.id+'" class="save_row" data-id="'+rkt.id+'"><i class="fa fa-plus-circle" aria-hidden="true"></i></a> </td></tr><tr class="panel-collapse collapse" id="extrabox_'+rkt.id+'"><td>'+rkt.id.order.address+'</td><td>'+rkt.id.order.email+'<br>'+rkt.id.order.contact+'</td><td>Remarks:</td><td><input type="text" placeholder="Enter Remark" id="hr_remark_{{$asn_ticket->id}}"></td><td>Verification Remarks:</td><td><input type="text" placeholder="Enter Remark" id="ver_remark_{{$asn_ticket->id}}" /></td><td>Remarks:</td><td><input type="text" placeholder="Enter Remark" id="remark_{{$asn_ticket->id}}" /></td></tr>';
      if (ticket_status != 'assigned') {
        $('#assigned_table_body').append(ticket);
      }
      toastr.success(response.data.msg);
    });
});
</script>
@stop
