<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    //
    public function showHelloworldForm()
    {
        // dd("HEHE");
        return view('hello-world');
    }

    public function helloworld($n)
    {
        $result = [];
        for ($i = 1; $i <= $n; $i++) {
            if ($i % 4 == 0 && $i % 5 == 0) {
                $result[] = 'helloworld';
            } elseif ($i % 4 == 0) {
                $result[] = 'hello';
            } elseif ($i % 5 == 0) {
                $result[] = 'world';
            } else {
                $result[] = $i;
            }
        }
        return implode(' ', $result);
    }

    public function processHelloworld(Request $request)
    {
        $request->validate([
            'n' => 'required|integer|min:1',
        ]);

        $n = $request->input('n');
        $output = $this->helloworld($n);

        return view('hello-world', compact('output', 'n'));
    }
}
