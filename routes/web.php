<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/silabos', [
    'uses' => 'SyllableController@index',
    'as'=> 'syllable.index'
]);

Route::get('/silabos/crear', [
    'uses' => 'SyllableController@create',
    'as'=> 'syllable.create'
]);

Route::post('/silabos/crear', [
    'uses' => 'SyllableController@store',
    'as'=> 'syllable.store'
]);

Route::get('/silabos/{syllable}', [
    'uses' => 'SyllableController@show',
    'as' => 'syllable.show'
])->where('syllable', '\d+');

Route::get('/silabos/{syllable}/unidades/agregar', [
    'uses' => 'UnitController@create',
    'as' => 'syllable.unit.create'
])->where('syllable', '\d+');

Route::post('/silabos/{syllable}/unidades/agregar', [
    'uses' => 'UnitController@store',
    'as' => 'syllable.unit.store'
])->where('syllable', '\d+');

Route::get('/silabos/{syllable}/unidades/{unit}/temas', [
    'uses' => 'UnitController@show',
    'as' => 'syllable.unit.show'
])->where('syllable', '\d+')->where('unit', '\d+');

Route::get('/silabos/{syllable}/unidades/{unit}/temas/crear', [
    'uses' => 'TopicController@create',
    'as' => 'syllable.unit.topic.create'
])->where('syllable', '\d+')->where('unit', '\d+');

Route::post('/silabos/{syllable}/unidades/{unit}/temas/crear', [
    'uses' => 'TopicController@store',
    'as' => 'syllable.unit.topic.store'
])->where('syllable', '\d+')->where('unit', '\d+');



/////////// ADMIN ROUTES
///
/// Admin home
Route::get('administracion', [
    'uses' => 'HomeController@admin',
    'as' => 'admin.home'
]);
/// FACULTIES
Route::get('administracion/facultades', [
   'uses' => 'FacultyController@index',
   'as' => 'admin.faculties.index'
]);

Route::get('administracion/facultades/agregar', [
    'uses' => 'FacultyController@create',
    'as' => 'admin.faculties.create'
]);

Route::post('administracion/facultades/agregar', [
    'uses' => 'FacultyController@store',
    'as' => 'admin.faculties.store'
]);

Route::get('administracion/facultades/{faculty}/editar', [
    'uses' => 'FacultyController@edit',
    'as' => 'admin.faculties.edit'
]);

Route::put('administracion/facultades/{faculty}/editar', [
    'uses' => 'FacultyController@update',
    'as' => 'admin.faculties.update'
]);

Route::get('administracion/facultades/{faculty}/eliminar', [
    'uses' => 'FacultyController@destroy',
    'as' => 'admin.faculties.destroy'
]);

/// SCHOOLS

Route::get('administracion/escuelas', [
    'uses' => 'SchoolController@index',
    'as' => 'admin.schools.index'
]);

Route::get('administracion/escuelas/agregar', [
    'uses' => 'SchoolController@create',
    'as' => 'admin.schools.create'
]);

Route::post('administracion/escuelas/agregar', [
    'uses' => 'SchoolController@store',
    'as' => 'admin.schools.store'
]);

Route::get('administracion/escuelas/{school}/editar', [
    'uses' => 'SchoolController@edit',
    'as' => 'admin.schools.edit'
]);

Route::put('administracion/escuelas/{school}/editar', [
    'uses' => 'SchoolController@update',
    'as' => 'admin.schools.update'
]);

Route::get('administracion/escuelas/{school}/eliminar', [
    'uses' => 'SchoolController@destroy',
    'as' => 'admin.schools.destroy'
]);

// CAREERS

Route::get('administracion/carreras', [
    'uses' => 'CareerController@index',
    'as' => 'admin.careers.index'
]);

Route::get('administracion/carreras/agregar', [
    'uses' => 'CareerController@create',
    'as' => 'admin.careers.create'
]);

Route::post('administracion/carreras/agregar', [
    'uses' => 'CareerController@store',
    'as' => 'admin.careers.store'
]);

Route::get('administracion/carreras/{career}/editar', [
    'uses' => 'CareerController@edit',
    'as' => 'admin.careers.edit'
]);

Route::put('administracion/carreras/{career}/editar', [
    'uses' => 'CareerController@update',
    'as' => 'admin.careers.update'
]);

Route::get('administracion/carreras/{career}/eliminar', [
    'uses' => 'CareerController@destroy',
    'as' => 'admin.careers.destroy'
]);



// PERIODS

Route::get('administracion/periodos', [
    'uses' => 'PeriodController@index',
    'as' => 'admin.periods.index'
]);

Route::get('administracion/periodos/agregar', [
    'uses' => 'PeriodController@create',
    'as' => 'admin.periods.create'
]);

Route::post('administracion/periodos/agregar', [
    'uses' => 'PeriodController@store',
    'as' => 'admin.periods.store'
]);

Route::get('administracion/periodos/{period}/editar', [
    'uses' => 'PeriodController@edit',
    'as' => 'admin.periods.edit'
]);

Route::put('administracion/periodos/{period}/editar', [
    'uses' => 'PeriodController@update',
    'as' => 'admin.periods.update'
]);

Route::get('administracion/periodos/{period}/eliminar', [
    'uses' => 'PeriodController@destroy',
    'as' => 'admin.periods.destroy'
]);


/// MESHES
Route::get('administracion/mallas', [
    'uses' => 'MeshController@index',
    'as' => 'admin.meshes.index'
]);

Route::get('administracion/mallas/agregar', [
    'uses' => 'MeshController@create',
    'as' => 'admin.meshes.create'
]);

Route::post('administracion/mallas/agregar', [
    'uses' => 'MeshController@store',
    'as' => 'admin.meshes.store'
]);

Route::get('administracion/mallas/{mesh}', [
    'uses' => 'MeshController@show',
    'as' => 'admin.meshes.show'
]);

Route::get('administracion/mallas/{mesh}/editar', [
    'uses' => 'MeshController@edit',
    'as' => 'admin.meshes.edit'
]);

Route::put('administracion/mallas/{mesh}/editar', [
    'uses' => 'MeshController@update',
    'as' => 'admin.meshes.update'
]);

Route::get('administracion/mallas/{mesh}/eliminar', [
    'uses' => 'MeshController@destroy',
    'as' => 'admin.meshes.destroy'
]);
    /// Subject in Meshes
    Route::get('administracion/mallas/{mesh}/asignaturas/agregar', [
        'uses' => 'SubjectController@create',
        'as' => 'admin.meshes.subjects.create'
    ]);

    Route::post('administracion/mallas/{mesh}/asignaturas/agregar', [
        'uses' => 'SubjectController@store',
        'as' => 'admin.meshes.subjects.store'
    ]);
        /// Teacher and Period
            Route::get('administracion/mallas/{mesh}/asignaturas/{subject}', [
                'uses' => 'SubjectController@teacher',
                'as' => 'admin.meshes.subjects.teacher'
            ]);

            Route::post('administracion/mallas/{mesh}/asignaturas/{subject}', [
                'uses' => 'SubjectController@teacherStore',
                'as' => 'admin.meshes.subjects.teacher.store'
            ]);

            Route::get('administracion/mallas/{mesh}/asignaturas/{subject}/detalle', [
                'uses' => 'SubjectController@show',
                'as' => 'admin.meshes.subjects.show'
            ]);

/// Teachers

Route::get('administracion/docentes', [
    'uses' => 'TeacherController@index',
    'as' => 'admin.teachers.index'
]);

Route::get('administracion/docentes/agregar', [
    'uses' => 'TeacherController@create',
    'as' => 'admin.teachers.create'
]);

Route::post('administracion/docentes/agregar', [
    'uses' => 'TeacherController@store',
    'as' => 'admin.teachers.store'
]);

Route::get('administracion/docentes/{user}', [
    'uses' => 'TeacherController@show',
    'as' => 'admin.teachers.show'
]);

Route::get('administracion/docentes/{user}/editar', [
    'uses' => 'TeacherController@edit',
    'as' => 'admin.teachers.edit'
]);

Route::put('administracion/docentes/{user}/editar', [
    'uses' => 'TeacherController@update',
    'as' => 'admin.teachers.update'
]);

Route::get('administracion/docentes/{user}/eliminar', [
    'uses' => 'TeacherController@destroy',
    'as' => 'admin.teachers.destroy'
]);