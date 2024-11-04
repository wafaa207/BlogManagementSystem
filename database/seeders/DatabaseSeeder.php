<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostVisit;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'writer_without_approval']);
        $role3 = Role::create(['name' => 'writer_with_approval']);

        $user->assignRole($role1);
        
        $post = Post::create([
            'user_id' => $user->id,
            'title' => 'The Power of Daily Sports: Energize Your Life',
            'content' => "In an age dominated by technology and sedentary lifestyles, engaging in daily sports and physical activities has never been more crucial. Not only do these activities contribute to physical health, but they also play a significant role in mental well-being and social interaction.\n\n
                        Physical Benefits: Participating in daily sports helps maintain a healthy body weight, builds muscle, and improves cardiovascular health. Regular physical activity increases metabolism, which can prevent obesity and related health issues. Moreover, sports enhance flexibility, strength, and endurance, allowing individuals to perform everyday tasks with greater ease.\n\n
                        Mental Wellness: Daily sports are not just about physical fitness; they are a powerful tool for mental health. Engaging in sports releases endorphins, commonly known as the “feel-good hormones.” This natural boost can reduce stress, alleviate anxiety, and combat depression. Furthermore, physical activity can improve focus, memory, and cognitive function, leading to better productivity in all areas of life.\n\n
                        Social Connections: Sports often foster a sense of community and camaraderie. Whether it’s joining a local soccer team, participating in group fitness classes, or playing a friendly game of basketball, engaging in sports provides opportunities to connect with others. These interactions can lead to friendships, support systems, and a sense of belonging, which are vital for emotional health.\n\n
                        Making Sports a Daily Habit: Incorporating sports into your daily routine doesn’t have to be a chore. Start small by setting aside just 30 minutes a day for physical activity. Whether it’s a brisk walk, a jog, a home workout, or playing a sport you love, the key is consistency. Find activities you enjoy, set achievable goals, and gradually increase the intensity or duration of your workouts.",
            'status' => 'published',
        ]);

        Comment::create([
            'post_id' => $post->id,
            'user_id' => $user->id,
            'content' => 'Great post!!',
            'reports' => 0,
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'The Benefits of Team Sports',
            'content' => "Team sports provide numerous benefits that extend beyond just physical fitness. Engaging in sports like soccer, basketball, or volleyball encourages teamwork and collaboration, helping individuals develop valuable interpersonal skills.\n\n
                            Communication: Playing in a team enhances communication skills as players must constantly interact and strategize together. This fosters strong relationships and promotes a sense of belonging.\n\n
                            Discipline: Team sports require a commitment to practice and improvement. This discipline can translate to other areas of life, including academics and professional careers.\n\n
                            Resilience: Team members learn to face challenges and setbacks together, building resilience and mental toughness. These skills are invaluable in overcoming life's obstacles and maintaining a positive mindset.",
            'status' => 'published',
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'How to Stay Active in a Busy World',
            'content' => "In today's fast-paced lifestyle, finding time to stay active can be a challenge. However, incorporating physical activity into your daily routine is essential for maintaining both physical and mental health.\n\n
                            Set Realistic Goals: Start by setting achievable fitness goals that fit into your schedule. Whether it's a daily walk during lunch breaks or a short workout at home, consistency is key.\n\n
                            Utilize Your Environment: Take advantage of your surroundings by opting for stairs instead of elevators, or biking to work if possible. Every little bit counts!\n\n
                            Stay Motivated: Surround yourself with like-minded individuals or join fitness communities online. Sharing your journey can help you stay motivated and accountable.",
            'status' => 'published',
        ]);
    }
}
