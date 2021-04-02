<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippers extends Model
{
    use HasFactory;

    protected $table = 'shippers';
    protected $guarded = array();

    /*protected $fillable = [
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
        ]; */
}
