<?php

use Illuminate\Support\Facades\Auth;

function logged_in_user()
{
    if (Auth::check()) {
        return auth()->user();
    }

    return null;
}

function hasRole(string $name)
{
    return logged_in_user()->role->name === $name;
}
