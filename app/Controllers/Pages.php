<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Home'
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'judul' => 'About Me'
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'judul' => 'Contact us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Kongsi No.103',
                    'kota' => 'Medan'
                ]
            ],
            'kampus' => [

                [
                    'tipe' => 'Kampus',
                    'alamat' => 'Jl. Dr.Mansyur no.8',
                    'kota' => 'Medan, Padang Bulan'
                ]
            ],
            'sosial' => [
                [
                    'wa' => '083192164289'
                ]
            ]


        ];

        return view('pages/contact', $data);
    }

    //--------------------------------------------------------------------

}
