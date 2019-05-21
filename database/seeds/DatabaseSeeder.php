<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        $this->call(AccessTableSeeder::class);
        $this->call(HistoryTypeTableSeeder::class);
        $this->call(EmailTemplateTypeTableSeeder::class);
        $this->call(EmailTemplatePlaceholderTableSeeder::class);
        $this->call(EmailTemplateTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(QuestionTypeTableSeeder::class);
        $this->call(InterventionsTableSeeder::class);
        $this->call(PsychologicalConditionTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(QuestionsOptionTableSeeder::class);
        $this->call(BehaviourTableSeeder::class);
        $this->call(ScalesTableSeeder::class);
        
        Model::reguard();
    }

}
