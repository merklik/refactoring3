<?php
/**
 * Created by JetBrains PhpStorm.
 * User: merklik
 * Date: 4/27/13
 * Time: 11:12 AM
 * To change this template use File | Settings | File Templates.
 */
//namespace Refactoring;


require_once('Customer.php');
require_once('Rental.php');
require_once('Movie.php');




class TestCustomer extends PHPUnit_Framework_TestCase{


    /**
     * @test
     */
    public function statment_OneRental_Childrens(){

        $c = new \Refactoring\Customer("Joe");
        $c->addRental(new \Refactoring\Rental(new \Refactoring\Movie("Rambo 1", \Refactoring\Movie::CHILDRENS), 1));

        $s = $c->statement();

        $expected = "Rental Record for Joe\n\tRambo 1	1.5\nAmount owed is 1.5\nYou earned 1 frequent renter points";

        $this->assertEquals($expected, $s);
    }


    /**
     * @test
     */
    public function statment_TwoRentals_NewRelease(){

        $c = new \Refactoring\Customer("Joe");
        $c->addRental(new \Refactoring\Rental(new \Refactoring\Movie("Rambo 1", \Refactoring\Movie::CHILDRENS), 1));
        $c->addRental(new \Refactoring\Rental(new \Refactoring\Movie("Rambo 2", \Refactoring\Movie::NEW_RELEASE), 2));

        echo $s = $c->statement();

        $expected = "Rental Record for Joe\n\tRambo 1	1.5\n\tRambo 2	6\nAmount owed is 7.5\nYou earned 3 frequent renter points";

        $this->assertEquals($expected, $s);
    }



}