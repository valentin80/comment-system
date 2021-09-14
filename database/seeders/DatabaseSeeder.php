<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        (new Post(['content' => strip_tags(file_get_contents('http://loripsum.net/api'))]))->save();

        $comment = new Comment(['post_id' => 1, 'parent_id' => null, 'author' => 'Michael', 'content' => strip_tags(Str::limit(file_get_contents('http://loripsum.net/api'), 255))]);
        $comment->save();

        $comment1 = new Comment(['post_id' => 1, 'parent_id' => $comment->id, 'author' => 'Matthew', 'content' => strip_tags(Str::limit(file_get_contents('http://loripsum.net/api'), 255))]);
        $comment1->save();

        $comment2 = new Comment(['post_id' => 1, 'parent_id' => $comment1->id, 'author' => 'Daniela', 'content' => strip_tags(Str::limit(file_get_contents('http://loripsum.net/api'), 255))]);
        $comment2->save();

        $comment3 = new Comment(['post_id' => 1, 'parent_id' => $comment2->id, 'author' => 'Nicholas', 'content' => strip_tags(Str::limit(file_get_contents('http://loripsum.net/api'), 255))]);
        $comment3->save();

        $comment4 = new Comment(['post_id' => 1, 'parent_id' => $comment->id, 'author' => 'Sean', 'content' => strip_tags(Str::limit(file_get_contents('http://loripsum.net/api'), 255))]);
        $comment4->save();

        $comment5 = new Comment(['post_id' => 1, 'parent_id' => $comment->id, 'author' => 'John', 'content' => strip_tags(Str::limit(file_get_contents('http://loripsum.net/api'), 255))]);
        $comment5->save();

        $comment = new Comment(['post_id' => 1, 'parent_id' => null, 'author' => 'Santiago', 'content' => strip_tags(Str::limit(file_get_contents('http://loripsum.net/api'), 255))]);
        $comment->save();

        $comment = new Comment(['post_id' => 1, 'parent_id' => $comment->id, 'author' => 'Jia', 'content' => strip_tags(Str::limit(file_get_contents('http://loripsum.net/api'), 255))]);
        $comment->save();

        $comment = new Comment(['post_id' => 1, 'parent_id' => $comment->id, 'author' => 'Deborah', 'content' => strip_tags(Str::limit(file_get_contents('http://loripsum.net/api'), 255))]);
        $comment->save();

        $comment = new Comment(['post_id' => 1, 'parent_id' => $comment->id, 'author' => 'Diana', 'content' => strip_tags(Str::limit(file_get_contents('http://loripsum.net/api'), 255))]);
        $comment->save();

    }
}
