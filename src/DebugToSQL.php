<?php
namespace Toanld\DebugToSql;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\URL;


trait DebugToSQL
{
    /**
     * Boot the soft deleting trait for a model.
     *
     * @return void
     */
    public static function bootDebugToSQL()
    {
        $comment = URL::current();
        $arrFile = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        $basePath = base_path();
        $arrNew = [];
        foreach ($arrFile as $k => $trace){
            $file = isset($trace["file"])? $trace["file"] : '';
            unset($trace["function"],$trace["class"],$trace["type"]);
            if(isset($trace["args"])) unset($trace["args"]);
            $arrFile[$k] = $trace;
            if(strpos($file,"vendor") !== false || strpos($file,"storage") !== false || strpos($file,"public") !== false){
                unset($arrFile[$k]);
            }else{
                if(empty($file)) continue;
                $file = str_replace($basePath,"",$file);
                $trace["file"] = str_replace("/",".",$file);
                $arrNew[] = $trace;
            }
        }
        $trace = json_encode($arrNew);
        $trace = str_replace('"',"",$trace);

        self::addGlobalScope('comment', function (Builder $builder) use ($comment,$trace) {
            if(!empty($comment)) {
                $databaseName = config('database.connections.'.config('database.default') . '.database');
                $builder->whereRaw(" 1 \n /* Db: " . $databaseName . ": \n " . base64_encode($comment) . "\n " . $trace . ' */' . "\n");
            }
        });
    }
}
