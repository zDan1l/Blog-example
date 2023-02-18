<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)->create();
        Post::factory(20)->create();
        
        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim neque nihil eligendi, deserunt architecto consequuntur officiis veritatis nobis id temporibus nulla fuga mollitia quidem placeat esse?',
        //     'body' => "<p> Quibusdam doloribus tempora, id in optio totam, aliquid eius ipsa ad quae expedita iure. Reiciendis totam placeat nisi tempore nam, ipsam obcaecati molestiae tenetur repellat repudiandae iure. Dolor, quidem deserunt eos dicta sunt maxime nam veritatis saepe provident exercitationem quod, atque nostrum omnis, </p> <p> temporibus consequatur culpa quisquam tenetur tempora nesciunt ipsum eius architecto iste laboriosam cumque! Dolore culpa a veniam possimus voluptas nihil accusantium eveniet ullam hic ex deleniti, perferendis eligendi unde laborum rerum repellendus necessitatibus fuga tenetur accusamus! Voluptatem rerum, debitis atque optio quae reprehenderit dolor est laudantium corporis cumque cupiditate architecto fugiat!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores velit doloribus optio assumenda nesciunt nulla accusamus at, autem cumque, facilis magni quibusdam quae suscipit voluptate magnam, accusantium rerum debitis voluptatem!</p>"
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'category_id' => 2,
        //     'user_id' => 2,
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim neque nihil eligendi, deserunt architecto consequuntur officiis veritatis nobis id temporibus nulla fuga mollitia quidem placeat esse?',
        //     'body' => "<p> Quibusdam doloribus tempora, id in optio totam, aliquid eius ipsa ad quae expedita iure. Reiciendis totam placeat nisi tempore nam, ipsam obcaecati molestiae tenetur repellat repudiandae iure. Dolor, quidem deserunt eos dicta sunt maxime nam veritatis saepe provident exercitationem quod, atque nostrum omnis, </p> <p> temporibus consequatur culpa quisquam tenetur tempora nesciunt ipsum eius architecto iste laboriosam cumque! Dolore culpa a veniam possimus voluptas nihil accusantium eveniet ullam hic ex deleniti, perferendis eligendi unde laborum rerum repellendus necessitatibus fuga tenetur accusamus! Voluptatem rerum, debitis atque optio quae reprehenderit dolor est laudantium corporis cumque cupiditate architecto fugiat!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores velit doloribus optio assumenda nesciunt nulla accusamus at, autem cumque, facilis magni quibusdam quae suscipit voluptate magnam, accusantium rerum debitis voluptatem!</p>"
        // ]);
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'category_id' => 3,
        //     'user_id' => 1,
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim neque nihil eligendi, deserunt architecto consequuntur officiis veritatis nobis id temporibus nulla fuga mollitia quidem placeat esse?',
        //     'body' => "<p> Quibusdam doloribus tempora, id in optio totam, aliquid eius ipsa ad quae expedita iure. Reiciendis totam placeat nisi tempore nam, ipsam obcaecati molestiae tenetur repellat repudiandae iure. Dolor, quidem deserunt eos dicta sunt maxime nam veritatis saepe provident exercitationem quod, atque nostrum omnis, </p> <p> temporibus consequatur culpa quisquam tenetur tempora nesciunt ipsum eius architecto iste laboriosam cumque! Dolore culpa a veniam possimus voluptas nihil accusantium eveniet ullam hic ex deleniti, perferendis eligendi unde laborum rerum repellendus necessitatibus fuga tenetur accusamus! Voluptatem rerum, debitis atque optio quae reprehenderit dolor est laudantium corporis cumque cupiditate architecto fugiat!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores velit doloribus optio assumenda nesciunt nulla accusamus at, autem cumque, facilis magni quibusdam quae suscipit voluptate magnam, accusantium rerum debitis voluptatem!</p>"
        // ]);
        
        Category::create([
           'name' => 'Web Programming',
           'slug' => 'web-programming' 
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design' 
        ]);        
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal' 
        ]);
         
        User::create([
           'name' => 'Ziyaa Danil Mubarok',
           'username' => 'ziya',
           'email' => 'ziya@gmail.com',
           'password' => bcrypt('123'), 
        ]);
        // User::create([
        //     'name' => 'Zidan Mubarok',
        //     'email' => 'zidan@gmail.com',
        //     'password' => bcrypt('12345'), 
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
 
}