<?php

use App\Models\Cabinet;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function id()
    {
        $id_role = Role::all()->first(function ($item){
            return $item->en_name == 'Patient';
        });
        return $id_role->id;
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('email')->unique();
            $table->date('birthday');
            $table->string('phoneNumber');
            $table->enum('gender', ['Мужчина', 'Женщина']);
            $table->string('password');
            $table->foreignIdFor(Role::class)->default($this->id())->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
