<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Tag;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  seed five user
        $author1 = User::create([
          'name'     => 'ASM AKASH',
          'email'    => 'akashcseuu026@gmail.com',
          'password' => Hash::make('123456789')
        ]);
        $author2 = User::create([
          'name'     => 'Al Mamun',
          'email'    => 'uualmamun@gmail.com',
          'password' => Hash::make('123456789')
        ]);
        $author3 = User::create([
          'name'     => 'Rahyan Islam',
          'email'    => 'rayhanur202@gmail.com',
          'password' => Hash::make('123456789')
        ]);
        $author4 = User::create([
          'name'     => 'Faster Resam',
          'email'    => 'faster.resam@gmail.com',
          'password' => Hash::make('123456789')
        ]);
        $author5 = User::create([
          'name'     => 'Al Kazi Akash',
          'email'    => 'akashm21402111026@gmail.com',
          'password' => Hash::make('123456789')
        ]);


        //  seed seven category
        $category1 = Category::create([ 'name' => 'News' ]);
        $category2 = Category::create([ 'name' => 'Update' ]);
        $category3 = Category::create([ 'name' => 'Marketing' ]);
        $category4 = Category::create([ 'name' => 'Partnership' ]);
        $category5 = Category::create([ 'name' => 'Product' ]);
        $category6 = Category::create([ 'name' => 'Hiring' ]);
        $category7 = Category::create([ 'name' => 'Offers' ]);


        // seed ten tag
        $tag1  = Tag::create([ 'name' => 'Records' ]);
        $tag2  = Tag::create([ 'name' => 'Progress' ]);
        $tag3  = Tag::create([ 'name' => 'Customers' ]);
        $tag4  = Tag::create([ 'name' => 'Freebie' ]);
        $tag5  = Tag::create([ 'name' => 'Offer' ]);
        $tag6  = Tag::create([ 'name' => 'Screenshot' ]);
        $tag7  = Tag::create([ 'name' => 'Milestone' ]);
        $tag8  = Tag::create([ 'name' => 'Version' ]);
        $tag9  = Tag::create([ 'name' => 'Design' ]);
        $tag10 = Tag::create([ 'name' => 'Job' ]);


        // seed five post
        $post1 = $author1->posts()->create([
          'title'       => 'We are reloacted our office to a new garage',
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, adipisci!',
          'content'     => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur odit eum reiciendis alias culpa sint reprehenderit inventore nam debitis minima amet aliquid natus ullam delectus similique voluptatem, quasi deleniti, quibusdam quidem officia exercitationem voluptates, iste, consequatur ad. Voluptate repellendus, dicta amet eveniet labore aperiam molestias, quidem quae, odit facere, voluptatem. Consequuntur voluptatibus consequatur consectetur doloremque modi tenetur quae recusandae, enim illo a quidem sequi impedit quam inventore est sit tempora blanditiis maxime libero necessitatibus veniam ex temporibus totam vero voluptas. Ipsa dicta accusantium eaque numquam officia saepe cum porro, delectus, sit laborum illum voluptate. Ea facilis aliquam culpa laudantium iste!',

          'category_id' => $category1->id,
          'image'       => 'post1.jpg'
        ]);
        $post2 = $author2->posts()->create([
          'title'       => 'Top 5 briliant content marketing strategis',
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, adipisci!',
          'content'     => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur odit eum reiciendis alias culpa sint reprehenderit inventore nam debitis minima amet aliquid natus ullam delectus similique voluptatem, quasi deleniti, quibusdam quidem officia exercitationem voluptates, iste, consequatur ad. Voluptate repellendus, dicta amet eveniet labore aperiam molestias, quidem quae, odit facere, voluptatem. Consequuntur voluptatibus consequatur consectetur doloremque modi tenetur quae recusandae, enim illo a quidem sequi impedit quam inventore est sit tempora blanditiis maxime libero necessitatibus veniam ex temporibus totam vero voluptas. Ipsa dicta accusantium eaque numquam officia saepe cum porro, delectus, sit laborum illum voluptate. Ea facilis aliquam culpa laudantium iste!',

          'category_id' => $category2->id,
          'image'       => 'post2.jpg'
        ]);
        $post3 = Post::create([
          'title'       => 'Best Practices for minimalist design with example',
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, adipisci!',
          'content'     => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur odit eum reiciendis alias culpa sint reprehenderit inventore nam debitis minima amet aliquid natus ullam delectus similique voluptatem, quasi deleniti, quibusdam quidem officia exercitationem voluptates, iste, consequatur ad. Voluptate repellendus, dicta amet eveniet labore aperiam molestias, quidem quae, odit facere, voluptatem. Consequuntur voluptatibus consequatur consectetur doloremque modi tenetur quae recusandae, enim illo a quidem sequi impedit quam inventore est sit tempora blanditiis maxime libero necessitatibus veniam ex temporibus totam vero voluptas. Ipsa dicta accusantium eaque numquam officia saepe cum porro, delectus, sit laborum illum voluptate. Ea facilis aliquam culpa laudantium iste!',

          'category_id' => $category3->id,
          'user_id'     => $author3->id,
          'image'       => 'post3.jpg'
        ]);
        $post4 = Post::create([
          'title'       => 'Congratulation and thank to Mariam',
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, adipisci!',
          'content'     => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur odit eum reiciendis alias culpa sint reprehenderit inventore nam debitis minima amet aliquid natus ullam delectus similique voluptatem, quasi deleniti, quibusdam quidem officia exercitationem voluptates, iste, consequatur ad. Voluptate repellendus, dicta amet eveniet labore aperiam molestias, quidem quae, odit facere, voluptatem. Consequuntur voluptatibus consequatur consectetur doloremque modi tenetur quae recusandae, enim illo a quidem sequi impedit quam inventore est sit tempora blanditiis maxime libero necessitatibus veniam ex temporibus totam vero voluptas. Ipsa dicta accusantium eaque numquam officia saepe cum porro, delectus, sit laborum illum voluptate. Ea facilis aliquam culpa laudantium iste!',

          'category_id' => $category4->id,
          'user_id'     => $author4->id,
          'image'       => 'post4.jpg'
        ]);
        $post5 = Post::create([
          'title'        => 'The present situation of muslims in the world',
          'description'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, adipisci!',
          'content'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur odit eum reiciendis alias culpa sint reprehenderit inventore nam debitis minima amet aliquid natus ullam delectus similique voluptatem, quasi deleniti, quibusdam quidem officia exercitationem voluptates, iste, consequatur ad. Voluptate repellendus, dicta amet eveniet labore aperiam molestias, quidem quae, odit facere, voluptatem. Consequuntur voluptatibus consequatur consectetur doloremque modi tenetur quae recusandae, enim illo a quidem sequi impedit quam inventore est sit tempora blanditiis maxime libero necessitatibus veniam ex temporibus totam vero voluptas. Ipsa dicta accusantium eaque numquam officia saepe cum porro, delectus, sit laborum illum voluptate. Ea facilis aliquam culpa laudantium iste!',

          'category_id' => $category6->id,
          'user_id'     => $author1->id,
          'image'       => 'post5.jpg'
        ]);

        // seed many to many relationship between post and tag
        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag3->id, $tag2->id]);
        $post3->tags()->attach([$tag1->id, $tag4->id]);
        $post4->tags()->attach([$tag5->id, $tag6->id]);
        $post5->tags()->attach([$tag7->id, $tag8->id, $tag9->id, $tag10->id]);
    }
}
