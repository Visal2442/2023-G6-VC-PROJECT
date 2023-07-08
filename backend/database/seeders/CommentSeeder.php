<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $comments=[
            [
                'user_id' => 1,
                'property_id' => 1,
                'comment' => 'This property is amazing!',
            ],
            [
                'user_id' => 2,
                'property_id' => 2,
                'comment' => 'I had a great experience staying here.',
            ]
        ];
        foreach ($comments as $comment){
            Comment::create($comment);
        }
    }
}
