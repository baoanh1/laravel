<?php

namespace UniSharp\LaravelFilemanager\Handlers;

class ConfigHandler
{
    public function userField()
    {
    	dd(345);
        return auth()->user()->id;
    }
}
