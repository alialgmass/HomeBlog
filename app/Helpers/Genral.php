<?php

    function uploud_file($folder,$name,$file){
  
        // $request->img->move("images/maincatigory/",$name);
        
          //  $path='images/maincatigory/'.$name;
          $path=$file->storeAs($folder,$name,'public');
        return $path;
      }
      