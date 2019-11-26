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
    <div id="chartContainer" style="height: 370px;width:100%;margin: 0 0 25px;"></div>
    <div class="row">
            <div class="col-md-6">
            <div class="colmn_1 white_bg boxside">
            <div class="bg_box">
            <ul>
            <li class="heading_list"><div class="row"><div class="col-md-3 text-left">Activities</div><div class="col-md-6"></div><div class="col-md-3 text-right"><i class="fa fa-refresh" aria-hidden="true"></i><i class="fa fa-chevron-down"></i><i class="fa fa-times" aria-hidden="true"></i></div></div></li>
           </ul>
           <div class="position">
           <div class="inactive">
           <h2>12</h2>
           <p class="inred">Inactive</p>
           </div>
           <div class="inactive">
           <h2>12</h2>
           <p class='oreassined'>Re-assigned</p>
           </div>
           <div class="inactive">
           <h2>12</h2>
           <p class="bposition">postpond</p>
           </div>
           </div>
           <hr class="line">
           
           <div class="actively">
           <div class="usershow">
           <div class="activeuserimg">
           <img src="img/client.jpg" alt="#">
           </div>
           <div class="activeuserdata">
           <h2>Jony Diss</h2>
           <p><span class="greenuser"></span>Active (95 mins ago)</p>
           </div>
           </div>
           
           <div class="usershow">
           <div class="activeuserimg">
           <img src="img/client.jpg" alt="#">
           </div>
           <div class="activeuserdata">
           <h2>Jony Diss</h2>
           <p><span class="greenuser"></span>Active (95 mins ago)</p>
           </div>
           </div>
           </div>
           <hr class="line">
           <div class="actively">
           <div class="usershow">
           <div class="activeuserimg">
           <img src="img/client.jpg" alt="#">
           </div>
           <div class="activeuserdata">
           <h2>Jony Diss</h2>
           <p><span class="greenuser"></span>Active (95 mins ago)</p>
           </div>
           </div>
           
           <div class="usershow">
           <div class="activeuserimg">
           <img src="img/client.jpg" alt="#">
           </div>
           <div class="activeuserdata">
           <h2>Jony Diss</h2>
           <p><span class="greenuser"></span>Active (95 mins ago)</p>
           </div>
           </div>
           </div>
           <hr class="line">
               <div class="actively">
           <div class="usershow">
           <div class="activeuserimg">
           <img src="img/client.jpg" alt="#">
           </div>
           <div class="activeuserdata">
           <h2>Jony Diss</h2>
           <p><span class="greenuser"></span>Active (95 mins ago)</p>
           </div>
           </div>
           
           <div class="usershow">
           <div class="activeuserimg">
           <img src="img/client.jpg" alt="#">
           </div>
           <div class="activeuserdata">
           <h2>Jony Diss</h2>
           <p><span class="greenuser"></span>Active (95 mins ago)</p>
           </div>
           </div>
           </div>
           
           </div>
            </div>
            </div>
       <div class="col-md-3">
       <div class="userbox">
       <p>User <a href="javascript:void(0);"><i class="fa fa-sort" aria-hidden="true"></i></a></p>
       <hr class="line">
       <div class="clientname">
       <h2>sallu<span>6/7</span></h2>
       <div class="progress bar">
         <div class="progress-bar" role="progressbar" aria-valuenow="70"
         aria-valuemin="0" aria-valuemax="100" style="width:70%">
         </div>
       </div>
       </div>
       <div class="clientname">
       <h2>sallu<span>6/7</span></h2>
       <div class="progress bar">
         <div class="progress-bar" role="progressbar" aria-valuenow="70"
         aria-valuemin="0" aria-valuemax="100" style="width:20%">
         </div>
       </div>
       </div>
       <div class="clientname">
       <h2>sallu<span>6/7</span></h2>
       <div class="progress bar">
         <div class="progress-bar" role="progressbar" aria-valuenow="70"
         aria-valuemin="0" aria-valuemax="100" style="width:75%">
         </div>
       </div>
       </div>
       <div class="clientname">
       <h2>sallu<span>6/7</span></h2>
       <div class="progress bar">
         <div class="progress-bar" role="progressbar" aria-valuenow="70"
         aria-valuemin="0" aria-valuemax="100" style="width:30%">
         </div>
       </div>
       </div>
       <div class="clientname">
       <h2>sallu<span>6/7</span></h2>
       <div class="progress bar">
         <div class="progress-bar" role="progressbar" aria-valuenow="70"
         aria-valuemin="0" aria-valuemax="100" style="width:40%">
         </div>
       </div>
       </div>
       <div class="clientname">
       <h2>sallu<span>6/7</span></h2>
       <div class="progress bar">
         <div class="progress-bar" role="progressbar" aria-valuenow="70"
         aria-valuemin="0" aria-valuemax="100" style="width:40%">
         </div>
       </div>
       </div>
       <div class="clientname">
       <h2>sallu<span>6/7</span></h2>
       <div class="progress bar">
         <div class="progress-bar" role="progressbar" aria-valuenow="70"
         aria-valuemin="0" aria-valuemax="100" style="width:40%">
         </div>
       </div>
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
          </div>
       
       <div class="row">
       <div class="col-md-12">
       <div class="rating">
       <h2>Unassigned Tickets</h2>
       <div class="scrolltable">
       <table class="table custom_table">
         <thead class="thead-dark">
           <tr>
             <th scope="col">Ticket#</th>
             <th scope="col">Company name</th>
             <th scope="col">Area</th>
             <th scope="col">Emp</th>
             <th scope="col">Assigned by</th>
             <th scope="col">Assigned To</th>
             <th scope="col">Status</th>	
             <th scope="col">Date & Time</th>	
            <th scope="col">Date received</th>	
           <th scope="col">Rating</th>	
           <th scope="col">Actions</th> 
           </tr>
         </thead>
         <tbody id="table_body" class="table_body">
           @foreach($tickets as $ticket)
           <tr id ="{{$ticket->id}}" data-status="received">
              {{-- {{\App\User::find($ticket->assigned_to)->name}} --}}
              <td>{{$ticket->ticketno}}</td>
              <td>{{$ticket->company}}</td>
              <td>{{$ticket->area}}</td>
              <td>{{$ticket->emp}}</td>
              <td>{{\App\User::find($ticket->assigned_by)->name}}</td>
              <td id="select_{{$ticket->id}}" data-id="{{$ticket->id}}" style="display:none"><select class="form-control selectpicker"><option>Select Employee</option> @foreach($users as $user)<option value="{{$user->id}}">{{$user->name}}</option> @endforeach </select></td>
              <td id="current_{{$ticket->id}}" >{{\App\User::find($ticket->assigned_to)->name}}<a href="javascript:void(0);" data-id="{{$ticket->id}}" class="change_user"><i class="fa fa-pencil" aria-hidden="true" data-id="{{$ticket->id}}"></i></a></td>
              <td><span class="wait">{{$ticket->status}}</span></td>
              <td>{{$ticket->created_at}}</td>
              <td>{{$ticket->received_at}}</td>
              <td>{{$ticket->rating}}</td>
              <td><a href="javascript:void(0);" data-id="{{$ticket->id}}" class="save_row"><i data-id="{{$ticket->id}}" class="fa fa-floppy-o" aria-hidden="true"></i></a>
              </td>

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
<script src="/js/canvasjs.min.js"></script>
<script>
  $(".selectpicker").select2({
        tags: false
  });
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
    remarks.each(function( index ) {
      console.log($( this ).text());
    });
    return;
    
    let submitData = {ticket_id:id, status:'assigned', employee_id: employee_id};
    let employee_id = $('#select_' + id + ' select option:selected').val();
    $('#table_body tr#' + id).remove();
    console.log(id);console.log(employee_id);
    axios.post("{{url('admin/saveRow')}}",submitData).then((response) => {
      let rkt = response.data.detail;
      let ticket = '<tr id ="'+rkt.id+'"><td>'+rkt.ticketno+'</td><td>'+rkt.company+'</td><td>'+rkt.area+'</td><td>'+rkt.emp+'</td><td>'+rkt.created_at+'</td><td>'+rkt.assigned_by.name+'</td><td id="select_'+rkt.id+'" data-id="'+rkt.id+'" style="display:none"><select class="form-control selectpicker" name="presale_employees"><option>Select Employee</option> @foreach($users as $user)<option value="{{$user->id}}">{{$user->name}}</option> @endforeach </select></td><td id="current_'+rkt.id+'" >'+rkt.assigned_to.name+'<a href="javascript:void(0);" data-id="'+rkt.id+'" class="change_user"><i class="fa fa-pencil" aria-hidden="true" data-id="'+rkt.id+'"></i></a></td><td><span class="wait">'+rkt.status+'</span></td><td><a href="javascript:void(0);" data-id="'+rkt.id+'" class="save_row"><i class="fa fa-floppy-o" aria-hidden="true"></i></a><a data-toggle="collapse" href="#extrabox_'+rkt.id+'" class="save_row" data-id="'+rkt.id+'"><i class="fa fa-plus-circle" aria-hidden="true"></i></a> </td></tr><tr class="panel-collapse collapse" id="extrabox_'+rkt.id+'"><td>'+rkt.id.order.address+'</td><td>'+rkt.id.order.email+'<br>'+rkt.id.order.contact+'</td><td>Remarks:</td><td><input type="text" placeholder="Enter Remark" id="hr_remark_{{$asn_ticket->id}}"></td><td>Verification Remarks:</td><td><input type="text" placeholder="Enter Remark" id="ver_remark_{{$asn_ticket->id}}" /></td><td>Remarks:</td><td><input type="text" placeholder="Enter Remark" id="remark_{{$asn_ticket->id}}" /></td></tr>';
      if (ticket_status != 'assigned') {
        $('#assigned_table_body').append(ticket);
      }
      toastr.success(response.data.msg);
    });
});
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: ""
	},
	axisY :{
		includeZero: false,
		prefix: "$"
	},
	toolTip: {
		shared: true
	},
	legend: {
		fontSize: 13
	},
	data: [{
		type: "splineArea",
		showInLegend: true,
		name: "Total Assigned",
		yValueFormatString: "$#,##0",
		dataPoints: [
			{ x: new Date(2016, 2), y: 30000 },
			{ x: new Date(2016, 3), y: 35000 },
			{ x: new Date(2016, 4), y: 30000 },
			{ x: new Date(2016, 5), y: 30400 },
			{ x: new Date(2016, 6), y: 20900 },
			{ x: new Date(2016, 7), y: 31000 },
			{ x: new Date(2016, 8), y: 30200 },
			{ x: new Date(2016, 9), y: 30000 },
			{ x: new Date(2016, 10), y: 33000 },
			{ x: new Date(2016, 11), y: 38000 },
			{ x: new Date(2017, 0),  y: 38900 },
			{ x: new Date(2017, 1),  y: 39000 }
		]
 	},
	{
		type: "splineArea", 
		showInLegend: true,
		name: "Denied",
		yValueFormatString: "$#,##0",
		dataPoints: [
			{ x: new Date(2016, 2), y: 20100 },
			{ x: new Date(2016, 3), y: 16000 },
			{ x: new Date(2016, 4), y: 14000 },
			{ x: new Date(2016, 5), y: 18000 },
			{ x: new Date(2016, 6), y: 18000 },
			{ x: new Date(2016, 7), y: 21000 },
			{ x: new Date(2016, 8), y: 22000 },
			{ x: new Date(2016, 9), y: 25000 },
			{ x: new Date(2016, 10), y: 23000 },
			{ x: new Date(2016, 11), y: 25000 },
			{ x: new Date(2017, 0), y: 26000 },
			{ x: new Date(2017, 1), y: 25000 }
		]
 	},
	{
		type: "splineArea", 
		showInLegend: true,
		name: "Completed",
		yValueFormatString: "$#,##0",     
		dataPoints: [
			{ x: new Date(2016, 2), y: 10100 },
			{ x: new Date(2016, 3), y: 6000 },
			{ x: new Date(2016, 4), y: 3400 },
			{ x: new Date(2016, 5), y: 4000 },
			{ x: new Date(2016, 6), y: 9000 },
			{ x: new Date(2016, 7), y: 3900 },
			{ x: new Date(2016, 8), y: 4200 },
			{ x: new Date(2016, 9), y: 5000 },
			{ x: new Date(2016, 10), y: 14300 },
			{ x: new Date(2016, 11), y: 12300 },
			{ x: new Date(2017, 0), y: 8300 },
			{ x: new Date(2017, 1), y: 6300 }
		]
 	},
	{
		type: "splineArea", 
		showInLegend: true,
		yValueFormatString: "$#,##0",      
		name: "Data N/A",
		dataPoints: [
			{ x: new Date(2016, 2), y: 1700 },
			{ x: new Date(2016, 3), y: 2600 },
			{ x: new Date(2016, 4), y: 1000 },
			{ x: new Date(2016, 5), y: 1400 },
			{ x: new Date(2016, 6), y: 900 },
			{ x: new Date(2016, 7), y: 1000 },
			{ x: new Date(2016, 8), y: 1200 },
			{ x: new Date(2016, 9), y: 5000 },
			{ x: new Date(2016, 10), y: 1300 },
			{ x: new Date(2016, 11), y: 2300 },
			{ x: new Date(2017, 0), y: 2800 },
			{ x: new Date(2017, 1), y: 1300 }
		]
	}]
});
chart.render();


</script>
@stop
