<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippers extends Model
{
    use HasFactory;
    use Search;

    protected $table = 'shippers';
    protected $guarded = array();
    protected $searchable = ['ownername','dba'];

    protected $fillable = [
        'ownername',
        'dba',
        'addressline1',
        'addressline2',
        'city',
        'state',
        'zipcode',
        'licensenumber',
        'licensetype',
        'status',
        'effectivedate',
        'expirationdate',
        'lengthoflicense',
        'contactname',
        'emailaddress',
        'contactphone',
        'mailingaddressline1',
        'mailingaddresscity',
        'mailingaddressstate',
        'mailingaddresszip',
        'issuedate',
        'currentissuedate',
        'parent_shipper_id',
        'parent_shipper_name',
        'processed',
        'primary_number',
        'street_name',
        'street_predirection',
        'street_postdirection',
        'street_suffix',
        'secondary_number',
        'secondary_designator',
        'city_name',
        'default_city_name',
        'state_abbreviation',
        'ss_zipcode',
        'plus4_code',
        'delivery_point',
        'delivery_point_check_digit',
        'record_type',
        'rdi',
        'smartystreet_response',
        ];
}
