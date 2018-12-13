<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use Illuminate\Http\Request;
class ImportController extends Controller
{
    function index(Request $request) {
        $file = $request->file('import');

        try {
            $this->parseXml($file);
        } catch (\Exception $e) {
            return response('Error', 502);
        }
        return redirect('/');
    }
    private function parseXml($file) {
        $xml = simplexml_load_file($file);

        foreach ($xml->org as $item) {
            $org = new Organisation([
                'name' => $item['displayName'],
                'ogrn' => $item['ogrn'],
                'oktmo' => $item['oktmo'],
            ]);
            $org->save();
            $usersQuery = [];
            foreach($item->user as $user) {
                $usersQuery[] = [
                    'first_name' => $user['firstname'],
                    'last_name' => $user['lastname'],
                    'middle_name' => $user['middlename'],
                    'inn' => $user['inn'],
                    'snils' => $user['snils']
                ];
            }
            $org->users()
                ->createMany($usersQuery);
        }
    }
}
