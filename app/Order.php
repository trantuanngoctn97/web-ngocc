<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'orders';

	protected $fillable = [
		'name', 'phone', 'email', 'address', 'input_date', 'delivery_date', 'sum_money', 'user_id', 'status', 'note', 
	];

	public $timestamps = true;

	public function user(){
		return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
	}

	public function orderDetails(){
		return $this->hasMany(OrderDetail::class, 'order_id', 'id');
	}


	// scope
	public function scopeSearchDateFrom($query, $value)
	{
		$date = date_create_from_format('d/m/Y', $value)->format('Y-m-d');
		return $query->whereDate('created_at', '>=', $date);
	}

	public function scopeSearchDateTo($query, $value)
	{
		$date = date_create_from_format('d/m/Y', $value)->format('Y-m-d');
		return $query->whereDate('created_at', '<=', $date);
	}
}
