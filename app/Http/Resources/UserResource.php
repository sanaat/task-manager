<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
        $time = $created_date->format('h:i A');  // Format for time (12-hour format with AM/PM)
        //gettign token
        $token=$this->token;
        return [
            'id'=>(int)$this->id,
            'name' =>ucfirst($this->name),
            'email' => $this->email,
            'date' => $date,
            'time' => $time,
            'token'=>$token,

        ];
    }
}
