<?php

namespace App\Http\Resources;

use App\Area;
use App\Organization;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
//        $arrCount = $this->event->toArray();
//        $count = 0;
//        foreach ($arrCount as $value) {
//            $count ++;

        $org = Organization::where('id', $this->id)->get();
        foreach ($org as $elem) {
            $area_id = $elem->area_id;
        }
        $area = Area::where('id', $area_id)->get();
        foreach ($area as $item) {
            $areaName = $item->name;
        }

        return [
            'id' => $this->id,
            'nameOrganization' => $this->nameOrganization,
            'area' => $areaName,
            'reduction' => $this->reduction,
//            'longitude' => $this->longitude,
//            'latitude' => $this->latitude,
//            'statusOrganization' => $this->statusOrganization,
//            'numberDocumentation' => $this->numberDocumentation,
//            'formEvent' => optional($this->formEvent)->formEvent
//            'surnameResp' => optional($this->responsible)->surnameResp,
//            'nameResp' => optional($this->responsible)->nameResp,
//            'patronymicResp' => optional($this->responsible)->patronymicResp,
//            'telephoneResp' => optional($this->responsible)->telephoneResp,
        ];
//        }
    }
}
