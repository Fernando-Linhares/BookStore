<?php
namespace App\Models\Repositories;

use App\Models\Entity\{
    Book,
    Customer
};

class RentalRepository
{
    private Book $book;
    private Customer $customer;

    public function __construct()
    {
        $this->book = new Book;
        $this->customer = new Customer;
    }
    public function getCustomers()
    {
        return $this->customer->all();
    }

    public function getBooks()
    {
        return $this->book->all();
    }
}