<?php

/* Контроллер, отвечающий за лекции */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lection;


class LectionsController extends Controller
{
    public function getAll() {

    	$lections = Lection::all();
    	return $lections->toJson(JSON_UNESCAPED_UNICODE);

    }


    public function getOne(Lection $lection) {
    	
    	$classes = $lection->classes; 

    	foreach ($classes as $class) {
    		$students[] = $class->students;
    	}

    	// формируем результат в виде массива, который потом выведем json формате
    	$result = [
    		'id' => $lection->id,
	        'name' => $lection->name,
	        'description' =>$lection->description,
	        'classes' => $lection->classes,
	        
	    ];

    	return json_encode($result, JSON_UNESCAPED_UNICODE);
    }


    public function create(Request $request) {

    	// валидируем запрос
        $request->validate([
            'name' => ['required','unique:lections', 'max:255'],
            'description' => ['required', 'max:255']           
        ]);

        // создаем новую лекцию
    	$lection = new Lection;

    	$lection->name = $request->get('name');
    	$lection->description = $request->get('description');
    	$result = $lection->save();

    	return ['success' => $result];
    }


    public function update(Lection $lection, Request $request) { 

    	// валидируем запрос
        $request->validate([
            'name' => ['required','unique:lections', 'max:255'],
            'description' => ['required', 'max:255']           
        ]);

        // обновляем лекцию
    	$lection->name = $request->get('name');
    	$lection->description = $request->get('description');
    	$result = $lection->save();

    	return ['success' => $result];
    }


    public function delete(Lection $lection) {
    	
    	$success = $lection->delete();
    	return ['success' => $result];

    }


}
