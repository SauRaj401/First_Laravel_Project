<?php
namespace App\Models;

class Listing{
    public static function all(){
        //we can use the database too.
        return  [
            [
                'id' => 1,
                'title' => 'listing one',
                'description' => 'Love to do that.'
            ],
            [
                'id' => 2,
                'title' => 'listing two',
                'description' => 'Love to do that022.'
            ]
            ];
    }
    //so we are going to use eloquent which can find what we want without bunch of codes.
    public static function find($id){
        $listings = self::all();
        foreach($listings as $listing){
            if($listing['id'] == $id){
                return $listing;
            }
        }

    }
}


?>