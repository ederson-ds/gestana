<?php

namespace App\Models;

require 'rb.php';

use R;

class RedbeanModel
{
    protected $table = '';
    protected $searchColumn = '';
    public function __construct()
    {
        R::setup(
            'pgsql:host=batyr.db.elephantsql.com;dbname=wmtaljbm',
            'wmtaljbm',
            'XMayIkoaLqipnQIZF8GP_k2y8dYlBf32'
        );
    }

    public function search($text, $registros, $offset, $orderBy)
    {
        if ($orderBy)
            $orderBy = " ORDER BY " . $orderBy;
        return R::find($this->table, ' ' . $this->searchColumn . ' LIKE ? ' . $orderBy . ' OFFSET ? LIMIT ?', ['%' . $text . '%', $offset, $registros]);
    }

    public function find($registros, $offset, $orderBy)
    {
        if ($orderBy)
            $orderBy = " ORDER BY " . $orderBy;
        return R::find(
            $this->table,
            $orderBy . ' OFFSET :offset LIMIT :limit',
            array(
                ':limit' => $registros,
                ':offset' => $offset
            )
        );
    }

    public function excluir($id)
    {
        $item = $this->load($id);
        R::trash($item);
    }

    public function load($id)
    {
        return R::load($this->table, $id);
    }

    public function findOne($id)
    {
        return R::findOne($this->table, ' id = ? ', [$id]);
    }

    public function count()
    {
        return R::count($this->table);
    }

    public function countSearch($text)
    {
        return R::count($this->table, ' ' . $this->searchColumn . ' LIKE ?', ['%' . $text . '%']);
    }
}
