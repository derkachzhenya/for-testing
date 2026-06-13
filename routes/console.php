<?php

use Illuminate\Support\Facades\Schedule;

// Prevent overlapping scheduled runs
Schedule::command('bookings:sync')
    ->everyMinute()
    ->withoutOverlapping();



























    