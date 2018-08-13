<?php

abstract class Book
{
    public $id;
    public $name;
    public $author;
    public $file_path;
    public $type;
    public $sort_order;

    function __construct($result)
    {
        $this->id = $result['id'];
        $this->name = $result['name'];
        $this->author = $result['author'];
        $this->file_path = $result['file_path'];
        $this->type = $result['type'];
        $this->sort_order = $result['sort_order'];
    }
}

class BookTxt extends Book
{
    function printInfo()
    {
        return '<p>
                <img src="files/icons/txt.png" alt="txt">
                <a href="' . $this->file_path . '">' . $this->name . ' by ' . $this->author . '</a>
                </p>';

    }

}

class BookDoc extends Book
{
    function printInfo()
    {
        return '<p>
                <img src="files/icons/doc.png" alt="doc">
                <a href="' . $this->file_path . '">' . $this->name . ' by ' . $this->author . '</a>
                </p>';
    }
}

class BookPdf extends Book
{
    function printInfo()
    {
        return '<p>
                <img src="files/icons/pdf.png" alt="pdf">
                <a href="' . $this->file_path . '">' . $this->name . ' by ' . $this->author . '</a>
                </p>';
    }
}

class BookFb2 extends Book
{
    function printInfo()
    {
        return '<p>
                <img src="files/icons/default.png" alt="fb2">
                <a href="' . $this->file_path . '">' . $this->name . ' by ' . $this->author . '</a>
                </p>';
    }
}