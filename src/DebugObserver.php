<?php

namespace Toanld\DebugToSql;

use Illuminate\Database\Connection;

class DebugObserver
{
    /**
     * Handle the User "created" event.
     */
    public function saving($model)
    {
        $this->addLog();
        // ...
    }
    public function deleting($model)
    {
        $this->addLog();
        // ...
    }

    public function addLog(){
        app()->get('db.connection')
            ->beforeExecuting(function (
                string     &$query,
                array      &$bindings,
                Connection $connection
            ) {
                $debugSqlComment = app('debugSqlComment');
                $debugSqlComment = str_replace(['/*','*/'],"",$debugSqlComment);
                $query .= " \n /* " . $debugSqlComment . " */";
            });
    }
    //
}
