<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ChartCollect extends Model
{
    protected $connection = 'mysql';
    protected $table = 'chart_collects';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $casts = [
        'Data' => 'array',
        'Collect' => 'array',
    ];

    protected $fillable = [
        'Guid', 'Address', 'Data', 'Collect', 'Remark'
    ];
}
