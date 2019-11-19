@extends('app')
@section('css')
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" />
<style>
.save_row i {
    font-size: 20px;
    color: black;
    padding-left: 3px;
}
.save_row1 i {
	font-size: 20px;
	color: black;
	padding-left: 3px;
}
textarea {
  width: 106px;
}
.rating h2 {
	text-align: center;
	font-size: 25px;
	color: #333;
	padding: 35px 0;
	margin: 0;
	font-family: 'Roboto', sans-serif;
}
textarea {
    padding: 3px;
}
</style>
@stop
@section('content')
<div class="colmn_1 white_bg boxside">
    <div id="chartContainer" style="height: 370px;width:100%;margin: 0 0 25px;"></div>
 </div>
 <div class="row">
    <div class="col-md-9">
	 <div class="rating">
                        <h2>Unassigned Tickets</h2>
						     <div class="scrolltable">
                           <table class="table new_custom_table">
                              <thead class="thead-dark black_head">
                                 <tr>
                                    <th scope="col" class="table_10">Order#</th>
                                    <th scope="col" class="table_20">Company name</th>
                                    <th scope="col" class="table_10">Area</th>
                                    <th scope="col" class="table_10">City</th>
                                    <th scope="col" class="table_15">Assigned by</th>
                                    <th scope="col" class="table_15">Assigned To</th>
                                    <th scope="col" class="table_10">Date & Time</th>
                                    <th scope="col" class="table_10">Action</th>
                                 </tr>
                              </thead>
                              <tbody id="table_body" class="table_body">
                                @foreach($tickets as $ticket)
                                <tr id ="{{$ticket->id}}" data-status="received">
                                   {{-- {{\App\User::find($ticket->assigned_to)->name}} --}}
                                   <td class="table_10">{{$ticket->order->orderno}}</td>
                                   <td class="table_10">{{$ticket->company}}</td>
                                   <td class="table_10">{{$ticket->area}}</td>
                                   <td class="table_10">{{$ticket->city}}</td>
                                   <td class="table_10">{{\App\User::find($ticket->assigned_by)->name}}</td>
                                   <td class="table_10" id="select_{{$ticket->id}}" data-id="{{$ticket->id}}" style="display:none"><select class="form-control selectpicker"><option>Select Employee</option> @foreach($users as $user)<option value="{{$user->id}}">{{$user->name}}</option> @endforeach </select></td>
                                   <td class="table_10" id="current_{{$ticket->id}}" >{{\App\User::find($ticket->assigned_to)->name}}<a href="javascript:void(0);" data-id="{{$ticket->id}}" class="change_user"><i class="fa fa-pencil" aria-hidden="true" data-id="{{$ticket->id}}"></i></a></td>
                                   {{-- <td><span class="wait">{{$ticket->status}}</span></td> --}}
                                   <td class="table_10">{{$ticket->created_at}}</td>
                                   {{-- <td>{{$ticket->received_at}}</td>
                                   <td>{{$ticket->rating}}</td> --}}
                                   <td class="table_10"><a href="javascript:void(0);" data-id="{{$ticket->id}}" class="save_row"><i data-id="{{$ticket->id}}" class="fa fa-floppy-o" aria-hidden="true"></i></a>
                                   </td>
                                 </tr>
                                @endforeach
                              </tbody>
                           </table>
                        </div>
						</div>
	</div>
                <div class="col-md-3">
                     <div class="userbox">
                        <p>User <a href="javascript:void(0);"><i class="fa fa-sort" aria-hidden="true"></i></a></p>
                        <hr class="line">
                        <div class="clientname seconduser">
                           <h2>sallu<span>6/7</span></h2>
                           <div class="progress bar">
                              <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" style="width:70%">
                              </div>
                           </div>
                        </div>
                        <div class="clientname seconduser">
                           <h2>sallu<span>6/7</span></h2>
                           <div class="progress bar">
                              <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" style="width:20%">
                              </div>
                           </div>
                        </div>
                        <div class="clientname seconduser">
                           <h2>sallu<span>6/7</span></h2>
                           <div class="progress bar">
                              <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" style="width:75%">
                              </div>
                           </div>
                        </div>
                        <div class="clientname seconduser">
                           <h2>sallu<span>6/7</span></h2>
                           <div class="progress bar">
                              <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" style="width:30%">
                              </div>
                           </div>
                        </div>
                        <div class="clientname seconduser">
                           <h2>sallu<span>6/7</span></h2>
                           <div class="progress bar">
                              <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" style="width:40%">
                              </div>
                           </div>
                        </div>
                        <div class="clientname seconduser">
                           <h2>sallu<span>6/7</span></h2>
                           <div class="progress bar">
                              <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" style="width:10%">
                              </div>
                           </div>
                        </div>
                        <div class="clientname seconduser">
                           <h2>sallu<span>6/7</span></h2>
                           <div class="progress bar">
                              <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" style="width:80%">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                   <div class="rating topmargin">
                      <h2>Review,Rating & Re-assign</h2>
                      <div class="scrolltable">
                         <table class="table green_custom_table">
                            <thead class="thead-dark green_head">
                               <tr>
                                  <th scope="col" class="table_5">Order#</th>
                                  <th scope="col" class="table_10">Company name</th>
                                  <th scope="col" class="table_5">Area</th>
                                  <th scope="col" class="table_10">Date & Time</th>
                                  <th scope="col" class="table_10">Assigned by</th>
                                  <th scope="col" class="table_10">Assigned To</th>
                                  <th scope="col" class="table_15">Status</th>
                                  <th scope="col" class="table_10">Action</th>
                                  <th scope="col" class="table_5">Gift</th>
                                  <th scope="col" class="table_5">Rating</th>
                                  <th scope="col" class="table_5"></th>
                                  {{-- <th scope="col" class="table_5"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 20px;"></i></th> --}}
                               </tr>
                            </thead>
                            <tbody id="assigned_table_body" class="table_body">
                                @foreach($assigned_tickets as $asn_ticket)
                               <tr class="lite_green">
                                  <td class="table_5">{{$asn_ticket->ticketno}}</td>
                                  <td class="table_10">{{$asn_ticket->company}}</td>
                                  <td class="table_5">{{$asn_ticket->area}}</td>
                                  <td class="table_10">{{$asn_ticket->created_at}}</td>
                                  <td>{{\App\User::find($asn_ticket->assigned_by)->name}}</td>
                                  <td class="table_10" id="select_{{$asn_ticket->id}}" data-id="{{$asn_ticket->id}}" style="display:none"><select class="form-control selectpicker" name="presale_employees"><option>Select Employee</option> @foreach($users as $user)<option value="{{$user->id}}">{{$user->name}}</option> @endforeach </select></td>
                                  <td class="table_10" id="current_{{$asn_ticket->id}}" >{{\App\User::find($asn_ticket->assigned_to)->name}}<a href="javascript:void(0);" data-id="{{$asn_ticket->id}}" class="change_user"><i class="fa fa-pencil" aria-hidden="true" data-id="{{$asn_ticket->id}}"></i></a></td>
                                  <td class="table_15"><span class="table_btn bg_green">{{$asn_ticket->status}}</span></td>
                                  <td class="table_10"><a href="javascript:void(0);" onclick="showForm('{{$asn_ticket->order->id}}');" class="view_btn">View form</a></td>
                                  <td class="table_5"><span class="table_btn bg_green">{{$asn_ticket->gift}}</span></td>
                                  <td class="table_5">{{$asn_ticket->rating}}</td>
                                  <td class="table_5"><a href="javascript:void(0);" data-id="{{$asn_ticket->id}}" class="save_row"><i class="fa fa-file-text-o" data-id="{{$asn_ticket->id}}" aria-hidden="true"></i></a>
                                    <a data-toggle="collapse" href="#extrabox_{{$asn_ticket->id}}" class="save_row1" data-id="{{$asn_ticket->id}}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                  </td>
                               </tr>
                               <tr class="panel-collapse collapse" id="extrabox_{{$asn_ticket->id}}">
                                 <td colspan="12">
                                        <div class="row textarea_tbl_bg table_txt_area">
                                                <div class="col-md-2">
                                                   <div class="remark_fild">
                                                        {{$asn_ticket->order->address}}
                                                   </div></br>
                                                   <div class="remark_fild">
                                                        Industry: {{$asn_ticket->order->industry}}
                                                   </div>
                                                </div>
                                                <div class="col-md-2">
                                                   <div class="">
                                                      <span class="dis_block brack_all low_font">{{$asn_ticket->order->email}}</span>
                                                      <span class="dis_block brack_all low_font">{{$asn_ticket->order->website}}</span>
                                                      <span class="dis_block brack_all low_font">{{$asn_ticket->order->contact}}</span>
                                                   </div>
                                                </div>
                                                <div class="col-md-4">
                                                   <div class="remark_fild">
                                                      Remarks:<textarea class="txtarea_fild" placeholder="Enter Remark" id="remark_{{$asn_ticket->id}}" name="remark">{{$asn_ticket->order->remark}}</textarea>
                                                   </div>
                                                </div>
                                                <div class="col-md-4">
                                                   <div class="remark_fild">
                                                      Managers Remarks:<textarea class="txtarea_fild" placeholder="Enter Remark" id="manager_remark_{{$asn_ticket->id}}" name="manager_remark">{{$asn_ticket->order->manager_remark}}</textarea>
                                                   </div>
                                                </div>
                                             </div>
                                       </td>
                                   </tr>
                               @endforeach
                            </tbody>
                         </table>
                      </div>
                   </div>
                </div>
             </div>
             {{-- End Tables --}}

       {{-- <div class="row">
          <div class="col-md-12">
          <div class="rating">
          <h2>Review,Rating & Re-assign</h2>
          <div class="scrolltable">
          <table class="table custom_table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Ticket#</th>
                <th scope="col">Company name</th>
                <th scope="col">Area</th>
                <th scope="col">Emp</th>
                 <th scope="col">Date & Time</th>
                <th scope="col">Assigned by</th>
                <th scope="col">Assigned To</th>
                <th scope="col">Status</th>	 
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody id="assigned_table_body" class="table_body">
                @foreach($assigned_tickets as $asn_ticket)
                <tr id ="{{$asn_ticket->id}}" data-status="assigned">
                   <td>{{$asn_ticket->ticketno}}</td>
                   <td>{{$asn_ticket->company}}</td>
                   <td>{{$asn_ticket->area}}</td>
                   <td>{{$asn_ticket->emp}}</td>
                   <td>{{$asn_ticket->created_at}}</td>
                   <td>{{\App\User::find($asn_ticket->assigned_by)->name}}</td>
                   <td id="select_{{$asn_ticket->id}}" data-id="{{$asn_ticket->id}}" style="display:none"><select class="form-control selectpicker" name="presale_employees"><option>Select Employee</option> @foreach($users as $user)<option value="{{$user->id}}">{{$user->name}}</option> @endforeach </select></td>
                   <td id="current_{{$asn_ticket->id}}" >{{\App\User::find($asn_ticket->assigned_to)->name}}<a href="javascript:void(0);" data-id="{{$asn_ticket->id}}" class="change_user"><i class="fa fa-pencil" aria-hidden="true" data-id="{{$asn_ticket->id}}"></i></a></td>
                   <td><span class="wait">{{$asn_ticket->status}}</span></td>
                   <td><a href="javascript:void(0);" data-id="{{$asn_ticket->id}}" class="save_row"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
                    <a data-toggle="collapse" href="#extrabox_{{$asn_ticket->id}}" class="save_row" data-id="{{$asn_ticket->id}}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a> 
                  </td>
                 </tr>
                 <tr class="panel-collapse collapse" id="extrabox_{{$asn_ticket->id}}">
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
          </div> --}}
       
@stop

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="/js/canvasjs.min.js"></script>
<script>
  $(".selectpicker").select2({
        tags: false
  });
let all_fields = ['orderno','company','address','area','city','email','industry','hr_name','hr_contact','hr_email','hr_website','emp_strength','gift_quantity','gift_type'];
function showForm(id){
    getOrders_(id);
}
function getOrders_(id) {
  axios.get("{{url('admin/orders')}}/" + id).then((res) => {
        let order = res.data.detail;
        $('#fill_form input[name="id"]').val(id);
        $.each( order, function( index, value ){
            if(all_fields.includes(index)){
              $('#fill_form input[name="'+index+'"]').prop('disabled',true);
              $('#fill_form input[name="'+index+'"]').val(value);
            }
        });
        $('#fill_form .modal-footer').remove();
        $('#fill_form input[type="file"]').remove();
        if(order.attachment) {
            $('#fill_form #image_show').show();
            $('#fill_form #image_show').css('width','70%');
            $('#fill_form #image_show').attr('src','/files/' + order.attachment);
        }
        $('#fill_form select[name="gift_type"]').prop('disabled',true);
        $('#fill_form select[name="gift_type"]').val(order.gift_type);
        $('#fill_form textarea[name="address"]').prop('disabled',true);
        $('#fill_form #exampleModalLabel').text('Form Detail');
        $('#fill_form').modal('show');
    });
}
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
    let allRemarks = {};
    remarks.each(function( index ) {
        allRemarks[$( this ).attr('name')] = $( this ).val();
    });
    let employee_id = $('#select_' + id + ' select option:selected').val();
    let submitData = {ticket_id:id, status:'assigned', allRemarks: allRemarks};
    if(Number.isInteger(employee_id)) {
        submitData['employee_id'] = employee_id;
    }
    $('#table_body tr#' + id).remove();
    axios.post("{{url('admin/saveRow')}}",submitData).then((response) => {
      let rkt = response.data.detail;
      if (typeof ticket_status !== 'undefined' && ticket_status != 'assigned') {
        let ticket = '<tr id ="'+rkt.id+'"><td>'+rkt.ticketno+'</td><td>'+rkt.company+'</td><td>'+rkt.area+'</td><td>'+rkt.emp+'</td><td>'+rkt.created_at+'</td><td>'+rkt.assigned_by.name+'</td><td id="select_'+rkt.id+'" data-id="'+rkt.id+'" style="display:none"><select class="form-control selectpicker" name="presale_employees"><option>Select Employee</option> @foreach($users as $user)<option value="{{$user->id}}">{{$user->name}}</option> @endforeach </select></td><td id="current_'+rkt.id+'" >'+rkt.assigned_to.name+'<a href="javascript:void(0);" data-id="'+rkt.id+'" class="change_user"><i class="fa fa-pencil" aria-hidden="true" data-id="'+rkt.id+'"></i></a></td><td><span class="wait">'+rkt.status+'</span></td><td><a href="javascript:void(0);" data-id="'+rkt.id+'" class="save_row"><i class="fa fa-floppy-o" aria-hidden="true"></i></a><a data-toggle="collapse" href="#extrabox_'+rkt.id+'" class="save_row" data-id="'+rkt.id+'"><i class="fa fa-plus-circle" aria-hidden="true"></i></a> </td></tr><tr class="panel-collapse collapse" id="extrabox_'+rkt.id+'"><td>'+rkt.id.order.address+'</td><td>'+rkt.id.order.email+'<br>'+rkt.id.order.contact+'</td><td>Remarks:</td><td><input type="text" placeholder="Enter Remark" id="hr_remark_{{$asn_ticket->id}}"></td><td>Verification Remarks:</td><td><input type="text" placeholder="Enter Remark" id="ver_remark_{{$asn_ticket->id}}" /></td><td>Remarks:</td><td><input type="text" placeholder="Enter Remark" id="remark_{{$asn_ticket->id}}" /></td></tr>';
        $('#assigned_table_body').append(ticket);
      }
      toastr.success(response.data.msg);
    });
});
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: ""
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",       
		dataPoints: [
			{ y: 450 },
			{ y: 414},
			{ y: 520, indexLabel: "highest",markerColor: "red", markerType: "triangle" },
			{ y: 460 },
			{ y: 450 },
			{ y: 500 },
			{ y: 480 },
			{ y: 480 },
			{ y: 410 , indexLabel: "lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
			{ y: 500 },
			{ y: 480 },
			{ y: 510 }
		]
	},
	{        
		type: "line",       
		dataPoints: [
			{ y: 450 },
			{ y: 414},
			{ y: 420, indexLabel: "highest",markerColor: "red", markerType: "triangle" },
			{ y: 460 },
			{ y: 450 },
			{ y: 500 },
			{ y: 440 },
			{ y: 480 },
			{ y: 410 , indexLabel: "lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
			{ y: 560 },
			{ y: 780 },
			{ y: 810 }
		]
	}
	]
});
chart.render();


</script>
@stop
