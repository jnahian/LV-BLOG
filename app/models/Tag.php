<?php

class Tag extends Eloquent {
    public function get_tags()
    {
        return DB::table('tags')->get();
    }
}
