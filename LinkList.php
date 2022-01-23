<?php

class LinkList
{
    private $firstNode;
    private $lastNode;
    private $count;

    public function __construct()
    {
        $this->firstNode = null;
        $this->lastNode = null;
        $this->count = 0;
    }

//Tạo phương thức thêm node vào đầu Danh sách
    public function insertFirst($data): void
    {
        $node = new Node($data);
        $node->next = $this->firstNode;
        $this->firstNode = $node;

        if (is_null($this->lastNode)) {
            $this->lastNode = $node;
        }
        $this->count++;

    }

//Tạo phương thức thêm node vào phía sau Danh sách
    public function insertLast($data): void
    {
        if (!is_null($this->firstNode)) {
            $node = new Node($data);
            $this->lastNode->next = $node;
            $node->next = null;
            $this->lastNode = $node;
            $this->count++;
        } else {
            $this->insertFirst($data);
        }
    }

//Tạo phương thức lấy ra số lượng node
    public function totalNode(): int
    {
        return $this->count;
    }

//Tạo phương thức đọc ra Danh sách
//Mục đích: Hiển thị danh sách các phần tử trong danh sách
    public function readList(): array
    {
        $listData = [];
        $current = $this->firstNode;
        while (!is_null($current)){
            array_push($listData, $current->readNode());
            $current = $current->next;
        }
        return $listData;
    }
}