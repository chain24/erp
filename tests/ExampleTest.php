<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Superbiiz\Inventory\Models\Category;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        /*
        $this->visit('/')
             ->see('Laravel 5');
         */
        $category = new Category();
        //var_dump($category);
        $category->setParent(new Category());
    }
}
