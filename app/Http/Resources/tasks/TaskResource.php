<?php

namespace App\Http\Resources\tasks;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $created_date = Carbon::parse($this->created_at);
        $date = $created_date->format('Y-m-d');  // Format for date (YYYY-MM-DD)
        $time = $created_date->format('h:i A');
        return [
            'id'=>$this->id,
            'title'=>ucfirst($this->title),
            'description'=>$this->description,
            'date' => $date,
            'time' => $time,
            'completed'=>$this->completed?true:false,

        ];
    }
}
