<?php
namespace Model;

class Book{
private $id;
private $title;
private $author;
private $genre;
private $format;

public function __construct($pid="", $ptitle="", $pauthor="", $pgenre="", $pformat=""){
    $this->id = $pid;
    $this->title = $ptitle;
    $this->author = $pauthor;
    $this->genre = $pgenre;
    $this->format = $pformat;
}

/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId($id)
{
$this->id = $id;

return $this;
}

/**
 * Get the value of title
 */ 
public function getTitle()
{
return $this->title;
}

/**
 * Set the value of title
 *
 * @return  self
 */ 
public function setTitle($title)
{
$this->title = $title;

return $this;
}

/**
 * Get the value of author
 */ 
public function getAuthor()
{
return $this->author;
}

/**
 * Set the value of author
 *
 * @return  self
 */ 
public function setAuthor($author)
{
$this->author = $author;

return $this;
}

/**
 * Get the value of genre
 */ 
public function getGenre()
{
return $this->genre;
}

/**
 * Set the value of genre
 *
 * @return  self
 */ 
public function setGenre($genre)
{
$this->genre = $genre;

return $this;
}

/**
 * Get the value of format
 */ 
public function getFormat()
{
return $this->format;
}

/**
 * Set the value of format
 *
 * @return  self
 */ 
public function setFormat($format)
{
$this->format = $format;

return $this;
}
}
?>