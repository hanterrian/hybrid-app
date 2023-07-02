<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('category_filter_items', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Category::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\FilterOption::class)->constrained()->cascadeOnDelete();

            $table->string('value')->nullable();
            $table->json('value_list')->nullable();
            $table->string('min_value')->nullable();
            $table->string('max_value')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_filter_items');
    }
};
