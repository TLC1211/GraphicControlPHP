<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ChartValue extends Model
{
    protected $connection = 'mysql';
    protected $table = 'chart_values';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $casts = [
        'Collect' => 'json',
    ];

    protected $fillable = [
        'Guid', 'ChartCollectsGuid', 'TimeStamp', 'Collect'
    ];
}
