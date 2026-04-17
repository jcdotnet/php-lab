<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ExperienceType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('experience_type_id');
            $table->foreignIdFor(ExperienceType::class);
			$table->string('title');
			$table->string('company')->nullable();			
			$table->text('description');
			$table->string('url')->nullable();
			$table->date('start');
			$table->date('end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
