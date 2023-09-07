<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BitCell extends Model
{
    protected $connection = 'mysql';
    protected $table = 'bit_cells';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $casts = [
        'Collect' => 'json',
        'Collectdata' => 'json',
    ];

    protected $fillable = [
        'Guid', 'Name', 'Address', 'NowValue', 'HandTrigger',
        'HandTriggerValue', 'CollectData', 'NotifyStatus', 'NotifyCollectData'
    ];
}
