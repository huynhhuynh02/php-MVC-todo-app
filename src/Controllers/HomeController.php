<?php
    namespace NalSolution\Controllers;
    session_start();
    use NalSolution\App\Helper;
    use NalSolution\App\Validator;
    use NalSolution\Models\Todo;
    class HomeController
    {
        /**
         * INDEX
         * @return void
        */
        public function index()
        {   
            $data = Todo::paginate(10);
            Helper::view('index',$data);
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
            $request = json_decode(json_encode($_POST));

            if(!Validator::validate($request->workName,'required')){
                $_SESSION['message'] = 'Please enter a title!';
                Helper::redirect('add');
            }else{
                if(Todo::store($request)){
                    $_SESSION["message"] = "Add Todo Sucess";
                }else{
                    $_SESSION["message"] = "Add Todo Fail !";
                }
                Helper::redirect('');
            }
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