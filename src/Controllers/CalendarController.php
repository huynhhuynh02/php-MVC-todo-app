<?php
    namespace NalSolution\Controllers;
    use NalSolution\App\Helper;
    use NalSolution\Models\Todo;
    class CalendarController
    {
        /**
         * INDEX
         * @return void
        */
        public function index()
        {
            
            Helper::view('calendar');
        }
        /**
         * STORE
         * @return void
        */
        public function store($request)
        {
            
        }
        /**
         * SHOW
         * @return void
        */
        public function show($id)
        {
            
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
        public function update($request)
        {
            
        }
        /**
         * DELETE
         */
        public function delete($id)
        {
            
        }
    }

?>