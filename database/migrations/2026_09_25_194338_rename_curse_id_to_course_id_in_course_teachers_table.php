<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * MariaDB 10.4 no soporta ALTER TABLE ... RENAME COLUMN (nuevo en 10.5.2),
     * asi que se usa CHANGE, que ademas obliga a recrear el indice unico y la
     * llave foranea porque los dos derivan su nombre del nombre de la columna.
     */
    public function up(): void
    {
        if (!Schema::hasColumn('course_teachers', 'curse_id')) {
            return;
        }

        DB::statement('ALTER TABLE `course_teachers` DROP FOREIGN KEY `course_teachers_curse_id_foreign`');
        DB::statement('ALTER TABLE `course_teachers` DROP INDEX `course_teachers_curse_id_unique`');
        DB::statement('ALTER TABLE `course_teachers` CHANGE `curse_id` `course_id` BIGINT UNSIGNED NULL');
        DB::statement('ALTER TABLE `course_teachers` ADD UNIQUE `course_teachers_course_id_unique` (`course_id`)');
        DB::statement('ALTER TABLE `course_teachers` ADD CONSTRAINT `course_teachers_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE SET NULL');
    }

    public function down(): void
    {
        if (!Schema::hasColumn('course_teachers', 'course_id')) {
            return;
        }

        DB::statement('ALTER TABLE `course_teachers` DROP FOREIGN KEY `course_teachers_course_id_foreign`');
        DB::statement('ALTER TABLE `course_teachers` DROP INDEX `course_teachers_course_id_unique`');
        DB::statement('ALTER TABLE `course_teachers` CHANGE `course_id` `curse_id` BIGINT UNSIGNED NULL');
        DB::statement('ALTER TABLE `course_teachers` ADD UNIQUE `course_teachers_curse_id_unique` (`curse_id`)');
        DB::statement('ALTER TABLE `course_teachers` ADD CONSTRAINT `course_teachers_curse_id_foreign` FOREIGN KEY (`curse_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE SET NULL');
    }
};
