<?php
  
  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;
  
  return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::table('users', function (Blueprint $table) {
        // Drop unnecessary columns
        $table->dropColumn('name');
        $table->dropColumn('email_verified_at');
        
        // Add new columns
        $table->string('full_name')->after('id');
        $table->string('phone_number')->after('full_name');
        $table->string('address')->after('phone_number');
        $table->date('birth_date')->after('address');
        $table->enum('gender', ['male', 'female'])->after('birth_date');
      });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table('users', function (Blueprint $table) {
        // Re-add dropped columns
        $table->string('name')->after('id');
        $table->timestamp('email_verified_at')->nullable()->after('name');
        
        // Drop new columns
        $table->dropColumn('full_name');
        $table->dropColumn('phone_number');
        $table->dropColumn('address');
        $table->dropColumn('birth_date');
        $table->dropColumn('gender');
      });
    }
  };
