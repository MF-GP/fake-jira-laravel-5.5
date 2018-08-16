<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Jira extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */	
    protected $fillable = [
	    	'id',
	    	'created_by',
			'issue_name',
			'issuetype_name',
			'serial_no',
			'project_key',
			'issue_status',
			'terminal_id',
			'merchant_id',
			'location',
			'supplier'
    	];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
