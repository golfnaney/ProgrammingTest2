<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    //
    protected $fillable = ['id', 'amount', 'term', 'interest_rate','select_mounth','select_year','action_by','created_at','updated_at'];
}
