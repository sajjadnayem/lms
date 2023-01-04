<?php

function permission_check($permission)
{
    if (!\Illuminate\Support\Facades\Auth::user()->hasPermissionTo($permission)){
        flash()->addWarning('You are not authorized to access this page');
        return redirect()->back();
    }

}
