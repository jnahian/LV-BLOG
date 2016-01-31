<?php

class Role extends Eloquent {
    public function get_roles()
    {
        return DB::table('roles')->get();
    }
}
