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

    public function search($text, $registros, $offset)
    {
        return R::find($this->table, ' ' . $this->searchColumn . ' LIKE ? OFFSET ? LIMIT ?', ['%' . $text . '%', $offset, $registros]);
    }

    public function find($registros, $offset)
    {
        return R::find(
            $this->table,
            ' OFFSET :offset LIMIT :limit',
            array(
                ':limit' => $registros,
                ':offset' => $offset
            )
        );
    }

    public function load($produto_id)
    {
        return R::load($this->table, $produto_id);
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
