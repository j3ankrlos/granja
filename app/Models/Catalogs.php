<?php
declare(strict_types=1);
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class State extends Model { protected $fillable = ['name']; }

// Municipio
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Municipality extends Model { protected $fillable = ['state_id', 'name']; }

// Parroquia
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Parish extends Model { protected $fillable = ['municipality_id', 'name']; }

// Tipo Nomina
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PayrollType extends Model { protected $fillable = ['name']; }

// Centro de Costo
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CostCenter extends Model { protected $fillable = ['code', 'name']; }
