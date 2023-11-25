<?php

use Illuminate\Support\Facades\DB;

function myEvent()
{
    return DB::table('event')->where('id_event', 1)->get()->first();
}