<?php

try {
     $pdo = new PDO('mysql:host=127.127.126.26;dbname=db', 'root', '');;
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

function getMenuItems($parentId = NULL) {
    global $pdo;
    if ($parentId == null){
        $stmt = $pdo->prepare('SELECT * FROM menu WHERE parent_id is ?');
    }
    else{
        $stmt = $pdo->prepare('SELECT * FROM menu WHERE parent_id = ?'); 
    }
    $stmt->execute([$parentId]);
    return $stmt->fetchAll();
}

function generateMenu($parentId = NULL) {
    $items = getMenuItems($parentId);

    if ($items) {
        $menu = '<ul>';
        foreach ($items as $item) {
            $menu .= '<li>' . htmlspecialchars($item['title']);
            $menu .= generateMenu($item['id']);
            $menu .= '</li>';
        }
        $menu .= '</ul>';
        return $menu;
    }
    return '';
}
?>