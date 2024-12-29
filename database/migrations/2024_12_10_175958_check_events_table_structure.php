<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        $columns = Schema::getColumnListing('events');
        var_dump($columns);
    }

    public function down()
    {
        //
    }
};