<?php 


namespace App\Scopes;

use illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Scopes;
use illuminate\Database\Eloquent\BUilder;

/**
 * 
 */
class BuyerScope implements Scope
{
	
	public function apply(Builder $builder , Model $model)
	{
		$buikder->has('transactions');
	}
}



?>