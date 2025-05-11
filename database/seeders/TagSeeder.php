<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        // Delete all existing tags
        Tag::query()->delete();

        // English tag list
        $tags = [
            'Mathematics', 'Computer Science', 'Physics', 'Chemistry', 'Biology',
            'English', 'Romanian', 'French', 'Geography', 'History',
            'Economics', 'Logic', 'Psychology', 'Civics', 'C++ Programming',
            'Python Programming', 'Java', 'HTML/CSS', 'JavaScript', 'React',
            'Laravel', 'PHP', 'MySQL', 'Operating Systems', 'Networks',
            'Machine Learning', 'Artificial Intelligence', 'Web Development', 'Android', 'iOS',
            'Technical Drawing', 'Music Education', 'Physical Education', 'Personal Finance'
        ];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
