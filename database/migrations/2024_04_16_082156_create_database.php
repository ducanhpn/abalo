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
        Schema::create('ab_user', function (Blueprint $table) {
            $table->id()
                ->comment('Primärschlüssel');
            $table->string('ab_name', 80)->unique(true)->nullable(false)
                ->comment('name');
            $table->string('ab_password', 200)->nullable(false)
                ->comment('Passwort');
            $table->string('ab_mail', 200)->nullable(false)->unique(true)
                ->comment('E-mail-Adresse');
        });

        Schema::create('ab_article', function (Blueprint $table) {
            $table->id()
                ->comment('Primärschlüssel');
            $table->string('ab_name', 80)->nullable(false)
                ->comment('Name');
            $table->integer('ab_price')->nullable(false)
                ->comment('Preis in Cent');
            $table->string('ab_description',1000)->nullable(false)
                ->comment('Beschreibung, die die Güte oder die Beschaffenheit näher darstellt. Wird durch den „Ersteller“ (ab_user) gepflegt');
            $table->bigInteger('ab_creator_id')->unsigned()->nullable(false)
                ->comment('Referenz auf den/die Nutzer:in, der den Artikel erstellt hat und verkaufen möchte');
            $table->timestamp('ab_createdate')->nullable(false)
                ->comment('Zeitpunkt der Erstellung des Artikels');
        });

        Schema::create('ab_articlecategory', function (Blueprint $table) {
            $table->id()
                ->comment('Primärschlüssel');
            $table->string('ab_name', 100)->nullable(false)->unique(true)
                ->comment('Name');
            $table->string('ab_description',1000)->nullable(true)
                ->comment('Beschreibung');
            $table->bigInteger('ab_parent')->unsigned()->nullable(true)
                ->comment('Referenz auf die mögliche Elternkategorie.
                                    Artikelkategorien sind hierarchisch organisiert. Eine Kategorie
                                    kann beliebig viele Kind Kategorien haben. Eine Kategorie kann
                                    nur eine Elternkategorie besitzen.
                                    NULL, falls es keine Elternkategorie gibt und es sich um eine
                                    Wurzelkategorie handelt.');
        });

        Schema::create('ab_article_has_category', function (Blueprint $table) {
            $table->id()
                ->comment('Primaschlüssel');
            $table->bigInteger('ab_category_id')->unsigned()->nullable(false)->unique(false)
                ->comment('Referenz auf eine Artikelkategorie');
            $table->bigInteger('ab_article_id')->unsigned()->nullable(false)->unique(false)
                ->comment('Referenz auf einen Artikel');
            $table->unique(['ab_category_id', 'ab_article_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ab_user');
        Schema::dropIfExists('ab_article');
        Schema::dropIfExists('ab_articlecategory');
        Schema::dropIfExists('ab_article_has_category');
    }
};
