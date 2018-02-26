<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@home')->name('index');

/// Syllables ROUTES
/// /silabos
Route::group(['prefix' => 'silabos', 'middleware' => ['auth', 'teacher']], function () {
    Route::get('/', [
        'uses' => 'SyllableController@index',
        'as'=> 'syllable.index'
    ]);

    Route::get('crear', [
        'uses' => 'SyllableController@create',
        'as'=> 'syllable.create'
    ]);

    Route::post('crear', [
        'uses' => 'SyllableController@store',
        'as'=> 'syllable.store'
    ]);
    /// /silabos/{syllable}
    Route::group(['prefix' => '{syllable}', 'middleware' => ['owner']], function () {
        Route::get('/', [
            'uses' => 'SyllableController@show',
            'as' => 'syllable.show'
        ])->where('syllable', '\d+');

        Route::get('/editar', [
            'uses' => 'SyllableController@edit',
            'as' => 'syllable.edit'
        ])->where('syllable', '\d+');

        Route::post('/editar', [
            'uses' => 'SyllableController@update',
            'as' => 'syllable.update'
        ])->where('syllable', '\d+');

        Route::get('/imprimir', [
            'uses' => 'SyllableController@print',
            'as' => 'syllable.print'
        ])->where('syllable', '\d+');

        /// /silabos/{syllable}/unidades
        Route::group(['prefix' => 'unidades'], function () {
            Route::get('agregar', [
                'uses' => 'UnitController@create',
                'as' => 'syllable.unit.create'
            ])->where('syllable', '\d+');

            Route::post('agregar', [
                'uses' => 'UnitController@store',
                'as' => 'syllable.unit.store'
            ])->where('syllable', '\d+');

            /// /silabos/{syllable}/unidades/{unit}
            Route::group(['prefix' => '{unit}'], function () {
                Route::get('editar', [
                    'uses' => 'UnitController@edit',
                    'as' => 'syllable.unit.edit'
                ])->where('syllable', '\d+')->where('unit', '\d+');

                Route::post('editar', [
                    'uses' => 'UnitController@update',
                    'as' => 'syllable.unit.update'
                ])->where('syllable', '\d+')->where('unit', '\d+');

                Route::get('eliminar', [
                    'uses' => 'UnitController@destroy',
                    'as' => 'syllable.unit.destroy'
                ])->where('syllable', '\d+')->where('unit', '\d+');

                /// /silabos/{syllable}/unidades/{unit}/temas
                Route::group(['prefix' => 'temas'], function () {
                    Route::get('/', [
                        'uses' => 'UnitController@show',
                        'as' => 'syllable.unit.show'
                    ])->where('syllable', '\d+')->where('unit', '\d+');

                    Route::get('crear', [
                        'uses' => 'TopicController@create',
                        'as' => 'syllable.unit.topic.create'
                    ])->where('syllable', '\d+')->where('unit', '\d+');

                    Route::post('crear', [
                        'uses' => 'TopicController@store',
                        'as' => 'syllable.unit.topic.store'
                    ])->where('syllable', '\d+')->where('unit', '\d+');
                });
            });

        });

        /// /silabos/{syllable}/escenarios-de-aprendizaje
        Route::group(['prefix' => 'escenarios-de-aprendizaje'], function () {
            Route::get('agregar', [
                'uses' => 'ScenarioController@create',
                'as' => 'syllable.scenario.create'
            ])->where('syllable', '\d+');

            Route::post('agregar', [
                'uses' => 'ScenarioController@store',
                'as' => 'syllable.scenario.store'
            ])->where('syllable', '\d+');

            Route::get('editar/{stage}', [
                'uses' => 'ScenarioController@edit',
                'as' => 'syllable.scenario.edit'
            ])->where('syllable', '\d+');

            Route::post('editar/{stage}', [
                'uses' => 'ScenarioController@update',
                'as' => 'syllable.scenario.update'
            ])->where('syllable', '\d+');
        });

        /// /silabos/{syllable}/avaluaciones

        Route::group(['prefix' => 'evaluaciones'], function () {
            Route::get('agregar', [
                'uses' => 'EvaluationController@create',
                'as' => 'syllable.evaluation.create'
            ])->where('syllable', '\d+');

            Route::post('agregar', [
                'uses' => 'EvaluationController@store',
                'as' => 'syllable.evaluation.store'
            ])->where('syllable', '\d+');

            /// /silabos/evaluaciones/{evaluation}
            Route::group(['prefix' => '{evaluation}'], function () {
                Route::get('editar', [
                    'uses' => 'EvaluationController@edit',
                    'as'   => 'syllable.evaluation.edit'
                ]);

                Route::post('editar', [
                    'uses' => 'EvaluationController@update',
                    'as'   => 'syllable.evaluation.update'
                ]);
            });
        });

        /// /silabos/{syllable}/bibliografia
        Route::group(['prefix' => 'bibliografias'], function () {
            Route::get('agregar', [
                'uses' => 'BibliographyController@create',
                'as' => 'syllable.bibliography.create'
            ])->where('syllable', '\d+');

            Route::post('agregar', [
                'uses' => 'BibliographyController@store',
                'as' => 'syllable.bibliography.store'
            ])->where('syllable', '\d+');

            Route::get('editar/{bibliography}', [
                'uses' => 'BibliographyController@edit',
                'as' => 'syllable.bibliography.edit'
            ])->where('syllable', '\d+');

            Route::post('editar/{bibliography}', [
                'uses' => 'BibliographyController@update',
                'as' => 'syllable.bibliography.update'
            ])->where('syllable', '\d+');

        });
    });
});

/// Coordinator URLs
/// /coordinador-academico

Route::group(['prefix' => 'coordinador-academico', 'middleware' => ['auth', 'coordinator']], function() {
    Route::get('/', [
        'uses' => 'coordinator\PeriodController@index',
        'as' => 'coordinator.index'
    ]);

    Route::group(['prefix' => '{period}'], function () {
        Route::get('/', [
            'uses' => 'coordinator\TeacherController@index',
            'as' => 'coordinator.teacher.index'
        ]);

        Route::group(['prefix' => 'docentes/{user}'], function () {
            Route::get('/', [
               'uses' => 'coordinator\TeacherController@syllables',
               'as' => 'coordinator.teacher.syllable'
            ]);

            Route::group(['prefix' => 'silabos'], function () {
                /// /silabos/{syllable}
                Route::group(['prefix' => '{syllable}'], function () {
                    Route::get('/', [
                        'uses' => 'coordinator\SyllableController@show',
                        'as' => 'coordinator.syllable.show'
                    ])->where('syllable', '\d+');

                    Route::get('/editar', [
                        'uses' => 'SyllableController@edit',
                        'as' => 'coordinator.syllable.edit'
                    ])->where('syllable', '\d+');

                    Route::post('/editar', [
                        'uses' => 'coordinator\SyllableController@update',
                        'as' => 'coordinator.syllable.update'
                    ])->where('syllable', '\d+');

                    Route::get('/imprimir', [
                        'uses' => 'SyllableController@print',
                        'as' => 'coordinator.syllable.print'
                    ])->where('syllable', '\d+');

                    /// /silabos/{syllable}/unidades
                    Route::group(['prefix' => 'unidades'], function () {
                        Route::get('agregar', [
                            'uses' => 'UnitController@create',
                            'as' => 'coordinator.syllable.unit.create'
                        ])->where('syllable', '\d+');

                        Route::post('agregar', [
                            'uses' => 'UnitController@store',
                            'as' => 'coordinator.syllable.unit.store'
                        ])->where('syllable', '\d+');

                        /// /silabos/{syllable}/unidades/{unit}
                        Route::group(['prefix' => '{unit}'], function () {
                            Route::get('editar', [
                                'uses' => 'UnitController@edit',
                                'as' => 'coordinator.syllable.unit.edit'
                            ])->where('syllable', '\d+')->where('unit', '\d+');

                            Route::post('editar', [
                                'uses' => 'UnitController@update',
                                'as' => 'coordinator.syllable.unit.update'
                            ])->where('syllable', '\d+')->where('unit', '\d+');

                            Route::get('eliminar', [
                                'uses' => 'UnitController@destroy',
                                'as' => 'coordinator.syllable.unit.destroy'
                            ])->where('syllable', '\d+')->where('unit', '\d+');

                            /// /silabos/{syllable}/unidades/{unit}/temas
                            Route::group(['prefix' => 'temas'], function () {
                                Route::get('/', [
                                    'uses' => 'UnitController@show',
                                    'as' => 'coordinator.syllable.unit.show'
                                ])->where('syllable', '\d+')->where('unit', '\d+');

                                Route::get('crear', [
                                    'uses' => 'TopicController@create',
                                    'as' => 'coordinator.syllable.unit.topic.create'
                                ])->where('syllable', '\d+')->where('unit', '\d+');

                                Route::post('crear', [
                                    'uses' => 'TopicController@store',
                                    'as' => 'coordinator.syllable.unit.topic.store'
                                ])->where('syllable', '\d+')->where('unit', '\d+');
                            });
                        });
                    });

                    /// /silabos/{syllable}/escenarios-de-aprendizaje
                    Route::group(['prefix' => 'escenarios-de-aprendizaje'], function () {
                        Route::get('agregar', [
                            'uses' => 'ScenarioController@create',
                            'as' => 'coordinator.syllable.scenario.create'
                        ])->where('syllable', '\d+');

                        Route::post('agregar', [
                            'uses' => 'ScenarioController@store',
                            'as' => 'coordinator.syllable.scenario.store'
                        ])->where('syllable', '\d+');



                        Route::post('editar/{stage}', [
                            'uses' => 'ScenarioController@update',
                            'as' => 'coordinator.syllable.scenario.update'
                        ])->where('syllable', '\d+');
                    });

                    /// /silabos/{syllable}/avaluaciones

                    Route::group(['prefix' => 'evaluaciones'], function () {
                        Route::get('agregar', [
                            'uses' => 'EvaluationController@create',
                            'as' => 'coordinator.syllable.evaluation.create'
                        ])->where('syllable', '\d+');

                        Route::post('agregar', [
                            'uses' => 'EvaluationController@store',
                            'as' => 'coordinator.syllable.evaluation.store'
                        ])->where('syllable', '\d+');

                        /// /silabos/evaluaciones/{evaluation}
                        Route::group(['prefix' => '{evaluation}'], function () {
                            Route::get('editar', [
                                'uses' => 'EvaluationController@edit',
                                'as'   => 'coordinator.syllable.evaluation.edit'
                            ]);

                            Route::post('editar', [
                                'uses' => 'EvaluationController@update',
                                'as'   => 'coordinator.syllable.evaluation.update'
                            ]);
                        });
                    });

                    /// /silabos/{syllable}/bibliografia
                    Route::group(['prefix' => 'bibliografias'], function () {
                        Route::get('agregar', [
                            'uses' => 'BibliographyController@create',
                            'as' => 'coordinator.syllable.bibliography.create'
                        ])->where('syllable', '\d+');

                        Route::post('agregar', [
                            'uses' => 'BibliographyController@store',
                            'as' => 'coordinator.syllable.bibliography.store'
                        ])->where('syllable', '\d+');

                        Route::get('editar/{bibliography}', [
                            'uses' => 'BibliographyController@edit',
                            'as' => 'coordinator.syllable.bibliography.edit'
                        ])->where('syllable', '\d+');

                        Route::post('editar/{bibliography}', [
                            'uses' => 'BibliographyController@update',
                            'as' => 'coordinator.syllable.bibliography.update'
                        ])->where('syllable', '\d+');

                    });
                });
            });

        });

    });


});

/* ADMIN ROUTES */
Route::group(['prefix' => 'administracion', 'middleware' => ['auth', 'admin']], function () {
    /// Admin home
    /// /administracion
    Route::get('/', [
        'uses' => 'HomeController@admin',
        'as' => 'admin.home'
    ]);

    /// FACULTIES
    /// /administracion/facultades
    Route::group(['prefix' => 'facultades'], function () {
        Route::get('/', [
            'uses' => 'FacultyController@index',
            'as' => 'admin.faculties.index'
        ]);

        Route::get('agregar', [
            'uses' => 'FacultyController@create',
            'as' => 'admin.faculties.create'
        ]);

        Route::post('agregar', [
            'uses' => 'FacultyController@store',
            'as' => 'admin.faculties.store'
        ]);
        /// /administracion/facultades/{faculty}
        Route::group(['prefix' => '{faculty}'], function () {
            Route::get('editar', [
                'uses' => 'FacultyController@edit',
                'as' => 'admin.faculties.edit'
            ]);

            Route::put('editar', [
                'uses' => 'FacultyController@update',
                'as' => 'admin.faculties.update'
            ]);

            Route::get('eliminar', [
                'uses' => 'FacultyController@destroy',
                'as' => 'admin.faculties.destroy'
            ]);
        });


    });

    /// SCHOOLS
    /// /administracion/escuelas
    Route::group(['prefix' => 'escuelas'], function () {
        Route::get('/', [
            'uses' => 'SchoolController@index',
            'as' => 'admin.schools.index'
        ]);
        Route::get('agregar', [
            'uses' => 'SchoolController@create',
            'as' => 'admin.schools.create'
        ]);
        Route::post('agregar', [
            'uses' => 'SchoolController@store',
            'as' => 'admin.schools.store'
        ]);
        /// /administracion/escuelas/{school}
        Route::group(['prefix' => '{school}'], function () {
            Route::get('editar', [
                'uses' => 'SchoolController@edit',
                'as' => 'admin.schools.edit'
            ]);

            Route::put('editar', [
                'uses' => 'SchoolController@update',
                'as' => 'admin.schools.update'
            ]);

            Route::get('eliminar', [
                'uses' => 'SchoolController@destroy',
                'as' => 'admin.schools.destroy'
            ]);
        });
    });

    /// CAREERS
    /// /administracion/carreras
    Route::group(['prefix' => 'carreras'], function () {
        Route::get('/', [
            'uses' => 'CareerController@index',
            'as' => 'admin.careers.index'
        ]);

        Route::get('agregar', [
            'uses' => 'CareerController@create',
            'as' => 'admin.careers.create'
        ]);

        Route::post('agregar', [
            'uses' => 'CareerController@store',
            'as' => 'admin.careers.store'
        ]);

        ////administracion/carreras/{career}
        Route::group(['prefix' => '{career}'], function () {
            Route::get('editar', [
                'uses' => 'CareerController@edit',
                'as' => 'admin.careers.edit'
            ]);

            Route::put('editar', [
                'uses' => 'CareerController@update',
                'as' => 'admin.careers.update'
            ]);

            Route::get('eliminar', [
                'uses' => 'CareerController@destroy',
                'as' => 'admin.careers.destroy'
            ]);
        });

    });

    /// PERIODS
    /// /administracion/periodos
    Route::group(['prefix' => 'periodos'], function () {
        Route::get('/', [
            'uses' => 'PeriodController@index',
            'as' => 'admin.periods.index'
        ]);

        Route::get('agregar', [
            'uses' => 'PeriodController@create',
            'as' => 'admin.periods.create'
        ]);

        Route::post('agregar', [
            'uses' => 'PeriodController@store',
            'as' => 'admin.periods.store'
        ]);
        /// /administracion/periodos/{period}
        Route::group(['prefix' => '{period}'], function () {
            Route::get('editar', [
                'uses' => 'PeriodController@edit',
                'as' => 'admin.periods.edit'
            ]);

            Route::put('editar', [
                'uses' => 'PeriodController@update',
                'as' => 'admin.periods.update'
            ]);

            Route::get('eliminar', [
                'uses' => 'PeriodController@destroy',
                'as' => 'admin.periods.destroy'
            ]);
        });

    });

    /// MESHES
    /// /administracion/mallas
    Route::group(['prefix' => 'mallas'], function () {
        Route::get('/', [
            'uses' => 'MeshController@index',
            'as' => 'admin.meshes.index'
        ]);
        Route::get('agregar', [
            'uses' => 'MeshController@create',
            'as' => 'admin.meshes.create'
        ]);
        Route::post('agregar', [
            'uses' => 'MeshController@store',
            'as' => 'admin.meshes.store'
        ]);

        /// /administracion/mallas/{mesh}
        Route::group(['prefix' => '{mesh}'], function () {
            Route::get('/', [
                'uses' => 'MeshController@show',
                'as' => 'admin.meshes.show'
            ]);
            Route::get('editar', [
                'uses' => 'MeshController@edit',
                'as' => 'admin.meshes.edit'
            ]);
            Route::put('editar', [
                'uses' => 'MeshController@update',
                'as' => 'admin.meshes.update'
            ]);
            Route::get('eliminar', [
                'uses' => 'MeshController@destroy',
                'as' => 'admin.meshes.destroy'
            ]);
            /// Subject in Meshes
            /// /administracion/mallas/{mesh}/asignaturas
            Route::group(['prefix' => 'asignaturas'], function () {
                Route::get('agregar', [
                    'uses' => 'SubjectController@create',
                    'as' => 'admin.meshes.subjects.create'
                ]);

                Route::post('agregar', [
                    'uses' => 'SubjectController@store',
                    'as' => 'admin.meshes.subjects.store'
                ]);

                /// Teacher and Period
                /// /administracion/mallas/{mesh}/asignaturas/{subject}
                Route::group(['prefix' => '{subject}'], function () {
                    Route::get('/', [
                        'uses' => 'SubjectController@teacher',
                        'as' => 'admin.meshes.subjects.teacher'
                    ]);

                    Route::post('/', [
                        'uses' => 'SubjectController@teacherStore',
                        'as' => 'admin.meshes.subjects.teacher.store'
                    ]);

                    Route::get('detalle', [
                        'uses' => 'SubjectController@show',
                        'as' => 'admin.meshes.subjects.show'
                    ]);
                });
            });
        });
    });

    /// Teachers
    /// /administracion/docentes
    Route::group(['prefix' => 'docentes'], function () {
        Route::get('/', [
            'uses' => 'TeacherController@index',
            'as' => 'admin.teachers.index'
        ]);

        Route::get('agregar', [
            'uses' => 'TeacherController@create',
            'as' => 'admin.teachers.create'
        ]);

        Route::post('agregar', [
            'uses' => 'TeacherController@store',
            'as' => 'admin.teachers.store'
        ]);
        /// /administracion/docentes/{user}
        Route::group(['prefix' => '{user}'], function () {
            Route::get('/', [
                'uses' => 'TeacherController@show',
                'as' => 'admin.teachers.show'
            ]);

            Route::get('editar', [
                'uses' => 'TeacherController@edit',
                'as' => 'admin.teachers.edit'
            ]);

            Route::put('editar', [
                'uses' => 'TeacherController@update',
                'as' => 'admin.teachers.update'
            ]);

            Route::get('eliminar', [
                'uses' => 'TeacherController@destroy',
                'as' => 'admin.teachers.destroy'
            ]);
        });
    });
});
