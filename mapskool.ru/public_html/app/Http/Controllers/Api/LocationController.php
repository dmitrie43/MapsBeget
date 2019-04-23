<?php

namespace App\Http\Controllers\Api;

use App\Event;
use App\Http\Resources\OrganizationResource;
use App\Organization;
use App\Responsible;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function index()
    {
        $data = Organization::all();
        return json_encode(OrganizationResource::collection($data), JSON_UNESCAPED_UNICODE);
    }

    public function show(Organization $organization)
    {
        $org = Organization::where('id', $organization->id)->select('nameOrganization', 'area_id', 'statusOrganization', 'numberDocumentation', 'reduction')->get();
        $resp = Organization::find($organization->id)->responsible()->select('surname', 'name', 'patronymic', 'telephone')->get();
        $dir = Organization::find($organization->id)->director()->select('surname', 'name', 'patronymic')->get();
        $teach = Organization::find($organization->id)->teachers()->select('surname', 'name', 'patronymic')->get();
        $museum = Organization::find($organization->id)->museums()->select('description', 'exposition', 'head')->get();
        $cab = Organization::find($organization->id)->cabinets()->select('description', 'head')->get();
        $other = Organization::find($organization->id)->others()->select('description')->get();
        $sub = Organization::find($organization->id)->subjectStudy()->select('title', 'level')->get();
        $book = Organization::find($organization->id)->book()->select('author', 'name', 'publish', 'year')->get();
        $meth = Organization::find($organization->id)->methodolog()->select('author', 'name', 'publish', 'year')->get();
        $open = Organization::find($organization->id)->openClassroom()->select('description', 'class', 'head')->get();
        $soc = Organization::find($organization->id)->society()->select('name', 'class', 'head', 'description')->get();
        $col = Organization::find($organization->id)->collective()->select('head', 'name', 'ageChildren', 'description')->get();
        $event = Organization::find($organization->id)->event()->select('level', 'form', 'name', 'date')->get();
        $add = Organization::find($organization->id)->additionalInfo()->select('description')->get();
        $data = [$org, $resp, $dir, $teach, $museum, $cab, $other, $sub,
            $book, $meth, $open, $soc, $col, $event, $add];
//        $simple = [$org, $resp, $dir, $other, $add];
        $key = ['organization', 'responsible', 'director', 'teachers', 'museums', 'cabinets', 'others',
            'subjects', 'books', 'methodologs', 'openClassrooms', 'societies', 'collectives', 'events', 'additionalInfo'];
        $iteration = 0;
        foreach ($data as $elem) {
            if ($elem->count() != null) {
                $items[] = json_decode($elem, true);
                $keys[] = $key[$iteration];
            }
            $iteration++;
        }
        $res = array_combine($keys, $items);

        return json_encode($res, JSON_UNESCAPED_UNICODE);

//        $data = [$org, $resp, $dir, $teach, $museum, $cab, $other, $sub,
//            $book, $meth, $open, $soc, $col, $event, $add];
//        $key = ['organization', 'responsible', 'director', 'teachers', 'museums', 'cabinets', 'others',
//            'subjects', 'books', 'methodologs', 'openClassrooms', 'societies', 'collectives', 'events', 'additionalInfo'];
//        $iteration = 0;
//        foreach ($data as $elem) {
//            if ($elem->count() != null) {
//                foreach ($elem as $item) {
//                    $iterations[] = $iteration;
//                    $items = json_decode($item, true);
//                    $keys = $key[$iteration];
//                    $iterationRes = array_count_values($iterations);
//                    foreach ($iterationRes as $value) {
//                        if ($value > 1) {
//                            $itemsRes1[] = $items;
//                        } else {
//                            $itemsRes2[] = $items;
//                        }
//                    }
//                }
//            }
//            $iteration++;
//        }
//        dd($itemsRes1);
//        $res = array_combine($keys, $items);
//        return json_encode($res, JSON_UNESCAPED_UNICODE);

//        $simple = [$org, $resp, $dir];
//        foreach ($simple as $item) {
//            foreach ($item as $elem) {
//                $arr[] = $elem;
//            }
//        }
//
//        $org2 = $arr[0];
//        $resp2 = $arr[1];
//        $dir2 = $arr[2];
//
//        $res = [
//            'organization' => $org2,
//            'responsible' => $resp2,
//            'director' => $dir2,
//            'teachers' => $teach,
//            'museums' => $museum,
//            'cabinets' => $cab,
//            'others' => $other,
//            'subjects' => $sub,
//            'books' => $book,
//            'methodologs' => $meth,
//            'openClassrooms' => $open,
//            'societies' => $soc,
//            'collectives' => $col,
//            'events' => $event,
//            'additionalInfo' => $add
//        ];

//        $array2 = [
//            ['organization' => $org],
//            ['responsible' => $resp],
//            ['director' => $dir],
//            ['teachers' => $teach],
//            ['museums' => $museum],
//            ['cabinets' => $cab],
//            ['others' => $other],
//            ['subjects' => $sub],
//            ['books' => $book],
//            ['methodologs' => $meth],
//            ['openClassrooms' => $open],
//            ['societies' => $soc],
//            ['collectives' => $col],
//            ['events' => $event],
//            ['additionalInfo' => $add]
//        ];
//        $array = [$org, $resp, $dir, $teach, $museum, $cab, $other, $sub,
//            $book, $meth, $open, $soc, $col, $event, $add];
//        $keys = ['organization', 'responsible', 'director', 'teachers', 'museums', 'cabinets', 'others',
//            'subjects', 'books', 'methodologs', 'openClassrooms', 'societies', 'collectives', 'events', 'additionalInfo'];
//        foreach ($array as $elem) {
//            foreach ($elem as $item) {
//                dd($item);
//                $res2[] = $item;
//                echo json_encode($item, JSON_UNESCAPED_UNICODE);
//                $res = array_combine($keys, $item);
//            }
//        }
//        $res = array_combine($keys, $res1);
//        dd(json_encode($res2, JSON_UNESCAPED_UNICODE));

//        $res = object_get();
//        foreach ($array as $elem) {
//            foreach ($elem as $item) {
//                dd($item['table']);
//                echo json_encode($item, JSON_UNESCAPED_UNICODE);
//            }
//        }

    }

    public function name() {
        $res = [
            'teachers' => 'учителя',
            'museums' => 'музеи',
            'cabinets' => 'кабинеты',
            'others' => 'прочее',
            'subjects' => 'предметы',
            'books' => 'учебники',
            'methodologs' => 'методические обеспечение',
            'openClassrooms' => 'факультативы',
            'societies' => 'кружки',
            'collectives' => 'коллективы',
            'events' => 'мероприятия',
            'additionalInfo' => 'дополнительная информация'
        ];

        return json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}
