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
        try{
            $this->to_pay-> $request->to_pay;
            $this->to_pay->save();
            $to_pay_id = $this->to_pay->getLast()->id;

            $customer_id = $this->customer->find($request->customer_id)->id;
            $book_id = $this->book->where('title', $request->book)->id;
 
            $this->rental->is_paided = false;
            $this->rental->rental_date = $request->date;
            $this->rental->book_id = $book_id;
            $this->rental->customer_id = $customer_id;
            $this->rental->to_pay_id = $to_pay_id;

            return $this->rental->save();

        }catch(\Exception $except)
        {
            $this->message->span($except->getMessage());
        }
    }
}