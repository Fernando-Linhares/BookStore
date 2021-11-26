<?php
namespace App\Models\Repositories;

use App\Models\Entity\{
    Book,
    Customer,
    RentalBook,
    ToPay
};
use Application\Messages\BrowserMessager;

class RentalRepository
{
    private Book $book;
    private Customer $customer;
    private RentalBook $rental;
    private ToPay $to_pay;
    private BrowserMessager $message;

    public function __construct()
    {
        $this->message = new BrowserMessager;
        $this->to_pay = new ToPay;
        $this->book = new Book;
        $this->customer = new Customer;
        $this->rental = new RentalBook;
    }

    public function getCustomers()
    {
        return $this->customer->all();
    }

    public function getBooks()
    {
        return $this->book->all();
    }

    public function store(object $request)
    {
            $request = $request->all();
            $this->to_pay->value =  $request->to_pay;
            $this->to_pay->fees = 2;
            $this->to_pay->save();
            $to_pay_id = $this->to_pay->getLast()->id;

            $this->rental->is_paided = 'false';
            $this->rental->rental_date = $request->date;
            $this->rental->book_id = $request->book;
            $this->rental->customer_id = (int) $request->customer;
            $this->rental->to_pay_id = $to_pay_id;

            return $this->rental->save();
    }
}