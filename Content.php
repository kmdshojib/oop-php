<?php
abstract class Content
{
    public string $title;
    private bool $published;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function publish()
    {
        return $this->published = true;
    }
    public function unpublish()
    {
        return $this->published = false;
    }
    abstract function displayContent();
}
interface Searchable
{
    public function isSearchable(): bool;
    public function getKeywords(): array;
}
class Article extends Content implements Searchable
{
    private string $content;

    public function __construct(string $title, string $content)
    {
        parent::__construct($title);
        $this->content = $content;
    }
    public function displayContent()
    {
        echo "Title" . $this->title . "\n" . "Content: " . $this->content . "\n";
    }
    public function isSearchable(): bool
    {
        return $this->publish();
    }

    public function getKeywords(): array
    {
        return [
            "Title" => $this->title,
            "Content" => $this->content
        ];
    }


}
class Image extends Content implements Searchable
{
    private string $content;

    public function __construct(string $title, string $content)
    {
        parent::__construct($title);
        $this->content = $content;
    }
    public function displayContent()
    {
        echo "Title" . $this->title . "\n" . "Content: " . $this->content . "\n";
    }
    public function isSearchable(): bool
    {
        return $this->unpublish();
    }

    public function getKeywords(): array
    {
        return [
            "Title" => $this->title,
            "Content" => $this->content
        ];
    }


}

$article = new Article("Article Title", "Content");
$image = new Image("Image Title", "Image Content");

$article->displayContent();
$article->isSearchable();
$aricleDaata = $article->getKeywords();
print_r($aricleDaata);

$image->displayContent();
$image->isSearchable();
$image->getKeywords();
$imgKeywords = $image->getKeywords();
print_r($imgKeywords);