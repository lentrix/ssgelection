<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $candidates = [
            [
                'user_id' => 1,
                'position' => 'President',
                'party' => 'Moral Party',
                'tag_line' => 'Matira ang Matibay',
            ],
            [
                'user_id' => 10,
                'position' => 'President',
                'party' => 'Legal Party',
                'tag_line' => 'Ang bumangga giba',
            ],
            [
                'user_id' => 20,
                'position' => 'Vice President',
                'party' => 'Legal Party',
                'tag_line' => 'Let do this',
            ],
            [
                'user_id' => 8,
                'position' => 'Vice President',
                'party' => 'Moral Party',
                'tag_line' => 'When there is smoke, there is fire',
            ],
            [
                'user_id' => 58,
                'position' => 'Senator',
                'party' => 'Moral Party',
                'tag_line' => 'Celebrate Life',
            ],
            [
                'user_id' => 77,
                'position' => 'Senator',
                'party' => 'Moral Party',
                'tag_line' => 'The best is yet to come',
            ],
            [
                'user_id' => 97,
                'position' => 'Senator',
                'party' => 'Moral Party',
                'tag_line' => 'I wake and I sleep',
            ],
            [
                'user_id' => 566,
                'position' => 'Senator',
                'party' => 'Moral Party',
                'tag_line' => 'Once a man, now a woman',
            ],
            [
                'user_id' => 433,
                'position' => 'Senator',
                'party' => 'Moral Party',
                'tag_line' => 'I used to be used',
            ],
            [
                'user_id' => 86,
                'position' => 'Senator',
                'party' => 'Moral Party',
                'tag_line' => 'When the going gets rough',
            ],
        ];

        foreach($candidates as $cand) {
            Candidate::create($cand);
        }
    }
}
