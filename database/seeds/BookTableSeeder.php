<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $book= new \App\Books([

              'image_path'=>'https://via.placeholder.com/200',
              'title'=>'Harry Poter',
              'description'=>'Some quick example text to build on the card title and make up the bulk of the card',
              'price'=>12.5


        ]); 

        $book->save();
        $book= new \App\Books([

              'image_path'=>'https://via.placeholder.com/200',
              'title'=>'Harry Poter',
              'description'=>'Some quick example text to build on the card title and make up the bulk of the card',
              'price'=>12.5


        ]); 

        $book->save();
        $book= new \App\Books([

              'image_path'=>'https://via.placeholder.com/200',
              'title'=>'Harry Poter',
              'description'=>'Some quick example text to build on the card title and make up the bulk of the card',
              'price'=>12.5


        ]); 

        $book->save();
        $book= new \App\Books([

              'image_path'=>'https://via.placeholder.com/200',
              'title'=>'Harry Poter',
              'description'=>'Some quick example text to build on the card title and make up the bulk of the card',
              'price'=>12.5


        ]); 

        $book->save();
        $book= new \App\Books([

              'image_path'=>'https://via.placeholder.com/200',
              'title'=>'Harry Poter',
              'description'=>'Some quick example text to build on the card title and make up the bulk of the card',
              'price'=>12.5


        ]); 

        $book->save();
        $book= new \App\Books([

              'image_path'=>'https://via.placeholder.com/200',
              'title'=>'Harry Poter',
              'description'=>'Some quick example text to build on the card title and make up the bulk of the card',
              'price'=>12.5


        ]); 

        $book->save();
        $book= new \App\Books([

              'image_path'=>'https://via.placeholder.com/200',
              'title'=>'Harry Poter',
              'description'=>'Some quick example text to build on the card title and make up the bulk of the card',
              'price'=>12.5


        ]); 

        $book->save();
        $book= new \App\Books([

              'image_path'=>'https://via.placeholder.com/200',
              'title'=>'Harry Poter',
              'description'=>'Some quick example text to build on the card title and make up the bulk of the card',
              'price'=>12.5


        ]); 

        $book->save();
    }
}
