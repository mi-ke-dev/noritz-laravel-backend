<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>


<div>
<h3>Hello!</h3>
<h4>Your Submission is Sucessful in rga1 category</h4>
</div>

<div>
<table>
    @if(isset($input['companycustomer_name']))
    <tr>
        <td>Company/Customer Name</td>
        <td>{{ $input['companycustomer_name'] }}</td>
    </tr>
    @endif

    @if(isset($input['sales_order_number']))
    <tr>
        <td>Sales Order Number</td>
        <td>{{ $input['sales_order_number'] }}</td>
    </tr>
    @endif

    @if(isset($input['customer_reference_number']))
    <tr>
        <td>Customer Reference Number</td>
        <td>{{ $input['customer_reference_number'] }}</td>
    </tr>
    @endif


    @if(isset($input['customer_purchase_order_number']))
    <tr>
        <td>Customer Purchase Order Number	</td>
        <td>{{ $input['customer_purchase_order_number'] }}</td>
    </tr>
    @endif

    @if(isset($input['items']))
    <tr>
        <td colspan="2">Items </td>
        </tr>

        <tr>
        <td colspan="2" >
    <table border='1'>
    <tr>
    <td>Items</td>
    <td>PO Customer Requisition</td>
    <td>Quantity</td>
    <td>Serial Number</td>
    </tr>
    @foreach($input['items'] as $item)
      <tr>
           <td >{{$item['items']}}</td>
           <td >{{$item['po_customer_requisition']}}</td>
           <td >{{$item['quantity']}}</td>
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

    @if(isset($input['has_the_box_been_opened']))
    <tr>
        <td>Has the box been opened?</td>
        <td>{{ ($input['has_the_box_been_opened'] == 1)?'Yes' : 'No' }}</td>
    </tr>
    @endif

    @if(isset($input['has_the_item_been_installed']))
    <tr>
        <td>Has the item been installed?</td>
        <td>{{ ($input['has_the_item_been_installed'] == 1)?'Yes' : 'No' }}</td>
    </tr>
    @endif

    @if(isset($input['is_the_items_in_new_resalable_condition']))
    <tr>
        <td>Is the item(s) in new resalable condition?</td>
        <td>{{ ($input['is_the_items_in_new_resalable_condition'] == 1)?'Yes' : 'No' }}</td>
    </tr>
    @endif

    @if(isset($input['reason_for_return']))
    <tr>
        <td>Reason for return?</td>
        <td>{{ $input['reason_for_return'] }}</td>
    </tr>
    @endif


    @if(isset($input['name']))
    <tr>
        <td>Name</td>
        <td>{{ $input['name'] }}</td>
    </tr>
    @endif

    @if(isset($input['phone']))
    <tr>
        <td>Phone</td>
        <td>{{ $input['phone'] }}</td>
    </tr>
    @endif


    @if(isset($input['email']))
    <tr>
        <td>Email</td>
        <td>{{ $input['email'] }}</td>
    </tr>
    @endif

  </table>

</div>

</body>
</html>
