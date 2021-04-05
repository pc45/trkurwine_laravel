<?php

namespace App\Imports;

use App\Models\Shippers;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Carbon\Carbon;
use SmartyStreets;

class ShippersImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //TODO: Error Handle this
        $response = SmartyStreets::addressQuickVerify(array(
            'street'=>$row['addressline1'].' '.$row['addressline2'],
            'city'=>$row['city'],
            'state'=>$row['state'],
        ));

        return new Shippers([
            'ownername'=> $row['ownername'] ,
            'dba'=> $row['dba'] ,
            'addressline1'=> $row['addressline1'] ,
            'addressline2'=> $row['addressline2'],
            'city'=> $row['city'] ,
            'state'=> $row['state'] ,
            'zipcode'=> $row['zipcode'] ,
            'licensenumber'=> $row['licensenumber'] ,
            'licensetype'=> $row['licensetype'] ,
            'status'=> $row['status'] ,
            'effectivedate'=> Carbon::parse($row['effectivedate'])->format('Y-m-d') ,
            'expirationdate'=> Carbon::parse($row['expirationdate'])->format('Y-m-d') ,
            'lengthoflicense'=> $row['lengthoflicense'] ,
            'contactname'=> $row['contactname'] ,
            'emailaddress'=> $row['emailaddress'] ,
            'contactphone'=> $row['contactphone'] ,
            'mailingaddressline1'=> $row['mailingaddressline1'] ,
            'mailingaddresscity'=> $row['mailingaddresscity'] ,
            'mailingaddressstate'=> $row['mailingaddressstate'] ,
            'mailingaddresszip'=> $row['mailingaddresszip'] ,
            'issuedate'=> Carbon::parse($row['issuedate'])->format('Y-m-d') ,
            'currentissuedate'=> Carbon::Parse($row['currentissuedate'])->format('Y-m-d'),
            'processed' => '1',
            'primary_number' => $response['components']['primary_number'],
            'street_name' => $response['components']['street_name'],
            'street_suffix' => $response['components']['street_suffix'],
            'city_name' => $response['components']['city_name'],
            'default_city_name' => $response['components']['default_city_name'],
            'state_abbreviation' => $response['components']['state_abbreviation'],
            'ss_zipcode' => $response['components']['zipcode'],
            'plus4_code' => $response['components']['plus4_code'],
            'delivery_point' => $response['components']['delivery_point'],
            'delivery_point_check_digit' => $response['components']['delivery_point_check_digit'],
            'record_type' => $response['metadata']['record_type'],
            'rdi' => $response['metadata']['rdi'],
            'smartystreet_response' => json_encode($response),
            // these fields arent coming back any longer??
            //'secondary_number' => $response['components'][''],
            //'secondary_designator' => $response['components'][''],
            //'street_predirection' => $response['components'][''],
            //'street_postdirection' => $response['components'][''],
        ]);
    }

    public function batchSize(): int
    {
        return 250;
    }

    public function uniqueBy()
    {
        return 'ownername';
    }
}
