<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Fundraiser;


class FundraiserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fundraiser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' =>'1',
            'location'=>$this->faker->address, 
            'title'=>'Save ' .$this->faker->company, 
            'icon' =>'1.jpg',
            'benificiary_name'=>$this->faker->name, 
            'needed_amount'=>'111',
            'deadline'=> '5/11/2020', 
            'story'=>$this->faker->sentence ,
            'thumbnail' => '1.jpg',
            'photo' => '1.jpg',
            'video' => '1.jpg',
            'proof_document' => '1.jpg',
            'status' => '1',
            'private' =>'0' ,
            'urgent' => '0',
            'created_at' => $this->faker->dateTimeBetween('-6 month' , '+1 month'),
        ];
    }
}
