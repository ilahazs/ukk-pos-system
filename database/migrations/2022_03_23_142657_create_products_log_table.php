e<?php

    use App\Models\Product;
    use App\Models\User;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('log_products', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(User::class, 'user_id');
                $table->string('activity')->nullable();
                $table->foreignIdFor(Product::class, 'target_id');
                $table->dateTime('time')->nullable();
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
            Schema::dropIfExists('log_products');
        }
    };
