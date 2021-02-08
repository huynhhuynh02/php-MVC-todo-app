<?php
    namespace NalSolution\Models;
    use NalSolution\App\Database;
    use stdClass;
    class Todo
    {
        /**
         * @return array
         */
        public static function index($count=10)
        {   if($count===0){
                Database::query("SELECT * FROM todos ORDER BY id DESC");
            }else{
                Database::query("SELECT * FROM todos ORDER BY id DESC LIMIT :count");
                Database::bind(':count', $count);
            }
            
            return Database::fetchAll();
        }
        /**
         * @param object $request
         * @return bool
         */
        public static function store($request)
        {   
            Database::query("INSERT INTO todos (
                `title`,
                `start`,
                `end`,
                `status`
            ) VALUES (:title,:start,:end,:status)");
            Database::bind(':title',$request->workName);
            Database::bind(':start',$request->startDate);
            Database::bind(':end',$request->endDate);
            Database::bind(':status',$request->status);
            if(Database::execute()) return true;
            return false;
        }
        /**
         * @param int $id
         * return array
         */
        public static function edit($id)
        {
            Database::query("SELECT * FROM todos WHERE id=:id");
            Database::bind(':id',$id);
            return Database::fetch();
        }
        /**
         * @param object $request
         * return bool
         */
        public static function update($request)
        {
            if($request->status == 1){
                $color= "#F9BC13";
            }else if($request->status== 2){
                $color= "blue";
            }else{
                $color = "green";
            }
            Database::query("UPDATE todos SET 
                title = :title,
                start = :start,
                end = :end,
                status = :status,
                color = :color
                WHERE id = :id");
            Database::bind(':title',$request->workName);
            Database::bind(':start',$request->startDate);
            Database::bind(':end',$request->endDate);
            Database::bind(':status',$request->status);
            Database::bind(':color',$color);
            Database::bind(':id',$request->id);
            if(Database::execute()) return true;
            return false;
        }
        /**
         * @param int $id
         * return bool
         */
        public static function delete($id)
        {
            Database::query("DELETE FROM todos WHERE id=:id");
            Database::bind(':id',$id);
            if(Database::execute()) return true;
            return false;
        }
        public static function paginate($limit){

            $limit_item = $limit;
            Database::query("SELECT * FROM todos");
            // count all item
            $total = count(Database::fetchAll());
            //total page 
            
            $pages = ceil($total / $limit_item);

            if(isset($_GET['page']) && is_numeric($_GET['page'])){
                if($_GET['page']>$pages || $_GET['page']<1){
                    $page =1;
                }else{
                    $page = $_GET['page'];
                }
            }else{
                $page = 1;
            }
            // offset 
            $offset = ($page -1 ) * $limit_item;
            Database::query("SELECT * FROM todos ORDER BY id DESC LIMIT :limit OFFSET :offset");
            Database::bind(':limit', $limit_item);
            Database::bind(':offset', $offset);
            $data = Database::fetchAll();
            $result = array();
            $result['pages'] = $pages;
            $result['todoList'] = $data;
            $result['current'] = $page;
            return $result;
        }

    }
?>