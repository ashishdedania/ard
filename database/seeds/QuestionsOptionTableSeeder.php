<?php

use Carbon\Carbon as Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsOptionTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    use DisableForeignKeys,
        TruncateTable;

    public function run() {
        $this->disableForeignKeys();
        $this->truncate('question_option');
        $questions = [
            // Sadness
            [
                'question_id' => 1,
                'option' => 'I do not feel sad.',
                'marks' => 0,
            ],
            [
                'question_id' => 1,
                'option' => 'I feel sad much of the time.',
                'marks' => 1,
            ],
            [
                'question_id' => 1,
                'option' => 'I am sad all the time.',
                'marks' => 2,
            ],
            [
                'question_id' => 1,
                'option' => "I am so sad or unhappy that i can't stand it.",
                'marks' => 3,
            ],
            // Pessimism
            [
                'question_id' => 2,
                'option' => "I am not discouraged about my future.",
                'marks' => 0,
            ],
            [
                'question_id' => 2,
                'option' => "I feel more discouraged about my future that I used to be.",
                'marks' => 1,
            ],
            [
                'question_id' => 2,
                'option' => "I do not expect things to work out for me.",
                'marks' => 2,
            ],
            [
                'question_id' => 2,
                'option' => "I feel my future is hopeless and will only get worse.",
                'marks' => 3,
            ],
            // Past Failure
            [
                'question_id' => 3,
                'option' => "I do not feel like a failure",
                'marks' => 0,
            ],
            [
                'question_id' => 3,
                'option' => "I have failed more than I should have",
                'marks' => 1,
            ],
            [
                'question_id' => 3,
                'option' => "As I look back, I see a lot of failures",
                'marks' => 2,
            ],
            [
                'question_id' => 3,
                'option' => "I feel I am a total failure as a person",
                'marks' => 3,
            ],
            
            // Loss of Pleasure
            [
                'question_id' => 4,
                'option' => "I get as much Pleasure as I ever did from the things I enjoy",
                'marks' => 0,
            ],
            [
                'question_id' => 4,
                'option' => "I don’t enjoy things as much as I used to",
                'marks' => 1,
            ],
            [
                'question_id' => 4,
                'option' => "I get very little pleasure from the things I used to enjoy",
                'marks' => 2,
            ],
            [
                'question_id' => 4,
                'option' => "I can't get any pleasure from the things I used to enjoy",
                'marks' => 3,
            ],
            
            // Guilty Feelings
            [
                'question_id' => 5,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 5,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 5,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 5,
                'option' => "Often",
                'marks' => 3,
            ],
            
            // Punishmnet Feelings
            [
                'question_id' => 6,
                'option' => "I don’t feel I am being punished",
                'marks' => 0,
            ],
            [
                'question_id' => 6,
                'option' => "I feel I may be punished",
                'marks' => 1,
            ],
            [
                'question_id' => 6,
                'option' => "I expect to be punished",
                'marks' => 2,
            ],
            [
                'question_id' => 6,
                'option' => "I feel I am being punished",
                'marks' => 3,
            ],
            
            // Self-Dislike
            [
                'question_id' => 7,
                'option' => "I feel the same about myself as ever",
                'marks' => 0,
            ],
            [
                'question_id' => 7,
                'option' => "I have lost confidence in myself",
                'marks' => 1,
            ],
            [
                'question_id' => 7,
                'option' => "I am disappointed in myself",
                'marks' => 2,
            ],
            [
                'question_id' => 7,
                'option' => "I dislike myself",
                'marks' => 3,
            ],
            // Self-Criticalness
            [
                'question_id' => 8,
                'option' => "I don’t criticize or blame myself more than usual",
                'marks' => 0,
            ],
            [
                'question_id' => 8,
                'option' => "I am more critical of myself than I used to be",
                'marks' => 1,
            ],
            [
                'question_id' => 8,
                'option' => "I criticize myself for all my faults",
                'marks' => 2,
            ],
            [
                'question_id' => 8,
                'option' => "I blame myself for everything bad that happens",
                'marks' => 3,
            ],
            // Suicidal Thoughts or Wishes
            [
                'question_id' => 9,
                'option' => "I don’t have any thoughts of killing myself",
                'marks' => 0,
            ],
            [
                'question_id' => 9,
                'option' => "I have thoughts of killing myself, but I would not carry them out",
                'marks' => 1,
            ],
            [
                'question_id' => 9,
                'option' => "I would like to kill myself",
                'marks' => 2,
            ],
            [
                'question_id' => 9,
                'option' => "I would kill myself if I had the chance",
                'marks' => 3,
            ],
            // Crying
            [
                'question_id' => 10,
                'option' => "I don’t cry anymore than I used to",
                'marks' => 0,
            ],
            [
                'question_id' => 10,
                'option' => "I cry more than I used to",
                'marks' => 1,
            ],
            [
                'question_id' => 10,
                'option' => "I cry over very little things",
                'marks' => 2,
            ],
            [
                'question_id' => 10,
                'option' => "I feel like crying,but i can't",
                'marks' => 3,
            ],
            // Agitation
            [
                'question_id' => 11,
                'option' => "I am no more restless or wound up than usual",
                'marks' => 0,
            ],
            [
                'question_id' => 11,
                'option' => "I am so restless or aginated that it's hard to stay still ",
                'marks' => 1,
            ],
            [
                'question_id' => 11,
                'option' => "I am so restless or aginated that I have to keep moving or doing something",
                'marks' => 2,
            ],
            // Loss of Interest 
            [
                'question_id' => 12,
                'option' => "I have not lost interest in other people or activities",
                'marks' => 0,
            ],
            [
                'question_id' => 12,
                'option' => "I am less interested in other people or things than before",
                'marks' => 1,
            ],
            [
                'question_id' => 12,
                'option' => "I have lost most of my interest in other people or things",
                'marks' => 2,
            ],
            [
                'question_id' => 12,
                'option' => "It's hard to get interested in anything.",
                'marks' => 3,
            ],
            //Indecisiveness
            [
                'question_id' => 13,
                'option' => "I make decisions about as well as ever",
                'marks' => 0,
            ],
            [
                'question_id' => 13,
                'option' => "I fint it more difficult to make decision than usual",
                'marks' => 1,
            ],
            [
                'question_id' => 13,
                'option' => "I have much grater difficulty in making decisions than I used to",
                'marks' => 2,
            ],
            [
                'question_id' => 13,
                'option' => "I have trouble making any decisions",
                'marks' => 3,
            ],
            //Worthlessness
            [
                'question_id' => 14,
                'option' => "I do not feel I am worthless",
                'marks' => 0,
            ],
            [
                'question_id' => 14,
                'option' => "I don't consider myself as worthwhile ans useful as I used to",
                'marks' => 1,
            ],
            [
                'question_id' => 14,
                'option' => "I feel more worthless as comapred to other people",
                'marks' => 2,
            ],
            [
                'question_id' => 14,
                'option' => "I feel utterly worthless",
                'marks' => 3,
            ],
            //Loss of Energy
            [
                'question_id' => 15,
                'option' => "I have as much enery as ever",
                'marks' => 0,
            ],
            [
                'question_id' => 15,
                'option' => "I have less enery than I used to have",
                'marks' => 1,
            ],
            [
                'question_id' => 15,
                'option' => "I don't have enough enery to do very much ",
                'marks' => 2,
            ],
            [
                'question_id' => 15,
                'option' => "I don't have enough eneryto do anything",
                'marks' => 3,
            ],

            //Change in Sleeping Pattern
            [
                'question_id' => 16,
                'option' => "I have not experienced anu change in my sleeping pattern",
                'marks' => 0,
            ],
            [
                'question_id' => 16,
                'option' => "I sleep somwhat more than usual ",
                'marks' => 1,
            ],
            [
                'question_id' => 16,
                'option' => "I sleep somwhat less than usual ",
                'marks' => 1,
            ],
            [
                'question_id' => 16,
                'option' => "I sleep a lot more than usual ",
                'marks' => 2,
            ],
            [
                'question_id' => 16,
                'option' => "I sleep a lot less than usual ",
                'marks' => 2    ,
            ],
            [
                'question_id' => 16,
                'option' => "I sleep most of the day ",
                'marks' => 3,
            ],
            [
                'question_id' => 16,
                'option' => "I wake up 1-2 hours early and can't get back to sleep ",
                'marks' => 1,
            ],
            //Irritability
            [
                'question_id' => 17,
                'option' => "I am no more irritable than usual ",
                'marks' => 0,
            ],
            [
                'question_id' => 17,
                'option' => "I am more irritable than usual",
                'marks' => 1,
            ],
            [
                'question_id' => 17,
                'option' => "I am much more irritable than usual ",
                'marks' => 2,
            ],
            [
                'question_id' => 17,
                'option' => "I am irritable all the time",
                'marks' => 3,
            ],
            //Change in Appetite
             [
                'question_id' => 18,
                'option' => "I have not experienced anu change in my appetite",
                'marks' => 0,
            ],
            [
                'question_id' => 18,
                'option' => "My appetite is somwhat less than usual ",
                'marks' => 1,
            ],
            [
                'question_id' => 18,
                'option' => "My appetite is somwhat grater than usual ",
                'marks' => 1,
            ],
            [
                'question_id' => 18,
                'option' => "My appetite is much less than before ",
                'marks' => 2,
            ],
            [
                'question_id' => 18,
                'option' => "My appetite is much grater than usual  ",
                'marks' => 2    ,
            ],
            [
                'question_id' => 18,
                'option' => "I have no appetite at all ",
                'marks' => 3,
            ],
            [
                'question_id' => 18,
                'option' => "I crave food all the time ",
                'marks' => 1,
            ],
            //Concentartion Difficulty
            [
                'question_id' => 19,
                'option' => "I can concentrate as well as ever ",
                'marks' => 0,
            ],
            [
                'question_id' => 19,
                'option' => "I can't concentrate as well as usual ",
                'marks' => 1,
            ],
            [
                'question_id' => 19,
                'option' => "It's hard to keep my ming on anything for very long ",
                'marks' => 2,
            ],
            [
                'question_id' => 19,
                'option' => "I find i can't concentrate on anything",
                'marks' => 3,
            ],

            //Tiredness of Fatigue
            [
                'question_id' => 20,
                'option' => "I am no more tired or fatigued than usual ",
                'marks' => 0,
            ],
            [
                'question_id' => 20,
                'option' => "I get more tired or fatigued more easily than usual ",
                'marks' => 1,
            ],
            [
                'question_id' => 20,
                'option' => "I am too tired or fatigued to do a lot of things I used to do",
                'marks' => 2,
            ],
            [
                'question_id' => 20,
                'option' => "I am too tired or fatigued to do most of the things I used to do",
                'marks' => 3,
            ],
            //Loss of Intrest in Sex
            [
                'question_id' => 21,
                'option' => "I have not noticed ay recent changes in my interest in sex ",
                'marks' => 0,
            ],
            [
                'question_id' => 21,
                'option' => "I am less interest in sex than I used to be",
                'marks' => 1,
            ],
            [
                'question_id' => 21,
                'option' => "I am much less interest in sex now",
                'marks' => 2,
            ],
            [
                'question_id' => 21,
                'option' => "I have lost interest in sex completely",
                'marks' => 3,
            ],

            //* Core
            //I have felt terribly alone and isolated
            [
                'question_id' => 22,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 22,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 22,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 22,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 22,
                'option' => "Most or all the time",
                'marks' => 4,
            ],

            //I have felt tense, anxious or nervous
            [
                'question_id' => 23,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 23,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 23,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 23,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 23,
                'option' => "Most or all the time",
                'marks' => 4,
            ],
            //I have felt I have someone to turn to for support when needed
            [
                'question_id' => 24,
                'option' => "Not at all",
                'marks' => 4,
            ],
            [
                'question_id' => 24,
                'option' => "Only Occasionally",
                'marks' => 3,
            ],
            [
                'question_id' => 24,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 24,
                'option' => "Often",
                'marks' => 1,
            ],
            [
                'question_id' => 24,
                'option' => "Most or all the time",
                'marks' => 0,
            ],
            //I have felt OK about myself
            [
                'question_id' => 25,
                'option' => "Not at all",
                'marks' => 4,
            ],
            [
                'question_id' => 25,
                'option' => "Only Occasionally",
                'marks' => 3,
            ],
            [
                'question_id' => 25,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 25,
                'option' => "Often",
                'marks' => 1,
            ],
            [
                'question_id' => 25,
                'option' => "Most or all the time",
                'marks' => 0,
            ],

            //I have felt totally lacking in energy and enthusiasm
            [
                'question_id' => 26,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 26,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 26,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 26,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 26,
                'option' => "Most or all the time",
                'marks' => 4,
            ],
            //I have been physically violent to others
            [
                'question_id' => 26,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 27,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 27,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 27,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 27,
                'option' => "Most or all the time",
                'marks' => 4,
            ],

            //I have felt able to cope when things go wrong
            [
                'question_id' => 28,
                'option' => "Not at all",
                'marks' => 4,
            ],
            [
                'question_id' => 28,
                'option' => "Only Occasionally",
                'marks' => 3,
            ],
            [
                'question_id' => 28,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 28,
                'option' => "Often",
                'marks' => 1,
            ],
            [
                'question_id' => 28,
                'option' => "Most or all the time",
                'marks' => 0,
            ],

            //I have been troubled by aches, pains or other physical problems
            [
                'question_id' => 29,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 29,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 29,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 29,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 29,
                'option' => "Most or all the time",
                'marks' => 4,
            ],

            //I have thought of hurting myself
            [
                'question_id' => 30,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 30,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 30,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 30,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 30,
                'option' => "Most or all the time",
                'marks' => 4,
            ],
            // Talking to people has felt too much for me
            [
                'question_id' => 31,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 31,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 31,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 31,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 31,
                'option' => "Most or all the time",
                'marks' => 4,
            ],
            //Tension and anxiety have prevented me doing important things
            [
                'question_id' => 32,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 32,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 32,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 32,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 32,
                'option' => "Most or all the time",
                'marks' => 4,
            ],
            //I have been happy with the things I have done
            [
                'question_id' => 33,
                'option' => "Not at all",
                'marks' => 4,
            ],
            [
                'question_id' => 33,
                'option' => "Only Occasionally",
                'marks' => 3,
            ],
            [
                'question_id' => 33,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 33,
                'option' => "Often",
                'marks' => 1,
            ],
            [
                'question_id' => 33,
                'option' => "Most or all the time",
                'marks' => 0,
            ],

            //I have been disturbed by unwanted thoughts and feelings
            [
                'question_id' => 34,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 34,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 34,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 34,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 34,
                'option' => "Most or all the time",
                'marks' => 4,
            ],

            // I have felt like crying
            [
                'question_id' => 35,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 35,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 35,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 35,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 35,
                'option' => "Most or all the time",
                'marks' => 4,
            ],
            //I have felt panic or terror
            [
                'question_id' => 36,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 36,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 36,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 36,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 36,
                'option' => "Most or all the time",
                'marks' => 4,
            ],
            //I made plans to end my life
            [
                'question_id' => 37,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 37,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 37,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 37,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 37,
                'option' => "Most or all the time",
                'marks' => 4,
            ],
            //I have felt overwhelmed by my problems
            [
                'question_id' => 38,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 38,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 38,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 38,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 38,
                'option' => "Most or all the time",
                'marks' => 4,
            ],
            //I have had difficulty getting to sleep or staying asleep
            [
                'question_id' => 39,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 39,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 39,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 39,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 39,
                'option' => "Most or all the time",
                'marks' => 4,
            ],
            //I have felt warmth or affection for someone
            [
                'question_id' => 40,
                'option' => "Not at all",
                'marks' => 4,
            ],
            [
                'question_id' => 40,
                'option' => "Only Occasionally",
                'marks' => 3,
            ],
            [
                'question_id' => 40,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 40,
                'option' => "Often",
                'marks' => 1,
            ],
            [
                'question_id' => 40,
                'option' => "Most or all the time",
                'marks' => 0,
            ],
            //My problems have been impossible to put to one side
            [
                'question_id' => 41,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 41,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 41,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 41,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 41,
                'option' => "Most or all the time",
                'marks' => 4,
            ],

            //I have been able to do most things I needed to do
            [
                'question_id' => 42,
                'option' => "Not at all",
                'marks' => 4,
            ],
            [
                'question_id' => 42,
                'option' => "Only Occasionally",
                'marks' => 3,
            ],
            [
                'question_id' => 42,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 42,
                'option' => "Often",
                'marks' => 1,
            ],
            [
                'question_id' => 42,
                'option' => "Most or all the time",
                'marks' => 0,
            ],

            //I have threatened or intimidated another person
            [
                'question_id' => 43,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 43,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 43,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 43,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 43,
                'option' => "Most or all the time",
                'marks' => 4,
            ],

            //I have felt despairing or hopeless
            [
                'question_id' => 44,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 44,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 44,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 44,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 44,
                'option' => "Most or all the time",
                'marks' => 4,
            ],
            //I have thought it would be better if I were dead
            [
                'question_id' => 45,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 45,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 45,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 45,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 45,
                'option' => "Most or all the time",
                'marks' => 4,
            ],

            //I have felt criticised by other people
            [
                'question_id' => 46,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 46,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 46,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 46,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 46,
                'option' => "Most or all the time",
                'marks' => 4,
            ],

            //I have thought I have no friends
            [
                'question_id' => 47,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 47,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 47,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 47,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 47,
                'option' => "Most or all the time",
                'marks' => 4,
            ],
            //I have felt unhappy
            [
                'question_id' => 48,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 48,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 48,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 48,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 48,
                'option' => "Most or all the time",
                'marks' => 4,
            ],

            //Unwanted images or memories have been distressing me
            [
                'question_id' => 49,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 49,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 49,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 49,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 49,
                'option' => "Most or all the time",
                'marks' => 4,
            ],

            //I have been irritable when with other people.
            [
                'question_id' => 50,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 50,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 50,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 50,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 50,
                'option' => "Most or all the time",
                'marks' => 4,
            ],

            // I have thought I am to blame for my problems and difficulties
            [
                'question_id' => 51,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 51,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 51,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 51,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 51,
                'option' => "Most or all the time",
                'marks' => 4,
            ],

            //I have felt optimistic about my future
            [
                'question_id' => 52,
                'option' => "Not at all",
                'marks' => 4,
            ],
            [
                'question_id' => 52,
                'option' => "Only Occasionally",
                'marks' => 3,
            ],
            [
                'question_id' => 52,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 52,
                'option' => "Often",
                'marks' => 1,
            ],
            [
                'question_id' => 52,
                'option' => "Most or all the time",
                'marks' => 0,
            ],

            //I have achieved the things I wanted to
            [
                'question_id' => 53,
                'option' => "Not at all",
                'marks' => 4,
            ],
            [
                'question_id' => 53,
                'option' => "Only Occasionally",
                'marks' => 3,
            ],
            [
                'question_id' => 53,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 53,
                'option' => "Often",
                'marks' => 1,
            ],
            [
                'question_id' => 53,
                'option' => "Most or all the time",
                'marks' => 0,
            ],

            //I have felt humiliated or shamed by other people
            [
                'question_id' => 54,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 54,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 54,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 54,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 54,
                'option' => "Most or all the time",
                'marks' => 4,
            ],

            //I have hurt myself physically or taken dangerous risks with my health
            [
                'question_id' => 55,
                'option' => "Not at all",
                'marks' => 0,
            ],
            [
                'question_id' => 55,
                'option' => "Only Occasionally",
                'marks' => 1,
            ],
            [
                'question_id' => 55,
                'option' => "Sometimes",
                'marks' => 2,
            ],
            [
                'question_id' => 55,
                'option' => "Often",
                'marks' => 3,
            ],
            [
                'question_id' => 55,
                'option' => "Most or all the time",
                'marks' => 4,
            ],

            //SDQ
            //
            [
                'question_id' => 56,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 56,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 56,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 57,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 57,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 57,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 58,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 58,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 58,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 59,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 59,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 59,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 60,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 60,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 60,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 61,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 61,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 61,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 62,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 62,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 62,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 63,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 63,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 63,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 64,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 64,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 64,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 65,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 65,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 65,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 66,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 66,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 66,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 67,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 67,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 67,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 68,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 68,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 68,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 69,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 69,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 69,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 70,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 70,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 70,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 71,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 71,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 71,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 72,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 72,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 72,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 73,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 73,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 73,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 74,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 74,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 74,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 75,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 75,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 75,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 76,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 76,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 76,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 77,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 77,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 77,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 78,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 78,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 78,
                'option' => "Certainly True",
                'marks' => 2,
            ],
             [
                'question_id' => 79,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 79,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 79,
                'option' => "Certainly True",
                'marks' => 2,
            ],
            [
                'question_id' => 80,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 80,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 80,
                'option' => "Certainly True",
                'marks' => 2,
            ],
            [
                'question_id' => 81,
                'option' => "Not True",
                'marks' => 0,
            ],
            [
                'question_id' => 81,
                'option' => "Somewhat True",
                'marks' => 1,
            ],
            [
                'question_id' => 81,
                'option' => "Certainly True",
                'marks' => 2,
            ],

            //SCARED
            [
                'question_id' => 82,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 82,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 82,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 83,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 83,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 83,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 84,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 84,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 84,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 85,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 85,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 85,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 86,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 86,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 86,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 87,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 87,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 87,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 88,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 88,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 88,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 89,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 89,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 89,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 90,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 90,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 90,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 91,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 91,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 91,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 92,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 92,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 92,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 93,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 93,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 93,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 94,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 94,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 94,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 95,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 95,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 95,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 96,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 96,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 96,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 97,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 97,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 97,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 98,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 98,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 98,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 99,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 99,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 99,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 100,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 100,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 100,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 101,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 101,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 101,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 102,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 102,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 102,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 103,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 103,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 103,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 104,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 104,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 104,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 105,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 105,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 105,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 106,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 106,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 106,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 107,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 107,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 107,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 108,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 108,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 108,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 109,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 109,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 109,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 110,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 110,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 110,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 111,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 111,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 111,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 112,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 112,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 112,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 113,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 113,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 113,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 114,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 114,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 114,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 115,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 115,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 115,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 116,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 116,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 116,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 117,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 117,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 117,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 118,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 118,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 118,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 119,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 119,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 119,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 120,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 120,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 120,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 121,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 121,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 121,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],
            [
                'question_id' => 122,
                'option' => "Not True or Hardly Ever True",
                'marks' => 0,
            ],
            [
                'question_id' => 122,
                'option' => "Somewhat True or Sometimes True",
                'marks' => 1,
            ],
            [
                'question_id' => 122,
                'option' => "Very True of Often True",
                'marks' => 2,
            ],

        ];
        DB::table('question_option')->insert($questions);
        $this->enableForeignKeys();
    }

}
