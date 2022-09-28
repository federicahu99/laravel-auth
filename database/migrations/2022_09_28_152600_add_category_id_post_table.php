<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('id');
            //foreign key
            $table->foreign('category_id')->reference('id')->on('categories')->onDelete('set null'); //cancello la categoria ma non i post

            // oppure
            // $table->foreingID('category_id')->nullable()->after('id')->onDelete('set null')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // elimino relazione 
            $table->dropForeign('post_category_id_foreign');
            // elimino la colonna
            $table->dropColumn('column_id');
        });
    }
}