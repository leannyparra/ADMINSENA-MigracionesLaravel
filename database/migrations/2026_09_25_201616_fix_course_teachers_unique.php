<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Los UNIQUE individuales limitaban a un solo instructor por curso y a un
     * solo curso por instructor, lo que impedia usar la tabla como pivote.
     *
     * MariaDB/InnoDB no permite tirar un indice que una llave foranea usa
     * (error 1553), asi que hay que tirar las FK, cambiar los indices y
     * volver a crearlas. El indice compuesto (course_id, teacher_id) ya
     * cubre la FK de course_id porque course_id es su columna mas a la
     * izquierda, por eso solo hace falta un indice suelto para teacher_id.
     */
    public function up(): void
    {
        if (!Schema::hasIndex('course_teachers', ['course_id', 'teacher_id'], 'unique')) {
            DB::statement('ALTER TABLE `course_teachers` DROP FOREIGN KEY `course_teachers_course_id_foreign`');
            DB::statement('ALTER TABLE `course_teachers` DROP FOREIGN KEY `course_teachers_teacher_id_foreign`');
            DB::statement('ALTER TABLE `course_teachers` DROP INDEX `course_teachers_course_id_unique`');
            DB::statement('ALTER TABLE `course_teachers` DROP INDEX `course_teachers_teacher_id_unique`');
            DB::statement('ALTER TABLE `course_teachers` ADD UNIQUE `course_teachers_course_id_teacher_id_unique` (`course_id`, `teacher_id`)');
            DB::statement('ALTER TABLE `course_teachers` ADD INDEX `course_teachers_teacher_id_index` (`teacher_id`)');
            DB::statement('ALTER TABLE `course_teachers` ADD CONSTRAINT `course_teachers_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE SET NULL');
            DB::statement('ALTER TABLE `course_teachers` ADD CONSTRAINT `course_teachers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL');
        }
    }

    public function down(): void
    {
        if (Schema::hasIndex('course_teachers', ['course_id', 'teacher_id'], 'unique')) {
            DB::statement('ALTER TABLE `course_teachers` DROP FOREIGN KEY `course_teachers_course_id_foreign`');
            DB::statement('ALTER TABLE `course_teachers` DROP FOREIGN KEY `course_teachers_teacher_id_foreign`');
            DB::statement('ALTER TABLE `course_teachers` DROP INDEX `course_teachers_teacher_id_index`');
            DB::statement('ALTER TABLE `course_teachers` DROP INDEX `course_teachers_course_id_teacher_id_unique`');
            DB::statement('ALTER TABLE `course_teachers` ADD UNIQUE `course_teachers_course_id_unique` (`course_id`)');
            DB::statement('ALTER TABLE `course_teachers` ADD UNIQUE `course_teachers_teacher_id_unique` (`teacher_id`)');
            DB::statement('ALTER TABLE `course_teachers` ADD CONSTRAINT `course_teachers_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE SET NULL');
            DB::statement('ALTER TABLE `course_teachers` ADD CONSTRAINT `course_teachers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL');
        }
    }
};
