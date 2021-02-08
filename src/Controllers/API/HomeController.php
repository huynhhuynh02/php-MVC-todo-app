<?php
    namespace NalSolution\Controllers\API;
    header('Content-Type: application/json; charset=UTF-8');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Credentials: false');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, Access-Control-Allow-Headers, X-Requested-With');
    header('Access-Control-Max-Age: 3600');
    use NalSolution\Models\Todo;

    class HomeController
    {
        /**
         * INDEX
         * @return void
        */
        public function index()
        {
            $response = Todo::index();
            if(count($response)>0){
                http_response_code(200);
                echo json_encode($response);
            }else{
                http_response_code(404);
                echo json_encode(['message'=>'No result']);
            }
        }
        /**
         * CREATE
         * @return void
        */
        public function create()
        {
            Helper::view('create');
        }
        /**
         * STORE
         * @return void
        */
        public function store()
        {
            session_start();
            $request = json_decode(json_encode($_POST));
            if(Todo::store($request)){
                $_SESSION["message"] = "Add Todo Sucess";
            }else{
                $_SESSION["message"] = "Add Todo Fail !";
            }
            header("Location:".URL_ROOT);
            exit;
        }
        /**
         * SHOW
         * @return void
        */
        public function show($id)
        {
            $data = Todo::edit($id);
            Helper::view('update',$data);
            
        }
        /**
         * EDIT
         * @return void
         */
        public function edit($id)
        {
            
        }
        /**
         * UPDATE
         * @return void
         */
        public function update()
        {
            $request = json_decode(json_encode($_POST));
            if(Todo::update($request)){
                $_SESSION["message"] = "Update success !";
            }else{
                $_SESSION["message"] = "Update fail !";
            }
            header("Location:".URL_ROOT);
            exit;
        }
        /**
         * DELETE
         */
        public function delete($id)
        {   
            if(Todo::delete($id)){
                $_SESSION["message"] = "Delete success !";
            }else{
                $_SESSION["message"] = "Delete fail !";
            }
            header("Location:".URL_ROOT);
            exit;
        }
    }

?>