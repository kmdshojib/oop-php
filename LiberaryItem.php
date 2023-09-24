<?php
abstract class LibraryItem
{
    protected string $title;
    protected bool $checkoutStatus;
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    protected function checkOut(): bool
    {
        return $this->checkoutStatus = true;
    }
    protected function returnItem(): bool
    {
        return $this->checkoutStatus = false;
    }
    abstract protected function displayItemInfo();
}
interface Searchable
{
    public function isSearchable(): bool;
    public function getKeywords(): array;
}

class Book extends LibraryItem implements Searchable
{
    private string $author;
    private string $isbn;

    public function __construct(string $title, string $author, string $isbn)
    {
        parent::__construct($title);
        $this->author = $author;
        $this->isbn = $isbn;
    }
    public function displayItemInfo()
    {
        echo "Book Title: {$this->title}\n";
        echo "Author: {$this->author}\n";
        echo "Isbn: {$this->isbn}\n";
    }
    public function isSearchable(): bool
    {
        return $this->returnItem();
    }

    public function getKeywords(): array
    {
        return [
            "Title" => $this->title,
            "Author" => $this->author,
        ];
    }
}
class DVD extends LibraryItem implements Searchable
{
    private string $director;
    private int $runtime;

    public function __construct(string $title, string $director, int $runtime)
    {
        parent::__construct($title);
        $this->director = $director;
        $this->runtime = $runtime;
    }
    public function displayItemInfo()
    {
        echo "Movie: {$this->title}\n";
        echo "Director: {$this->director}\n";
        echo "Runtime : {$this->runtime}hr\n";
    }
    public function isSearchable(): bool
    {
        return $this->checkOut();
    }

    public function getKeywords(): array
    {
        return [
            "Movie" => $this->title,
            "Director" => $this->director,
        ];
    }
}
$book = new Book("Never Say nothing", "John Smith", "090-i34-300");
$dvd = new DVD("Avatar", "J.Cameron", 2);
$book->displayItemInfo();
print_r($book->getKeywords());
$dvd->displayItemInfo();
print_r($dvd->getKeywords());