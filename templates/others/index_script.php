<?php

include "rest.php";

function createSchoolClasses()
{
    $schoolClasses = callGET("annees/" . 1 . "/classes");

    foreach ($schoolClasses as $schoolClass)
    {
        //createSchoolClass($schoolClass->name);
    }
    
    echo($schoolClasses);
    
    return $schoolClasses;
}

function createSchoolClass($schoolClassName)
{
    $v = '<div class="form-group row">
        <label for="class" class="col col-form-label">Classe :</label>
        <div class="col">
            <input id="class" class="form-control" type="text" value="' . $schoolClassName . '"/>
        </div>
        <label for="teacher" class="col col-form-label">Enseignant :</label>
        <div class="col">
            <input id="teacher" class="form-control" type="text"/>
        </div>
    </div>';
    
    echo $v;
}

?>
