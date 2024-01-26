<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function getAll() {
        $bands = $this->getBands();

        return response()->json([$bands]);
    }

    protected function getBands() {
        return [
            [
                'id' => 1,
                'name' => 'dream teather',
                'gender' => 'progressivo'
            ],
            [
                'id' => 2,
                'name' => 'megadeth',
                'gender' => 'trash metal'
            ],
            [
                'id' => 3,
                'name' => 'dio',
                'gender' => 'heavy metal'
            ],
        ];
    }

    public function getById($id)
    {
        foreach($this->getBands() as $_band) {
            if ($_band['id'] == $id) {
                $band = $_band;
            }
        }
        return response()->json($band);
    }

    public function getBandsByGender($gender)
    {
        $bands = [
            [
                'id' => 1,
                'name' => 'dream teather',
                'gender' => 'progressivo'
            ],
        ];

        foreach($this->getBands() as $_band) {
            if ($_band['gender'] == $gender) {
                $bands[] = $_band;
            }
        }
        return response()->json($bands);
    }


    public function store(Request $request)
    {
        $request->validate([
            'id' => 'numeric',
            'name' => 'required|min:3'
        ]);

        return response()->json($request->all());
    }

}
