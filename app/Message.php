<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // Documentation's link to Models: https://laravel.com/docs/5.4/eloquent#retrieving-models

	// Defining manually the table
	protected $table = 'messages';

	// note: laravel do this automatically
}
