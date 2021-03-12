<?php
namespace DummyNamespace;
use Illuminate\Database\Eloquent\Model;
class DummyClass extends Model
{


    protected $table = 'sent';


    protected $fillable =['first_name',];


    protected $hidden = [
        'password',
    ];
}