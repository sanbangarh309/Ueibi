@php($page='Publish')
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
</style>
@stop
@section('content')
          <div class="row">
            <div class="col-md-12">
               <div class="rating topmargin">
                  <h2>Tickets</h2>
                  <div class="scrolltable">
                     <table class="table green_custom_table">
                        <thead class="thead-dark green_head">
                           <tr>
                              <th><input type="checkbox" id="check_all" value="all"></th>
                              <th scope="col" class="table_10">Ticket#</th>
                              <th scope="col" class="table_10">Company name</th>
                              <th scope="col" class="table_10">Area</th>
                              <th scope="col" class="table_10">HR Email</th>
                              <th scope="col" class="table_5">Emp. Data</th>
                              <th scope="col" class="table_10">Date & Time</th>
                              <th scope="col" class="table_10">Assigned by</th>
                              <th scope="col" class="table_10">Assigned To</th>
                              <th scope="col" class="table_15">Status</th>
                              <th scope="col" class="table_10">Action</th>
                              {{-- <th scope="col" class="table_5"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 20px;"></i></th> --}}
                           </tr>
                        </thead>
                        <tbody id="assigned_table_body" class="table_body">
                            @foreach($assigned_tickets as $asn_ticket)
                           <tr class="lite_green">
                              <td><input type="checkbox" name="check_order" class="check_all_boxes" id="{{$asn_ticket->id}}">
                              <td class="table_5">{{$asn_ticket->ticketno}}</td>
                              <td class="table_10">{{$asn_ticket->company}}</td>
                              <td class="table_5">{{$asn_ticket->area}}</td>
                              <td class="table_5">{{$asn_ticket->order->hr_email}}</td>
                              <td class="table_10">{{$asn_ticket->order->emp_strength}}</td>
                              <td class="table_10">{{$asn_ticket->created_at}}</td>
                              <td>{{\App\User::find($asn_ticket->assigned_by)->name}}</td>
                              <td>{{\App\User::find($asn_ticket->assigned_to)->name}}</td>
                              <td class="table_15"><span class="table_btn bg_green">{{$asn_ticket->status}}</span></td>
                             <td class="table_5"><a data-toggle="collapse" href="#extrabox_{{$asn_ticket->id}}" class="save_row1" data-id="{{$asn_ticket->id}}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
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
                                                  Hr Remarks: {{$asn_ticket->order->remark}}
                                               </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="remark_fild">
                                                 Manager Remarks: {{$asn_ticket->order->manager_remark}}
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
         <div class="row">
            <div class="col-md-12">
               <div class="rating topmargin">
                <div class="col-lg-6">
                    <div class="form-group">
                        <select class="form-control selectpicker" id="sel1" name="mkt_manager">
                          <option value="">Select Marketing Manager</option>
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
@stop

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
    $(".selectpicker").select2({
        tags: false
  });
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
  let assigned_to = $('select[name="mkt_manager"] option:selected').val();
  jQuery.each(CustomerIDArray,function(i,item){
    $('#order_body tr#order_'+item).remove();
  });
  axios.post("{{url('admin/publish')}}",{order_ids:CustomerIDArray, assigned_by:userId, assigned_to:assigned_to, publish_type: 'marketing'}).then((response) => {
    toastr.success(response.data.msg);
  });
}
</script>
@stop
