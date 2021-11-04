<?php
return [
    'address'=>[
        [],
    ],
    'authors'=>[
        ['first_name'=>'J.K','last_name'=>'Rowling'],
    ],
    'books'=>[
        [
           'title' =>'Harry Potter e a pedra filosofal',
           'book_cover'=> 'assets/images/harryporter1.png',
           'description_id'=>1,
            'author_id'=>1,
            'published_at'=>'1998-02-23'
        ],
        [
            'title' =>'Harry Potter e a pedra filosofal',
            'book_cover'=> 'assets/images/harryporter2.png',
            'description_id'=>2,
            'author_id'=>1,
            'published_at'=>'1998-02-23'
         ],
         [
            'title' =>'Harry Potter e a pedra filosofal',
            'book_cover'=> 'assets/images/harryporter3.png',
            'description_id'=>3,
            'author_id'=>1,
            'published_at'=>'1998-02-23'
         ],
         [
            'title' =>'Harry Potter e a pedra filosofal',
            'book_cover'=> 'assets/images/harryporter4.png',
            'description_id'=>1,
            'author_id'=>1,
            'published_at'=>'1998-02-23'
         ],
         
    ],
    'books_category'=>[
        ['category_id'=>2,'book_id'=>1],
        ['category_id'=>2,'book_id'=>2],
        ['category_id'=>2,'book_id'=>3],
        ['category_id'=>2,'book_id'=>4],
    ],
    'categories'=>[
        ['name'=>'terror'],
        ['name'=>'fantasy'],
        ['name'=>'romance'],
        ['name'=>'comedy'],
        ['name'=>'science ficction'],
        ['name'=>'drama'],
        ['name'=>'classic'],

    ],
    'costumers'=>[
        [],
    ],
    'retal_book'=>[
        [],
    ],
    'to_pay'=>[
        [],
    ],
    'users'=>[
        [
            'first_name'=>'admin',
            'last_name'=>'adm',
            'image'=>'none',
            'email'=>'admin@gmail.com',
            'password'=>'abc123',
            'created_at'=>'2021-10-26',
            'updated_at'=>'2021-10-26'
        ],
    ],
    'description'=>[
        ['content'=>' random words  '],
        ['content'=>' random words  '],
        ['content'=>' random words  '],
        ['content'=>' random words  '],
    ]
];