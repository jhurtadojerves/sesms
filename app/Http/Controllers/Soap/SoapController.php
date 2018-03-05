<?php

namespace App\Http\Controllers\Soap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artisaninweb\SoapWrapper\SoapWrapper;
class SoapController
{
    /**
     * @var SoapWrapper
     */
    protected $soapWrapper;

    /**
     * SoapController constructor.
     *
     * @param SoapWrapper $soapWrapper
     */
    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
    }

    /**
     * Use the SoapWrapper
     */
    public function show()
    {
        $this->soapWrapper->add('PeriodoAcademico', function ($service) {
            $service
                ->wsdl('http://172.17.103.26/oasis/OAS_Interop/InfoGeneral.asmx?WSDL')
                ->trace(true)
                ->options([
                    'username' => 'webmail',
                    'password' => 'webmail'
                ])
                ->classmap([
                    GetPeriodoActual::class,
                    GetPeriodoActualResponse::class,
                ]);
        });
        // With classmap
        $response = $this->soapWrapper->call('PeriodoAcademico.GetPeriodoActual');

        var_dump($response);
        exit;
    }
}