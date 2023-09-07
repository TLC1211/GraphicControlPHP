<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class VWord extends Model
{
    protected $connection = 'mysql';
    protected $table = 'v_words';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $casts = [
        'CollectData' => 'json',
        'NotifyCollectData' => 'json',
    ];

    protected $fillable = [
        'Guid', 'Name', 'Address', 'NowValue',
        'HandTrigger', 'HandTriggerValue', 'CollectData', 'NotifyStatus', 'NotifyCollectData',
    ];
}
