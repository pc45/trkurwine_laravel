<?php

namespace App\Imports;

use App\Models\Shippers;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class ShippersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

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
            'currentissuedate'=> Carbon::Parse($row['currentissuedate'])->format('Y-m-d') ,
        ]);
    }
}
