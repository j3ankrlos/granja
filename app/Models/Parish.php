<?php
declare(strict_types=1);
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Parish extends Model { protected $fillable = ['municipality_id', 'name']; }
