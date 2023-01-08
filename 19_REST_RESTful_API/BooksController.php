<?php

class BooksController{
    protected $booksList = ['War and peace', 'Harry potter', 'Crime and punishment'];
    public function list(){
        return json_encode($this->booksList);
    }
}