<?php declare(strict_types=1);

namespace App\task265\Entity;

class Node {
    public $data, $next;
    public function __construct($data, $next = NULL) {
        $this->data = $data;
        $this->next = $next;
    }
}