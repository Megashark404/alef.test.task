<?php

/* Контроллер, отвечающий за лекции */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentsController extends Controller {

    public function getAll() {   

    	$students = Student::all();
    	return $students->toJson(JSON_UNESCAPED_UNICODE);
    }


    public function getOne(Student $student) {    
             
        // формируем результат в виде массива, который потом выведем json формате
        $result = [
            'name' => $student->name,
            'email' =>$student->email,
            'class' => $student->class->name,
            'lections' => $student->class->lections
       ];

       return json_encode($result, JSON_UNESCAPED_UNICODE);
    }


    public function create(Request $request) {
        
        // валидируем запрос
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'unique:students', 'max:255'],
            'class_id' => 'required'
        ]);

        // Создаем нового студента
        $student = new Student;
 
        $student->name = $request->get('name');
        $student->email = $request->get('email');
        $student->class_id = $request->get('class_id');

        $result = $student->save();

        return ["success" => $result];
    } 


    public function update(Student $student, Request $request) {      

        // валидируем запрос
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'unique:students', 'max:255'],
            'class_id' => 'required'
        ]);

        // вносим изменения
        $student->name = $request->get('name');
        $student->email = $request->get('email');
        $student->class_id = $request->get('class_id');

        $result = $student->save();

        return ["success" => $result];
    }

   
    public function delete(Student $student) {
    
        $result = $student->delete();

        return ["success" => $result];
    }
}
