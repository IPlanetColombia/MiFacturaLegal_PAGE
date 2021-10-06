<?php
namespace App\Models;


use CodeIgniter\Model;

class TrafficLight extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'traffic_light';
    protected $allowedFields = [
        'start_date',
        'finish_date'
    ];
}