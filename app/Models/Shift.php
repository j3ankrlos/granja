<?php
declare(strict_types=1);
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model { 
    protected $fillable = ['name', 'type', 'start_time', 'end_time', 'total_hours', 'break_start', 'break_end']; 
}
