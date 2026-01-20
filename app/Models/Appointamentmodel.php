<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Controllers\AppointamentController;

class Appointament extends Model
{
    use HasFactory;

    protected $table= 'appointament';
    protected $fillable = [
           
        
    'type',
    'title',
    'description',
    'appointamentime',
    'time',
    'status',
    'user_id',
    'patient_id',
    'mestamp',
    'keycreated_at',











    ];
// un appumtamento appartiene all utente loggato 
 
   public function user()
{
    return $this->belongto(User::class);
}




   /* protected function $casts = array //converto dati 
    {

        return[
           'date' => date,
           'hour' =>time,
    */
}
