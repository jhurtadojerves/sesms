<?php

namespace App\Http\Controllers;

use App\Career;
use App\Faculty;
use App\School;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Artisaninweb\SoapWrapper\SoapWrapper;
use SoapHeader;
use SoapClient;
use SoapVar;

use App\Period;


class SoapController
{
    /**
     * @var SoapWrapper
     */
    protected $soapWrapper;

    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
        $this->soapWrapper->add('InfoGeneral', function ($service) {
            $ns = "http://academico.espoch.edu.ec/";
            $auth = "<credentials xmlns=\"http://academico.espoch.edu.ec/\"><username>webmail</username>";
            $auth .= "<password>webmail</password></credentials>";
            $auth_block = new SoapVar( $auth, XSD_ANYXML, NULL, NULL, NULL, NULL );
            $header = new SoapHeader( $ns, 'Header', $auth_block );
            $service
                ->wsdl('http://172.17.103.26/oasis/OAS_Interop/InfoGeneral.asmx?WSDL')
                ->trace(true)
                ->customHeader($header)
            ;
        });
        $this->soapWrapper->add('InfoCarrera', function ($service) {
            $ns = "http://academico.espoch.edu.ec/";
            $auth = "<credentials xmlns=\"http://academico.espoch.edu.ec/\"><username>webmail</username>";
            $auth .= "<password>webmail</password></credentials>";
            $auth_block = new SoapVar( $auth, XSD_ANYXML, NULL, NULL, NULL, NULL );
            $header = new SoapHeader( $ns, 'Header', $auth_block );
            $service
                ->wsdl('http://172.17.103.26/oasis/OAS_Interop/InfoCarrera.asmx?WSDL')
                ->trace(true)
                ->customHeader($header)
            ;
        });
    }

    public function career() {
        $response = $this->soapWrapper->call('InfoGeneral.GetTodasCarreras');
        $schools = School::all()->pluck('code', 'code')->toArray();
        $schools_id = School::all()->pluck('id', 'code')->toArray();
        $careers = $response->GetTodasCarrerasResult->UnidadAcademica;
        foreach ($careers as $career) {
            if (in_array($career->CodEscuela, $schools)) {
                $career_get = Career::where('code', $career->Codigo);
                $create_or_update = [
                    'code' => $career->Codigo,
                    'name' => $career->Nombre,
                    'acronym' => $career->Codigo,
                    'id_school' => $schools_id[$career->CodEscuela],
                ];
                if($career_get->count() === 0) {
                    Career::create($create_or_update);
                }
                else {
                    $career_get->first()->update($create_or_update);
                }
            }
        }
        \Alert::success("Las carreras se registraron correctamente");
        return redirect(route('admin.careers.index'));
    }

    public function school() {
        $response = $this->soapWrapper->call('InfoGeneral.GetTodasEscuelas');
        $faculties = Faculty::where('opened', 1)->pluck('code', 'code')->toArray();
        $faculties_id = Faculty::where('opened', 1)->pluck('id', 'code')->toArray();

        $schools = $response->GetTodasEscuelasResult->Escuela;

        foreach ($schools as $school) {
            if (in_array($school->CodFacultad, $faculties)) {
                $strToTime = strtotime($school->FechaCreacion);
                $create_or_update = [
                    'code' => $school->Codigo,
                    'name' => $school->Nombre,
                    'id_faculty' => $faculties_id[$school->CodFacultad],
                    'foundation' => date('y-m-d', $strToTime),
                    'acronym' => $school->Codigo,
                ];
                $school_get = School::where('code', $school->Codigo);
                if($school_get->count() === 0) {
                    School::create($create_or_update);
                }
                else {
                    $school_get->first()->update($create_or_update);
                }

            }
        }
        \Alert::success("Las escuelas se registraron correctamente");
        return redirect(route('admin.schools.index'));
    }

    public function faculty() {
        $response = $this->soapWrapper->call('InfoGeneral.GetTodasFacultades');
        $faculties = $response->GetTodasFacultadesResult->Facultad;
        foreach($faculties as $faculty) {
            $faculty_get = Faculty::where('code', $faculty->Codigo);
            $strToTime = strtotime($faculty->FechaCreacion);
            $create_or_update = [
                'code' => $faculty->Codigo,
                'name' => $faculty->Nombre,
                'foundation' => date('y-m-d', $strToTime),
                'acronym' => $faculty->Codigo,
                'status' => 1,
            ];
            if($faculty_get->count() === 0) {
                Faculty::create($create_or_update);
            }
            else {
                $faculty_get->first()->update($create_or_update);
            }
        }
        \Alert::success("Las facultades se registraron correctamente");
        return redirect(route('admin.faculties.index'));
    }
    /**
     * Use the SoapWrapper
     */
    public function period()
    {
        $response = $this->soapWrapper->call('InfoGeneral.GetPeriodoActual');
        $count = Period::where('code', $response->GetPeriodoActualResult->Codigo)->count();

        if ($count === 0) {
            $periods = Period::all();
            foreach ($periods as &$period_for){
                $period_for->status = 0;
                $period_for->save();
            }
            $period = Period::create([
                'star' => $response->GetPeriodoActualResult->FechaInicio,
                'end' => $response->GetPeriodoActualResult->FechaFin,
                'name' => $response->GetPeriodoActualResult->Descripcion,
                'code' => $response->GetPeriodoActualResult->Codigo,
                'status' =>  1,
            ]);
            \Alert::success("El periodo académico $period->name se registró correctamente");
        }
        else {

            $period = Period::where('code', $response->GetPeriodoActualResult->Codigo)->first();
            $period->status = 1;
            \Alert::success("El periodo académico $period->name ya se encuentra registrado");
        }
        return redirect(route('admin.periods.index'));

    }
}
