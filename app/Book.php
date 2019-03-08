<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = ['id'];

    public function create($data) {
        $newBook = new Book();
        $newBook->title = $data['title'];
        $newBook->author = $data['author'];
        $newBook->save();
    }

    public function convertCSV($content) {
        $table = Book::all();
        $filename = "books_$content.csv";
        $handle = fopen($filename, 'w+');
        
        //determine which columns to include
        $columns = [];
        switch ($content) {
            case "titles":
                $columns = ["title"];
                break;
            case "authors":
                $columns = ["author"];
                break;
            case "full":
                $columns = ["title","author"];
                break;
        }

        fputcsv($handle, $columns);

        foreach($table as $row) {
            fputcsv($handle, array_map(function($column) use ($row) { return $row[$column]; },$columns));//array($row['title'], $row['author'])
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv'
        );
        
        \Response::download($filename, "books_$content.csv", $headers);
    }

    public function convertXML($content) {
        $books = Book::all();
        $xml = new \SimpleXMLElement('<root />');
        switch ($content) {
            case "titles":
                foreach($books as $book) {
                    $bookXML = $xml->addChild('book');
                    $bookXML->addChild('title',$book->title);
                }
                break;
                case "authors":
                foreach($books as $book) {
                    $bookXML = $xml->addChild('book');
                    $bookXML->addChild('author',$book->author);
                }
                break;
                case "full":
                foreach($books as $book) {
                    $bookXML = $xml->addChild('book');
                    $bookXML->addChild('title',$book->title);
                    $bookXML->addChild('author',$book->author);
                }
                break;
        }
        $xml->saveXML("books_$content.xml");
    }

    public function exportBooks($format,$content) {
        switch ($format) {
            case 'csv':
                $this->convertCSV($content);
                break;
            case 'xml':
                $this->convertXML($content);
                break;
        }
    }

    public function read() {
        return Book::get()->toArray();
    }

    public function remove($id) {
        Book::find($id)->delete();
    }

    public function search($text) {
        return Book::where('title','like',"%$text%")
            ->orWhere('author','like',"%$text%")
            ->get()->toArray();
    }

    public function sortByTitle() {
        return Book::orderBy('title','ASC')->get()->toArray();
    }

    public function sortByAuthor() {
        return Book::orderBy('author','ASC')->get()->toArray();
    }

    public function updateAuthor($id,$author) {
        Book::find($id)->update([
            'author' => $author
        ]);
        return $this->read();
    }
}
