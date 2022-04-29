<?php

/* Контроллер, отвечающий за лекции */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\StudyPlan;

class ClassesController extends Controller
{
    public function getAll() {   

    	$classes = ClassModel::all();
    	return $classes->toJson(JSON_UNESCAPED_UNICODE);
    }


    public function getOne(ClassModel $class) {
      
     	// формируем результат в виде массива, который потом выведем json формате
    	$result = [
	        'id' => $class->id,
	        'name' => $class->name,
	        'study_plan_id' => $class->study_plan_id,
	        'students' =>$class->students,     
       ];

       return json_encode($result, JSON_UNESCAPED_UNICODE);    
    }


    public function getLections(ClassModel $class) {    	
     
       	$result = [
        	'name' => $class->name,
        	'lections' =>$class->lections,     
       	];

       	return json_encode($result, JSON_UNESCAPED_UNICODE);
    }


    public function create(Request $request) {

    	// валидируем запрос
        $request->validate([
            'name' => ['required', 'max:255'],          
        ]);

        // Создаем новый класс     
        $class = new ClassModel; 
        $class->name = $request->get('name'); 
        $result = $class->save();

        return ['success' => $result];
    }

 
    public function update(ClassModel $class, Request $request) {

    	// валидируем запрос
        $request->validate([
            'name' => ['required', 'max:255'],          
        ]);
       
        // обновляем данные
        $class->name = $request->get('name');    
        $result = $class->save();

        return ['success' => $result];
    }


    public function updateStudyPlan(ClassModel $class, Request $request) {
       	
    	// В таблице StudyPlan задумано, что у одного класса есть один учебный план. И его можно менять

    	// извлекаем из реквеста массив $lections, в котором прописаны лекции учебного плана и их порядок
    	$lections = $request->get('lections');

    /*	{
  	"lections": [
    {
      "lection_id": 2,
      "lection_order": 1
    },
    {
      "lection_id": 4,
      "lection_order": 2
    },
    {
      "lection_id": 6,
      "lection_order": 3
    },
    {
      "lection_id": 7,
      "lection_order": 4
    },
    {
      "lection_id": 1,
      "lection_order": 5
    }
  	]
	}*/
		// Удаляем все предыдущие записи по этому учебному плану и создаем новые
    	StudyPlan::where('class_id', $class->id)->delete();    	

    	// Создаем новые записи 
    	foreach ($lections as $lection) {

    		$studyPlan = new StudyPlan;
	    	$studyPlan->class_id = $class->id;
	    	$studyPlan->lection_id = $lection['lection_id'];
	    	$studyPlan->lection_order = $lection['lection_order'];
	    	$result = $studyPlan->save();

    	}

    	return ['success' => $result]; 
    }


    public function delete(ClassModel $class) {

    	// Сначала открепляем студентов от класса
       foreach ($class->students as $student) {
       		$student->class_id = null;
       		$student->save();       	
       }

       // Потом удаляем класс
       $result = $class->delete();

       return ['success' => $result];
    }
}
