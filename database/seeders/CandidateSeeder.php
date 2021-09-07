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
                'user_id' => 1725,
                'position' => 'President',
                'party' => 'Legal Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1481,
                'position' => 'President',
                'party' => 'Moral Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1737,
                'position' => 'Vice President',
                'party' => 'Moral Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1513,
                'position' => 'Vice President',
                'party' => 'Legal Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1438,
                'position' => 'Senator',
                'party' => 'Moral Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 336,
                'position' => 'Senator',
                'party' => 'Moral Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 364,
                'position' => 'Senator',
                'party' => 'Moral Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1698,
                'position' => 'Senator',
                'party' => 'Moral Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 805,
                'position' => 'Senator',
                'party' => 'Moral Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 452,
                'position' => 'Senator',
                'party' => 'Moral Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1679,
                'position' => 'Senator',
                'party' => 'Legal Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1643,
                'position' => 'Senator',
                'party' => 'Legal Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1526,
                'position' => 'Senator',
                'party' => 'Legal Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1465,
                'position' => 'Senator',
                'party' => 'Legal Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 457,
                'position' => 'Senator',
                'party' => 'Legal Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1650,
                'position' => 'Senator',
                'party' => 'Legal Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1153,
                'position' => 'Congressman',
                'party' => 'Legal Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 591,
                'position' => 'Congressman',
                'party' => 'Legal Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 496,
                'position' => 'Congressman',
                'party' => 'Legal Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1308,
                'position' => 'Congressman',
                'party' => 'Legal Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1520,
                'position' => 'Congressman',
                'party' => 'Legal Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1440,
                'position' => 'Congressman',
                'party' => 'Moral Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 795,
                'position' => 'Congressman',
                'party' => 'Moral Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1301,
                'position' => 'Congressman',
                'party' => 'Moral Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 586,
                'position' => 'Congressman',
                'party' => 'Moral Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1686,
                'position' => 'Congressman',
                'party' => 'Moral Party',
                'tag_line' => '',
            ],
            [
                'user_id' => 1013,
                'position' => 'Congressman',
                'party' => 'Moral Party',
                'tag_line' => '',
            ],

        ];

        foreach($candidates as $cand) {
            Candidate::create($cand);
        }
    }
}
