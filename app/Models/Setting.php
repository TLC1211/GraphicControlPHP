<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Setting extends Model
{
    protected $connection = 'mysql';
    protected $table = 'settings';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $casts = [
        'CollectData' => 'json'
    ];

    protected $fillable = [
        'Guid', 'Name', 'CollectData'
    ];
}
