<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddCompanyIdUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::table('users', function(Blueprint $table)
    {
        $table->integer('company_id')->unsigned()->after('id');
        $table->foreign('company_id')->references('id')->on('companies');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('users', function(Blueprint $table)
    {

        // $table->dropForeign('todolists_category_id_foreign');
        $table->dropColumn('company_id');
        $table->dropForeign('company_id');

    });
    }
}
