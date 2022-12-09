<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>


<div>
<h3>Hello!</h3>
<p><b>Your Submission is Sucessful in rga2 category</b></p>
</div>

<div>
<table>
    @if(isset($input['date']))
    <tr>
        <td>Date</td>
        <td>{{ $input['date'] }}</td>
    </tr>
    @endif

    @if(isset($input['companycustomer_name']))
    <tr>
        <td>Company/Customer Name</td>
        <td>{{ $input['companycustomer_name'] }}</td>
    </tr>
    @endif

    @if(isset($input['contact_person']))
    <tr>
        <td>Contact Person</td>
        <td>{{ $input['contact_person'] }}</td>
    </tr>
    @endif

    @if(isset($input['email']))
    <tr>
        <td>Email</td>
        <td>{{ $input['email'] }}</td>
    </tr>
    @endif

    @if(isset($input['phone']))
    <tr>
        <td>Phone</td>
        <td>{{ $input['phone'] }}</td>
    </tr>
    @endif

    @if(isset($input['sales_order_number']))
    <tr>
        <td>Sales Order Number</td>
        <td>{{ $input['sales_order_number'] }}</td>
    </tr>
    @endif

    @if(isset($input['po_number']))
    <tr>
        <td>PO Number</td>
        <td>{{ $input['po_number'] }}</td>
    </tr>
    @endif


    @if(isset($input['customer_reference_number']))
    <tr>
        <td>Customer Reference Number</td>
        <td>{{ $input['customer_reference_number'] }}</td>
    </tr>
    @endif


    @if(isset($input['was_the_item_received_damaged']))
    <tr>
        <td>Was the item received damaged?</td>
        <td>{{ ($input['was_the_item_received_damaged'] == 1)?'Yes' : 'No' }}</td>
    </tr>
    @endif

    @if(isset($input['did_you_receive_incorrect_items_andor_quantities']))
    <tr>
        <td>Did you receive incorrect items and/or quantities?</td>
        <td>{{ ($input['did_you_receive_incorrect_items_andor_quantities'] == 1)?'Yes' : 'No' }}</td>
    </tr>
    @endif

    @if(isset($input['is_the_item_defective']))
    <tr>
        <td>Is the item defective?</td>
        <td>{{ ($input['is_the_item_defective'] == 1)?'Yes' : 'No' }}</td>
    </tr>
    @endif

    @if(isset($input['is_this_new_unused_and_needs_to_be_returned']))
    <tr>
        <td>Is this new, unused and needs to be returned?</td>
        <td>{{ ($input['is_this_new_unused_and_needs_to_be_returned'] == 1)?'Yes' : 'No' }}</td>
    </tr>
    @endif

    @if(isset($input['was_the_packaging_damaged']))
    <tr>
        <td>Was the packaging damaged?</td>
        <td>{{ ($input['was_the_packaging_damaged'] == 1)?'Yes' : 'No' }}</td>
    </tr>
    @endif

    @if(isset($input['was_the_carrier_notified_of_the_damage']))
    <tr>
        <td>Was the carrier notified of the damage?</td>
        <td>{{ ($input['was_the_carrier_notified_of_the_damage'] == 1)?'Yes' : 'No' }}</td>
    </tr>
    @endif

    @if(isset($input['were_any_items_refused_from_the_shipment']))
    <tr>
        <td>Were any items refused from the shipment?</td>
        <td>{{ ($input['were_any_items_refused_from_the_shipment'] == 1)?'Yes' : 'No' }}</td>
    </tr>
    @endif

    @if(isset($input['was_the_quantity_on_the_packing_slip_correct']))
    <tr>
        <td>Was the quantity on the packing slip correct?</td>
        <td>{{ ($input['was_the_quantity_on_the_packing_slip_correct'] == 1)?'Yes' : 'No' }}</td>
    </tr>
    @endif

    @if(isset($input['did_the_received_item_match_the_packing_slip']))
    <tr>
        <td>Did the received item match the packing slip?</td>
        <td>{{ ($input['did_the_received_item_match_the_packing_slip'] == 1)?'Yes' : 'No' }}</td>
    </tr>
    @endif

    @if(isset($input['is_the_item_missing_components']))
    <tr>
        <td>Is the item missing components?</td>
        <td>{{ ($input['is_the_item_missing_components'] == 1)?'Yes' : 'No' }}</td>
    </tr>
    @endif

    @if(isset($input['purchase_overage']))
    <tr>
        <td>In case of overage, would you like to purchase or return the items?</td>
        <td>{{ $input['purchase_overage'] }}</td>
    </tr>
    @endif

    @if(isset($input['purchase_damage']))
    <tr>
        <td>In case of damage, defect, or shortage, would you like a replacement item or credit?</td>
        <td>{{ $input['purchase_damage'] }}</td>
    </tr>
    @endif



    @if(isset($input['items_received']))

    <tr>
        <td colspan="2">Items Received</td>
        </tr>

        <tr>
        <td colspan="2" >
    <table border='1'>
    <tr>
    <td>Items Received</td>
    <td>Packing Slip Quantity</td>
    <td>Quantity Received</td>
    <td>Quantity Defective or Damaged</td>
    <td>Serial Number</td>
    </tr>
    @foreach($input['items_received'] as $item)
      <tr>
           <td >{{$item['items_received']}}</td>
           <td >{{$item['packing_slip_quantity']}}</td>
           <td >{{$item['quantity_received']}}</td>
           <td >{{$item['quantity_defective_or_damaged']}}</td>
           <td >{{$item['serial_number']}}</td>
           </tr>
    @endforeach
       </table>
       </td>
    </tr>
    @endif

    @if(isset($input['describe_the_issue']))
    <tr>
        <td>Describe the issue</td>
        <td>{{ $input['describe_the_issue'] }}</td>
    </tr>
    @endif







</table>

</div>

</body>
</html>
