<?php

use Illuminate\Database\Eloquent\Model;

// $fillable vs $guarded

class User extends Model
{
    // $fillable
    protected $fillable = ['name', 'email'];

    // Safe by default
    // Needs manual updates

    // ----------

    // $guarded
    protected $guarded = [];

    // Less code
    // Faster dev
    // Requires validation
}