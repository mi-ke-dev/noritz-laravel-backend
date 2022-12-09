<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>


<div>
<h3>Hello!</h3>
<h4>Your Submission is Sucessful in rma category</h4>
</div>

<div>
<table>
    @if(isset($input['party_requesting_the_rma_and_responsible_for_charges']))
    <tr>
        <td>Party requesting the RMA and responsible for charges?</td>
        <td>{{ $input['party_requesting_the_rma_and_responsible_for_charges'] }}</td>
    </tr>
    @endif

    @if(isset($input['noritz_distributor']))
    <tr>
        <td>Noritz Distributor</td>
        <td>{{ $input['noritz_distributor'] }}</td>
    </tr>
    @endif

    @if(isset($input['contact_name']))
    <tr>
        <td>Contact Name</td>
        <td>{{ $input['contact_name'] }}</td>
    </tr>
    @endif

    @if(isset($input['distributor_address']))
    <tr>
        <td colspan="2"><b>Distributor Address</b></td>
    </tr>
    <tr>
        <td>Street address </td>
        <td>{{ $input['distributor_address']['street_address'] }}</td>
    </tr>
    <tr>
        <td>City</td>
        <td>{{ $input['distributor_address']['city'] }}</td>
    </tr>
    <tr>
        <td>State</td>
        <td>{{ $input['distributor_address']['state'] }}</td>
    </tr>
    <tr>
        <td>Zip Code</td>
        <td>{{ $input['distributor_address']['state'] }}</td>
    </tr>
    @endif

    @if(isset($input['phone_number']))
    <tr>
        <td>Phone Number</td>
        <td>{{ $input['phone_number'] }}</td>
    </tr>
    @endif

    @if(isset($input['noritz_sales_representative']))
    <tr>
        <td>Noritz Sales Representative</td>
        <td>{{ $input['noritz_sales_representative'] }}</td>
    </tr>
    @endif

    @if(isset($input['installing_company']))
    <tr>
        <td>Installing Company</td>
        <td>{{ $input['installing_company'] }}</td>
    </tr>
    @endif

    @if(isset($input['installer_contact']))
    <tr>
        <td>Installer Contact</td>
        <td>{{ $input['installer_contact'] }}</td>
    </tr>
    @endif

    @if(isset($input['installer_phone_number']))
    <tr>
        <td>Installer Phone Number</td>
        <td>{{ $input['installer_phone_number'] }}</td>
    </tr>
    @endif

    @if(isset($input['noritz_engineer']))
    <tr>
        <td>Noritz Engineer</td>
        <td>{{ $input['noritz_engineer'] }}</td>
    </tr>
    @endif

    @if(isset($input['installer_address']))
    <tr>
        <td colspan="2"><b>Installer Address</b></td>
    </tr>
    <tr>
        <td>Street address </td>
        <td>{{ $input['installer_address']['street_address'] }}</td>
    </tr>
    <tr>
        <td>City</td>
        <td>{{ $input['installer_address']['city'] }}</td>
    </tr>
    <tr>
        <td>State</td>
        <td>{{ $input['installer_address']['state'] }}</td>
    </tr>
    <tr>
        <td>Zip Code</td>
        <td>{{ $input['installer_address']['state'] }}</td>
    </tr>
    @endif

    @if(isset($input['owner_name']))
    <tr>
        <td>Owner Name</td>
        <td>{{ $input['owner_name'] }}</td>
    </tr>
    @endif

    @if(isset($input['owner_phone_number']))
    <tr>
        <td>Owner Phone Number</td>
        <td>{{ $input['owner_phone_number'] }}</td>
    </tr>
    @endif


    @if(isset($input['installation_address']))
    <tr>
        <td colspan="2"><b>Installation Address</b></td>
    </tr>
    <tr>
        <td>Street address </td>
        <td>{{ $input['installation_address']['street_address'] }}</td>
    </tr>
    <tr>
        <td>City</td>
        <td>{{ $input['installation_address']['city'] }}</td>
    </tr>
    <tr>
        <td>State</td>
        <td>{{ $input['installation_address']['state'] }}</td>
    </tr>
    <tr>
        <td>Zip Code</td>
        <td>{{ $input['installation_address']['state'] }}</td>
    </tr>


    @endif

    @if(isset($input['return_shipping_address']))
    <tr>
        <td>Return Shipping Address</td>
    </tr>
    <tr>
        <td>Street address </td>
        <td>{{ $input['return_shipping_address']['street_address'] }}</td>
    </tr>
    <tr>
        <td>City</td>
        <td>{{ $input['return_shipping_address']['city'] }}</td>
    </tr>
    <tr>
        <td>State</td>
        <td>{{ $input['return_shipping_address']['state'] }}</td>
    </tr>
    <tr>
        <td>Zip Code</td>
        <td>{{ $input['return_shipping_address']['state'] }}</td>
    </tr>
    @endif

    @if(isset($input['model_number']))
    <tr>
        <td>Model Number</td>
        <td>{{ $input['model_number'] }}</td>
    </tr>
    @endif

    @if(isset($input['gas_type']))
    <tr>
        <td>Gas Type</td>
        <td>{{ $input['gas_type'] }}</td>
    </tr>
    @endif

    @if(isset($input['serial_number']))
    <tr>
        <td>Serial Number</td>
        <td>{{ $input['serial_number'] }}</td>
    </tr>
    @endif

    @if(isset($input['application_type']))
    <tr>
        <td>Application Type</td>
        <td>{{ $input['application_type'] }}</td>
    </tr>
    @endif

    @if(isset($input['recirculation_pump']))
    <tr>
        <td>Recirculation Pump</td>
        <td>{{ $input['recirculation_pump'] }}</td>
    </tr>
    @endif

    @if(isset($input['reason_for_return']))
    <tr>
        <td>Reason For Return</td>
        <td>{{ $input['reason_for_return'] }}</td>
    </tr>
    @endif

    @if(isset($input['return_box']))
    <tr>
        <td>Return Box</td>
        <td>{{ $input['return_box'] }}</td>
    </tr>
    @endif

    @if(isset($input['return_remote_controller']))
    <tr>
        <td>Return Remote Controller</td>
        <td>{{ $input['return_remote_controller'] }}</td>
    </tr>
    @endif

    @if(isset($input['return_remote_cord']))
    <tr>
        <td>Return Remote Cord</td>
        <td>{{ $input['return_remote_cord'] }}</td>
    </tr>
    @endif

    @if(isset($input['other']))
    <tr>
        <td>Other</td>
        <td>{{ $input['other'] }}</td>
    </tr>
    @endif

    @if(isset($input['preapprove_the_total_amount_for_repair']))
    <tr>
        <td>Pre-Approve the Total amount for Repair</td>
        <td>{{ $input['preapprove_the_total_amount_for_repair'] }}</td>
    </tr>
    @endif

    @if(isset($input['box_purchase_distributors_only']))
    <tr>
        <td>Box Purchase (Distributors Only)</td>
        <td>{{ $input['box_purchase_distributors_only'] }}</td>
    </tr>
    @endif

    @if(isset($input['remote_controller_purchase_distributors_only']))
    <tr>
        <td>Remote Controller Purchase (Distributors Only)	</td>
        <td>{{ $input['remote_controller_purchase_distributors_only'] }}</td>
    </tr>
    @endif

    @if(isset($input['remote_cord_purchase_distributors_only']))
    <tr>
        <td>Remote Cord Purchase (Distributors Only)</td>
        <td>{{ $input['remote_cord_purchase_distributors_only'] }}</td>
    </tr>
    @endif

    @if(isset($input['initials']))
    <tr>
        <td>Initials</td>
        <td>{{ $input['initials'] }}</td>
    </tr>
    @endif

    @if(isset($input['name']))
    <tr>
        <td>Name</td>
        <td>{{ $input['name'] }}</td>
    </tr>
    @endif

    @if(isset($input['email']))
    <tr>
        <td>Email</td>
        <td>{{ $input['email'] }}</td>
    </tr>
    @endif

    @if(isset($input['fax_number']))
    <tr>
        <td>Fax Number</td>
        <td>{{ $input['fax_number'] }}</td>
    </tr>
    @endif



</table>
    </div>

    </body>
    </html>
