<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('name');
            $table->string('area');
            $table->string('password');
            $table->boolean('is_environmental_officer')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->timestamps();
        });

        Schema::create('raw_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('brand')->default('');
            $table->boolean('contains_g_e_i_chemical')->default(false);
            $table->boolean('contains_r_e_t_c_chemical')->default(false);
            $table->timestamps();
        });

        Schema::create('chemicals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('raw_material_id')->constrained();
            $table->string('name');
            $table->decimal('percentage', 3, 2, true)->default(0);
            $table->string('cas_number')->unique()->nullable();
            $table->boolean('is_g_e_i')->default(false);
            $table->boolean('is_r_e_t_c')->default(false);
            $table->timestamps();
        });


        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('symbol')->unique();
            $table->timestamps();
        });

        Schema::create('factors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('value');
            $table->string('units');
            $table->date('emission_date');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('g_e_i_chemical_classifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('g_e_i_chemicals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('g_e_i_chemical_classification_id')->constrained();
            $table->string('name');
            $table->double('cas_number')->unique();
            $table->double('ashrae')->unique();
            $table->timestamps();
        });

        Schema::create('r_e_t_c_chemicals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('cas_number')->unique();
            $table->unsignedInteger('manufacturing_umbral')->default(0);
            $table->unsignedInteger('emission_transfer_umbral')->default(0);
            $table->timestamps();
        });



        //TODO pivotes, unidades, constrains
        //TODO Pivotes: areas-quimicos

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('chemicals');
        Schema::dropIfExists('raw_materials');
        Schema::dropIfExists('factors');
        Schema::dropIfExists('units');
        Schema::dropIfExists('g_e_i_chemicals');
        Schema::dropIfExists('g_e_i_chemicals');
        Schema::dropIfExists('g_e_i_chemical_classifications');
        Schema::dropIfExists('r_e_t_c_chemicals');
    }
};
