<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert(
            [
                [
                    'name' => 'Suzanne Collins',
                    'biography' => "Suzanne Collins (born August 10, 1962) is an American television writer and author, best known as the author of The New York Times best selling series The Underland Chronicles and The Hunger Games trilogy (which consists of The Hunger Games, Catching Fire, and Mockingjay).",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Anne McCaffrey',
                    'biography' => "Anne Inez McCaffrey (1 April 1926 – 21 November 2011) was an American-born writer who emigrated to Ireland and was best known for the Dragonriders of Pern fantasy series. Early in McCaffrey's 46-year career as a writer, she became the first woman to win a Hugo Award for fiction and the first to win a Nebula Award.",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Peter F. Hamilton',
                    'biography' => "Peter F. Hamilton (born 2 March 1960) is a British author. He is best known for writing space opera. As of the publication of his 10th novel in 2004, his works had sold over 2 million copies worldwide. ",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'J. K. Rowling',
                    'biography' => "oanne Rowling, CH, OBE, FRSL, FRCPE writing under the pen names J. K. Rowling and Robert Galbraith, is a British novelist, screenwriter, and producer who is best known for writing the Harry Potter fantasy series. The books have won multiple awards, and sold more than 400 million copies.",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Ursula Le Guin',
                    'biography' => "Ursula Kroeber Le Guin was an American novelist. She worked mainly in the genres of fantasy and science fiction. She also authored children's books, short stories, poetry, and essays. Her writing was first published in the 1960s and often depicted futuristic or imaginary alternative worlds in politics, the natural environment, gender, religion, sexuality, and ethnography.",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Terry Pratchett',
                    'biography' => "Sir Terence David John Pratchett OBE (28 April 1948 – 12 March 2015), better known as Terry Pratchett, was an English author of fantasy novels, especially comical works. He is best known for his Discworld series of 41 novels.",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
